<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pemeriksaan - GARDU4</title>

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
            padding: 24px;
            margin-bottom: 18px;
            box-shadow: 0 5px 18px rgba(26, 42, 74, .05);
        }

        .page-card-title {
            margin: 0 0 20px;
            font-size: 24px;
            color: #17233c;
            line-height: 1.35;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .info-box {
            background: #f8faff;
            border: 1px solid #edf1f6;
            border-radius: 10px;
            padding: 14px 15px;
        }

        .info-label {
            color: #7f8da4;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .info-value {
            color: #25324a;
            font-size: 13px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-active {
            background: #e8f8ef;
            color: #16784f;
        }

        .status-other {
            background: #eef2f7;
            color: #637086;
        }

        .description-wrap {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #edf1f6;
        }

        .description {
            line-height: 1.7;
            color: #55637a;
            font-size: 13px;
        }

        .alert-success {
            padding: 13px 16px;
            margin-bottom: 18px;
            background: #eaf8ef;
            border: 1px solid #ccefd8;
            border-radius: 10px;
            color: #176b45;
            font-size: 13px;
        }

        .section-title {
            margin: 0 0 18px;
            font-size: 17px;
            color: #17233c;
        }

        /* =========================
           DOCUMENT STATUS
        ========================= */

        .document-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .document-item {
            border: 1px solid #e5eaf1;
            border-radius: 11px;
            padding: 17px;
            background: #fbfcfe;
        }

        .document-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .document-name {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #24324a;
            font-size: 13px;
            font-weight: 700;
        }

        .document-name i {
            color: #3d73e6;
            font-size: 17px;
        }

        .document-status {
            margin-top: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .document-status.success {
            color: #16784f;
        }

        .document-status.missing {
            color: #b42318;
        }

        .file-name {
            margin-top: 6px;
            color: #7b879a;
            font-size: 11px;
            word-break: break-word;
        }

        /* =========================
           CHOICE
        ========================= */

        .choice-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .choice {
            display: block;
            border: 1px solid #e5eaf1;
            border-radius: 12px;
            padding: 21px;
            text-decoration: none;
            color: inherit;
            background: #fff;
            transition: .2s ease;
        }

        .choice:hover {
            border-color: #3d73e6;
            background: #f8fbff;
            transform: translateY(-1px);
            box-shadow: 0 7px 18px rgba(61,115,230,.08);
        }

        .choice-icon {
            width: 44px;
            height: 44px;
            border-radius: 11px;
            background: #eaf1ff;
            color: #3d73e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 13px;
        }

        .choice h3 {
            margin: 0 0 7px;
            color: #1f2d46;
            font-size: 15px;
        }

        .choice p {
            margin: 0;
            color: #7b879a;
            font-size: 12px;
            line-height: 1.6;
        }

        .note {
            margin-top: 16px;
            padding: 13px 15px;
            background: #fff8df;
            border: 1px solid #f5e6a8;
            border-radius: 9px;
            color: #765d00;
            font-size: 12px;
            line-height: 1.6;
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

            <a href="{{ route('anggota.pemeriksaan') }}" class="back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Pemeriksaan Saya
            </a>


            {{-- INFORMASI PEMERIKSAAN --}}

            <div class="card">

                <h1 class="page-card-title">
                    {{ $pemeriksaan->nama_pemeriksaan }}
                </h1>

                <div class="info-grid">

                    <div class="info-box">
                        <div class="info-label">
                            Ketua Tim
                        </div>

                        <div class="info-value">
                            {{ $pemeriksaan->ketuaTim->name ?? '-' }}
                        </div>
                    </div>

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

                    <div class="info-box">
                        <div class="info-label">
                            Tanggal Selesai
                        </div>

                        <div class="info-value">
                            {{ $pemeriksaan->tanggal_selesai
                                ? $pemeriksaan->tanggal_selesai->format('d/m/Y')
                                : '-' }}
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-label">
                            Status
                        </div>

                        <div class="info-value">
                            @if ($pemeriksaan->status === 'aktif')
                                <span class="status-badge status-active">
                                    <i class="bi bi-check-circle"></i>
                                    {{ ucfirst($pemeriksaan->status) }}
                                </span>
                            @else
                                <span class="status-badge status-other">
                                    <i class="bi bi-info-circle"></i>
                                    {{ ucfirst($pemeriksaan->status) }}
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                @if ($pemeriksaan->keterangan)

                    <div class="description-wrap">

                        <div class="info-label">
                            Keterangan
                        </div>

                        <div class="description">
                            {{ $pemeriksaan->keterangan }}
                        </div>

                    </div>

                @endif

            </div>


            @if (session('success'))

                <div class="alert-success">
                    <strong>Berhasil!</strong>
                    {{ session('success') }}
                </div>

            @endif


            @php
                $dokumenSaya = $pemeriksaan->dokumen
                    ->where('user_id', Auth::id());
            @endphp


            {{-- DOKUMEN AUDIT --}}

            <div class="card">

                <h2 class="section-title">
                    Dokumen Audit
                </h2>

                <div class="document-list">

                    {{-- KKA --}}

                    <div class="document-item">

                        <div class="document-head">

                            <div class="document-name">
                                <i class="bi bi-file-earmark-text"></i>
                                KKA
                            </div>

                        </div>

                        @php
                            $cha = $dokumenSaya->where('jenis_dokumen', 'KKA')->first();
                        @endphp

                        @if ($cha)

                            <div class="document-status success">
                                <i class="bi bi-check-circle"></i>
                                Sudah dikumpulkan
                            </div>

                            <div class="file-name">
                                {{ $cha->nama_file }}
                            </div>

                        @else

                            <div class="document-status missing">
                                <i class="bi bi-x-circle"></i>
                                Belum dikumpulkan
                            </div>

                        @endif

                    </div>


                    {{-- NHA --}}

                    <div class="document-item">

                        <div class="document-head">

                            <div class="document-name">
                                <i class="bi bi-file-earmark-text"></i>
                                NHA
                            </div>

                        </div>

                        @php
                            $lha = $dokumenSaya->where('jenis_dokumen', 'NHA')->first();
                        @endphp

                        @if ($lha)

                            <div class="document-status success">
                                <i class="bi bi-check-circle"></i>
                                Sudah dikumpulkan
                            </div>

                            <div class="file-name">
                                {{ $lha->nama_file }}
                            </div>

                        @else

                            <div class="document-status missing">
                                <i class="bi bi-x-circle"></i>
                                Belum dikumpulkan
                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- DOKUMEN REVIU --}}

            <div class="card">

                <h2 class="section-title">
                    Dokumen Reviu
                </h2>

                <div class="document-list">

                    {{-- CHR --}}

                    <div class="document-item">

                        <div class="document-head">

                            <div class="document-name">
                                <i class="bi bi-file-earmark-text"></i>
                                CHR
                            </div>

                        </div>

                        @php
                            $chr = $dokumenSaya->where('jenis_dokumen', 'CHR')->first();
                        @endphp

                        @if ($chr)

                            <div class="document-status success">
                                <i class="bi bi-check-circle"></i>
                                Sudah dikumpulkan
                            </div>

                            <div class="file-name">
                                {{ $chr->nama_file }}
                            </div>

                        @else

                            <div class="document-status missing">
                                <i class="bi bi-x-circle"></i>
                                Belum dikumpulkan
                            </div>

                        @endif

                    </div>


                    {{-- KKR --}}

                    <div class="document-item">

                        <div class="document-head">

                            <div class="document-name">
                                <i class="bi bi-file-earmark-text"></i>
                                KKR
                            </div>

                        </div>

                        @php
                            $lhr = $dokumenSaya->where('jenis_dokumen', 'KKR')->first();
                        @endphp

                        @if ($lhr)

                            <div class="document-status success">
                                <i class="bi bi-check-circle"></i>
                                Sudah dikumpulkan
                            </div>

                            <div class="file-name">
                                {{ $lhr->nama_file }}
                            </div>

                        @else

                            <div class="document-status missing">
                                <i class="bi bi-x-circle"></i>
                                Belum dikumpulkan
                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- PILIH JENIS BERKAS --}}

            <div class="card">

                <h2 class="section-title">
                    Pilih Jenis Berkas
                </h2>

                <div class="choice-container">

                    {{-- AUDIT --}}

                    <a href="{{ route('anggota.pemeriksaan.audit', $pemeriksaan->id) }}"
                       class="choice">

                        <div class="choice-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>

                        <h3>
                            AUDIT
                        </h3>

                        <p>
                            Pilih Audit untuk mengumpulkan dokumen KKA dan NHA.
                        </p>

                    </a>


                    {{-- REVIU --}}

                    <a href="{{ route('anggota.pemeriksaan.reviu', $pemeriksaan->id) }}"
                       class="choice">

                        <div class="choice-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>

                        <h3>
                            REVIU
                        </h3>

                        <p>
                            Pilih Reviu untuk mengumpulkan dokumen CHR dan KKR.
                        </p>

                    </a>

                </div>

                <div class="note">
                    <strong>Informasi:</strong>
                    Pilih salah satu jenis pekerjaan sesuai tugas Anda dalam pemeriksaan.
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