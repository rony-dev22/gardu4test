<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - GARDU4</title>

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

    /* SIDEBAR */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 210px;
        height: 100vh;
        background: linear-gradient(180deg, #0d1d3b 0%, #193b69 100%);
        color: white;
        padding: 22px 14px;
        z-index: 1000;
    }

    .logo-area {
        height: 115px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid rgba(255,255,255,0.12);
        margin-bottom: 18px;
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
        margin: 0 9px 9px;
        letter-spacing: 0.6px;
    }

    .sidebar a,
    .sidebar button {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 9px 10px;
        margin-bottom: 4px;
        border-radius: 8px;
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
        background: linear-gradient(90deg, #438fe7, #4c9af0);
        color: white;
        font-weight: bold;
        box-shadow: 0 5px 12px rgba(34,104,180,0.25);
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
        width: 16px;
        height: 16px;
        stroke: currentColor;
        stroke-width: 1.8;
        fill: none;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255,255,255,0.12);
        margin: 16px 7px;
    }

    .sidebar form {
        margin: 0;
    }

    /* MAIN */
    .main {
        margin-left: 210px;
        min-height: 100vh;
    }

    /* TOPBAR */
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
        border-radius: 8px;
        display: flex;
        align-items: center;
        padding: 0 11px;
        color: #91a0b4;
        font-size: 10px;
    }

    .topbar-right {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .icon-box {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #f5f8fc;
        color: #6d86a4;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-box svg {
        width: 16px;
        height: 16px;
    }

    .profile-mini {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .avatar-small {
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

    /* CONTENT */
    .content {
        padding: 24px;
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

    /* INFO */
    .info-banner {
        background: linear-gradient(135deg, #edf6ff 0%, #ffffff 100%);
        border: 1px solid #dce9f7;
        border-radius: 11px;
        padding: 13px 16px;
        margin-bottom: 15px;
        color: #58718d;
        font-size: 10px;
        line-height: 1.5;
    }

    .info-banner strong {
        color: #2c6091;
    }

    /* PROFILE CARD */
    .profile-card {
        max-width: 700px;
        background: white;
        border: 1px solid #e1e8f1;
        border-radius: 13px;
        padding: 20px;
        box-shadow: 0 4px 14px rgba(33,63,93,0.04);
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-bottom: 17px;
        border-bottom: 1px solid #edf1f6;
        margin-bottom: 5px;
    }

    .profile-avatar {
        width: 58px;
        height: 58px;
        border-radius: 14px;
        background: linear-gradient(135deg, #438fe7, #6aa8ec);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: bold;
        box-shadow: 0 6px 14px rgba(67,143,231,0.20);
        flex-shrink: 0;
    }

    .profile-header h2 {
        margin: 0 0 4px;
        font-size: 16px;
        color: #1b3557;
    }

    .profile-header p {
        margin: 0;
        font-size: 9px;
        color: #8795a8;
    }

    /* ROW */
    .profile-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 15px;
        padding: 13px 0;
        border-bottom: 1px solid #edf1f6;
    }

    .profile-row:last-child {
        border-bottom: none;
    }

    .label {
        font-size: 9px;
        color: #8391a4;
        font-weight: 600;
    }

    .value {
        font-size: 11px;
        color: #203b5d;
        font-weight: 600;
    }

    /* BADGE */
    .badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 20px;
        background: #edf5ff;
        color: #2f6fae;
        font-size: 8px;
        font-weight: bold;
    }

    .status-active {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 20px;
        background: #e9f7ee;
        color: #238049;
        font-size: 8px;
        font-weight: bold;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #35a563;
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {

        .sidebar {
            width: 210px;
        }

        .main {
            margin-left: 210px;
        }

        .content {
            padding: 22px;
        }

        .search-box {
            width: 220px;
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
            width: 190px;
        }

        .profile-row {
            grid-template-columns: 120px 1fr;
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

        .profile-card {
            padding: 17px;
        }

        .profile-header {
            align-items: flex-start;
        }

        .profile-row {
            display: block;
        }

        .label {
            margin-bottom: 5px;
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

                    <rect x="3" y="3" width="7" height="7" rx="1"></rect>

                    <rect x="14" y="3" width="7" height="7" rx="1"></rect>

                    <rect x="3" y="14" width="7" height="7" rx="1"></rect>

                    <rect x="14" y="14" width="7" height="7" rx="1"></rect>

                </svg>

            </span>

            Dashboard

        </a>


        <!-- PEMERIKSAAN -->

        <a href="{{ route('ketua.pemeriksaan') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <rect x="5" y="4" width="14" height="17" rx="2"></rect>

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

                    <path d="M3 7h7l2 2h9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>

                    <path d="M3 7V5a2 2 0 0 1 2-2h5l2 2h7"></path>

                </svg>

            </span>

            Pemberkasan

        </a>


        <!-- RIWAYAT -->

        <a href="{{ route('ketua.riwayat') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle cx="12" cy="12" r="9"></circle>

                    <path d="M12 7v5l3 2"></path>

                </svg>

            </span>

            Riwayat Pemeriksaan

        </a>


        <!-- ANGGOTA TEAM -->

        <a href="{{ route('ketua.anggota') }}">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle cx="9" cy="8" r="3"></circle>

                    <circle cx="17" cy="9" r="2.5"></circle>

                    <path d="M3.5 19c.5-3 2.5-5 5.5-5s5 2 5.5 5"></path>

                    <path d="M14.5 14c2.5-.5 5 1.1 6 3.5"></path>

                </svg>

            </span>

            Anggota Team

        </a>


        <div class="sidebar-divider"></div>


        <div class="menu-label">
            AKUN
        </div>


        <!-- PROFIL -->

        <a
            href="{{ route('ketua.profil') }}"
            class="active">

            <span class="sidebar-icon">

                <svg viewBox="0 0 24 24">

                    <circle cx="12" cy="8" r="3.5"></circle>

                    <path d="M5 20c.8-3.5 3.1-5.5 7-5.5s6.2 2 7 5.5"></path>

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

                        <path d="M10 4H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5"></path>

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


                <!-- NOTIFICATION -->

                <div class="icon-box">

                    <svg viewBox="0 0 24 24">

                        <path
                            d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9">
                        </path>

                        <path d="M10 21h4"></path>

                    </svg>

                </div>


                <!-- PROFILE -->

                <a
                    href="{{ route('ketua.profil') }}"
                    class="profile-mini">


                    <div class="avatar-small">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    <div>

                        <div class="profile-name">

                            {{ $user->name }}

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
                Profil
            </h1>


            <p class="page-subtitle">
                Informasi akun dan identitas pengguna GARDU4.
            </p>


            <!-- INFO -->

            <div class="info-banner">

                <strong>Informasi:</strong>

                Halaman ini menampilkan informasi profil akun
                yang sedang digunakan untuk mengakses sistem.

            </div>


            <!-- PROFILE CARD -->

            <div class="profile-card">


                <div class="profile-header">


                    <div class="profile-avatar">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    <div>

                        <h2>
                            {{ $user->name }}
                        </h2>

                        <p>
                            Akun Ketua Team · GARDU4
                        </p>

                    </div>


                </div>



                <!-- NAMA -->

                <div class="profile-row">

                    <div class="label">
                        Nama
                    </div>

                    <div class="value">
                        {{ $user->name }}
                    </div>

                </div>


                <!-- EMAIL -->

                <div class="profile-row">

                    <div class="label">
                        Email
                    </div>

                    <div class="value">
                        {{ $user->email }}
                    </div>

                </div>


                <!-- ROLE -->

                <div class="profile-row">

                    <div class="label">
                        Role
                    </div>

                    <div>
                        <span class="badge">
                            Ketua Team
                        </span>
                    </div>

                </div>


                <!-- STATUS -->

                <div class="profile-row">

                    <div class="label">
                        Status Akun
                    </div>

                    <div>

                        <span class="status-active">

                            <span class="status-dot"></span>

                            Aktif

                        </span>

                    </div>

                </div>


            </div>


        </div>

    </main>


</body>

</html>