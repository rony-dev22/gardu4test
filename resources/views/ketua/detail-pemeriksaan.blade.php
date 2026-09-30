<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Detail Pemeriksaan - GARDU4
    </title>


    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f7fb;
        color: #1f2937;
    }

    /* ================= SIDEBAR ================= */

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 210px;
        height: 100vh;

        background: linear-gradient(
            180deg,
            #0d1d3b 0%,
            #193b69 100%
        );

        color: white;
        padding: 20px 12px;
        z-index: 1000;
    }

    .logo-area {
        height: 115px;

        display: flex;
        justify-content: center;
        align-items: center;

        border-bottom: 1px solid rgba(255,255,255,0.12);
        margin-bottom: 16px;
    }

    .logo-area img {
        width: 165px;
        max-height: 130px;
        object-fit: cover;
    }

    .menu-label {
        font-size: 9px;
        font-weight: bold;
        color: #a9c0dc;
        margin: 0 10px 8px;
        letter-spacing: 0.6px;
    }

    .sidebar a,
    .sidebar button {
        width: 100%;

        display: flex;
        align-items: center;

        gap: 10px;
        padding: 9px 10px;
        margin-bottom: 5px;

        border-radius: 9px;

        color: #eef4fb;
        text-decoration: none;

        background: transparent;
        border: none;

        text-align: left;
        font-size: 11px;
        font-family: Arial, Helvetica, sans-serif;

        cursor: pointer;
        transition: 0.2s ease;
    }

    .sidebar a:hover,
    .sidebar button:hover {
        background: rgba(255,255,255,0.10);
    }

    .sidebar a.active {
        background: linear-gradient(
            90deg,
            #438fe7,
            #4c9af0
        );

        color: white;
        font-weight: bold;

        box-shadow:
            0 5px 14px rgba(34,104,180,0.25);
    }

    .sidebar-icon {
        width: 19px;
        min-width: 19px;
        height: 19px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar-icon svg {
        width: 17px;
        height: 17px;

        stroke: currentColor;
        stroke-width: 1.8;
        fill: none;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255,255,255,0.12);
        margin: 16px 8px;
    }

    .sidebar form {
        margin: 0;
    }


    /* ================= MAIN ================= */

    .main {
        margin-left: 210px;
        min-height: 100vh;
    }


    /* ================= TOPBAR ================= */

    .topbar {
        height: 66px;

        background: white;
        border-bottom: 1px solid #e7edf5;

        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 0 24px;
    }

    .search-box {
        width: 250px;
        height: 32px;

        background: #f6f8fc;
        border: 1px solid #e3eaf3;
        border-radius: 9px;

        display: flex;
        align-items: center;

        padding: 0 12px;

        color: #91a0b4;
        font-size: 10px;
    }

    .topbar-right {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
    }

    .icon-box {
        width: 32px;
        height: 32px;

        border-radius: 9px;
        background: #f5f8fc;
        color: #6d86a4;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-mini {
        display: flex;
        align-items: center;
        gap: 8px;

        text-decoration: none;
    }

    .avatar {
        width: 32px;
        height: 32px;

        border-radius: 50%;
        background: #e3efff;
        color: #326ca8;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 12px;
        font-weight: bold;
    }

    .profile-name {
        color: #1d2f46;
        font-size: 10px;
        font-weight: bold;
    }

    .profile-role {
        color: #8190a3;
        font-size: 8px;
        margin-top: 2px;
    }


    /* ================= CONTENT ================= */

    .content {
        padding: 24px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 7px 10px;
        background: #edf5ff;
        border: 1px solid #dce9f7;
        border-radius: 7px;

        color: #3674ad;
        text-decoration: none;

        font-size: 9px;
        font-weight: bold;

        margin-bottom: 12px;
        transition: 0.2s ease;
    }

    .back-link:hover {
        color: #2d5f8c;
        background: #e2effc;
    }

    .page-title {
        margin: 0;

        font-size: 19px;
        color: #172b4d;
        font-weight: 700;
    }

    .page-subtitle {
        margin: 4px 0 16px;

        color: #8090a4;
        font-size: 10px;
    }


    /* ================= ALERT ================= */

    .alert {
        padding: 10px 13px;

        border-radius: 9px;
        margin-bottom: 13px;

        font-size: 10px;
        font-weight: 600;
    }

    .alert-success {
        background: #e9f7ee;
        color: #237a46;
        border: 1px solid #c9ebd5;
    }

    .alert-error {
        background: #fff0f0;
        color: #a33d3d;
        border: 1px solid #f0cccc;
    }


    /* ================= CARD ================= */

    .main-card {
        background: white;

        border: 1px solid #e1e8f1;
        border-radius: 13px;

        padding: 19px;

        box-shadow:
            0 4px 14px rgba(33,63,93,0.04);

        margin-bottom: 16px;
    }

    .card-heading {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        gap: 15px;
        margin-bottom: 15px;
    }

    .card-heading h2 {
        margin: 0;

        font-size: 14px;
        color: #1a3558;
    }

    .card-heading p {
        margin: 4px 0 0;

        font-size: 9px;
        color: #8795a8;
    }


    /* ================= INFO GRID ================= */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 10px;
    }

    .info-box {
        background: #f7faff;

        border: 1px solid #e4edf6;
        border-radius: 9px;

        padding: 12px;
    }

    .info-label {
        font-size: 9px;
        color: #8795a8;

        margin-bottom: 5px;
    }

    .info-value {
        font-size: 11px;

        color: #203b5d;
        font-weight: bold;
    }


    /* ================= STATUS ================= */

    .status-badge {
        display: inline-block;

        padding: 5px 9px;
        border-radius: 16px;

        font-size: 8px;
        font-weight: bold;
    }

    .status-aktif {
        background: #e9f7ee;
        color: #238049;
    }

    .status-selesai {
        background: #edf1f5;
        color: #607083;
    }

    .status-lain {
        background: #fff3dc;
        color: #9f6900;
    }


    /* ================= PROGRESS ================= */

    .progress-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 6px;
    }

    .progress-label {
        font-size: 9px;
        color: #65798f;
        font-weight: 600;
    }

    .progress-value {
        font-size: 9px;
        color: #3d709f;
        font-weight: bold;
    }

    .progress-bar {
        width: 100%;
        height: 8px;

        background: #edf2f7;
        border-radius: 20px;

        overflow: hidden;
    }

    .progress-fill {
        height: 100%;

        background: #4d94d2;
        border-radius: 20px;
    }

    .progress-info {
        margin-top: 9px;

        color: #75879b;
        font-size: 9px;
    }

    .progress-info strong {
        color: #284866;
    }


    /* ================= MEMBER ================= */

    .member {
        border: 1px solid #e1e8f1;
        border-radius: 11px;

        padding: 14px;
        margin-bottom: 10px;

        background: #fbfdff;
    }

    .member:last-child {
        margin-bottom: 0;
    }

    .member-header {
        display: flex;

        justify-content: space-between;
        align-items: flex-start;

        gap: 15px;
        margin-bottom: 9px;
    }

    .member-name {
        margin: 0 0 4px;

        font-size: 12px;
        color: #203b5d;
        font-weight: bold;
    }

    .member-email {
        margin: 0;

        color: #8997aa;
        font-size: 9px;
    }

    .member-tags {
        display: flex;
        flex-wrap: wrap;

        gap: 6px;
    }

    .tag {
        display: inline-block;

        padding: 5px 8px;
        border-radius: 16px;

        font-size: 8px;
        font-weight: bold;

        background: #edf5ff;
        color: #356f9f;
    }

    .tag-pending {
        background: #fff3dc;
        color: #9f6900;
    }

    .tag-complete {
        background: #e9f7ee;
        color: #238049;
    }


    /* ================= REQUEST ================= */

    .request-box {
        margin-top: 11px;
        padding-top: 11px;

        border-top: 1px solid #e9eef4;
    }

    .request-label {
        display: block;

        font-size: 9px;
        color: #778ba0;

        margin-bottom: 6px;
    }

    .request-form {
        display: flex;

        gap: 7px;
        align-items: center;
    }

    .request-form input {
        flex: 1;
        min-width: 0;

        height: 32px;

        border: 1px solid #d7e1eb;
        border-radius: 7px;

        padding: 0 10px;

        font-size: 9px;
        color: #334155;

        outline: none;
    }

    .request-form input:focus {
        border-color: #70a9dd;

        box-shadow:
            0 0 0 3px rgba(67,143,231,0.08);
    }

    .request-form button {
        height: 32px;

        border: none;
        border-radius: 7px;

        padding: 0 11px;

        background: #438fe7;
        color: white;

        font-size: 9px;
        font-weight: bold;

        cursor: pointer;
        white-space: nowrap;

        transition: 0.2s ease;
    }

    .request-form button:hover {
        background: #367fd1;
    }


    /* ================= LHA ================= */

    .card {
        background: white;
        border: 1px solid #e1e8f1;
        border-radius: 13px;

        padding: 19px;

        box-shadow:
            0 4px 14px rgba(33,63,93,0.04);

        margin-bottom: 16px;
    }

    .section-title {
        margin: 0 0 13px;

        font-size: 14px;
        line-height: 1.4;

        color: #1a3558;
        font-weight: 700;
    }


    /* ================= EMPTY ================= */

    .empty {
        text-align: center;

        padding: 25px 15px;

        color: #8997aa;
        font-size: 10px;
    }


    /* ================= RESPONSIVE ================= */

    @media (max-width: 1100px) {

        .sidebar {
            width: 210px;
        }

        .main {
            margin-left: 210px;
        }

        .content {
            padding: 24px;
        }

        .search-box {
            width: 250px;
        }

        .info-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }
    }


    @media (max-width: 850px) {

        .sidebar {
            width: 190px;
        }

        .main {
            margin-left: 190px;
        }

        .topbar {
            padding: 0 18px;
        }

        .content {
            padding: 20px;
        }

        .search-box {
            width: 210px;
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
            padding: 18px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .member-header {
            flex-direction: column;
        }

        .request-form {
            flex-direction: column;
            align-items: stretch;
        }

        .request-form button {
            width: 100%;
        }

        /* ================= LHA ================= */

.lha-card {
    padding: 19px;
}

.lha-card .section-title {
    margin: 0 0 13px;
    font-size: 14px;
    line-height: 1.4;
    color: #1a3558;
    font-weight: 700;
}

.lha-file-card {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 16px;

    padding: 14px 15px;

    border: 1px solid #dfe7f1;
    border-radius: 10px;

    background: #f9fbfe;
}

.lha-file-info {
    display: flex;
    align-items: center;

    gap: 11px;

    min-width: 0;
}

.lha-icon {
    width: 40px;
    height: 40px;

    min-width: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #eaf1ff;
    color: #3d73e6;

    font-size: 18px;
}

.lha-details {
    min-width: 0;
}

.lha-title {
    font-size: 12px;
    line-height: 1.4;

    color: #1a3558;
    font-weight: 700;

    margin-bottom: 3px;
}

.lha-filename {
    font-size: 9px;
    line-height: 1.4;

    color: #71809a;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;

    max-width: 500px;
}

.lha-meta {
    margin-top: 4px;

    font-size: 8px;

    color: #9aa8b8;
}

.lha-meta span {
    margin: 0 4px;
}

.lha-action {
    flex-shrink: 0;
}

.lha-view-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 6px;

    padding: 8px 11px;

    border-radius: 7px;

    background: #438fe7;
    color: white;

    text-decoration: none;

    font-size: 9px;
    font-weight: 700;

    transition: 0.2s ease;
}

.lha-view-btn:hover {
    background: #367fd1;
}

.lha-empty {
    padding: 15px;

    border: 1px dashed #ccd7e5;
    border-radius: 10px;

    background: #fbfcfe;
}

.lha-empty-text {
    color: #71809a;
    font-size: 9px;

    margin-bottom: 10px;
}

.lha-input {
    width: 100%;

    padding: 8px;

    border: 1px solid #dce3ec;
    border-radius: 7px;

    background: white;

    margin-bottom: 9px;

    font-size: 9px;
}

.lha-upload-btn {
    border: none;

    background: #3d73e6;
    color: white;

    padding: 8px 11px;

    border-radius: 7px;

    cursor: pointer;

    font-weight: 700;
    font-size: 9px;
}

.lha-upload-btn:hover {
    background: #3264d0;
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

        <a href="{{ route('ketua.dashboard') }}">

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

        <a
            href="{{ route('ketua.pemeriksaan') }}"
            class="active">

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

                    <path
                        d="M3 7h7l2 2h9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                    </path>

                    <path
                        d="M3 7V5a2 2 0 0 1 2-2h5l2 2h7">
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


        <!-- ANGGOTA -->

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

                    <path
                        d="M3.5 19c.5-3 2.5-5 5.5-5s5 2 5.5 5">
                    </path>

                    <path
                        d="M14.5 14c2.5-.5 5 1.1 6 3.5">
                    </path>

                </svg>

            </span>

            Anggota Team

        </a>


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

                    <path
                        d="M5 20c.8-3.5 3.1-5.5 7-5.5s6.2 2 7 5.5">
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

                        <path
                            d="M10 4H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5">
                        </path>

                        <path d="M14 8l4 4-4 4"></path>

                        <path d="M18 12H9"></path>

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

                    <svg
                        viewBox="0 0 24 24"
                        style="width:20px;height:20px;stroke:currentColor;stroke-width:1.8;fill:none;">

                        <path
                            d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9">
                        </path>

                        <path d="M10 21h4"></path>

                    </svg>

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


            <!-- BACK -->

            <a
                href="{{ route('ketua.pemeriksaan') }}"
                class="back-link">

                ← Kembali ke Pemeriksaan

            </a>


            <!-- TITLE -->

            <h1 class="page-title">

                Detail Pemeriksaan

            </h1>


            <p class="page-subtitle">

                Informasi pemeriksaan, progress berkas, dan status anggota team.

            </p>



            <!-- ALERT SUCCESS -->

            @if (session('success'))

                <div class="alert alert-success">

                    ✅ {{ session('success') }}

                </div>

            @endif



            <!-- ALERT ERROR -->

            @if (session('error'))

                <div class="alert alert-error">

                    ❌ {{ session('error') }}

                </div>

            @endif



            <!-- ================= INFORMASI PEMERIKSAAN ================= -->

            <div class="main-card">


                <div class="card-heading">

                    <div>

                        <h2>

                            {{ $pemeriksaan->nama_pemeriksaan }}

                        </h2>


                        <p>

                            Detail pemeriksaan yang sedang Anda pimpin.

                        </p>

                    </div>

                </div>


                <div class="info-grid">


                    <!-- KETUA -->

                    <div class="info-box">

                        <div class="info-label">

                            Ketua Tim

                        </div>


                        <div class="info-value">

                            {{ $pemeriksaan->ketuaTim->name }}

                        </div>

                    </div>


                    <!-- TANGGAL -->

                    <div class="info-box">

                        <div class="info-label">

                            Tanggal Mulai

                        </div>


                        <div class="info-value">

                            {{ $pemeriksaan->tanggal_mulai
                                ? $pemeriksaan->tanggal_mulai->format('d/m/Y')
                                : '-' }}

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="info-box">

                        <div class="info-label">

                            Status Pemeriksaan

                        </div>


                        <div class="info-value">


                            @if ($pemeriksaan->status === 'aktif')

                                <span class="status-badge status-aktif">

                                    Aktif

                                </span>

                            @elseif ($pemeriksaan->status === 'selesai')

                                <span class="status-badge status-selesai">

                                    Selesai

                                </span>

                            @else

                                <span class="status-badge status-lain">

                                    {{ ucfirst($pemeriksaan->status) }}

                                </span>

                            @endif


                        </div>

                    </div>


                </div>

            </div>



            <!-- ================= PROGRESS ================= -->

            <div class="main-card">


                <div class="card-heading">

                    <div>

                        <h2>

                            Progress Pengumpulan Berkas

                        </h2>


                        <p>

                            Pantau kelengkapan dokumen seluruh anggota team.

                        </p>

                    </div>

                </div>


                <div class="progress-header">

                    <span class="progress-label">

                        Kelengkapan Team

                    </span>


                    <span class="progress-value">

                        {{ $progress }}%

                    </span>

                </div>


                <div class="progress-bar">

                    <div
                        class="progress-fill"
                        style="width: {{ $progress }}%;">

                    </div>

                </div>


                <div class="progress-info">

                    <strong>
                        {{ $anggotaLengkap }}
                    </strong>

                    dari

                    <strong>
                        {{ $totalAnggota }}
                    </strong>

                    anggota sudah lengkap.

                </div>


            </div>



            <!-- ================= ANGGOTA ================= -->

            <div class="main-card">


                <div class="card-heading">

                    <div>

                        <h2>

                            Anggota Tim
                            ({{ $pemeriksaan->anggota->count() }})

                        </h2>


                        <p>

                            Pantau status pekerjaan dan kelengkapan berkas anggota.

                        </p>

                    </div>

                </div>



                @forelse (
                    $pemeriksaan->anggota as $anggota
                )


                    <div class="member">


                        <div class="member-header">


                            <div>

                                <h3 class="member-name">

                                    {{ $anggota->user->name }}

                                </h3>


                                @if ($anggota->user->email ?? null)

                                    <p class="member-email">

                                        {{ $anggota->user->email }}

                                    </p>

                                @endif

                            </div>


                            <div>


                                @if ($anggota->lengkap)

                                    <span class="tag tag-complete">

                                        ✅ Lengkap

                                    </span>

                                @else

                                    <span class="tag tag-pending">

                                        ⚠ Belum Lengkap

                                    </span>

                                @endif


                            </div>


                        </div>



                       @php
    $dokumenAnggota = $pemeriksaan->dokumen
        ->where('user_id', $anggota->user_id);

    $punyaAudit =
        $dokumenAnggota->contains('jenis_dokumen', 'KKA') ||
        $dokumenAnggota->contains('jenis_dokumen', 'NHA');

    $punyaReviu =
        $dokumenAnggota->contains('jenis_dokumen', 'KKR') ||
        $dokumenAnggota->contains('jenis_dokumen', 'CHR');
@endphp

<div class="member-tags">

    @if ($punyaAudit)

        <span class="tag">
            AUDIT
        </span>

    @endif


    @if ($punyaReviu)

        <span class="tag">
            REVIU
        </span>

    @endif


    @if (!$punyaAudit && !$punyaReviu)

        <span class="tag tag-pending">
            Belum memilih Audit/Reviu
        </span>

    @endif

</div>



                        <!-- MINTA LENGKAPI -->

                        @if (!$anggota->lengkap)


                            <div class="request-box">


                                <label class="request-label">

                                    Kirim permintaan kelengkapan kepada anggota

                                </label>


                                <form
                                    class="request-form"
                                    action="{{ route(
                                        'ketua.pemeriksaan.minta-lengkapi',
                                        [
                                            $pemeriksaan->id,
                                            $anggota->user_id
                                        ]
                                    ) }}"
                                    method="POST">

                                    @csrf


                                    <input
                                        type="text"
                                        name="pesan"
                                        placeholder="Contoh: Mohon lengkapi dokumen pemeriksaan."
                                        required>


                                    <button type="submit">

                                        Minta Lengkapi

                                    </button>

                                </form>


                            </div>


                        @endif


                    </div>


                @empty


                    <div class="empty">

                        Belum ada anggota dalam pemeriksaan ini.

                    </div>


                @endforelse


            </div>
<!-- ================= HASIL AKHIR PEMERIKSAAN ================= -->

<div class="main-card" style="padding:19px;">

    <h3 style="
        margin:0 0 13px;
        font-size:14px;
        line-height:1.4;
        color:#1a3558;
        font-weight:700;
    ">
        Hasil Akhir Pemeriksaan
    </h3>

    @php
        $lha = $pemeriksaan->dokumen
            ->where('jenis_dokumen', 'LHA')
            ->sortByDesc('id')
            ->first();
    @endphp

    @if ($lha)

        <div style="
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
            padding:14px 15px;
            border:1px solid #dfe7f1;
            border-radius:10px;
            background:#f9fbfe;
        ">

            <div style="
                display:flex;
                align-items:center;
                gap:11px;
                min-width:0;
            ">

                <div style="
                    width:40px;
                    height:40px;
                    min-width:40px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:9px;
                    background:#eaf1ff;
                    color:#3d73e6;
                    font-size:18px;
                ">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <div style="min-width:0;">

                    <div style="
                        font-size:12px;
                        line-height:1.4;
                        color:#1a3558;
                        font-weight:700;
                        margin-bottom:3px;
                    ">
                        LHA — Laporan Hasil Audit
                    </div>

                    <div style="
                        font-size:9px;
                        line-height:1.4;
                        color:#71809a;
                        white-space:nowrap;
                        overflow:hidden;
                        text-overflow:ellipsis;
                        max-width:500px;
                    ">
                        {{ $lha->nama_file }}
                    </div>

                    <div style="
                        margin-top:4px;
                        font-size:8px;
                        color:#9aa8b8;
                    ">
                        Diunggah oleh Ketua
                        <span style="margin:0 4px;">•</span>
                        {{ $lha->created_at ? $lha->created_at->format('d/m/Y') : '-' }}
                    </div>

                </div>

            </div>

            <a
                href="{{ asset('storage/' . $lha->file_path) }}"
                target="_blank"
                style="
                    display:inline-flex;
                    align-items:center;
                    justify-content:center;
                    gap:6px;
                    padding:8px 11px;
                    border-radius:7px;
                    background:#438fe7;
                    color:white;
                    text-decoration:none;
                    font-size:9px;
                    font-weight:700;
                    white-space:nowrap;
                    flex-shrink:0;
                "
            >
                <i class="bi bi-eye"></i>
                Lihat LHA
            </a>

        </div>

    @else

        <div style="
            padding:15px;
            border:1px dashed #ccd7e5;
            border-radius:10px;
            background:#fbfcfe;
        ">

            <div style="
                color:#71809a;
                font-size:9px;
                margin-bottom:10px;
            ">
                LHA belum diupload untuk pemeriksaan ini.
            </div>

            <form
                action="{{ route('ketua.pemeriksaan.lha.store', $pemeriksaan->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <input
                    type="file"
                    name="lha"
                    accept=".pdf,.doc,.docx"
                    required
                    style="
                        width:100%;
                        padding:8px;
                        border:1px solid #dce3ec;
                        border-radius:7px;
                        background:white;
                        margin-bottom:9px;
                        font-size:9px;
                    "
                >

                <button
                    type="submit"
                    style="
                        border:none;
                        background:#3d73e6;
                        color:white;
                        padding:8px 11px;
                        border-radius:7px;
                        cursor:pointer;
                        font-weight:700;
                        font-size:9px;
                    "
                >
                    <i class="bi bi-cloud-arrow-up"></i>
                    Upload LHA
                </button>

            </form>

        </div>

    @endif

</div>

        </div>

    </main>


</body>

</html>