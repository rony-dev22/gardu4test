<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Dashboard Ketua - GARDU4</title>

    <style>
        :root {
            --navy: #102A56;
            --navy-dark: #0B1E3A;
            --blue: #1687E8;
            --blue-dark: #0E63B6;
            --blue-soft: #EAF4FF;
            --yellow: #FFB81C;
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
           SIDEBAR — ukuran mengikuti Admin
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

        .logo-area {
            padding: 6px 8px 16px;
            margin-bottom: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            height: auto;
        }

        .logo-area img {
            width: 165px;
            height: 130px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        .menu-label {
            color: #91A4C0;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            padding: 12px 10px 6px;
            margin: 0;
        }

        .sidebar a,
        .sidebar button {
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
            background: transparent;
            border: none;
            text-align: left;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            transition: 0.2s ease;
            cursor: pointer;
        }

        .sidebar a:hover,
        .sidebar button:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #1687E8, #2698F3);
            color: white;
            box-shadow: 0 5px 14px rgba(22,135,232,0.24);
            font-weight: 700;
        }

        .sidebar-icon {
            width: 18px;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-icon svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            stroke-width: 1.8;
            fill: none;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.08);
            margin: 12px 6px;
        }

        .sidebar form {
            margin: 0;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 210px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR — ukuran mengikuti Admin
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

        .search-box {
            width: 360px;
            height: 38px;
            background: #F7F9FC;
            border: 1px solid var(--border);
            border-radius: 9px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            color: #91A0B4;
            font-size: 12px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
        }

        .icon-box {
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

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 4px 6px;
            border-radius: 9px;
            text-decoration: none;
            color: inherit;
        }

        .profile-mini:hover {
            background: #F7F9FC;
        }

        .avatar {
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
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
        }

        .profile-role {
            color: var(--muted);
            font-size: 9px;
            margin-top: 2px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 24px;
        }

        .page-title {
            font-size: 19px;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin: 3px 0 18px;
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
            display: flex;
            align-items: center;
        }

        .welcome-content {
            position: relative;
            z-index: 4;
            max-width: 58%;
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

        .welcome h2 {
            font-size: 25px;
            color: var(--text);
            margin: 0 0 7px;
        }

        .welcome p {
            color: var(--muted);
            font-size: 12px;
            max-width: 700px;
            line-height: 1.6;
        }

        /* Foto mengikuti proporsi welcome Admin */

        .welcome-photo {
            position: absolute;
            top: 0;
            right: 0;
            width: 42%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
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
           STATISTIK — ukuran mengikuti Admin
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .stat-link {
            text-decoration: none;
            color: inherit;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 18px;
            min-height: 105px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: var(--shadow);
            transition: 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 24px rgba(16, 42, 86, 0.08);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 7px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            margin: 0;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: var(--blue-soft);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
        }

        .stat-number {
            font-size: 25px;
            font-weight: 800;
            color: var(--text);
        }

        /* =========================
           PANEL
        ========================= */

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 19px;
            box-shadow: var(--shadow);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .panel-title {
            margin: 0;
            font-size: 14px;
            color: var(--text);
        }

        .panel-subtitle {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 9px;
        }

        /* =========================
           PEMERIKSAAN
        ========================= */

        .exam-item {
            padding: 11px 0;
            border-bottom: 1px solid #F0F3F7;
        }

        .exam-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .exam-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .exam-name {
            margin: 0 0 5px;
            font-size: 11px;
            color: var(--text);
            font-weight: 700;
        }

        .exam-meta {
            margin: 0;
            font-size: 9px;
            color: var(--muted);
        }

        .status {
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 8px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-aktif {
            background: #E9FBF2;
            color: #128A50;
        }

        .status-selesai {
            background: #EDF1F5;
            color: #607083;
        }

        .status-lain {
            background: #FFF6DE;
            color: #9B6800;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .progress-label,
        .progress-value {
            font-size: 8px;
            color: #7E8DA0;
        }

        .progress-value {
            font-weight: 700;
            color: #45729D;
        }

        .progress-bar {
            width: 100%;
            height: 7px;
            background: #EDF2F7;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #4D94D2;
            border-radius: 20px;
        }

        .detail-btn {
            display: inline-block;
            margin-top: 9px;
            padding: 6px 9px;
            background: var(--blue-soft);
            color: var(--blue-dark);
            text-decoration: none;
            border-radius: 7px;
            font-size: 8px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .detail-btn:hover {
            background: #DCEEFF;
        }

        .empty {
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

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 720px) {
            .sidebar {
                width: 68px;
                padding: 12px 7px;
            }

            .logo-area img {
                width: 55px;
                height: 60px;
            }

            .menu-label {
                display: none;
            }

            .sidebar a,
            .sidebar button {
                justify-content: center;
                padding: 11px;
            }

            .main {
                margin-left: 68px;
            }

            .content {
                padding: 16px;
            }

            .welcome-content {
                max-width: 60%;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                position: static;
            }

            .search-box {
                display: none;
            }

            .content {
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .welcome {
                display: block;
                min-height: auto;
                padding: 24px;
            }

            .welcome-content {
                max-width: 100%;
            }

            .welcome-photo {
                position: relative;
                width: 100%;
                height: 190px;
                margin-top: 22px;
                border-radius: 14px;
            }
        }
    </style>

</head>


<body>


    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">


        <div class="logo-area">

            <img
                src="{{ asset('images/logo-gardu4.png') }}"
                alt="GARDU4">

        </div>


        <div class="menu-label">
            MENU UTAMA
        </div>


        <!-- DASHBOARD -->

        <a
            href="{{ route('ketua.dashboard') }}"
            class="active">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <rect
                        x="3"
                        y="3"
                        width="7"
                        height="7"
                        rx="1">
                    </rect>

                    <rect
                        x="14"
                        y="3"
                        width="7"
                        height="7"
                        rx="1">
                    </rect>

                    <rect
                        x="3"
                        y="14"
                        width="7"
                        height="7"
                        rx="1">
                    </rect>

                    <rect
                        x="14"
                        y="14"
                        width="7"
                        height="7"
                        rx="1">
                    </rect>

                </svg>

            </span>

            Dashboard

        </a>


        <!-- PEMERIKSAAN -->

        <a href="{{ route('ketua.pemeriksaan') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <rect
                        x="5"
                        y="4"
                        width="14"
                        height="17"
                        rx="2">
                    </rect>

                    <path d="M9 4.5V3h6v1.5"></path>

                    <path d="M8 9h8"></path>

                    <path d="M8 13h8"></path>

                    <path d="M8 17h5"></path>

                </svg>

            </span>

            Pemeriksaan

        </a>


        <!-- PEMBERKASAN -->

        <a href="{{ route('ketua.pemberkasan') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <path d="M3 7h7l2 2h9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                    </path>

                    <path d="M3 7V5a2 2 0 0 1 2-2h5l2 2h7">
                    </path>

                </svg>

            </span>

            Pemberkasan

        </a>


        <!-- RIWAYAT -->

        <a href="{{ route('ketua.riwayat') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle
                        cx="12"
                        cy="12"
                        r="9">
                    </circle>

                    <path d="M12 7v5l3 2"></path>

                </svg>

            </span>

            Riwayat Pemeriksaan

        </a>


        <!-- ANGGOTA TEAM -->

        <a href="{{ route('ketua.anggota') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle
                        cx="9"
                        cy="8"
                        r="3">
                    </circle>

                    <circle
                        cx="17"
                        cy="9"
                        r="2.5">
                    </circle>

                    <path d="M3.5 19c.5-3 2.5-5 5.5-5s5 2 5.5 5">
                    </path>

                    <path d="M14.5 14c2.5-.5 5 1.1 6 3.5">
                    </path>

                </svg>

            </span>

            Anggota Team

        </a>


        <!-- PEMISAH -->

        <div class="sidebar-divider"></div>


        <div class="menu-label">
            AKUN
        </div>


        <!-- PROFIL -->

        <a href="{{ route('ketua.profil') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle
                        cx="12"
                        cy="8"
                        r="3.5">
                    </circle>

                    <path d="M5 20c.8-3.5 3.1-5.5 7-5.5s6.2 2 7 5.5">
                    </path>

                </svg>

            </span>

            Profil

        </a>


        <!-- LOGOUT -->

        <form
            action="{{ url('/logout') }}"
            method="POST">

            @csrf

            <button type="submit">

                <span class="sidebar-icon">

                    <svg viewBox="0 0 24 24">

                        <path d="M10 4H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5">
                        </path>

                        <path d="M14 8l4 4-4 4">
                        </path>

                        <path d="M18 12H9">
                        </path>

                    </svg>

                </span>

                Logout

            </button>

        </form>

    </aside>



    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">
<div class="topbar-right">


                <div class="icon-box">
                    <i class="bi bi-bell"></i>
                </div>


                <a
                    href="{{ route('ketua.profil') }}"
                    class="profile-mini">


                    <div class="avatar">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>


                    <div>

                        <div class="profile-name">

                            {{ Auth::user()->name }}

                        </div>


                        <div class="profile-role">

                            Ketua Team

                        </div>

                    </div>


                </a>


            </div>


        </div>



        <!-- ================= CONTENT ================= -->

        <div class="content">


            <h1 class="page-title">
                Dashboard
            </h1>


            <p class="page-subtitle">
                Pantau pemeriksaan, anggota team, dan kelengkapan dokumen.
            </p>



            <!-- ================= WELCOME ================= -->

            <div class="welcome">


                <div class="welcome-content">


                    <div class="welcome-line"></div>


                    <div class="welcome-label">
                        GARDU4 · KETUA TEAM
                    </div>


                    <h2>
                        Selamat Datang, {{ Auth::user()->name }}
                    </h2>


                    <p>
                        Kelola pemeriksaan dan pantau perkembangan
                        pekerjaan team Anda.
                    </p>



                </div>



                <!-- FOTO INSPEKTORAT -->

                <div class="welcome-photo">

                    <img
                        src="{{ asset('images/tugu-kujang.jpeg') }}"
                        alt="Gedung Inspektorat Kabupaten Bogor">

                </div>


            </div>



            <!-- ================= STATISTIK ================= -->

            <div class="stats">


                <!-- TOTAL PEMERIKSAAN -->

                <a
                    href="{{ route('ketua.pemeriksaan') }}"
                    class="stat-link">

                    <div class="stat-card">


                        <div class="stat-top">

                            <p class="stat-label">
                                Total Pemeriksaan
                            </p>


                            <div class="stat-icon">
                                PR
                            </div>

                        </div>


                        <div class="stat-number">

                            {{ $totalPemeriksaan }}

                        </div>


                    </div>

                </a>



                <!-- PEMERIKSAAN AKTIF -->

                <div class="stat-card">


                    <div class="stat-top">

                        <p class="stat-label">
                            Pemeriksaan Aktif
                        </p>


                        <div class="stat-icon">
                            AK
                        </div>

                    </div>


                    <div class="stat-number">

                        {{ $pemeriksaanAktif }}

                    </div>


                </div>



                <!-- TOTAL ANGGOTA -->

                <div class="stat-card">


                    <div class="stat-top">

                        <p class="stat-label">
                            Total Anggota
                        </p>


                        <div class="stat-icon">
                            AG
                        </div>

                    </div>


                    <div class="stat-number">

                        {{ $totalAnggota }}

                    </div>


                </div>



                <!-- TOTAL DOKUMEN -->

                <div class="stat-card">


                    <div class="stat-top">

                        <p class="stat-label">
                            Total Dokumen
                        </p>


                        <div class="stat-icon">
                            DK
                        </div>

                    </div>


                    <div class="stat-number">

                        {{ $pemeriksaan->sum(function ($item) {
                            return $item->dokumen->count();
                        }) }}

                    </div>


                </div>


            </div>



            <!-- ================= PEMERIKSAAN TERBARU ================= -->

            <div class="panel">


                <div class="panel-header">


                    <div>

                        <h2 class="panel-title">
                            Pemeriksaan Terbaru
                        </h2>


                        <p class="panel-subtitle">
                            Daftar pemeriksaan yang sedang Anda kelola.
                        </p>

                    </div>


                </div>



                @forelse ($pemeriksaan as $item)


                   @php

    $totalAnggotaPemeriksaan =
        $item->anggota->count();

    $anggotaLengkapPemeriksaan = 0;


    foreach ($item->anggota as $anggota) {

        $dokumenAnggota =
            $item->dokumen
                ->where('user_id', $anggota->user_id);


        /*
         * AUDIT
         * KKA + NHA
         */
        $auditLengkap =
            $dokumenAnggota->contains(
                'jenis_dokumen',
                'KKA'
            )
            &&
            $dokumenAnggota->contains(
                'jenis_dokumen',
                'NHA'
            );


        /*
         * REVIU
         * KKR + CHR
         */
        $reviuLengkap =
            $dokumenAnggota->contains(
                'jenis_dokumen',
                'KKR'
            )
            &&
            $dokumenAnggota->contains(
                'jenis_dokumen',
                'CHR'
            );


        /*
         * Anggota dianggap lengkap jika
         * Audit ATAU Reviu sudah lengkap.
         */
        $lengkap =
            $auditLengkap || $reviuLengkap;


        if ($lengkap) {

            $anggotaLengkapPemeriksaan++;

        }

    }


    $progressPemeriksaan =
        $totalAnggotaPemeriksaan > 0

        ? round(
            (
                $anggotaLengkapPemeriksaan
                /
                $totalAnggotaPemeriksaan
            ) * 100
        )

        : 0;


    $statusClass = match ($item->status) {

        'aktif' =>
            'status-aktif',

        'selesai' =>
            'status-selesai',

        default =>
            'status-lain',

    };

@endphp



                    <!-- ITEM -->

                    <div class="exam-item">


                        <div class="exam-top">


                            <div>

                                <h3 class="exam-name">

                                    {{ $item->nama_pemeriksaan }}

                                </h3>


                                <p class="exam-meta">

                                    {{ $totalAnggotaPemeriksaan }}

                                    anggota

                                    · Progress kelengkapan dokumen

                                </p>

                            </div>



                            <span
                                class="status {{ $statusClass }}">

                                {{ ucfirst($item->status) }}

                            </span>


                        </div>



                        <!-- PROGRESS -->

                        <div class="progress-header">


                            <span class="progress-label">

                                Kelengkapan Team

                            </span>


                            <span class="progress-value">

                                {{ $progressPemeriksaan }}%

                            </span>


                        </div>


                        <div class="progress-bar">


                            <div
                                class="progress-fill"
                                style="width: {{ $progressPemeriksaan }}%;">
                            </div>


                        </div>



                        <!-- DETAIL -->

                        <a
                            href="{{ route('ketua.pemeriksaan.detail', $item->id) }}"
                            class="detail-btn">

                            Lihat Detail

                        </a>


                    </div>


                @empty


                    <div class="empty">

                        Belum ada pemeriksaan yang dibuat.

                    </div>


                @endforelse


            </div>


        </div>

    </main>


</body>

</html>