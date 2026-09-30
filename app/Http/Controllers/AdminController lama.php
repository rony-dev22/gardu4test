<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function dashboard()

{
    // Pastikan hanya admin yang bisa mengakses dashboard
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    

    // Statistik user
    $totalUser = User::count();
    $totalKetua = User::where('role', 'ketua')->count();
    $totalAnggota = User::where('role', 'anggota')->count();

    // Statistik pemeriksaan
    $totalPemeriksaan = Pemeriksaan::count();

    $pemeriksaanAktif = Pemeriksaan::where('status', 'aktif')->count();

    // Statistik dokumen
    $totalDokumen = Dokumen::count();

    $pemeriksaanTerbaru = Pemeriksaan::with('ketuaTim')
    ->latest()
    ->take(5)
    ->get();

    $dokumenTerbaru = Dokumen::with(['user', 'pemeriksaan'])
    ->latest()
    ->take(5)
    ->get();

    return view('admin.dashboard', compact(
        'totalUser',
        'totalKetua',
        'totalAnggota',
        'totalPemeriksaan',
        'pemeriksaanAktif',
        'pemeriksaanTerbaru',
        'dokumenTerbaru',
        'totalDokumen'
    ));
}
public function users(Request $request)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $query = User::query();

    if ($request->filled('role')) {
        $query->where('role', $request->role);
    }

    $users = $query
        ->orderBy('role')
        ->orderBy('name')
        ->get();

    return view('admin.users', compact('users'));
}

public function createUser()
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.users-create');
}

public function storeUser(Request $request)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:admin,ketua,anggota',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'role' => $validated['role'],
    ]);

    return redirect()
        ->route('admin.users')
        ->with('success', 'User berhasil ditambahkan.');
}
public function editUser($id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);

    return view('admin.users-edit', compact('user'));
}

public function updateUser(Request $request, $id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6',
        'role' => 'required|in:admin,ketua,anggota',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->role = $validated['role'];

    if (!empty($validated['password'])) {
        $user->password = $validated['password'];
    }

    $user->save();

    return redirect()
        ->route('admin.users')
        ->with('success', 'User berhasil diperbarui.');
}

public function toggleUserStatus($id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);

    // Admin tidak boleh menonaktifkan dirinya sendiri
    if ($user->id === Auth::id()) {
        return redirect()
            ->route('admin.users')
            ->with('error', 'Anda tidak dapat menonaktifkan akun sendiri.');
    }

    $user->is_active = !$user->is_active;
    $user->save();

    return redirect()
        ->route('admin.users')
        ->with(
            'success',
            $user->is_active
                ? 'Akun berhasil diaktifkan.'
                : 'Akun berhasil dinonaktifkan.'
        );
}

public function deleteUser($id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);

    // Admin tidak boleh menghapus dirinya sendiri
    if ($user->id === Auth::id()) {
        return redirect()
            ->route('admin.users')
            ->with('error', 'Anda tidak dapat menghapus akun sendiri.');
    }

    // Jangan hapus user yang sudah memiliki data pemeriksaan
    if (
        $user->pemeriksaanDipimpin()->exists() ||
        $user->pemeriksaanAnggota()->exists() ||
        $user->dokumen()->exists() ||
        $user->permintaanDibuat()->exists() ||
        $user->permintaanDiterima()->exists()
    ) {
        return redirect()
            ->route('admin.users')
            ->with('error', 'User tidak dapat dihapus karena sudah memiliki data dalam sistem.');
    }

    $user->delete();

    return redirect()
        ->route('admin.users')
        ->with('success', 'User berhasil dihapus.');
}
public function pemeriksaan()
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $pemeriksaan = Pemeriksaan::with('ketuaTim')
        ->withCount(['anggota', 'dokumen'])
        ->latest()
        ->get();

    return view('admin.pemeriksaan', compact('pemeriksaan'));
}
public function detailPemeriksaan($id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $pemeriksaan = Pemeriksaan::with([
        'ketuaTim',
        'anggota.user',
        'dokumen.user',
    ])->findOrFail($id);

    return view('admin.pemeriksaan-detail', compact('pemeriksaan'));
}
public function exportPemeriksaan($id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $pemeriksaan = Pemeriksaan::with([
        'ketuaTim',
        'anggota.user',
        'dokumen.user',
    ])->findOrFail($id);

    /*
     * Export XLSX asli agar data langsung terbagi ke kolom
     * dan tampil rapi saat dibuka di Microsoft Excel.
     * Tidak membutuhkan package tambahan.
     */
    $filename = 'pemeriksaan-' . $pemeriksaan->id . '.xlsx';
    $tempFile = tempnam(sys_get_temp_dir(), 'gardu4_export_');

    $zip = new \ZipArchive();

    if ($zip->open($tempFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
        abort(500, 'File Excel tidak dapat dibuat.');
    }

    $xml = fn ($value) => htmlspecialchars(
        (string) $value,
        ENT_XML1 | ENT_QUOTES,
        'UTF-8'
    );

    $cell = function ($row, $column, $value, $style = 0, $type = 'inlineStr') use ($xml) {
        $ref = $column . $row;

        if ($type === 'n') {
            return '<c r="' . $ref . '" s="' . $style . '"><v>' . (float) $value . '</v></c>';
        }

        return '<c r="' . $ref . '" s="' . $style . '" t="inlineStr">'
            . '<is><t xml:space="preserve">' . $xml($value) . '</t></is>'
            . '</c>';
    };

    $rowXml = function ($row, array $cells) {
        return '<row r="' . $row . '" ht="21" customHeight="1">'
            . implode('', $cells)
            . '</row>';
    };

    $rows = [];
    $merges = [];

    // DETAIL PEMERIKSAAN
    $rows[] = $rowXml(1, [
        $cell(1, 'A', 'DETAIL PEMERIKSAAN', 1),
    ]);
    $merges[] = 'A1:E1';

    $detail = [
        ['Nama Pemeriksaan', $pemeriksaan->nama_pemeriksaan],
        ['Nomor Surat Tugas', $pemeriksaan->nomor_surat_tugas ?? '-'],
        ['Ketua Tim', $pemeriksaan->ketuaTim->name ?? '-'],
        ['Tanggal Mulai', $pemeriksaan->tanggal_mulai
            ? $pemeriksaan->tanggal_mulai->format('d-m-Y')
            : '-'],
        ['Tanggal Selesai', $pemeriksaan->tanggal_selesai
            ? $pemeriksaan->tanggal_selesai->format('d-m-Y')
            : '-'],
        ['Status', ucfirst($pemeriksaan->status ?? '-')],
        ['Keterangan', $pemeriksaan->keterangan ?? '-'],
    ];

    foreach ($detail as $index => [$label, $value]) {
        $row = $index + 2;

        $rows[] = $rowXml($row, [
            $cell($row, 'A', $label, 4),
            $cell($row, 'B', $value, 5),
        ]);

        $merges[] = "B{$row}:E{$row}";
    }

    // ANGGOTA PEMERIKSAAN
    $memberSectionRow = count($rows) + 2;

    $rows[] = $rowXml($memberSectionRow, [
        $cell($memberSectionRow, 'A', 'ANGGOTA PEMERIKSAAN', 2),
    ]);
    $merges[] = "A{$memberSectionRow}:E{$memberSectionRow}";

    $memberHeaderRow = $memberSectionRow + 1;

    $rows[] = $rowXml($memberHeaderRow, [
        $cell($memberHeaderRow, 'A', 'No', 3),
        $cell($memberHeaderRow, 'B', 'Nama Anggota', 3),
        $cell($memberHeaderRow, 'C', 'Email', 3),
        $cell($memberHeaderRow, 'D', 'Jenis Pekerjaan', 3),
        $cell($memberHeaderRow, 'E', 'Status', 3),
    ]);

    $row = $memberHeaderRow + 1;

    foreach ($pemeriksaan->anggota as $index => $anggota) {
        $status = ucfirst($anggota->status ?? '-');
        $statusStyle = in_array(
            strtolower($anggota->status ?? ''),
            ['lengkap', 'selesai', 'disetujui']
        ) ? 6 : 0;

        $rows[] = $rowXml($row, [
            $cell($row, 'A', $index + 1, 8),
            $cell($row, 'B', $anggota->user->name ?? '-', 5),
            $cell($row, 'C', $anggota->user->email ?? '-', 5),
            $cell($row, 'D', $anggota->jenis_pekerjaan ?? '-', 5),
            $cell($row, 'E', $status, $statusStyle),
        ]);

        $row++;
    }

    // DOKUMEN PEMERIKSAAN
    $row++;

    $documentSectionRow = $row;

    $rows[] = $rowXml($documentSectionRow, [
        $cell($documentSectionRow, 'A', 'DOKUMEN PEMERIKSAAN', 2),
    ]);
    $merges[] = "A{$documentSectionRow}:E{$documentSectionRow}";

    $documentHeaderRow = $documentSectionRow + 1;

    $rows[] = $rowXml($documentHeaderRow, [
        $cell($documentHeaderRow, 'A', 'No', 3),
        $cell($documentHeaderRow, 'B', 'Nama File', 3),
        $cell($documentHeaderRow, 'C', 'Jenis Dokumen', 3),
        $cell($documentHeaderRow, 'D', 'Pengunggah', 3),
        $cell($documentHeaderRow, 'E', 'Status', 3),
    ]);

    $row = $documentHeaderRow + 1;

    foreach ($pemeriksaan->dokumen as $index => $dokumen) {
        $status = ucfirst($dokumen->status ?? '-');
        $statusStyle = in_array(
            strtolower($dokumen->status ?? ''),
            ['lengkap', 'selesai', 'disetujui']
        ) ? 6 : 0;

        $rows[] = $rowXml($row, [
            $cell($row, 'A', $index + 1, 8),
            $cell($row, 'B', $dokumen->nama_file ?? '-', 5),
            $cell($row, 'C', $dokumen->jenis_dokumen ?? '-', 8),
            $cell($row, 'D', $dokumen->user->name ?? '-', 5),
            $cell($row, 'E', $status, $statusStyle),
        ]);

        $row++;
    }

    $sheetRows = implode('', $rows);

    $mergeXml = '';
    foreach ($merges as $merge) {
        $mergeXml .= '<mergeCell ref="' . $merge . '"/>';
    }

    // XLSX PACKAGE
    $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
        . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
        . '<Default Extension="xml" ContentType="application/xml"/>'
        . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
        . '<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
        . '<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>'
        . '<Override PartName="/docProps/core.xml" ContentType="application/vnd.openxmlformats-package.core-properties+xml"/>'
        . '<Override PartName="/docProps/app.xml" ContentType="application/vnd.openxmlformats-officedocument.extended-properties+xml"/>'
        . '</Types>';

    $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
        . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
        . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties" Target="docProps/core.xml"/>'
        . '<Relationship Id="rId3" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/extended-properties" Target="docProps/app.xml"/>'
        . '</Relationships>';

    $workbook = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" '
        . 'xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
        . '<sheets><sheet name="Detail Pemeriksaan" sheetId="1" r:id="rId1"/></sheets>'
        . '</workbook>';

    $workbookRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
        . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
        . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>'
        . '</Relationships>';

    $styles = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
        . '<numFmts count="0"/>'
        . '<fonts count="3">'
        . '<font><sz val="10"/><name val="Poppins"/></font>'
        . '<font><b/><sz val="16"/><color rgb="FFFFFFFF"/><name val="Poppins"/></font>'
        . '<font><b/><sz val="10"/><color rgb="FFFFFFFF"/><name val="Poppins"/></font>'
        . '</fonts>'
        . '<fills count="5">'
        . '<fill><patternFill patternType="none"/></fill>'
        . '<fill><patternFill patternType="gray125"/></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FF1E5EB8"/><bgColor indexed="64"/></patternFill></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FF315EAD"/><bgColor indexed="64"/></patternFill></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FFDCE9F8"/><bgColor indexed="64"/></patternFill></fill>'
        . '</fills>'
        . '<borders count="2">'
        . '<border><left/><right/><top/><bottom/><diagonal/></border>'
        . '<border><left style="thin"><color rgb="FFE2E6EE"/></left><right style="thin"><color rgb="FFE2E6EE"/></right><top style="thin"><color rgb="FFE2E6EE"/></top><bottom style="thin"><color rgb="FFE2E6EE"/></bottom><diagonal/></border>'
        . '</borders>'
        . '<cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs>'
        . '<cellXfs count="9">'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyAlignment="1"><alignment vertical="center"/></xf>'
        . '<xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyAlignment="1"><alignment vertical="center" horizontal="left"/></xf>'
        . '<xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyAlignment="1"><alignment vertical="center" horizontal="left"/></xf>'
        . '<xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="center" wrapText="1"/></xf>'
        . '<xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="left"/></xf>'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="left" wrapText="1"/></xf>'
        . '<xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="center"/></xf>'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="left"/></xf>'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyAlignment="1"><alignment vertical="center" horizontal="center"/></xf>'
        . '</cellXfs>'
        . '<cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0"/></cellStyles>'
        . '</styleSheet>';

    $sheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
        . '<sheetViews><sheetView workbookViewId="0" showGridLines="1"/></sheetViews>'
        . '<sheetFormatPr defaultRowHeight="21"/>'
        . '<cols>'
        . '<col min="1" max="1" width="8" customWidth="1"/>'
        . '<col min="2" max="2" width="42" customWidth="1"/>'
        . '<col min="3" max="3" width="34" customWidth="1"/>'
        . '<col min="4" max="4" width="24" customWidth="1"/>'
        . '<col min="5" max="5" width="20" customWidth="1"/>'
        . '</cols>'
        . '<sheetData>' . $sheetRows . '</sheetData>'
        . '<mergeCells count="' . count($merges) . '">' . $mergeXml . '</mergeCells>'
        . '<pageMargins left="0.3" right="0.3" top="0.5" bottom="0.5" header="0.2" footer="0.2"/>'
        . '</worksheet>';

    $core = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<cp:coreProperties xmlns:cp="http://schemas.openxmlformats.org/package/2006/metadata/core-properties" '
        . 'xmlns:dc="http://purl.org/dc/elements/1.1/">'
        . '<dc:title>Detail Pemeriksaan - ' . $xml($pemeriksaan->nama_pemeriksaan) . '</dc:title>'
        . '<dc:creator>GARDU4</dc:creator>'
        . '</cp:coreProperties>';

    $app = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Properties xmlns="http://schemas.openxmlformats.org/officeDocument/2006/extended-properties">'
        . '<Application>GARDU4</Application>'
        . '</Properties>';

    $zip->addFromString('[Content_Types].xml', $contentTypes);
    $zip->addFromString('_rels/.rels', $rels);
    $zip->addFromString('xl/workbook.xml', $workbook);
    $zip->addFromString('xl/_rels/workbook.xml.rels', $workbookRels);
    $zip->addFromString('xl/styles.xml', $styles);
    $zip->addFromString('xl/worksheets/sheet1.xml', $sheet);
    $zip->addFromString('docProps/core.xml', $core);
    $zip->addFromString('docProps/app.xml', $app);

    $zip->close();

    return response()->download(
        $tempFile,
        $filename,
        [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]
    )->deleteFileAfterSend(true);
}

public function laporan()
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $totalPemeriksaan = Pemeriksaan::count();
    $pemeriksaanAktif = Pemeriksaan::where('status', 'aktif')->count();
    $pemeriksaanSelesai = Pemeriksaan::where('status', 'selesai')->count();
    $totalDokumen = Dokumen::count();
    $totalAnggota = User::where('role', 'anggota')->count();

    $laporanPemeriksaan = Pemeriksaan::with('ketuaTim')
        ->withCount(['anggota', 'dokumen'])
        ->latest()
        ->get();

    return view('admin.laporan', compact(
        'totalPemeriksaan',
        'pemeriksaanAktif',
        'pemeriksaanSelesai',
        'totalDokumen',
        'totalAnggota',
        'laporanPemeriksaan'
    ));
}
public function kategoriBerkas()
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $kategori = Dokumen::select('jenis_dokumen')
        ->selectRaw('COUNT(*) as jumlah')
        ->whereNotNull('jenis_dokumen')
        ->where('jenis_dokumen', '!=', '')
        ->groupBy('jenis_dokumen')
        ->orderBy('jenis_dokumen')
        ->get();

    return view('admin.kategori-berkas', compact('kategori'));
}
public function storeLha(Request $request, $id)
{
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $pemeriksaan = Pemeriksaan::findOrFail($id);

    $request->validate([
        'lha' => 'required|file|mimes:pdf,doc,docx|max:10240',
    ]);

    DB::transaction(function () use ($request, $pemeriksaan) {

        $lha = $request->file('lha');

        $lhaPath = $lha->store('dokumen/lha', 'public');

        // Cari LHA yang sudah ada untuk pemeriksaan ini
        $dokumenLha = Dokumen::where('pemeriksaan_id', $pemeriksaan->id)
            ->where('jenis_dokumen', 'LHA')
            ->first();

        // Kalau sudah ada, update LHA
        if ($dokumenLha) {

            $dokumenLha->update([
                'user_id' => Auth::id(),
                'nama_file' => $lha->getClientOriginalName(),
                'file_path' => $lhaPath,
                'status' => 'disetujui',
            ]);

        } else {

            // Kalau belum ada, buat LHA baru
            Dokumen::create([
                'pemeriksaan_id' => $pemeriksaan->id,
                'user_id' => Auth::id(),
                'jenis_dokumen' => 'LHA',
                'nama_file' => $lha->getClientOriginalName(),
                'file_path' => $lhaPath,
                'status' => 'disetujui',
            ]);
        }

        // Semua dokumen yang masih menunggu
        // dianggap selesai setelah LHA diterbitkan.
        Dokumen::where('pemeriksaan_id', $pemeriksaan->id)
            ->where('status', 'menunggu')
            ->update([
                'status' => 'disetujui',
            ]);

        // LHA adalah tanda finalisasi pemeriksaan.
        $pemeriksaan->update([
            'status' => 'selesai',
        ]);
    });

    return redirect()
        ->route('admin.pemeriksaan.detail', $id)
        ->with(
            'success',
            'LHA berhasil disimpan dan pemeriksaan telah difinalisasi.'
        );
}
}