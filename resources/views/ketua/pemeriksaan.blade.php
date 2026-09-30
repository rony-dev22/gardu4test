<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pemeriksaan - GARDU4</title>

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

        .logo-area {
            padding: 6px 8px 16px;
            margin-bottom: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
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
            cursor: pointer;
            transition: 0.2s ease;
        }

        .sidebar a:hover,
        .sidebar button:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #1687E8, #2698F3);
            color: white;
            font-weight: 700;
            box-shadow: 0 5px 14px rgba(22,135,232,0.24);
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
            box-sizing: border-box;
        }

        .search-box i {
            color: #74809A;
            font-size: 15px;
            flex-shrink: 0;
        }

        .search-input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #14213D;
            font-size: 11px;
            font-family: inherit;
        }

        .search-input::placeholder {
            color: #8A97AC;
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
            background: #F7F9FC;
            border: 1px solid var(--border);
            color: #60708A;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 18px;
        }

        .page-title {
            margin: 0;
            font-size: 19px;
            color: var(--text);
            font-weight: 700;
        }

        .page-subtitle {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 13px;
            background: var(--blue);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 5px 14px rgba(22,135,232,0.18);
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .btn-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        /* =========================
           INFO BANNER
        ========================= */

        .info-banner {
            background: linear-gradient(135deg, #EDF6FF 0%, #FFFFFF 100%);
            border: 1px solid #DCE9F7;
            border-radius: 12px;
            padding: 13px 16px;
            margin-bottom: 16px;
            color: #58718D;
            font-size: 10px;
            line-height: 1.6;
        }

        .info-banner strong {
            color: #2C6091;
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            margin: 0;
            font-size: 14px;
            color: var(--text);
        }

        .card-subtitle {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 9px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        thead {
            background: #F5F8FC;
        }

        th {
            padding: 10px 9px;
            text-align: left;
            font-size: 9px;
            color: #61748B;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        td {
            padding: 12px 9px;
            border-bottom: 1px solid #EDF1F6;
            font-size: 10px;
            color: #4C5F75;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #FAFCFF;
        }

        .name {
            color: #203B5D;
            font-weight: 700;
        }

        .muted {
            color: #8B98A8;
        }

        /* =========================
           BADGE
        ========================= */

        .badge {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-active {
            background: #E9F7EE;
            color: #238049;
        }

        .badge-finished {
            background: #EDF1F5;
            color: #607083;
        }

        .badge-pending {
            background: #FFF3DC;
            color: #9F6900;
        }

        /* =========================
           DETAIL
        ========================= */

        .btn-detail {
            display: inline-block;
            padding: 6px 9px;
            background: var(--blue-soft);
            color: var(--blue-dark);
            text-decoration: none;
            border-radius: 7px;
            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .btn-detail:hover {
            background: #DCEEFF;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;
            padding: 30px 20px;
            color: #8997AA;
            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {
            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
            }

            .search-box {
                width: 250px;
            }

            .page-header {
                align-items: flex-start;
            }
        }

        @media (max-width: 700px) {
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
                padding: 0 18px;
            }

            .content {
                padding: 18px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-box {
                display: none;
            }
        }
    </style>

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        <a
            href="{{ route('ketua.pemeriksaan') }}"
            class="active">

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

        <a href="{{ route('ketua.profil') }}">

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

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    id="searchPemeriksaan"
                    class="search-input"
                    placeholder="Cari pemeriksaan atau data..."
                    autocomplete="off"
                >
            </div>


            <div class="topbar-right">

                <div class="icon-box" aria-label="Notifikasi">
                    🔔
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


            <!-- HEADER -->

            <div class="page-header">

                <div>

                    <h1 class="page-title">
                        Pemeriksaan
                    </h1>

                    <p class="page-subtitle">
                        Kelola pemeriksaan yang Anda pimpin dan pantau anggota team.
                    </p>

                </div>


                <a
                    href="{{ route('ketua.pemeriksaan.create') }}"
                    class="btn-primary">

                    + Buat Pemeriksaan

                </a>

            </div>


            <!-- INFO -->

            <div class="info-banner">

                <strong>Informasi:</strong>

                Halaman ini menampilkan seluruh pemeriksaan yang dipimpin oleh Anda.
                Gunakan tombol <strong>Lihat Detail</strong> untuk melihat anggota dan dokumen pemeriksaan.

            </div>


            <!-- CARD -->

            <div class="card">


                <div class="card-header">

                    <div>

                        <h2 class="card-title">
                            Daftar Pemeriksaan
                        </h2>

                        <p class="card-subtitle">
                            Pemeriksaan yang sedang dan telah Anda kelola.
                        </p>

                    </div>

                </div>


                <!-- TABLE -->

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Nama Pemeriksaan</th>

                                <th>Nomor Surat Tugas</th>

                                <th>Tanggal Mulai</th>

                                <th>Tanggal Selesai</th>

                                <th>Anggota</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($pemeriksaan as $item)

                                <tr class="pemeriksaan-row">

                                    <!-- NO -->

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <!-- NAMA -->

                                    <td>

                                        <span class="name">
                                            {{ $item->nama_pemeriksaan }}
                                        </span>

                                    </td>


                                    <!-- SURAT TUGAS -->

                                    <td>

                                        <span class="muted">
                                            {{ $item->nomor_surat_tugas ?? '-' }}
                                        </span>

                                    </td>


                                    <!-- TANGGAL MULAI -->

                                    <td>

                                        {{ $item->tanggal_mulai
                                            ? $item->tanggal_mulai->format('d/m/Y')
                                            : '-' }}

                                    </td>


                                    <!-- TANGGAL SELESAI -->

                                    <td>

                                        {{ $item->tanggal_selesai
                                            ? $item->tanggal_selesai->format('d/m/Y')
                                            : '-' }}

                                    </td>


                                    <!-- ANGGOTA -->

                                    <td>

                                        {{ $item->anggota->count() }} orang

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        @if ($item->status === 'aktif')

                                            <span class="badge badge-active">
                                                Aktif
                                            </span>

                                        @elseif ($item->status === 'selesai')

                                            <span class="badge badge-finished">
                                                Selesai
                                            </span>

                                        @else

                                            <span class="badge badge-pending">
                                                {{ ucfirst($item->status) }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- AKSI -->

                                    <td>

                                        <a
                                            href="{{ route('ketua.pemeriksaan.detail', $item->id) }}"
                                            class="btn-detail">

                                            Lihat Detail

                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="8">

                                        <div class="empty">

                                            Belum ada pemeriksaan yang dibuat.

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPemeriksaan');
            const rows = document.querySelectorAll('.pemeriksaan-row');

            if (!searchInput) return;

            searchInput.addEventListener('input', function () {
                const keyword = this.value.trim().toLowerCase();

                rows.forEach(function (row) {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(keyword) ? '' : 'none';
                });
            });
        });
    </script>

</body>

</html>