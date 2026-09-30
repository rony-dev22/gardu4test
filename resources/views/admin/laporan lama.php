<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan - GARDU4</title>

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

        /* SIDEBAR */

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
            letter-spacing: .7px;
            padding: 12px 10px 6px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            min-height: 40px;
            padding: 9px 11px;
            margin-bottom: 4px;
            border-radius: 8px;
            color: #C5D0E0;
            text-decoration: none;
            font-size: 12px;
            transition: .2s ease;
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
            box-shadow: 0 5px 14px rgba(22,135,232,.24);
        }

        .logout {
            width: 100%;
            border: none;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }

        /* MAIN */

        .main {
            margin-left: 210px;
            min-height: 100vh;
        }

        /* TOPBAR */

        .topbar {
            height: 66px;
            background: rgba(255,255,255,.98);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .search-box {
            width: 410px;
            height: 38px;
            display: flex;
            align-items: center;
            gap: 9px;
            background: #F5F8FC;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0 13px;
        }

        .search-box i {
            color: var(--muted);
            font-size: 14px;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: var(--text);
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #97A3B5;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
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

        /* CONTENT */

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

        /* INFO */

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

        /* STATS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 18px;
            min-height: 108px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
        }

        .stat-title {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 7px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: 800;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .blue {
            background: #EAF4FF;
            color: var(--blue);
        }

        .yellow {
            background: #FFF6DE;
            color: #E69B00;
        }

        .green {
            background: #E9FBF2;
            color: var(--green);
        }

        .red {
            background: #FDECEC;
            color: #F04438;
        }

        /* TABLE */

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

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
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

        .primary {
            font-weight: 700;
        }

        .secondary {
            color: var(--muted);
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 8px;
            font-weight: 800;
        }

        .status-aktif {
            background: #E9FBF2;
            color: #128A50;
        }

        .status-selesai {
            background: #EAF4FF;
            color: #0E63B6;
        }

        .status-default {
            background: #F1F5F9;
            color: #475569;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            padding: 28px;
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {

            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-box {
                width: 320px;
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

            .search-box {
                width: 210px;
            }

            .profile-info {
                display: none;
            }
        }

        @media (max-width: 520px) {

            .search-box {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
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


        <a href="{{ url('/admin/pemberkasan') }}" class="menu">

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


        <a href="{{ route('admin.laporan') }}" class="menu active">

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
                    placeholder="Cari laporan atau pemeriksaan..."
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


            <div class="page-heading">

                <h1>
                    Laporan
                </h1>

                <p>
                    Ringkasan data pemeriksaan dan pemberkasan GARDU4.
                </p>

            </div>


            <div class="info-banner">

                <div class="info-icon">
                    <i class="bi bi-bar-chart-line"></i>
                </div>

                <div class="info-text">

                    <strong>
                        Ringkasan Laporan
                    </strong>

                    <span>
                        Pantau jumlah pemeriksaan, status kegiatan, dan dokumen yang tersimpan dalam sistem.
                    </span>

                </div>

            </div>


            <!-- STATISTIK -->
            <section class="stats">


                <div class="stat-card">

                    <div>

                        <div class="stat-title">
                            Total Pemeriksaan
                        </div>

                        <div class="stat-number">
                            {{ $totalPemeriksaan }}
                        </div>

                    </div>

                    <div class="stat-icon blue">
                        <i class="bi bi-clipboard-check"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div>

                        <div class="stat-title">
                            Pemeriksaan Aktif
                        </div>

                        <div class="stat-number">
                            {{ $pemeriksaanAktif }}
                        </div>

                    </div>

                    <div class="stat-icon yellow">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div>

                        <div class="stat-title">
                            Pemeriksaan Selesai
                        </div>

                        <div class="stat-number">
                            {{ $pemeriksaanSelesai }}
                        </div>

                    </div>

                    <div class="stat-icon green">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div>

                        <div class="stat-title">
                            Total Dokumen
                        </div>

                        <div class="stat-number">
                            {{ $totalDokumen }}
                        </div>

                    </div>

                    <div class="stat-icon red">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                </div>

            </section>


            <!-- REKAP -->
            <div class="card">


                <div class="card-header">

                    <div class="card-title">

                        <div class="section-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>

                        <h2>
                            Rekap Pemeriksaan
                        </h2>

                    </div>


                    <div class="total-data">
                        Total: {{ $laporanPemeriksaan->count() }} data
                    </div>

                </div>


                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>Nama Pemeriksaan</th>
                                <th>Nomor Surat Tugas</th>
                                <th>Ketua Tim</th>
                                <th>Anggota</th>
                                <th>Dokumen</th>
                                <th>Status</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($laporanPemeriksaan as $item)

                                <tr class="laporan-row">

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        <div class="primary">
                                            {{ $item->nama_pemeriksaan }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="secondary">
                                            {{ $item->nomor_surat_tugas ?? '-' }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="secondary">
                                            {{ $item->ketuaTim->name ?? '-' }}
                                        </div>

                                    </td>


                                    <td>
                                        {{ $item->anggota_count }}
                                    </td>


                                    <td>
                                        {{ $item->dokumen_count }}
                                    </td>


                                    <td>

                                        @if ($item->status === 'aktif')

                                            <span class="status status-aktif">
                                                Aktif
                                            </span>

                                        @elseif ($item->status === 'selesai')

                                            <span class="status status-selesai">
                                                Selesai
                                            </span>

                                        @else

                                            <span class="status status-default">
                                                {{ ucfirst($item->status ?? '-') }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="7" class="empty">

                                        <i class="bi bi-bar-chart"
                                           style="font-size:24px;display:block;margin-bottom:8px;">
                                        </i>

                                        Belum ada data pemeriksaan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


            </div>


        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.querySelector('.search-box input');
            const rows = document.querySelectorAll('.laporan-row');
            const totalData = document.querySelector('.total-data');

            if (!searchInput || !totalData) return;

            searchInput.addEventListener('input', function () {
                const keyword = this.value.trim().toLowerCase();
                let visibleCount = 0;

                rows.forEach(function (row) {
                    const rowText = row.textContent.toLowerCase();
                    const match = rowText.includes(keyword);

                    row.style.display = match ? '' : 'none';
                    if (match) visibleCount++;
                });

                totalData.textContent = `Total: ${visibleCount} data`;
            });
        });
    </script>

</body>

</html>