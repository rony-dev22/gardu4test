<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informasi Sistem - GARDU4</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #102A56;
            --navy-dark: #0B1E3A;
            --blue: #1687E8;
            --blue-dark: #0E63B6;
            --blue-soft: #EAF4FF;
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
            letter-spacing: .7px;
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
            transition: .2s ease;
        }

        .menu i {
            width: 18px;
            text-align: center;
            font-size: 16px;
        }

        .menu:hover {
            background: rgba(255,255,255,.08);
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
            padding: 20px;
            max-width: 850px;
            box-shadow: var(--shadow);
        }

        .setting-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid #F0F3F7;
        }

        .setting-row:last-child {
            border-bottom: none;
        }

        .setting-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-soft);
            color: var(--blue);
            font-size: 18px;
        }

        .setting-content {
            flex: 1;
        }

        .setting-title {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .setting-description {
            font-size: 10px;
            color: var(--muted);
            line-height: 1.5;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            background: #E9FBF2;
            color: #128A50;
            font-size: 9px;
            font-weight: 800;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
            padding: 9px 13px;
            border-radius: 8px;
            background: var(--blue);
            color: white;
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
            transition: .2s;
        }

        .back-btn:hover {
            background: var(--blue-dark);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }

            .search-box {
                width: 300px;
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


        <a href="{{ route('admin.informasi-sistem') }}" class="menu active">

            <i class="bi bi-info-circle"></i>

            <span>
                Pengaturan
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
                    Informasi Sistem
                </h1>

                <p>
                    Informasi dasar sistem GARDU4.
                </p>

            </div>


            <div class="info-banner">

                <div class="info-icon">
                    <i class="bi bi-info-circle"></i>
                </div>

                <div class="info-text">

                    <strong>
                        Informasi Sistem
                    </strong>

                    <span>
                        Informasi dasar mengenai kondisi dan pengelolaan sistem GARDU4.
                    </span>

                </div>

            </div>


            <div class="card">


                <!-- STATUS SISTEM -->

                <div class="setting-row">

                    <div class="setting-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div class="setting-content">

                        <div class="setting-title">
                            Status Sistem
                        </div>

                        <div class="setting-description">
                            Sistem pemeriksaan sedang berjalan dengan normal.
                        </div>

                    </div>

                    <span class="status">
                        Aktif
                    </span>

                </div>


                <!-- PENGGUNA -->

                <div class="setting-row">

                    <div class="setting-icon">
                        <i class="bi bi-person-gear"></i>
                    </div>

                    <div class="setting-content">

                        <div class="setting-title">
                            Pengguna
                        </div>

                        <div class="setting-description">
                            Kelola akun, role, dan status pengguna melalui menu Kelola User.
                        </div>

                    </div>

                </div>


                <!-- DOKUMEN -->

                <div class="setting-row">

                    <div class="setting-icon">
                        <i class="bi bi-folder-check"></i>
                    </div>

                    <div class="setting-content">

                        <div class="setting-title">
                            Dokumen
                        </div>

                        <div class="setting-description">
                            Kelola dokumen pemeriksaan dan kategori berkas yang tersimpan dalam sistem.
                        </div>

                    </div>

                </div>


                <!-- INFORMASI SISTEM -->

                <div class="setting-row">

                    <div class="setting-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>

                    <div class="setting-content">

                        <div class="setting-title">
                            Informasi Sistem
                        </div>

                        <div class="setting-description">
                            GARDU4 — Jaga Berkas, Wujudkan Kinerja.
                        </div>

                    </div>

                </div>


                <a href="{{ route('admin.dashboard') }}" class="back-btn">

                    <i class="bi bi-arrow-left"></i>

                    Kembali ke Dashboard

                </a>


            </div>


        </main>

    </div>

</body>

</html>