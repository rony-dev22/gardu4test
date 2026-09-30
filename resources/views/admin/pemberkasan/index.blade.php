<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pemberkasan - GARDU4</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #102A56;
            --navy-dark: #0B1E3A;
            --blue: #1687E8;
            --blue-dark: #0E63B6;
            --blue-soft: #EAF4FF;
            --yellow: #FFB81C;
            --green: #17B26A;
            --red: #F04438;
            --bg: #F5F8FC;
            --text: #14213D;
            --muted: #74809A;
            --border: #E7EDF5;
            --shadow: 0 6px 20px rgba(16, 42, 86, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 210px;
            background: linear-gradient(180deg, var(--navy-dark), var(--navy));
            padding: 18px 10px;
            z-index: 1000;
            overflow-y: auto;
        }

        .brand {
            padding: 6px 8px 16px;
            margin-bottom: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .brand-logo {
            width: 165px;
            height: 130px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        .menu-title {
            color: #91A4C0;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            padding: 12px 10px 6px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            min-height: 38px;
            padding: 7px 11px;
            margin-bottom: 2px;
            border-radius: 8px;
            color: #C5D0E0;
            text-decoration: none;
            font-size: 12px;
            transition: 0.2s ease;
        }

        .menu i {
            width: 18px;
            text-align: center;
            font-size: 16px;
        }

        .menu:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .menu.active {
            background: linear-gradient(90deg, #1687E8, #2698F3);
            color: white;
            box-shadow: 0 5px 14px rgba(22,135,232,0.24);
        }

        .logout {
            width: 100%;
            border: none;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 210px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 66px;
            background: rgba(255,255,255,0.98);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .page-title {
            font-size: 19px;
            font-weight: 700;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .notification {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #60708A;
            font-size: 18px;
            background: #F7F9FC;
            border: 1px solid var(--border);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 4px 6px;
            border-radius: 9px;
            text-decoration: none;
            color: inherit;
        }

        .profile:hover {
            background: #F7F9FC;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--blue-soft);
            color: var(--blue-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
        }

        .profile-name {
            font-size: 11px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 9px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 24px;
        }

        .page-heading {
            margin-bottom: 18px;
        }

        .page-heading h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 11px;
        }

        /* =========================
           INFO
        ========================= */

        .info-banner {
            background: linear-gradient(135deg, #FFFFFF, #F7FBFF);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 16px 18px;
            margin-bottom: 18px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--blue-soft);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .info-text strong {
            display: block;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .info-text span {
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 19px;
            box-shadow: var(--shadow);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .section-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--blue-soft);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .card-title h2 {
            font-size: 14px;
        }

        .total-data {
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            text-align: left;
            padding: 10px 8px;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        td {
            padding: 12px 8px;
            font-size: 10px;
            border-bottom: 1px solid #F0F3F7;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .file-name {
            font-weight: 700;
            color: var(--text);
            max-width: 220px;
            word-break: break-word;
        }

        .secondary {
            color: var(--muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 8px;
            font-weight: 800;
        }

        .menunggu {
            background: #FFF6DE;
            color: #9B6800;
        }

        .diproses {
            background: #EAF4FF;
            color: #0E63B6;
        }

        .disetujui {
            background: #E9FBF2;
            color: #128A50;
        }

        .ditolak {
            background: #FDECEC;
            color: #B42318;
        }

        .default {
            background: #F1F5F9;
            color: #475569;
        }

        .lihat {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            background: var(--blue);
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 9px;
            font-weight: 700;
            transition: 0.2s;
            white-space: nowrap;
        }

        .lihat:hover {
            background: var(--blue-dark);
        }

        .empty {
            text-align: center;
            padding: 28px;
            color: var(--muted);
            font-size: 11px;
        }

        /* =========================
           SEARCH & PEMERIKSAAN LIST
        ========================= */

        .search-box {
            width: 420px;
            height: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #F5F8FC;
            border: 1px solid #E7EDF5;
            border-radius: 10px;
            padding: 0 14px;
        }

        .search-box i { color: #74809A; font-size: 15px; }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #14213D;
            font-size: 11px;
        }

        .search-box input::placeholder { color: #8A97AC; }

        .pemeriksaan-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 12px;
        }

        .pemeriksaan-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 15px;
            background: #FFFFFF;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .pemeriksaan-card:hover {
            border-color: #BFDDF8;
            box-shadow: 0 6px 18px rgba(16, 42, 86, 0.08);
            transform: translateY(-1px);
        }

        .pemeriksaan-card.hidden { display: none; }

        .pemeriksaan-card-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.45;
            margin-bottom: 8px;
        }

        .pemeriksaan-card-meta {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 9px;
            margin-bottom: 4px;
        }

        .pemeriksaan-card-meta i { color: var(--blue); }

        .pemeriksaan-card-count {
            margin-top: 10px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 8px;
            border-radius: 999px;
            background: var(--blue-soft);
            color: var(--blue-dark);
            font-size: 8px;
            font-weight: 800;
        }

        .document-section { display: none; }
        .document-section.active { display: block; }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            margin-bottom: 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #F7F9FC;
            color: var(--text);
            font-size: 9px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background: var(--blue-soft);
            color: var(--blue-dark);
        }

        .document-heading { margin-bottom: 14px; }
        .document-heading h2 { font-size: 14px; margin-bottom: 4px; }
        .document-heading p { color: var(--muted); font-size: 10px; }

        .no-result {
            display: none;
            text-align: center;
            padding: 24px;
            color: var(--muted);
            font-size: 10px;
        }


        .pemeriksaan-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .pemeriksaan-group {
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            background: #FFFFFF;
        }

        .pemeriksaan-group-header {
            padding: 14px 16px;
            background: #F7FAFE;
            border-bottom: 1px solid var(--border);
        }

        .pemeriksaan-group-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .pemeriksaan-group-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.4;
            margin-bottom: 5px;
        }

        .pemeriksaan-group-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
            color: var(--muted);
            font-size: 9px;
        }

        .pemeriksaan-group-meta i {
            color: var(--blue);
        }

        .pemeriksaan-count {
            flex-shrink: 0;
            padding: 6px 9px;
            border-radius: 999px;
            background: var(--blue-soft);
            color: var(--blue-dark);
            font-size: 8px;
            font-weight: 800;
            white-space: nowrap;
        }

        .group-table-wrap {
            overflow-x: auto;
        }

        .group-table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        .group-table th {
            padding: 10px 9px;
            background: #FBFCFE;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            text-align: left;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .group-table td {
            padding: 11px 9px;
            font-size: 10px;
            border-bottom: 1px solid #F0F3F7;
            vertical-align: middle;
        }

        .group-table tr:last-child td {
            border-bottom: none;
        }

        .member-name {
            font-weight: 700;
            color: var(--text);
        }

        .document-type {
            color: #58708C;
            font-weight: 600;
        }

        .group-table .file-name {
            max-width: 320px;
        }

        .pemeriksaan-group.hidden {
            display: none;
        }

        .no-result {
            display: none;
            text-align: center;
            padding: 24px;
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1050px) {
            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }
        }

        @media (max-width: 720px) {
            .sidebar {
                width: 68px;
                padding: 12px 7px;
            }

            .brand-logo {
                width: 55px;
                height: 60px;
            }

            .menu-title,
            .menu span {
                display: none;
            }

            .menu {
                justify-content: center;
                padding: 11px;
            }

            .main {
                margin-left: 68px;
            }

            .content {
                padding: 16px;
            }

            .profile-info {
                display: none;
            }

        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">

            <img
                src="{{ asset('images/logo-gardu4.png') }}"
                alt="Logo GARDU4"
                class="brand-logo"
            >

        </div>


        <div class="menu-title">
            Menu Utama
        </div>


        <a href="{{ route('admin.dashboard') }}" class="menu">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        <a href="{{ route('admin.pemeriksaan') }}" class="menu">

            <i class="bi bi-clipboard-check"></i>

            <span>
                Pemeriksaan
            </span>

        </a>


        <a href="{{ url('/admin/pemberkasan') }}" class="menu active">

            <i class="bi bi-folder2-open"></i>

            <span>
                Pemberkasan
            </span>

        </a>


        <a href="{{ route('admin.users') }}" class="menu">

            <i class="bi bi-people"></i>

            <span>
                Kelola User
            </span>

        </a>


        <a href="{{ route('admin.kategori-berkas') }}" class="menu">

            <i class="bi bi-file-earmark-text"></i>

            <span>
                Kategori Berkas
            </span>

        </a>


        <a href="{{ route('admin.laporan') }}" class="menu">

            <i class="bi bi-bar-chart"></i>

            <span>
                Laporan
            </span>

        </a>


        <div class="menu-title">
            Akun
        </div>


        <a href="{{ route('admin.profil') }}" class="menu">

            <i class="bi bi-person-circle"></i>

            <span>
                Profil
            </span>

        </a>


       <a href="{{ route('admin.informasi-sistem') }}" class="menu">
    <i class="bi bi-info-circle"></i>
    <span>
        Informasi Sistem
    </span>
</a>


        <form action="{{ url('/logout') }}" method="POST">

            @csrf

            <button type="submit" class="menu logout">

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </aside>


    <!-- MAIN -->
    <div class="main">


        <!-- TOPBAR -->
        <header class="topbar">

            <div class="search-box">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchPemeriksaan"
                    placeholder="Cari nama pemeriksaan..."
                    autocomplete="off"
                >
            </div>


            <div class="top-right">

                <div class="notification">
                    <i class="bi bi-bell"></i>
                </div>


                <a href="{{ route('admin.profil') }}" class="profile">

                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <div class="profile-name">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="profile-role">
                            Administrator
                        </div>

                    </div>

                </a>

            </div>

        </header>


        <!-- CONTENT -->
        <main class="content">


            @php
                $kelompokPemeriksaan = $pemberkasan->groupBy(function ($item) {
                    return $item->pemeriksaan_id ?? 'tanpa_pemeriksaan';
                });
            @endphp

            <div class="page-heading">
                <h1>Pemberkasan</h1>
                <p>Kelola dan pantau seluruh dokumen yang dikumpulkan dalam setiap pemeriksaan.</p>
            </div>

            <div class="info-banner">
                <div class="info-icon">
                    <i class="bi bi-folder-check"></i>
                </div>
                <div class="info-text">
                    <strong>Dokumen Pemeriksaan</strong>
                    <span>
                        Seluruh dokumen ditampilkan berdasarkan pemeriksaan yang terkait.
                    </span>
                </div>
            </div>

            <div class="card" id="pemeriksaanCard">

                <div class="card-header">
                    <div class="card-title">
                        <div class="section-icon">
                            <i class="bi bi-folder2-open"></i>
                        </div>
                        <h2>Daftar Pemberkasan</h2>
                    </div>

                    <div class="total-data" id="totalPemeriksaan">
                        Total: {{ $kelompokPemeriksaan->count() }} pemeriksaan
                    </div>
                </div>

                <div class="pemeriksaan-list" id="pemeriksaanList">

                    @forelse ($kelompokPemeriksaan as $pemeriksaanId => $dokumenList)

                        @php
                            $pemeriksaan = $dokumenList->first()->pemeriksaan;
                            $namaPemeriksaan = $pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan Tanpa Nama';
                            $nomorSurat = $pemeriksaan->nomor_surat_tugas ?? null;
                        @endphp

                        <div
                            class="pemeriksaan-group"
                            data-search="{{ strtolower($namaPemeriksaan . ' ' . ($nomorSurat ?? '')) }}"
                        >
                            <div class="pemeriksaan-group-header">
                                <div class="pemeriksaan-group-top">
                                    <div>
                                        <div class="pemeriksaan-group-title">
                                            {{ $namaPemeriksaan }}
                                        </div>

                                        <div class="pemeriksaan-group-meta">
                                            @if ($nomorSurat)
                                                <span>
                                                    Nomor Surat Tugas: {{ $nomorSurat }}
                                                </span>
                                                <span>•</span>
                                            @endif

                                            <span>
                                                {{ $dokumenList->count() }} dokumen masuk
                                            </span>
                                        </div>
                                    </div>

                                    <div class="pemeriksaan-count">
                                        {{ $dokumenList->count() }} Berkas
                                    </div>
                                </div>
                            </div>

                            <div class="group-table-wrap">
                                <table class="group-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                            <th>Jenis Dokumen</th>
                                            <th>Nama File</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($dokumenList as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    <span class="member-name">
                                                        {{ $item->user->name ?? '-' }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="document-type">
                                                        {{ $item->jenis_dokumen ?? '-' }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="file-name">
                                                        {{ $item->nama_file }}
                                                    </div>
                                                </td>

                                                <td>
                                                    @php
                                                        $status = strtolower($item->status ?? '');
                                                    @endphp

                                                    @if ($status === 'menunggu')
                                                        <span class="badge menunggu">Menunggu</span>
                                                    @elseif ($status === 'diproses')
                                                        <span class="badge diproses">Diproses</span>
                                                    @elseif ($status === 'disetujui')
                                                        <span class="badge disetujui">Disetujui</span>
                                                    @elseif ($status === 'ditolak')
                                                        <span class="badge ditolak">Ditolak</span>
                                                    @else
                                                        <span class="badge default">
                                                            {{ ucfirst($item->status ?? '-') }}
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($item->file_path)
                                                        <a
                                                            href="{{ asset('storage/' . $item->file_path) }}"
                                                            target="_blank"
                                                            class="lihat"
                                                        >
                                                            <i class="bi bi-eye"></i>
                                                            Lihat
                                                        </a>
                                                    @else
                                                        <span class="secondary">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @empty
                        <div class="empty" style="width: 100%;">
                            Belum ada pemeriksaan yang memiliki dokumen.
                        </div>
                    @endforelse

                </div>

                <div class="no-result" id="noSearchResult">
                    Pemeriksaan yang dicari tidak ditemukan.
                </div>

            </div>

        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPemeriksaan');
            const pemeriksaanGroups = document.querySelectorAll('.pemeriksaan-group');
            const totalPemeriksaan = document.getElementById('totalPemeriksaan');
            const noSearchResult = document.getElementById('noSearchResult');

            if (!searchInput) return;

            searchInput.addEventListener('input', function () {
                const keyword = this.value.trim().toLowerCase();
                let visibleCount = 0;

                pemeriksaanGroups.forEach(function (group) {
                    const searchText = group.dataset.search || '';

                    if (searchText.includes(keyword)) {
                        group.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        group.classList.add('hidden');
                    }
                });

                totalPemeriksaan.textContent =
                    `Total: ${visibleCount} pemeriksaan`;

                noSearchResult.style.display =
                    visibleCount === 0 && pemeriksaanGroups.length > 0
                        ? 'block'
                        : 'none';
            });
        });
    </script>

</body>

</html>