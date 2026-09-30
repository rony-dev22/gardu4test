<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pemberkasan Masuk - GARDU4</title>

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
            width: 420px;
            height: 40px;
            background: #f5f8fc;
            border: 1px solid #e7edf5;
            border-radius: 10px;
            display: flex;
            align-items: center;
            padding: 0 16px;
            color: #6f86a3;
        }

        .search-box svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 1.8;
            fill: none;
            flex-shrink: 0;
        }

        .search-box input {
            flex: 1;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #44566c;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 0 0 0 10px;
        }

        .search-box input::placeholder {
            color: #8a9ab0;
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

        /* ================= INFO ================= */

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

        /* ================= CARD ================= */

        .card {
            background: white;
            border: 1px solid #e1e8f1;
            border-radius: 13px;
            padding: 19px;
            box-shadow: 0 4px 14px rgba(33,63,93,0.04);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .card-title {
            margin: 0;
            font-size: 14px;
            color: #1a3558;
        }

        .card-subtitle {
            margin: 4px 0 0;
            color: #8795a8;
            font-size: 9px;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
        }

        thead {
            background: #f5f8fc;
        }

        th {
            padding: 10px 9px;
            text-align: left;
            font-size: 9px;
            color: #61748b;
            font-weight: bold;
            border-bottom: 1px solid #e1e8f1;
            white-space: nowrap;
        }

        td {
            padding: 12px 9px;
            border-bottom: 1px solid #edf1f6;
            font-size: 10px;
            color: #4c5f75;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .member-name {
            color: #203b5d;
            font-weight: bold;
        }

        .file-name {
            color: #203b5d;
            font-weight: 600;
            max-width: 260px;
            word-break: break-word;
        }

        .category {
            color: #557493;
            font-weight: 600;
        }

        /* ================= STATUS ================= */

        .badge {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-default {
            background: #edf3f9;
            color: #58718b;
        }

        .badge-active {
            background: #e9f7ee;
            color: #238049;
        }

        .badge-pending {
            background: #fff3dc;
            color: #9f6900;
        }

        .badge-finished {
            background: #edf1f5;
            color: #607083;
        }

        /* ================= BUTTON ================= */

        .btn-detail {
            display: inline-block;
            padding: 6px 9px;
            background: #edf5ff;
            color: #3674ad;
            text-decoration: none;
            border-radius: 7px;
            font-size: 8px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .btn-detail:hover {
            background: #dfedfc;
        }

        /* ================= PEMERIKSAAN GROUP ================= */

        .pemeriksaan-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .pemeriksaan-group {
            border: 1px solid #e1e8f1;
            border-radius: 11px;
            background: #ffffff;
            overflow: hidden;
        }

        .pemeriksaan-group-header {
            min-height: 70px;
            padding: 14px 16px;
            background: #f8faff;
            border-bottom: 1px solid #e7edf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .pemeriksaan-name {
            margin: 0;
            color: #1a3558;
            font-size: 13px;
            font-weight: 700;
        }

        .pemeriksaan-meta {
            margin-top: 5px;
            color: #8795a8;
            font-size: 9px;
        }

        .meta-separator {
            margin: 0 6px;
            color: #b2bfcd;
        }

        .document-count {
            display: inline-flex;
            align-items: center;
            padding: 6px 9px;
            border-radius: 20px;
            background: #edf5ff;
            color: #3674ad;
            font-size: 8px;
            font-weight: bold;
            white-space: nowrap;
        }

        .pemeriksaan-group .table-wrapper {
            padding: 0 12px;
        }

        .pemeriksaan-group table {
            min-width: 760px;
        }

        .pemeriksaan-group tbody tr:last-child td {
            border-bottom: none;
        }

        /* ================= EMPTY ================= */

        .empty {
            text-align: center;
            padding: 35px 18px;
            color: #8997aa;
            font-size: 10px;
        }

        .empty-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #edf5ff;
            color: #4a86c4;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .empty-icon svg {
            width: 19px;
            height: 19px;
            stroke: currentColor;
            stroke-width: 1.7;
            fill: none;
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
                padding: 22px;
            }

            .search-box {
                width: 360px;
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
                width: 280px;
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
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->

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

        <a
            href="{{ route('ketua.pemberkasan') }}"
            class="active">

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


        <!-- ANGGOTA -->

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


    <!-- MAIN -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <div class="search-box">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>
                <input
                    type="text"
                    id="searchPemberkasan"
                    placeholder="Cari pemeriksaan atau data..."
                    aria-label="Cari pemeriksaan atau data"
                >
            </div>


            <div class="topbar-right">

                <div class="icon-box">

                    <svg viewBox="0 0 24 24"
                         style="width:16px;height:16px;stroke:currentColor;stroke-width:1.8;fill:none;">

                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>

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


        <!-- CONTENT -->

        <div class="content">


            <h1 class="page-title">
                Pemberkasan Masuk
            </h1>


            <p class="page-subtitle">
                Kelola dan lihat berkas yang telah dikirim oleh anggota team.
            </p>


            <!-- INFO -->

            <div class="info-banner">

                <strong>Informasi:</strong>

                Halaman ini menampilkan seluruh pemberkasan yang telah
                dikirim oleh anggota team pada pemeriksaan yang Anda pimpin.

            </div>


            <!-- CARD -->

            <div class="card">


                <div class="card-header">

                    <div>

                        <h2 class="card-title">
                            Daftar Pemberkasan
                        </h2>

                        <p class="card-subtitle">
                            Berkas yang masuk dari anggota team.
                        </p>

                    </div>

                </div>


                @if ($dokumen->count() > 0)

                    @php
                        $kelompokPemeriksaan = $dokumen->groupBy('pemeriksaan_id');
                    @endphp

                    <div class="pemeriksaan-list" id="pemeriksaanList">

                        @foreach ($kelompokPemeriksaan as $pemeriksaanId => $items)
                            @php
                                $pemeriksaan = $items->first()->pemeriksaan;
                            @endphp

                            <div class="pemeriksaan-group" data-search="{{ strtolower(($pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan') . ' ' . ($pemeriksaan->nomor_surat_tugas ?? '') . ' ' . $items->pluck('jenis_dokumen')->implode(' ') . ' ' . $items->pluck('nama_file')->implode(' ') . ' ' . $items->pluck('user.name')->implode(' ')) }}">

                                <div class="pemeriksaan-group-header">
                                    <div>
                                        <h3 class="pemeriksaan-name">
                                            {{ $pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan' }}
                                        </h3>

                                        <div class="pemeriksaan-meta">
                                            @if (!empty($pemeriksaan->nomor_surat_tugas))
                                                Nomor Surat Tugas: {{ $pemeriksaan->nomor_surat_tugas }}
                                            @else
                                                Nomor Surat Tugas: -
                                            @endif

                                            <span class="meta-separator">•</span>
                                            {{ $items->count() }} dokumen masuk
                                        </div>
                                    </div>

                                    <span class="document-count">
                                        {{ $items->count() }} Berkas
                                    </span>
                                </div>

                                <div class="table-wrapper">
                                    <table>
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
                                            @foreach ($items as $item)
                                                @php
                                                    $statusClass = match (strtolower($item->status ?? '')) {
                                                        'aktif',
                                                        'disetujui',
                                                        'selesai' => 'badge-active',

                                                        'pending',
                                                        'belum',
                                                        'menunggu' => 'badge-pending',

                                                        default => 'badge-default',
                                                    };
                                                @endphp

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        <span class="member-name">
                                                            {{ $item->user->name ?? '-' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="category">
                                                            {{ $item->jenis_dokumen }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="file-name">
                                                            {{ $item->nama_file }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="badge {{ $statusClass }}">
                                                            {{ ucfirst($item->status) }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <a
                                                            href="{{ asset('storage/' . $item->file_path) }}"
                                                            target="_blank"
                                                            class="btn-detail">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="empty" id="searchEmpty" style="display:none;">
                        Tidak ada pemeriksaan atau berkas yang cocok dengan pencarian.
                    </div>

                @else

                    <div class="empty">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M6 3h9l3 3v15H6z"></path>
                                <path d="M15 3v4h4"></path>
                                <path d="M9 13h6"></path>
                                <path d="M9 17h4"></path>
                            </svg>
                        </div>

                        Belum ada pemberkasan yang masuk.
                    </div>

                @endif


            </div>


        </div>

    </main>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchPemberkasan');
            const groups = document.querySelectorAll('.pemeriksaan-group');
            const searchEmpty = document.getElementById('searchEmpty');

            if (!searchInput) return;

            searchInput.addEventListener('input', function () {
                const keyword = this.value.trim().toLowerCase();
                let visibleCount = 0;

                groups.forEach(function (group) {
                    const text = group.dataset.search || group.textContent.toLowerCase();
                    const visible = text.includes(keyword);

                    group.style.display = visible ? '' : 'none';

                    if (visible) {
                        visibleCount++;
                    }
                });

                if (searchEmpty) {
                    searchEmpty.style.display =
                        keyword !== '' && visibleCount === 0 ? 'block' : 'none';
                }
            });
        });
    </script>

</body>

</html>