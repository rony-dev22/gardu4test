<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Pemeriksaan - GARDU4</title>

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


    /* ================= FORM CARD ================= */

    .form-card {
        background: white;

        border: 1px solid #e1e8f1;

        border-radius: 13px;

        padding: 19px;

        box-shadow:
            0 4px 14px rgba(33,63,93,0.04);
    }

    .section-title {
        margin: 0 0 13px;

        font-size: 14px;

        color: #1a3558;

        font-weight: 700;
    }

    .section-block + .section-block {
        margin-top: 22px;

        padding-top: 18px;

        border-top: 1px solid #edf1f6;
    }


    /* ================= FORM ================= */

    .form-group {
        margin-bottom: 13px;
    }

    label {
        display: block;

        font-size: 9px;

        font-weight: 700;

        color: #53677e;

        margin-bottom: 6px;
    }

    .required {
        color: #d35d5d;
    }

    input,
    textarea {
        width: 100%;

        border: 1px solid #d8e2ec;

        border-radius: 8px;

        padding: 9px 11px;

        font-family: Arial, Helvetica, sans-serif;

        font-size: 10px;

        color: #334155;

        background: white;

        outline: none;

        transition: 0.2s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #72aadd;

        box-shadow:
            0 0 0 3px rgba(67,143,231,0.08);
    }

    textarea {
        min-height: 85px;

        resize: vertical;
    }

    .date-row {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 12px;
    }


    /* ================= ERROR ================= */

    .error {
        background: #fff1f1;

        color: #9b4141;

        border: 1px solid #f0cccc;

        padding: 10px 13px;

        border-radius: 9px;

        margin-bottom: 16px;

        font-size: 9px;

        line-height: 1.5;
    }

    .error strong {
        display: block;

        margin-bottom: 4px;
    }

    .error ul {
        margin: 4px 0 0 16px;

        padding: 0;
    }


    /* ================= ANGGOTA ================= */

    .anggota-note {
        color: #8795a8;

        font-size: 9px;

        margin: -4px 0 11px;
    }

    .anggota-list {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 9px;
    }

    .anggota-item {
        display: flex;

        align-items: center;

        gap: 9px;

        min-height: 46px;

        padding: 9px 11px;

        border: 1px solid #dfe7ef;

        border-radius: 9px;

        background: #fbfdff;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .anggota-item:hover {
        border-color: #a9cbe9;

        background: #f5faff;
    }

    .anggota-item input {
        width: 15px;

        height: 15px;

        margin: 0;

        accent-color: #438fe7;

        cursor: pointer;

        flex-shrink: 0;
    }

    .anggota-name {
        font-size: 10px;

        color: #304b68;

        font-weight: 600;
    }

    .empty-member {
        grid-column: 1 / -1;

        padding: 20px;

        text-align: center;

        color: #8997aa;

        background: #f8fafc;

        border: 1px dashed #d8e2ec;

        border-radius: 9px;

        font-size: 9px;
    }


    /* ================= BUTTON ================= */

    .button-area {
        display: flex;

        gap: 8px;

        margin-top: 20px;

        padding-top: 15px;

        border-top: 1px solid #edf1f6;
    }

    .btn {
        display: inline-block;

        padding: 8px 12px;

        border-radius: 7px;

        font-size: 9px;

        font-weight: bold;

        text-decoration: none;

        border: none;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .btn-primary {
        background: #438fe7;

        color: white;

        box-shadow:
            0 4px 10px rgba(67,143,231,0.18);
    }

    .btn-primary:hover {
        background: #367fd1;
    }

    .btn-secondary {
        background: #edf2f7;

        color: #5d7085;
    }

    .btn-secondary:hover {
        background: #e2e9f0;
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

        .anggota-list {
            grid-template-columns: 1fr;
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

        .content {
            padding: 18px;
        }

        .date-row {
            grid-template-columns: 1fr;
        }

        .button-area {
            flex-direction: column;
        }

        .btn {
            width: 100%;

            text-align: center;
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

                    <circle
                        cx="12"
                        cy="8"
                        r="3.5">
                    </circle>

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


            <h1 class="page-title">
                Buat Pemeriksaan Baru
            </h1>


            <p class="page-subtitle">
                Isi informasi pemeriksaan dan pilih anggota team yang akan terlibat.
            </p>



            <!-- FORM CARD -->

            <div class="form-card">


                <!-- ERROR -->

                @if ($errors->any())

                    <div class="error">

                        <strong>
                            Periksa kembali data yang diisi:
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



                <form
                    action="{{ route('ketua.pemeriksaan.store') }}"
                    method="POST">

                    @csrf


                    <!-- INFORMASI PEMERIKSAAN -->

                    <div class="section-block">


                        <h2 class="section-title">
                            Informasi Pemeriksaan
                        </h2>


                        <!-- NAMA -->

                        <div class="form-group">

                            <label for="nama_pemeriksaan">

                                Nama Pemeriksaan
                                <span class="required">*</span>

                            </label>


                            <input
                                type="text"
                                id="nama_pemeriksaan"
                                name="nama_pemeriksaan"
                                value="{{ old('nama_pemeriksaan') }}"
                                placeholder="Contoh: Pemeriksaan Pengelolaan Keuangan 2026"
                                required>

                        </div>


                        <!-- SURAT TUGAS -->

                        <div class="form-group">

                            <label for="nomor_surat_tugas">

                                Nomor Surat Tugas

                            </label>


                            <input
                                type="text"
                                id="nomor_surat_tugas"
                                name="nomor_surat_tugas"
                                value="{{ old('nomor_surat_tugas') }}"
                                placeholder="Masukkan nomor surat tugas jika ada">

                        </div>


                        <!-- TANGGAL -->

                        <div class="date-row">


                            <div class="form-group">

                                <label for="tanggal_mulai">

                                    Tanggal Mulai

                                </label>


                                <input
                                    type="date"
                                    id="tanggal_mulai"
                                    name="tanggal_mulai"
                                    value="{{ old('tanggal_mulai') }}">

                            </div>


                            <div class="form-group">

                                <label for="tanggal_selesai">

                                    Tanggal Selesai

                                </label>


                                <input
                                    type="date"
                                    id="tanggal_selesai"
                                    name="tanggal_selesai"
                                    value="{{ old('tanggal_selesai') }}">

                            </div>


                        </div>


                        <!-- KETERANGAN -->

                        <div class="form-group">

                            <label for="keterangan">

                                Keterangan

                            </label>


                            <textarea
                                id="keterangan"
                                name="keterangan"
                                placeholder="Masukkan keterangan pemeriksaan..."
                            >{{ old('keterangan') }}</textarea>

                        </div>


                    </div>



                    <!-- ANGGOTA -->

                    <div class="section-block">


                        <h2 class="section-title">

                            Pilih Anggota Tim
                            <span class="required">*</span>

                        </h2>


                        <p class="anggota-note">

                            Pilih satu atau beberapa anggota yang akan menjadi bagian dari pemeriksaan.

                        </p>


                        <div class="anggota-list">


                            @forelse ($anggota as $item)


                                <label class="anggota-item">


                                    <input
                                        type="checkbox"
                                        name="anggota[]"
                                        value="{{ $item->id }}"
                                        {{ in_array($item->id, old('anggota', [])) ? 'checked' : '' }}>


                                    <span class="anggota-name">

                                        {{ $item->name }}

                                    </span>


                                </label>


                            @empty


                                <div class="empty-member">

                                    Belum ada user dengan role Anggota.

                                </div>


                            @endforelse


                        </div>


                    </div>



                    <!-- BUTTON -->

                    <div class="button-area">


                        <button
                            type="submit"
                            class="btn btn-primary">

                            Simpan Pemeriksaan

                        </button>


                        <a
                            href="{{ route('ketua.pemeriksaan') }}"
                            class="btn btn-secondary">

                            Kembali

                        </a>


                    </div>


                </form>


            </div>


        </div>


    </main>


</body>

</html>