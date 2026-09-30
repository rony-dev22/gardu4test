<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dokumen Saya - GARDU4</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fc;
            color: #16213b;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 210px;
            background: linear-gradient(180deg, #10254d 0%, #1f3b68 100%);
            padding: 18px 12px;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 115px;
            margin-bottom: 18px;
        }

        .logo img { width: 125px; max-width: 100%; height: auto; object-fit: contain; }

        .menu-title {
            color: #9fb0ca;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px 10px 8px;
            letter-spacing: .4px;
        }

        .menu {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            margin-bottom: 4px;
            color: #c7d2e5;
            text-decoration: none;
            border-radius: 10px;
            font-size: 11px;
            transition: .2s ease;
        }

        .menu i { font-size: 16px; min-width: 18px; }

        .menu:hover { background: rgba(255,255,255,.09); color: #fff; }

        .menu.active {
            background: #3d73e6;
            color: #fff;
            box-shadow: 0 8px 20px rgba(61,115,230,.22);
        }

        .logout {
            border: none;
            background: transparent;
            text-align: left;
            cursor: pointer;
        }

        .main { margin-left: 210px; min-height: 100vh; }

        .topbar {
            height: 66px;
            background: #fff;
            border-bottom: 1px solid #e8edf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
        }

        .page-title { font-size: 21px; font-weight: 700; color: #16213b; }

        .top-right { display: flex; align-items: center; gap: 14px; }

        .search-box {
            width: 420px;
            height: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 13px;
            border: 1px solid #e7edf5;
            border-radius: 10px;
            background: #f5f8fc;
            color: #8a98ae;
            font-size: 10px;
        }

        .search-box i {
            color: #8a98ae;
            font-size: 14px;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #16213b;
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #8a98ae;
        }

        .notification-wrapper { position: relative; }

        .notification-wrapper summary { list-style: none; }
        .notification-wrapper summary::-webkit-details-marker { display: none; }

        .notification {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #70809a;
            font-size: 17px;
            cursor: pointer;
            position: relative;
            border-radius: 50%;
        }

        .notification:hover { background: #f3f6fb; }

        .notification-badge {
            position: absolute;
            top: 1px;
            right: 1px;
            min-width: 17px;
            height: 17px;
            padding: 0 5px;
            background: #f04d62;
            color: #fff;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-dropdown {
            position: absolute;
            top: 48px;
            right: 0;
            width: 340px;
            max-height: 420px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(24,40,72,.15);
            z-index: 2000;
        }

        .notification-header {
            padding: 15px 18px;
            border-bottom: 1px solid #edf1f6;
            font-size: 14px;
        }

        .notification-item {
            display: flex;
            gap: 12px;
            padding: 15px 18px;
            border-bottom: 1px solid #edf1f6;
        }

        .notification-item.unread { background: #f8fbff; }

        .notification-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 50%;
            background: #eaf1ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-content { flex: 1; }

        .notification-content strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .notification-content p {
            font-size: 12px;
            color: #55637a;
            margin: 0 0 5px;
            line-height: 1.5;
        }

        .notification-content small {
            display: block;
            color: #8a98ae;
            font-size: 10px;
        }

        .notification-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .notification-actions a,
        .notification-actions button {
            color: #3d73e6;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }

        .notification-actions button { color: #16845c; }
        .notification-actions a:hover,
        .notification-actions button:hover { text-decoration: underline; }

        .notification-empty {
            padding: 25px 18px;
            text-align: center;
            color: #8a98ae;
            font-size: 12px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            background: #e9f0ff;
            color: #3568d4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .profile-info { line-height: 1.3; }

        .profile-name {
            font-size: 10px;
            font-weight: 700;
            color: #1d2a42;
        }

        .profile-role { color: #95a0b1; font-size: 9px; }

        .content { padding: 24px 24px 32px; }

        .page-heading { margin-bottom: 22px; }

        .page-heading h1 {
            font-size: 19px;
            color: #15213a;
            margin-bottom: 7px;
        }

        .page-heading p {
            color: #71809a;
            font-size: 10px;
            line-height: 1.5;
        }

        .table-card {
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(26,42,74,.05);
            overflow: hidden;
        }

        .table-wrapper { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
        }

        thead th {
            background: #f8faff;
            color: #6f7e95;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            padding: 15px 18px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        tbody td {
            color: #33415a;
            font-size: 12px;
            padding: 16px 18px;
            border-bottom: 1px solid #edf1f6;
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #fbfcfe; }

        .file-name { color: #1f2d46; font-weight: 700; }

        .subtext {
            margin-top: 4px;
            color: #8995a8;
            font-size: 10px;
        }

        .type-badge,
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
        }

        .type-badge { background: #eaf1ff; color: #3568d4; }
        .status-waiting { background: #fff5d9; color: #946b00; }
        .status-success { background: #e8f8ef; color: #16784f; }
        .status-other { background: #eef2f7; color: #637086; }

        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 8px;
            background: #3d73e6;
            color: #fff;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        .btn-view:hover { background: #2f60cb; }

        .exam-group {
            margin-bottom: 18px;
        }

        .exam-group:last-child {
            margin-bottom: 0;
        }

        .exam-header {
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px 14px 0 0;
            padding: 15px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 18px rgba(26,42,74,.04);
        }

        .exam-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eaf1ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }

        .exam-label {
            color: #8995a8;
            font-size: 9px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: .4px;
            margin-bottom: 3px;
        }

        .exam-name {
            color: #1f2d46;
            font-size: 13px;
            font-weight: 700;
        }

        .exam-count {
            margin-left: auto;
            color: #6f7e95;
            background: #f5f8fc;
            border: 1px solid #e7edf5;
            border-radius: 999px;
            padding: 5px 9px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .exam-group .table-card {
            border-radius: 0 0 14px 14px;
            border-top: none;
            box-shadow: 0 5px 18px rgba(26,42,74,.05);
        }

        .search-empty {
            display: none;
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px;
            padding: 50px 30px;
            text-align: center;
            box-shadow: 0 5px 18px rgba(26,42,74,.05);
        }

        .search-empty .empty-icon {
            margin-bottom: 14px;
        }

        .empty {
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(26,42,74,.05);
            padding: 65px 30px;
            text-align: center;
        }

        .empty-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 16px;
            border-radius: 15px;
            background: #edf3ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .empty h3 {
            color: #1d2a42;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .empty p { color: #7d8aa0; font-size: 13px; }

        @media (max-width: 1000px) {
            .sidebar { width: 210px; }
            .main { margin-left: 210px; }
            .search-box { width: 300px; }
        }

        @media (max-width: 760px) {
            .sidebar { width: 72px; padding: 16px 10px; }
            .main { margin-left: 72px; }
            .logo { height: 60px; margin-bottom: 18px; }
            .logo img { width: 52px; }
            .menu-title, .menu span, .profile-info { display: none; }
            .menu { justify-content: center; padding: 13px 10px; }
            .menu i { min-width: auto; }
            .topbar { padding: 0 16px; }
            .content { padding: 22px 16px 30px; }
            .search-box { width: 220px; }
            .notification-dropdown { width: 300px; right: -70px; }
        }

        @media (max-width: 520px) {
            .topbar { min-height: 70px; height: auto; }
            .page-title { font-size: 17px; }
            .search-box { display: none; }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <img src="{{ asset('images/logo-gardu4.png') }}" alt="GARDU4">
        </div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ url('/anggota/dashboard') }}" class="menu">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/anggota/pemeriksaan') }}" class="menu">
            <i class="bi bi-clipboard-check"></i>
            <span>Pemeriksaan Saya</span>
        </a>

        <a href="{{ url('/anggota/dokumen') }}" class="menu active">
            <i class="bi bi-file-earmark-text"></i>
            <span>Dokumen Saya</span>
        </a>

        <a href="{{ route('anggota.riwayat') }}" class="menu">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat</span>
        </a>

        <div class="menu-title">Akun</div>

        <a href="{{ route('anggota.profil') }}" class="menu">
            <i class="bi bi-person"></i>
            <span>Profil</span>
        </a>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>

    </aside>

    <div class="main">

        <header class="topbar">

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    id="searchDokumen"
                    placeholder="Cari pemeriksaan, nama file, atau jenis dokumen..."
                    autocomplete="off"
                >
            </div>

            <div class="top-right">

                <details class="notification-wrapper">

                    <summary class="notification">
                        <i class="bi bi-bell"></i>

                        @php
                            $belumDibaca = Auth::user()
                                ->permintaanDiterima()
                                ->where('status', 'belum')
                                ->count();
                        @endphp

                        @if ($belumDibaca > 0)
                            <span class="notification-badge">{{ $belumDibaca }}</span>
                        @endif
                    </summary>

                    <div class="notification-dropdown">

                        <div class="notification-header">
                            <strong>Notifikasi</strong>
                        </div>

                        @php
                            $daftarPermintaan = Auth::user()
                                ->permintaanDiterima()
                                ->with('pemeriksaan')
                                ->latest()
                                ->get();
                        @endphp

                        @if ($daftarPermintaan->count() > 0)

                            @foreach ($daftarPermintaan as $item)

                                <div class="notification-item {{ $item->status === 'belum' ? 'unread' : '' }}">

                                    <div class="notification-icon">
                                        <i class="bi bi-chat-left-text"></i>
                                    </div>

                                    <div class="notification-content">

                                        <strong>Permintaan dari Ketua</strong>

                                        <p>{{ $item->pesan }}</p>

                                        <small>
                                            {{ $item->pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan' }}
                                        </small>

                                        <div class="notification-actions">

                                            <a href="{{ route('anggota.pemeriksaan.detail', $item->pemeriksaan_id) }}">
                                                Lihat Pemeriksaan
                                            </a>

                                            @if ($item->status === 'belum')

                                                <form action="{{ route('anggota.permintaan.dibaca', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit">Tandai dibaca</button>
                                                </form>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        @else

                            <div class="notification-empty">Tidak ada notifikasi.</div>

                        @endif

                    </div>

                </details>

                <div class="profile">

                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <div class="profile-name">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="profile-role">
                            Anggota
                        </div>

                    </div>

                </div>

            </div>

        </header>


        <main class="content">

            <div class="page-heading">

                <h1>Dokumen Saya</h1>

                <p>
                    Daftar dokumen pemeriksaan yang telah Anda kumpulkan.
                </p>

            </div>


            @if ($dokumen->count() > 0)

                @php
                    $dokumenPerPemeriksaan = $dokumen->groupBy('pemeriksaan_id');
                @endphp

                <div id="dokumenGroups">

                    @foreach ($dokumenPerPemeriksaan as $pemeriksaanId => $daftarDokumen)

                        @php
                            $pemeriksaan = $daftarDokumen->first()->pemeriksaan;
                        @endphp

                        <section
                            class="exam-group"
                            data-search-group
                            data-search-text="{{ strtolower(($pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan') . ' ' . $daftarDokumen->pluck('nama_file')->implode(' ') . ' ' . $daftarDokumen->pluck('jenis_dokumen')->implode(' ')) }}"
                        >

                            <div class="exam-header">

                                <div class="exam-icon">
                                    <i class="bi bi-clipboard-check"></i>
                                </div>

                                <div>
                                    <div class="exam-label">Pemeriksaan</div>
                                    <div class="exam-name">
                                        {{ $pemeriksaan->nama_pemeriksaan ?? 'Pemeriksaan tidak diketahui' }}
                                    </div>
                                </div>

                                <div class="exam-count">
                                    {{ $daftarDokumen->count() }} dokumen
                                </div>

                            </div>

                            <div class="table-card">

                                <div class="table-wrapper">

                                    <table>

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>Jenis Dokumen</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($daftarDokumen as $item)

                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        <div class="file-name">
                                                            {{ $item->nama_file }}
                                                        </div>

                                                        @if ($item->file_path)
                                                            <div class="subtext">
                                                                {{ $item->file_path }}
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <span class="type-badge">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                            {{ $item->jenis_dokumen }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        @if ($item->status === 'menunggu')

                                                            <span class="status-badge status-waiting">
                                                                <i class="bi bi-hourglass-split"></i>
                                                                Menunggu
                                                            </span>

                                                        @elseif ($item->status === 'disetujui')

                                                            <span class="status-badge status-success">
                                                                <i class="bi bi-check-circle"></i>
                                                                Disetujui
                                                            </span>

                                                        @else

                                                            <span class="status-badge status-other">
                                                                <i class="bi bi-info-circle"></i>
                                                                {{ ucfirst($item->status ?? '-') }}
                                                            </span>

                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item->file_path)

                                                            <a href="{{ asset('storage/' . $item->file_path) }}"
                                                               target="_blank"
                                                               class="btn-view">
                                                                <i class="bi bi-eye"></i>
                                                                Lihat
                                                            </a>

                                                        @else

                                                            <span class="subtext">
                                                                Tidak tersedia
                                                            </span>

                                                        @endif
                                                    </td>

                                                </tr>

                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </section>

                    @endforeach

                </div>

                <div class="search-empty" id="searchEmpty">
                    <div class="empty-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>Dokumen tidak ditemukan</h3>
                    <p>Coba gunakan nama pemeriksaan, nama file, atau jenis dokumen yang berbeda.</p>
                </div>

            @else

                <div class="empty">
                    <div class="empty-icon">
                        <i class="bi bi-file-earmark"></i>
                    </div>

                    <h3>Belum ada dokumen</h3>

                    <p>
                        Dokumen pemeriksaan yang Anda kumpulkan akan muncul di halaman ini.
                    </p>
                </div>

            @endif

        </main>

    </div>


    <script>
        const searchDokumen = document.getElementById('searchDokumen');
        const searchGroups = document.querySelectorAll('[data-search-group]');
        const searchEmpty = document.getElementById('searchEmpty');

        if (searchDokumen) {
            searchDokumen.addEventListener('input', function () {
                const keyword = this.value.trim().toLowerCase();
                let visibleCount = 0;

                searchGroups.forEach(function (group) {
                    const text = group.dataset.searchText || '';
                    const match = keyword === '' || text.includes(keyword);

                    group.style.display = match ? '' : 'none';

                    if (match) {
                        visibleCount++;
                    }
                });

                if (searchEmpty) {
                    searchEmpty.style.display =
                        keyword !== '' && visibleCount === 0 ? 'block' : 'none';
                }
            });
        }

        document.addEventListener('click', function (event) {
            const notification = document.querySelector('.notification-wrapper');

            if (!notification) return;

            if (!notification.contains(event.target)) {
                notification.removeAttribute('open');
            }
        });
    </script>

</body>

</html>
