<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - GARDU4</title>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
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
            background: linear-gradient(180deg, #0c2348 0%, #123762 100%);
            padding: 18px 12px;
            z-index: 1000;
            box-shadow: 8px 0 24px rgba(17, 39, 75, 0.10);
        }

        .logo {
            min-height: 60px;
            display: flex;
            align-items: center;
            padding: 0 12px;
            margin-bottom: 24px;
        }

        .logo img {
            width: 165px;
            max-width: 130%;
            height: auto;
            object-fit: cover;
        }

        .menu-title {
            color: #9eb0ca;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            padding: 12px 14px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 6px;
            color: #c8d4e5;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .menu i {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .menu:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .menu.active {
            background: #1f6feb;
            color: white;
            box-shadow: 0 7px 18px rgba(31, 111, 235, 0.25);
        }

        .logout {
            width: 100%;
            border: none;
            background: transparent;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
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
            background: white;
            border-bottom: 1px solid #e9eef5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
        }

        .page-title {
            font-size: 19px;
            font-weight: 700;
            color: #1a2740;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-search {
            width: 420px;
            height: 40px;
            border: 1px solid #E7EDF5;
            background: #F5F8FC;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            color: #8A98AE;
        }

        .top-search i {
            font-size: 14px;
            flex: 0 0 auto;
        }

        .top-search input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #16213B;
            font-size: 12px;
        }

        .top-search input::placeholder {
            color: #8A98AE;
        }

        .notification-wrapper {
            position: relative;
        }

        .notification-wrapper summary {
            list-style: none;
        }

        .notification-wrapper summary::-webkit-details-marker {
            display: none;
        }

        .notification {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #697790;
            font-size: 19px;
            cursor: pointer;
            position: relative;
            border-radius: 50%;
            transition: 0.2s ease;
        }

        .notification:hover {
            background: #f2f5f9;
            color: #1f6feb;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: -1px;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            background: #ef4444;
            color: white;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        .notification-dropdown {
            position: absolute;
            top: 48px;
            right: 0;
            width: 365px;
            max-height: 450px;
            overflow-y: auto;
            background: white;
            border: 1px solid #e7ebf1;
            border-radius: 14px;
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.15);
            z-index: 2000;
        }

        .notification-header {
            padding: 16px 18px;
            border-bottom: 1px solid #edf1f5;
            font-size: 14px;
            color: #1d2b45;
        }

        .notification-item {
            display: flex;
            gap: 12px;
            padding: 15px 18px;
            border-bottom: 1px solid #edf1f5;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item.unread {
            background: #f7fbff;
        }

        .notification-icon {
            width: 37px;
            height: 37px;
            min-width: 37px;
            border-radius: 50%;
            background: #e8f1ff;
            color: #1f6feb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-content {
            flex: 1;
        }

        .notification-content strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
            color: #22314d;
        }

        .notification-content p {
            font-size: 12px;
            color: #52627a;
            margin: 0 0 5px;
            line-height: 1.5;
        }

        .notification-content small {
            display: block;
            color: #8a97aa;
            font-size: 10px;
        }

        .notification-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 9px;
        }

        .notification-actions a {
            color: #1f6feb;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        .notification-actions button {
            border: none;
            background: none;
            color: #15803d;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            padding: 0;
        }

        .notification-actions button:hover,
        .notification-actions a:hover {
            text-decoration: underline;
        }

        .notification-empty {
            padding: 28px 18px;
            text-align: center;
            color: #8a97aa;
            font-size: 12px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            background: #e7f0ff;
            color: #1f6feb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .profile-info {
            line-height: 1.3;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
            color: #1e2b43;
        }

        .profile-role {
            color: #8b97a9;
            font-size: 11px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 24px;
        }

        .welcome {
            background: linear-gradient(135deg, #ffffff 0%, #f7fbff 100%);
            border: 1px solid #e8eef6;
            border-radius: 16px;
            padding: 22px 24px;
            margin-bottom: 18px;
        }

        .welcome h1 {
            font-size: 24px;
            margin-bottom: 8px;
            color: #17243b;
        }

        .welcome p {
            color: #718096;
            font-size: 14px;
            line-height: 1.6;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 18px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #e8edf4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 96px;
        }

        .stat-left h3 {
            font-size: 12px;
            color: #7c899e;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: #1a2840;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .blue {
            background: #e7f0ff;
            color: #1f6feb;
        }

        .green {
            background: #e8f8ef;
            color: #159957;
        }

        .yellow {
            background: #fff4dc;
            color: #d99000;
        }

        .purple {
            background: #f0eaff;
            color: #7c3aed;
        }

        /* =========================
           CARDS
        ========================= */

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 18px;
        }

        .card {
            background: white;
            border: 1px solid #e8edf4;
            border-radius: 14px;
            padding: 19px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .card-header h2 {
            font-size: 16px;
            color: #1d2a42;
        }

        .card-header span {
            color: #8a97aa;
            font-size: 11px;
        }

        /* =========================
           QUICK MENU
        ========================= */

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .quick-item {
            border: 1px solid #ebeff5;
            border-radius: 12px;
            padding: 18px;
            text-decoration: none;
            color: #1d2a42;
            transition: 0.2s ease;
        }

        .quick-item:hover {
            border-color: #b8cff5;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(31, 111, 235, 0.07);
        }

        .quick-icon {
            width: 41px;
            height: 41px;
            border-radius: 10px;
            background: #e7f0ff;
            color: #1f6feb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .quick-item h3 {
            font-size: 13px;
            margin-bottom: 6px;
        }

        .quick-item p {
            color: #78869a;
            font-size: 11px;
            line-height: 1.5;
        }

        /* =========================
           STATUS
        ========================= */

        .status-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #edf1f5;
        }

        .status-item:last-child {
            border-bottom: none;
        }

        .status-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-icon {
            width: 34px;
            height: 34px;
            background: #f4f7fb;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #51617a;
        }

        .status-text {
            font-size: 12px;
            color: #36445b;
        }

        .badge {
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
        }

        .badge-warning {
            background: #fff4de;
            color: #b77900;
        }

        .badge-success {
            background: #e6f8ee;
            color: #15803d;
        }

        .badge-danger {
            background: #ffe7ea;
            color: #dc3545;
        }

        .badge-info {
            background: #eeeaff;
            color: #6d28d9;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1180px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 230px;
            }

            .main {
                margin-left: 230px;
            }

            .top-search {
                display: none;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 70px;
                padding: 15px 10px;
            }

            .logo {
                justify-content: center;
                padding: 0;
            }

            .logo img {
                width: 48px;
                height: 48px;
                object-fit: contain;
            }

            .menu-text,
            .menu-title,
            .profile-info {
                display: none;
            }

            .menu {
                justify-content: center;
                padding: 13px;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 20px 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .quick-menu {
                grid-template-columns: 1fr;
            }

            .notification-dropdown {
                width: 210px;
                right: -90px;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         SIDEBAR
    ========================= --}}

    <aside class="sidebar">

        <div class="logo">
            <img src="{{ asset('images/logo-gardu4.png') }}" alt="GARDU4">
        </div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ url('/anggota/dashboard') }}"
           class="menu {{ request()->is('anggota/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ url('/anggota/pemeriksaan') }}"
           class="menu {{ request()->routeIs('anggota.pemeriksaan*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i>
            <span class="menu-text">Pemeriksaan Saya</span>
        </a>

        <a href="{{ route('anggota.dokumen') }}"
           class="menu {{ request()->routeIs('anggota.dokumen') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i>
            <span class="menu-text">Dokumen Saya</span>
        </a>

        <a href="{{ route('anggota.riwayat') }}"
           class="menu {{ request()->routeIs('anggota.riwayat') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span class="menu-text">Riwayat</span>
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
                <span class="menu-text">Logout</span>
            </button>
        </form>

    </aside>

    {{-- =========================
         MAIN
    ========================= --}}

    <div class="main">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="page-title">Dashboard</div>

            <div class="top-right">

                <div class="top-search">
                    <i class="bi bi-search"></i>
                    <input type="text"
                           id="dashboardSearch"
                           placeholder="Cari menu atau fitur..."
                           autocomplete="off">
                </div>

                <details class="notification-wrapper">
                    <summary class="notification">
                        <i class="bi bi-bell"></i>

                        @php
                            $belumDibaca = $permintaan->where('status', 'belum')->count();
                        @endphp

                        @if ($belumDibaca > 0)
                            <span class="notification-badge">{{ $belumDibaca }}</span>
                        @endif
                    </summary>

                    <div class="notification-dropdown">

                        <div class="notification-header">
                            <strong>Notifikasi</strong>
                        </div>

                        @if ($permintaan->count() > 0)

                            @foreach ($permintaan as $item)

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

                            <div class="notification-empty">
                                Tidak ada notifikasi.
                            </div>

                        @endif

                    </div>
                </details>

                <div class="profile">

                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="profile-info">
                        <div class="profile-name">{{ Auth::user()->name }}</div>
                        <div class="profile-role">Anggota</div>
                    </div>

                </div>

            </div>

        </header>

        {{-- CONTENT --}}
        <main class="content">

            {{-- WELCOME --}}
            <div class="welcome">
                <h1>Selamat Datang, {{ Auth::user()->name }} 👋</h1>
                <p>
                    Lihat pemeriksaan yang ditugaskan kepada Anda dan kelola dokumen pemeriksaan.
                </p>
            </div>

            {{-- STATISTIK --}}
            <div class="stats">

                <div class="stat-card">
                    <div class="stat-left">
                        <h3>Total Pemeriksaan</h3>
                        <div class="stat-number">{{ $pemeriksaanAnggota->count() }}</div>
                    </div>
                    <div class="stat-icon blue">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-left">
                        <h3>Pemeriksaan Aktif</h3>
                        <div class="stat-number">
                            {{ $pemeriksaanAnggota->filter(function ($item) {
                                return $item->pemeriksaan && $item->pemeriksaan->status === 'aktif';
                            })->count() }}
                        </div>
                    </div>
                    <div class="stat-icon yellow">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-left">
                        <h3>Dokumen Saya</h3>
                        <div class="stat-number">{{ Auth::user()->dokumen()->count() }}</div>
                    </div>
                    <div class="stat-icon green">
                        <i class="bi bi-file-earmark-check"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-left">
                        <h3>Notifikasi Baru</h3>
                        <div class="stat-number">{{ $belumDibaca }}</div>
                    </div>
                    <div class="stat-icon purple">
                        <i class="bi bi-bell"></i>
                    </div>
                </div>

            </div>

            {{-- GRID --}}
            <div class="dashboard-grid">

                {{-- MENU CEPAT --}}
                <div class="card">

                    <div class="card-header">
                        <h2>Menu Cepat</h2>
                        <span>Akses fitur</span>
                    </div>

                    <div class="quick-menu">

                        <a href="{{ url('/anggota/pemeriksaan') }}"
                           class="quick-item"
                           data-search="pemeriksaan saya lihat pemeriksaan yang ditugaskan kepada anda">
                            <div class="quick-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>
                            <h3>Pemeriksaan Saya</h3>
                            <p>Lihat pemeriksaan yang ditugaskan kepada Anda.</p>
                        </a>

                        <a href="{{ route('anggota.dokumen') }}"
                           class="quick-item"
                           data-search="dokumen saya lihat dokumen pemeriksaan yang telah anda kumpulkan">
                            <div class="quick-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h3>Dokumen Saya</h3>
                            <p>Lihat dokumen pemeriksaan yang telah Anda kumpulkan.</p>
                        </a>

                    </div>

                    <div id="dashboardSearchEmpty"
                         style="display:none; margin-top:14px; padding:18px; border:1px solid #e8edf4; border-radius:12px; background:#f8fafc; text-align:center; color:#78869a; font-size:11px;">
                        Menu atau fitur tidak ditemukan.
                    </div>

                </div>

                {{-- STATUS --}}
                <div class="card">

                    <div class="card-header">
                        <h2>Status</h2>
                        <span>Pemeriksaan</span>
                    </div>

                    <div class="status-item">
                        <div class="status-left">
                            <div class="status-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>
                            <div class="status-text">Total Pemeriksaan</div>
                        </div>
                        <span class="badge badge-warning">{{ $pemeriksaanAnggota->count() }}</span>
                    </div>

                    <div class="status-item">
                        <div class="status-left">
                            <div class="status-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="status-text">Pemeriksaan Aktif</div>
                        </div>
                        <span class="badge badge-success">
                            {{ $pemeriksaanAnggota->filter(function ($item) {
                                return $item->pemeriksaan && $item->pemeriksaan->status === 'aktif';
                            })->count() }}
                        </span>
                    </div>

                    <div class="status-item">
                        <div class="status-left">
                            <div class="status-icon">
                                <i class="bi bi-file-earmark"></i>
                            </div>
                            <div class="status-text">Dokumen Saya</div>
                        </div>
                        <span class="badge badge-danger">{{ Auth::user()->dokumen()->count() }}</span>
                    </div>

                    <div class="status-item">
                        <div class="status-left">
                            <div class="status-icon">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="status-text">Notifikasi Baru</div>
                        </div>
                        <span class="badge badge-info">{{ $belumDibaca }}</span>
                    </div>

                </div>

            </div>

        </main>

    </div>

    <script>
        const dashboardSearch = document.getElementById('dashboardSearch');
        const quickItems = document.querySelectorAll('.quick-item');
        const dashboardSearchEmpty = document.getElementById('dashboardSearchEmpty');

        if (dashboardSearch) {
            dashboardSearch.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                quickItems.forEach(function (item) {
                    const searchableText = (item.dataset.search || item.textContent).toLowerCase();
                    const match = searchableText.includes(keyword);

                    item.style.display = match ? '' : 'none';

                    if (match) {
                        visibleCount++;
                    }
                });

                if (dashboardSearchEmpty) {
                    dashboardSearchEmpty.style.display =
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