<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Audit - GARDU4</title>

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
            background: #f5f8fc;
            color: #16213b;
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

        .logo img {
            width: 165px;
            max-width: 130%;
            height: auto;
            object-fit: cover;
        }

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

        .menu i {
            font-size: 16px;
            min-width: 18px;
        }

        .menu:hover {
            background: rgba(255,255,255,.09);
            color: #fff;
        }

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
            background: #fff;
            border-bottom: 1px solid #e8edf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
        }

        .page-title {
            font-size: 19px;
            font-weight: 700;
            color: #16213b;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
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

        .notification:hover {
            background: #f3f6fb;
        }

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
            box-shadow: 0 12px 30px rgba(24, 40, 72, .15);
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

        .notification-item.unread {
            background: #f8fbff;
        }

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

        .notification-content {
            flex: 1;
        }

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

        .notification-actions button {
            color: #16845c;
        }

        .notification-actions a:hover,
        .notification-actions button:hover {
            text-decoration: underline;
        }

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

        .profile-info {
            line-height: 1.3;
        }

        .profile-name {
            font-size: 10px;
            font-weight: 700;
            color: #1d2a42;
        }

        .profile-role {
            color: #95a0b1;
            font-size: 9px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 24px 24px 32px;
        }

        .page-heading {
            margin-bottom: 22px;
        }

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

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            background: #fff;
            border: 1px solid #e7ecf3;
            border-radius: 14px;
            padding: 70px 30px;
            text-align: center;
            box-shadow: 0 5px 18px rgba(26, 42, 74, .05);
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            border-radius: 16px;
            background: #edf3ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .empty h3 {
            color: #1d2a42;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .empty p {
            color: #7d8aa0;
            font-size: 13px;
        }

        /* =========================
           EXAMINATION CARD
        ========================= */

        .card {
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px;
            padding: 19px;
            margin-bottom: 18px;
            box-shadow: 0 5px 18px rgba(26, 42, 74, .05);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 14px;
            font-weight: 700;
            color: #17233c;
            line-height: 1.4;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 8px;
            border-radius: 8px;
            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-active {
            background: #e8f8ef;
            color: #16784f;
        }

        .status-other {
            background: #eef2f7;
            color: #637086;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .info-box {
            background: #f8faff;
            border: 1px solid #edf1f6;
            border-radius: 10px;
            padding: 12px;
        }

        .info-label {
            color: #7f8da4;
            font-size: 9px;
            margin-bottom: 6px;
        }

        .info-value {
            color: #25324a;
            font-size: 10px;
            font-weight: 700;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #edf1f6;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 9px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 8px;
            font-weight: 700;
            background: #3d73e6;
            color: #fff;
            transition: .2s ease;
        }

        .btn:hover {
            background: #2f60cb;
            transform: translateY(-1px);
        }

        /* =========================
           AUDIT CONTENT
        ========================= */

.back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 8px 11px;
            margin-bottom: 18px;
            background: #edf5ff;
            border: 1px solid #dce9f7;
            border-radius: 8px;
            color: #3674ad;
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
            transition: .2s ease;
        }

.back:hover {
            background: #e2effc;
            color: #2d5f8c;
            text-decoration: none;
        }

.card {
            background: #fff;
            border: 1px solid #e6ebf3;
            border-radius: 14px;
            padding: 26px;
            margin-bottom: 18px;
            box-shadow: 0 5px 18px rgba(26, 42, 74, .05);
        }

.page-card-title {
            margin: 0 0 7px;
            font-size: 25px;
            color: #17233c;
        }

.subtitle {
            color: #7a879b;
            font-size: 13px;
            margin-bottom: 24px;
        }

.error {
            background: #fff0f0;
            border: 1px solid #f5caca;
            color: #b42318;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
        }

.error ul {
            margin: 8px 0 0;
            padding-left: 20px;
            line-height: 1.6;
        }

.document-box {
            border: 1px solid #e5eaf1;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            background: #fbfcfe;
        }

.document-head {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 7px;
        }

.document-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #eaf1ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

.document-box h3 {
            margin: 0;
            color: #1f2d46;
            font-size: 16px;
        }

.document-box p {
            margin: 0 0 16px 51px;
            color: #7a879b;
            font-size: 12px;
            line-height: 1.5;
        }

.file-input {
            width: calc(100% - 51px);
            margin-left: 51px;
            padding: 11px 12px;
            border: 1px solid #dce3ec;
            border-radius: 9px;
            background: #fff;
            color: #56647b;
            font-size: 12px;
        }

.file-input:focus {
            outline: none;
            border-color: #3d73e6;
            box-shadow: 0 0 0 3px rgba(61,115,230,.08);
        }

.form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #edf1f6;
        }

.submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            background: #3d73e6;
            color: #fff;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

.submit-btn:hover {
            background: #2f60cb;
            transform: translateY(-1px);
        }

.note {
            margin-top: 2px;
            padding: 14px 15px;
            background: #fff8df;
            border: 1px solid #f5e6a8;
            border-radius: 9px;
            color: #765d00;
            line-height: 1.6;
            font-size: 12px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                width: 72px;
                padding: 16px 10px;
            }

            .main {
                margin-left: 72px;
            }

            .logo {
                height: 60px;
                margin-bottom: 18px;
            }

            .logo img {
                width: 52px;
            }

            .menu-title,
            .menu span,
            .profile-info {
                display: none;
            }

            .menu {
                justify-content: center;
                padding: 13px 10px;
            }

            .menu i {
                min-width: auto;
            }

            .topbar {
                padding: 0 16px;
            }

            .content {
                padding: 22px 16px 30px;
            }

            .notification-dropdown {
                width: 300px;
                right: -70px;
            }

            .card-top {
                flex-direction: column;
            }
        }

        @media (max-width: 520px) {
            .topbar {
                height: auto;
                min-height: 70px;
                gap: 12px;
            }

            .page-title {
                font-size: 17px;
            }

            .top-right {
                gap: 8px;
            }

            .page-heading h1 {
                font-size: 22px;
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

        <div class="menu-title">
            Menu Utama
        </div>

        <a href="{{ url('/anggota/dashboard') }}"
           class="menu {{ request()->is('anggota/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/anggota/pemeriksaan') }}"
           class="menu {{ request()->routeIs('anggota.pemeriksaan*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i>
            <span>Pemeriksaan Saya</span>
        </a>

        <a href="{{ route('anggota.dokumen') }}"
           class="menu {{ request()->routeIs('anggota.dokumen') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i>
            <span>Dokumen Saya</span>
        </a>

        <a href="{{ route('anggota.riwayat') }}"
           class="menu {{ request()->routeIs('anggota.riwayat') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat</span>
        </a>

        <div class="menu-title">
            Akun
        </div>

        <a href="{{ route('anggota.profil') }}"
           class="menu {{ request()->routeIs('anggota.profil') ? 'active' : '' }}">
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


    {{-- =========================
         MAIN
    ========================= --}}

    <div class="main">

        <header class="topbar">

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
                            <span class="notification-badge">
                                {{ $belumDibaca }}
                            </span>
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

                                        <p>
                                            {{ $item->pesan }}
                                        </p>

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

                                                    <button type="submit">
                                                        Tandai dibaca
                                                    </button>
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


        {{-- =========================
             CONTENT
        ========================= --}}

        <main class="content">

            <a href="{{ route('anggota.pemeriksaan.detail', $pemeriksaan->id) }}" class="back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Detail Pemeriksaan
            </a>


            <div class="card">

                <h1 class="page-card-title">
                    Audit
                </h1>

                <div class="subtitle">
                    {{ $pemeriksaan->nama_pemeriksaan }}
                </div>


                @if ($errors->any())

                    <div class="error">

                        <strong>
                            Terjadi kesalahan:
                        </strong>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form action="{{ route('anggota.pemeriksaan.audit.store', $pemeriksaan->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- KKA --}}

                    <div class="document-box">

                        <div class="document-head">

                            <div class="document-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>

                            <h3>
                                KKA
                            </h3>

                        </div>

                        <p>
                            Kertas Kerja Audit
                        </p>

                        <input
                            type="file"
                            name="kka"
                            class="file-input"
                            accept=".pdf,.doc,.docx"
                            required
                        >

                    </div>


                    {{-- NHA --}}

                    <div class="document-box">

                        <div class="document-head">

                            <div class="document-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>

                            <h3>
                                NHA
                            </h3>

                        </div>

                        <p>
                            Naskah Hasil Audit
                        </p>

                        <input
                            type="file"
                            name="nha"
                            class="file-input"
                            accept=".pdf,.doc,.docx"
                            required
                        >

                    </div>


                    <div class="form-footer">

                        <button type="submit" class="submit-btn">
                            <i class="bi bi-cloud-arrow-up"></i>
                            Kirim Dokumen Audit
                        </button>

                    </div>

                </form>


                <div class="note">

                    <strong>Perhatian:</strong>

                    Pastikan dokumen KKA dan NHA sudah benar
                    sebelum dikirim.

                </div>

            </div>

        </main>

    </div>


    <script>
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