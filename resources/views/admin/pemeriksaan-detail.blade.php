<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pemeriksaan - GARDU4</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #102A56;
            --navy-dark: #0B1E3A;
            --blue: #1687E8;
            --blue-dark: #0E63B6;
            --blue-soft: #EAF4FF;
            --yellow: #FFB81C;
            --green: #17B26A;
            --red: #F04438;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .heading-left h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .heading-left p {
            color: var(--muted);
            font-size: 11px;
        }

        .heading-actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 10px;
            font-weight: 700;
            transition: .2s;
            white-space: nowrap;
        }

        .btn-export {
            background: var(--blue);
        }

        .btn-export:hover {
            background: var(--blue-dark);
        }

        .btn-back {
            background: #64748B;
        }

        .btn-back:hover {
            background: #475569;
        }

        /* =========================
           TOP INFO
        ========================= */

        .detail-grid {
            display: grid;
            grid-template-columns: 1.35fr .85fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 17px;
        }

        .section-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--blue-soft);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .card-header h2 {
            font-size: 14px;
        }

        .info-list {
            display: grid;
            gap: 11px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 145px 1fr;
            gap: 15px;
            align-items: start;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
        }

        .info-value {
            font-size: 11px;
            font-weight: 600;
            line-height: 1.5;
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary-item {
            padding: 14px 0;
            border-bottom: 1px solid #F0F3F7;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: 800;
        }

        /* =========================
           TABLE CARD
        ========================= */

        .full-card {
            margin-bottom: 18px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            text-align: left;
            padding: 10px 8px;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            background: #FAFBFD;
        }

        td {
            padding: 12px 8px;
            font-size: 10px;
            border-bottom: 1px solid #F0F3F7;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .primary {
            font-weight: 700;
        }

        .secondary {
            color: var(--muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 8px;
            font-weight: 800;
        }

        .badge-active {
            background: #E9FBF2;
            color: #128A50;
        }

        .badge-finished {
            background: #EAF4FF;
            color: #0E63B6;
        }

        .badge-default {
            background: #F1F5F9;
            color: #475569;
        }

        .empty {
            text-align: center;
            padding: 28px;
            color: var(--muted);
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 950px) {

            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
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

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .info-row {
                grid-template-columns: 1fr;
                gap: 3px;
            }
        }

        @media (max-width: 520px) {

            .search-box {
                display: none;
            }

            .heading-actions {
                width: 100%;
            }

            .btn {
                flex: 1;
                justify-content: center;
            }

            .lha-section-title {
    margin: 0 0 16px !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #132d52 !important;
}

.lha-name {
    font-size: 17px !important;
    font-weight: 700 !important;
    color: #132d52 !important;
}

.lha-file {
    font-size: 14px !important;
    color: #64748b !important;
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


        <a href="{{ route('admin.pemeriksaan') }}" class="menu active">

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


        <a href="{{ route('admin.informasi-sistem') }}" class="menu">
    <i class="bi bi-info-circle"></i>
    <span>
        Informasi Sistem
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


            <!-- HEADING -->
            <div class="page-heading">

                <div class="heading-left">

                    <h1>
                        Detail Pemeriksaan
                    </h1>

                    <p>
                        Informasi lengkap kegiatan pemeriksaan dalam GARDU4.
                    </p>

                </div>


                <div class="heading-actions">

                    <a
                        href="{{ route('admin.pemeriksaan.export', $pemeriksaan->id) }}"
                        class="btn btn-export"
                    >
                        <i class="bi bi-download"></i>
                        Export Data
                    </a>


                    <a
                        href="{{ route('admin.pemeriksaan') }}"
                        class="btn btn-back"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                </div>

            </div>


            <!-- INFORMASI + RINGKASAN -->
            <section class="detail-grid">


                <!-- INFORMASI -->
                <div class="card">

                    <div class="card-header">

                        <div class="section-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>

                        <h2>
                            Informasi Pemeriksaan
                        </h2>

                    </div>


                    <div class="info-list">


                        <div class="info-row">

                            <div class="info-label">
                                Nama Pemeriksaan
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->nama_pemeriksaan }}
                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Nomor Surat Tugas
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->nomor_surat_tugas ?? '-' }}
                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Ketua Tim
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->ketuaTim->name ?? '-' }}
                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Tanggal Mulai
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->tanggal_mulai
                                    ? $pemeriksaan->tanggal_mulai->format('d-m-Y')
                                    : '-' }}
                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Tanggal Selesai
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->tanggal_selesai
                                    ? $pemeriksaan->tanggal_selesai->format('d-m-Y')
                                    : '-' }}
                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Status
                            </div>

                            <div class="info-value">

                                @if ($pemeriksaan->status === 'aktif')

                                    <span class="badge badge-active">
                                        Aktif
                                    </span>

                                @elseif ($pemeriksaan->status === 'selesai')

                                    <span class="badge badge-finished">
                                        Selesai
                                    </span>

                                @else

                                    <span class="badge badge-default">
                                        {{ ucfirst($pemeriksaan->status ?? '-') }}
                                    </span>

                                @endif

                            </div>

                        </div>


                        <div class="info-row">

                            <div class="info-label">
                                Keterangan
                            </div>

                            <div class="info-value">
                                {{ $pemeriksaan->keterangan ?? '-' }}
                            </div>

                        </div>


                    </div>

                </div>


                <!-- RINGKASAN -->
                <div class="card">

                    <div class="card-header">

                        <div class="section-icon">
                            <i class="bi bi-bar-chart"></i>
                        </div>

                        <h2>
                            Ringkasan
                        </h2>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Jumlah Anggota
                        </div>

                        <div class="summary-value">
                            {{ $pemeriksaan->anggota->count() }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Jumlah Dokumen
                        </div>

                        <div class="summary-value">
                            {{ $pemeriksaan->dokumen->count() }}
                        </div>

                    </div>

                </div>

            </section>


            <!-- ANGGOTA -->
            <section class="card full-card">

                <div class="card-header">

                    <div class="section-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h2>
                        Anggota Pemeriksaan
                    </h2>

                </div>


                @if ($pemeriksaan->anggota->count())


                    <div class="table-wrap">

                        <table>

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Email</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($pemeriksaan->anggota as $anggota)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <div class="primary">
                                                {{ $anggota->user->name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="secondary">
                                                {{ $anggota->user->email ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ $anggota->jenis_pekerjaan ?? '-' }}
                                        </td>

                                        <td>
                                            {{ ucfirst($anggota->status ?? '-') }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else

                    <div class="empty">

                        <i class="bi bi-people"
                           style="font-size:24px;display:block;margin-bottom:8px;">
                        </i>

                        Belum ada anggota yang ditugaskan.

                    </div>

                @endif

            </section>


            <!-- DOKUMEN -->
            <section class="card full-card">

                <div class="card-header">

                    <div class="section-icon">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                    <h2>
                        Dokumen Pemeriksaan
                    </h2>

                </div>


                @if ($pemeriksaan->dokumen->count())


                    <div class="table-wrap">

                        <table>

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Pengunggah</th>
                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($pemeriksaan->dokumen as $dokumen)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <div class="primary">
                                                {{ $dokumen->nama_file }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ $dokumen->jenis_dokumen }}
                                        </td>

                                        <td>
                                            <div class="secondary">
                                                {{ $dokumen->user->name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ ucfirst($dokumen->status ?? '-') }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else

                    <div class="empty">

                        <i class="bi bi-folder-x"
                           style="font-size:24px;display:block;margin-bottom:8px;">
                        </i>

                        Belum ada dokumen.

                    </div>

                @endif

            </section>

            <div class="card full">

    {{-- HASIL AKHIR PEMERIKSAAN --}}

<div class="card full" style="margin-top: 18px;">

    <h2 style="
        margin:0 0 13px;
        font-size:14px;
        line-height:1.4;
        color:#1a3558;
        font-weight:700;
    ">
        Hasil Akhir Pemeriksaan
    </h2>

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
                        Diunggah oleh
                        {{ $lha->user->name ?? 'Admin' }}
                        <span style="margin:0 4px;">•</span>
                        {{ $lha->created_at
                            ? $lha->created_at->format('d/m/Y')
                            : '-' }}
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
                action="{{ route('admin.pemeriksaan.lha.store', $pemeriksaan->id) }}"
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

        </main>

    </div>

</body>

</html>