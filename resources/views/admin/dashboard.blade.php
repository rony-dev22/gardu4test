<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - GARDU4</title>

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
            --purple: #7A5AF8;
            --bg: #F5F8FC;
            --text: #14213D;
            --muted: #74809A;
            --border: #E7EDF5;
            --white: #FFFFFF;
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

        /* =========================
           WELCOME
        ========================= */

        .welcome {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 88% 20%, rgba(22,135,232,0.14), transparent 30%),
                linear-gradient(135deg, #FFFFFF, #F7FBFF);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px 26px;
            min-height: 150px;
            margin-bottom: 18px;
            box-shadow: var(--shadow);
        }

        .welcome-line {
            width: 38px;
            height: 4px;
            border-radius: 5px;
            background: var(--yellow);
            margin-bottom: 10px;
        }

        .welcome-label {
            color: var(--blue-dark);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.9px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .welcome h1 {
            font-size: 25px;
            margin-bottom: 7px;
        }

        .welcome h1 span {
            color: var(--blue-dark);
        }

        .welcome p {
            color: var(--muted);
            font-size: 12px;
            max-width: 700px;
            line-height: 1.6;
        }

        .welcome-photo {
    position: absolute;
    top: 0;
    right: 0;
    width: 42%;
    height: 100%;
    overflow: hidden;
}

.welcome-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 45%;
    display: block;
}

.welcome-photo::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        #F7FBFF 0%,
        rgba(247, 251, 255, 0.85) 12%,
        rgba(247, 251, 255, 0.30) 38%,
        rgba(247, 251, 255, 0) 65%
    );
    z-index: 2;
}

.welcome-photo::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(255,255,255,0.35) 0%,
        rgba(255,255,255,0) 35%
    );
    z-index: 3;
}

        /* =========================
           STATISTIK
        ========================= */

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
            min-height: 105px;
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

        .green {
            background: #E9FBF2;
            color: var(--green);
        }

        .yellow {
            background: #FFF6DE;
            color: #E69B00;
        }

        .red {
            background: #FDECEC;
            color: var(--red);
        }

        /* =========================
           DATA GRID
        ========================= */

        .grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 18px;
        }

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
            margin-bottom: 16px;
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

        .card-header h2 {
            font-size: 14px;
        }

        .card-header a {
            color: var(--blue);
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
        }

        .card-header a:hover {
            text-decoration: underline;
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
        }

        th {
            text-align: left;
            padding: 9px 7px;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 11px 7px;
            font-size: 10px;
            border-bottom: 1px solid #F0F3F7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .primary {
            font-weight: 700;
        }

        .secondary {
            color: var(--muted);
            font-size: 9px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 8px;
            font-weight: 800;
        }

        .badge-success {
            background: #E9FBF2;
            color: #128A50;
        }

        .badge-warning {
            background: #FFF6DE;
            color: #9B6800;
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

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid {
                grid-template-columns: 1fr;
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

            .welcome-logo {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
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

        <a href="{{ route('admin.dashboard') }}" class="menu active">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.pemeriksaan') }}" class="menu">
            <i class="bi bi-clipboard-check"></i>
            <span>Pemeriksaan</span>
        </a>

        <a href="{{ url('/admin/pemberkasan') }}" class="menu">
            <i class="bi bi-folder2-open"></i>
            <span>Pemberkasan</span>
        </a>

        <a href="{{ route('admin.users') }}" class="menu">
            <i class="bi bi-people"></i>
            <span>Kelola User</span>
        </a>

        <a href="{{ route('admin.kategori-berkas') }}" class="menu">
            <i class="bi bi-file-earmark-text"></i>
            <span>Kategori Berkas</span>
        </a>

        <a href="{{ route('admin.laporan') }}" class="menu">
            <i class="bi bi-bar-chart"></i>
            <span>Laporan</span>
        </a>

        <div class="menu-title">
            Akun
        </div>

        <a href="{{ route('admin.profil') }}" class="menu">
            <i class="bi bi-person-circle"></i>
            <span>Profil</span>
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
                <span>Logout</span>
            </button>
        </form>

    </aside>


    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div>
                <div class="page-title">
                    Dashboard
                </div>

                <div class="page-subtitle">
                    Panel Administrator GARDU4
                </div>
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

            <!-- WELCOME -->
           <section class="welcome">

    <div class="welcome-line"></div>

    <div class="welcome-label">
        Sistem Informasi Pemeriksaan
    </div>

    <h1>
        Selamat Datang di <span>GARDU4</span>, {{ Auth::user()->name }} 👋
    </h1>

    <p>
        Jaga Berkas, Wujudkan Kinerja.
        Kelola dan pantau data pemeriksaan, pemberkasan,
        pengguna, serta laporan dalam satu sistem.
    </p>

    <div class="welcome-photo">
        <img
            src="{{ asset('images/tugu-kujang.jpeg') }}"
            alt="Tugu Kujang Bogor"
        >
    </div>

</section>


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
                            Total User
                        </div>

                        <div class="stat-number">
                            {{ $totalUser }}
                        </div>
                    </div>

                    <div class="stat-icon green">
                        <i class="bi bi-people"></i>
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
                        <i class="bi bi-file-earmark-text"></i>
                    </div>

                </div>

            </section>


            <!-- DATA TERBARU -->
            <section class="grid">

                <!-- PEMERIKSAAN TERBARU -->
                <div class="card">

                    <div class="card-header">

                        <div class="card-title">

                            <div class="section-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <h2>
                                Pemeriksaan Terbaru
                            </h2>

                        </div>

                        <a href="{{ route('admin.pemeriksaan') }}">
                            Lihat Semua →
                        </a>

                    </div>


                    <div class="table-wrap">

                        <table>

                            <thead>
                                <tr>
                                    <th>Nama Pemeriksaan</th>
                                    <th>Ketua</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($pemeriksaanTerbaru as $item)

                                    <tr>

                                        <td>
                                            <div class="primary">
                                                {{ $item->nama_pemeriksaan }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="secondary">
                                                {{ $item->ketuaTim->name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>

                                            @if ($item->status === 'aktif')

                                                <span class="badge badge-success">
                                                    Aktif
                                                </span>

                                            @else

                                                <span class="badge badge-warning">
                                                    {{ ucfirst($item->status ?? '-') }}
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3"
                                            style="text-align:center;color:#74809A;padding:24px;">

                                            Belum ada pemeriksaan.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- DOKUMEN TERBARU -->
                <div class="card">

                    <div class="card-header">

                        <div class="card-title">

                            <div class="section-icon">
                                <i class="bi bi-folder2-open"></i>
                            </div>

                            <h2>
                                Dokumen Terbaru
                            </h2>

                        </div>

                        <a href="{{ url('/admin/pemberkasan') }}">
                            Lihat Semua →
                        </a>

                    </div>


                    <div class="table-wrap">

                        <table>

                            <thead>
                                <tr>
                                    <th>Nama File</th>
                                    <th>Pengunggah</th>
                                    <th>Jenis</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($dokumenTerbaru as $dokumen)

                                    <tr>

                                        <td>
                                            <div class="primary">
                                                {{ $dokumen->nama_file }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="secondary">
                                                {{ $dokumen->user->name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>

                                            <span class="badge badge-success">
                                                {{ $dokumen->jenis_dokumen }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3"
                                            style="text-align:center;color:#74809A;padding:24px;">

                                            Belum ada dokumen.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>
</html>