<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanAnggota;
use App\Models\Dokumen;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Menampilkan pemeriksaan yang ditugaskan kepada anggota.
     */
    public function pemeriksaan()
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'anggota.pemeriksaan',
            compact('pemeriksaanAnggota')
        );
    }


    /**
     * Detail pemeriksaan anggota.
     */
    public function detailPemeriksaan($id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->where('pemeriksaan_id', $id)
            ->firstOrFail();

        $pemeriksaan = $pemeriksaanAnggota->pemeriksaan;

        return view(
            'anggota.detail-pemeriksaan',
            compact('pemeriksaan')
        );
    }


    /**
     * Form Audit.
     */
    public function audit($id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->where('pemeriksaan_id', $id)
            ->firstOrFail();

        $pemeriksaan = $pemeriksaanAnggota->pemeriksaan;

        return view(
            'anggota.audit',
            compact('pemeriksaan')
        );
    }


    /**
     * Menyimpan dokumen Audit.
     *
     * Audit:
     * - KKA
     * - NHA
     */
    public function storeAudit(Request $request, $id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::where(
            'user_id',
            Auth::id()
        )
            ->where('pemeriksaan_id', $id)
            ->firstOrFail();

        $request->validate([
            'kka' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'nha' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $kka = $request->file('kka');
        $nha = $request->file('nha');

        $kkaPath = $kka->store(
            'dokumen/audit',
            'public'
        );

        $nhaPath = $nha->store(
            'dokumen/audit',
            'public'
        );


        /*
         * Simpan KKA.
         */
        Dokumen::create([
            'pemeriksaan_id' => $id,
            'user_id' => Auth::id(),
            'jenis_dokumen' => 'KKA',
            'nama_file' => $kka->getClientOriginalName(),
            'file_path' => $kkaPath,
            'status' => 'menunggu',
        ]);


        /*
         * Simpan NHA.
         */
        Dokumen::create([
            'pemeriksaan_id' => $id,
            'user_id' => Auth::id(),
            'jenis_dokumen' => 'NHA',
            'nama_file' => $nha->getClientOriginalName(),
            'file_path' => $nhaPath,
            'status' => 'menunggu',
        ]);


        /*
         * Jangan menimpa jenis pekerjaan yang sudah ada.
         *
         * Kalau anggota sudah memiliki jenis pekerjaan
         * "reviu", upload Audit tidak akan mengubahnya.
         *
         * Kalau belum ada jenis pekerjaan, baru isi "audit".
         */
        if (empty($pemeriksaanAnggota->jenis_pekerjaan)) {

            $pemeriksaanAnggota->update([
                'jenis_pekerjaan' => 'audit',
                'status' => 'lengkap',
            ]);

        } else {

            $pemeriksaanAnggota->update([
                'status' => 'lengkap',
            ]);
        }


        return redirect()
            ->route(
                'anggota.pemeriksaan.detail',
                $id
            )
            ->with(
                'success',
                'Dokumen Audit berhasil dikirim.'
            );
    }


    /**
     * Form Reviu.
     */
    public function reviu($id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->where('pemeriksaan_id', $id)
            ->firstOrFail();

        $pemeriksaan = $pemeriksaanAnggota->pemeriksaan;

        return view(
            'anggota.reviu',
            compact('pemeriksaan')
        );
    }


    /**
     * Menyimpan dokumen Reviu.
     *
     * Reviu:
     * - KKR
     * - CHR
     */
    public function storeReviu(Request $request, $id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::where(
            'user_id',
            Auth::id()
        )
            ->where('pemeriksaan_id', $id)
            ->firstOrFail();

        $request->validate([
            'kkr' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'chr' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $kkr = $request->file('kkr');
        $chr = $request->file('chr');

        $kkrPath = $kkr->store(
            'dokumen/reviu',
            'public'
        );

        $chrPath = $chr->store(
            'dokumen/reviu',
            'public'
        );


        /*
         * Simpan KKR.
         */
        Dokumen::create([
            'pemeriksaan_id' => $id,
            'user_id' => Auth::id(),
            'jenis_dokumen' => 'KKR',
            'nama_file' => $kkr->getClientOriginalName(),
            'file_path' => $kkrPath,
            'status' => 'menunggu',
        ]);


        /*
         * Simpan CHR.
         */
        Dokumen::create([
            'pemeriksaan_id' => $id,
            'user_id' => Auth::id(),
            'jenis_dokumen' => 'CHR',
            'nama_file' => $chr->getClientOriginalName(),
            'file_path' => $chrPath,
            'status' => 'menunggu',
        ]);


        /*
         * Jangan menimpa jenis pekerjaan yang sudah ada.
         *
         * Kalau anggota sudah memiliki jenis pekerjaan
         * "audit", upload Reviu tidak akan mengubahnya.
         *
         * Kalau belum ada jenis pekerjaan, baru isi "reviu".
         */
        if (empty($pemeriksaanAnggota->jenis_pekerjaan)) {

            $pemeriksaanAnggota->update([
                'jenis_pekerjaan' => 'reviu',
                'status' => 'lengkap',
            ]);

        } else {

            $pemeriksaanAnggota->update([
                'status' => 'lengkap',
            ]);
        }


        return redirect()
            ->route(
                'anggota.pemeriksaan.detail',
                $id
            )
            ->with(
                'success',
                'Dokumen Reviu berhasil dikirim.'
            );
    }


    /**
     * Dashboard Anggota.
     */
    public function dashboard()
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $permintaan = Permintaan::with([
            'pemeriksaan',
            'ketua'
        ])
            ->where('anggota_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'anggota.dashboard',
            compact(
                'pemeriksaanAnggota',
                'permintaan'
            )
        );
    }


    /**
     * Menandai permintaan sebagai dibaca.
     */
    public function tandaiPermintaanDibaca($id)
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $permintaan = Permintaan::where('id', $id)
            ->where('anggota_id', Auth::id())
            ->firstOrFail();

        $permintaan->update([
            'status' => 'dibaca',
            'dibaca_pada' => now(),
        ]);

        return redirect()
            ->route('anggota.dashboard')
            ->with(
                'success',
                'Permintaan sudah ditandai sebagai dibaca.'
            );
    }
    /**
     * Riwayat pemeriksaan.
     */
    public function riwayatPemeriksaan()
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $pemeriksaanAnggota = PemeriksaanAnggota::with([
            'pemeriksaan.ketuaTim'
        ])
            ->where('user_id', Auth::id())
            ->whereHas('pemeriksaan', function ($query) {
                $query->where(
                    'status',
                    '!=',
                    'aktif'
                );
            })
            ->latest()
            ->get();

        return view(
            'anggota.riwayat-pemeriksaan',
            compact('pemeriksaanAnggota')
        );
    }


    /**
     * Profil Anggota.
     */
    public function profil()
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $user = Auth::user();

        return view(
            'anggota.profil',
            compact('user')
        );
    }


    /**
     * Dokumen saya.
     */
    public function dokumenSaya()
    {
        if (Auth::user()->role !== 'anggota') {
            abort(403);
        }

        $dokumen = Dokumen::with('pemeriksaan')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'anggota.dokumen',
            compact('dokumen')
        );
    }
}