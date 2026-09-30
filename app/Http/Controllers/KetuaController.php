<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\User;
use App\Models\Permintaan;
use App\Models\Dokumen;
use App\Models\PemeriksaanAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KetuaController extends Controller
{
    /**
     * Dashboard Ketua Tim
     */
    public function dashboard()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::with([
            'anggota.user',
            'dokumen'
        ])
            ->where('ketua_tim_id', Auth::id())
            ->latest()
            ->get();

        /*
         * Hitung progress setiap pemeriksaan.
         *
         * Audit  = KKA + NHA
         * Reviu  = KKR + CHR
         *
         * Dokumen dianggap terkumpul berdasarkan keberadaan
         * dokumennya, tidak bergantung pada status disetujui.
         *
         * LHA tidak dihitung karena LHA adalah hasil akhir
         * pemeriksaan yang diupload oleh Ketua/Admin.
         */
        foreach ($pemeriksaan as $item) {

            $totalAnggotaPemeriksaan = $item->anggota->count();
            $anggotaLengkapPemeriksaan = 0;

            foreach ($item->anggota as $anggota) {

                $dokumenAnggota = $item->dokumen
                    ->where('user_id', $anggota->user_id);

                $auditLengkap =
                    $dokumenAnggota->contains('jenis_dokumen', 'KKA') &&
                    $dokumenAnggota->contains('jenis_dokumen', 'NHA');

                $reviuLengkap =
                    $dokumenAnggota->contains('jenis_dokumen', 'KKR') &&
                    $dokumenAnggota->contains('jenis_dokumen', 'CHR');

                /*
                 * Kalau anggota sudah menyelesaikan Audit
                 * ATAU Reviu, anggota tersebut dianggap lengkap.
                 *
                 * Kalau dia mengerjakan keduanya, tetap dihitung
                 * satu anggota lengkap.
                 */
                $lengkap = $auditLengkap || $reviuLengkap;

                $anggota->lengkap = $lengkap;
                $anggota->audit_lengkap = $auditLengkap;
                $anggota->reviu_lengkap = $reviuLengkap;

                if ($lengkap) {
                    $anggotaLengkapPemeriksaan++;
                }
            }

            $progressPemeriksaan = $totalAnggotaPemeriksaan > 0
                ? round(
                    ($anggotaLengkapPemeriksaan / $totalAnggotaPemeriksaan) * 100
                )
                : 0;

            /*
             * Data ini bisa langsung dipakai oleh Blade dashboard.
             */
            $item->total_anggota_progress = $totalAnggotaPemeriksaan;
            $item->anggota_lengkap_progress = $anggotaLengkapPemeriksaan;
            $item->progress_pemeriksaan = $progressPemeriksaan;
        }

        $totalPemeriksaan = $pemeriksaan->count();

        $pemeriksaanAktif = $pemeriksaan
            ->where('status', 'aktif')
            ->count();

        $totalAnggota = $pemeriksaan
            ->flatMap(function ($item) {
                return $item->anggota;
            })
            ->unique('user_id')
            ->count();

        return view('ketua.dashboard', compact(
            'pemeriksaan',
            'totalPemeriksaan',
            'pemeriksaanAktif',
            'totalAnggota'
        ));
    }


    /**
     * Menampilkan daftar pemeriksaan milik Ketua Tim.
     */
    public function pemeriksaan()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::with('anggota.user')
            ->where('ketua_tim_id', Auth::id())
            ->latest()
            ->get();

        return view('ketua.pemeriksaan', compact('pemeriksaan'));
    }


    /**
     * Menampilkan form membuat pemeriksaan.
     */
    public function createPemeriksaan()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $anggota = User::where('role', 'anggota')
            ->orderBy('name')
            ->get();

        return view('ketua.create-pemeriksaan', compact('anggota'));
    }


    /**
     * Menampilkan detail pemeriksaan.
     */
    public function detailPemeriksaan($id)
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::with([
            'anggota.user',
            'dokumen'
        ])
            ->where('ketua_tim_id', Auth::id())
            ->findOrFail($id);

        $totalAnggota = $pemeriksaan->anggota->count();

        $anggotaLengkap = 0;

        foreach ($pemeriksaan->anggota as $anggota) {

            $dokumenAnggota = $pemeriksaan->dokumen
                ->where('user_id', $anggota->user_id);

            $anggota->dokumen_upload = $dokumenAnggota;

            /*
             * Audit = KKA + NHA
             */
            $auditLengkap =
                $dokumenAnggota->contains('jenis_dokumen', 'KKA') &&
                $dokumenAnggota->contains('jenis_dokumen', 'NHA');

            /*
             * Reviu = KKR + CHR
             */
            $reviuLengkap =
                $dokumenAnggota->contains('jenis_dokumen', 'KKR') &&
                $dokumenAnggota->contains('jenis_dokumen', 'CHR');

            /*
             * Anggota dianggap lengkap apabila sudah
             * menyelesaikan Audit atau Reviu.
             *
             * Kalau mengerjakan keduanya, tetap dihitung
             * sebagai satu anggota lengkap.
             */
            $lengkap = $auditLengkap || $reviuLengkap;

            $anggota->lengkap = $lengkap;
            $anggota->audit_lengkap = $auditLengkap;
            $anggota->reviu_lengkap = $reviuLengkap;

            if ($lengkap) {
                $anggotaLengkap++;
            }
        }

        $progress = $totalAnggota > 0
            ? round(($anggotaLengkap / $totalAnggota) * 100)
            : 0;

        return view('ketua.detail-pemeriksaan', compact(
            'pemeriksaan',
            'totalAnggota',
            'anggotaLengkap',
            'progress'
        ));
    }


    /**
     * Menyetujui dokumen anggota.
     */
    public function setujuiDokumen($id)
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $dokumen = Dokumen::where('id', $id)
            ->whereHas('pemeriksaan', function ($query) {
                $query->where('ketua_tim_id', Auth::id());
            })
            ->firstOrFail();

        $dokumen->update([
            'status' => 'disetujui',
        ]);

        return back()->with(
            'success',
            'Dokumen berhasil disetujui.'
        );
    }


    /**
     * Mengirim permintaan kepada anggota untuk melengkapi dokumen.
     */
    public function mintaLengkapi(
        Request $request,
        $pemeriksaanId,
        $anggotaId
    ) {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::where(
            'ketua_tim_id',
            Auth::id()
        )->findOrFail($pemeriksaanId);

        $anggota = $pemeriksaan->anggota()
            ->where('user_id', $anggotaId)
            ->firstOrFail();

        $validated = $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        Permintaan::create([
            'pemeriksaan_id' => $pemeriksaan->id,
            'ketua_id' => Auth::id(),
            'anggota_id' => $anggota->user_id,
            'pesan' => $validated['pesan'],
            'status' => 'belum',
        ]);

        return redirect()
            ->route(
                'ketua.pemeriksaan.detail',
                $pemeriksaan->id
            )
            ->with(
                'success',
                'Permintaan berhasil dikirim kepada anggota.'
            );
    }


    /**
     * Menyimpan pemeriksaan baru beserta anggota tim.
     */
    public function storePemeriksaan(Request $request)
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $validated = $request->validate([
            'nama_pemeriksaan' => 'required|string|max:255',
            'nomor_surat_tugas' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
            'anggota' => 'required|array|min:1',
            'anggota.*' => 'exists:users,id',
        ]);

        $pemeriksaan = Pemeriksaan::create([
            'nama_pemeriksaan' =>
                $validated['nama_pemeriksaan'],

            'nomor_surat_tugas' =>
                $validated['nomor_surat_tugas'] ?? null,

            'tanggal_mulai' =>
                $validated['tanggal_mulai'] ?? null,

            'tanggal_selesai' =>
                $validated['tanggal_selesai'] ?? null,

            'ketua_tim_id' => Auth::id(),

            'keterangan' =>
                $validated['keterangan'] ?? null,

            'status' => 'aktif',
        ]);

        foreach ($validated['anggota'] as $userId) {

            $pemeriksaan->anggota()->create([
                'user_id' => $userId,
                'jenis_pekerjaan' => null,
                'status' => 'belum_mulai',
            ]);
        }

        return redirect('/ketua/pemeriksaan')
            ->with(
                'success',
                'Pemeriksaan berhasil dibuat.'
            );
    }


    /**
     * Pemberkasan masuk.
     */
    public function pemberkasanMasuk()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $dokumen = Dokumen::with([
            'user',
            'pemeriksaan'
        ])
            ->whereHas('pemeriksaan', function ($query) {
                $query->where(
                    'ketua_tim_id',
                    Auth::id()
                );
            })
            ->latest()
            ->get();

        return view(
            'ketua.pemberkasan',
            compact('dokumen')
        );
    }


    /**
     * Riwayat pemeriksaan.
     */
    public function riwayatPemeriksaan()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::with('anggota.user')
            ->where('ketua_tim_id', Auth::id())
            ->where('status', '!=', 'aktif')
            ->latest()
            ->get();

        return view(
            'ketua.riwayat-pemeriksaan',
            compact('pemeriksaan')
        );
    }


    /**
     * Daftar anggota team.
     */
    public function anggotaTeam()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $anggota = PemeriksaanAnggota::with([
            'user',
            'pemeriksaan'
        ])
            ->whereHas('pemeriksaan', function ($query) {
                $query->where(
                    'ketua_tim_id',
                    Auth::id()
                );
            })
            ->latest()
            ->get();

        return view(
            'ketua.anggota',
            compact('anggota')
        );
    }


    /**
     * Profil Ketua.
     */
    public function profil()
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $user = Auth::user();

        return view(
            'ketua.profil',
            compact('user')
        );
    }


    /**
     * Upload / replace LHA.
     *
     * LHA adalah hasil akhir pemeriksaan,
     * bukan dokumen anggota.
     */
    public function storeLha(Request $request, $id)
    {
        if (Auth::user()->role !== 'ketua') {
            abort(403);
        }

        $pemeriksaan = Pemeriksaan::where(
            'ketua_tim_id',
            Auth::id()
        )->findOrFail($id);

        $request->validate([
            'lha' =>
                'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $lha = $request->file('lha');

        $lhaPath = $lha->store(
            'dokumen/lha',
            'public'
        );

        DB::transaction(function () use (
            $pemeriksaan,
            $lha,
            $lhaPath
        ) {

            /*
             * Simpan / replace LHA.
             * LHA adalah hasil akhir pemeriksaan dan langsung disetujui.
             */
            $dokumenLha = Dokumen::where(
                'pemeriksaan_id',
                $pemeriksaan->id
            )
                ->where(
                    'jenis_dokumen',
                    'LHA'
                )
                ->first();

            if ($dokumenLha) {

                $dokumenLha->update([
                    'user_id' => Auth::id(),
                    'nama_file' =>
                        $lha->getClientOriginalName(),
                    'file_path' => $lhaPath,
                    'status' => 'disetujui',
                ]);

            } else {

                Dokumen::create([
                    'pemeriksaan_id' =>
                        $pemeriksaan->id,

                    'user_id' => Auth::id(),

                    'jenis_dokumen' => 'LHA',

                    'nama_file' =>
                        $lha->getClientOriginalName(),

                    'file_path' => $lhaPath,

                    'status' => 'disetujui',
                ]);
            }

            /*
             * Setelah LHA disimpan, seluruh dokumen anggota
             * yang masih menunggu dianggap selesai diproses.
             */
            Dokumen::where(
                'pemeriksaan_id',
                $pemeriksaan->id
            )
                ->where('status', 'menunggu')
                ->update([
                    'status' => 'disetujui',
                ]);

            /*
             * LHA menandai pemeriksaan sebagai selesai.
             * Pemeriksaan kemudian otomatis masuk ke Riwayat.
             */
            $pemeriksaan->update([
                'status' => 'selesai',
            ]);
        });

        return redirect()
            ->route(
                'ketua.pemeriksaan.detail',
                $id
            )
            ->with(
                'success',
                'LHA berhasil disimpan dan pemeriksaan telah difinalisasi.'
            );
    }
}