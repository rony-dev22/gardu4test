<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola User - GARDU4</title>

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
            letter-spacing: 0.7px;
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
            transition: 0.2s ease;
        }

        .menu i {
            width: 18px;
            text-align: center;
            font-size: 16px;
        }

        .menu:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .menu.active {
            background: linear-gradient(90deg, #1687E8, #2698F3);
            color: white;
            box-shadow: 0 5px 14px rgba(22,135,232,0.24);
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
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 18px;
        }

        .page-heading h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 11px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            background: var(--blue);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 700;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: var(--blue-dark);
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 11px;
            font-weight: 600;
        }

        .alert-success {
            background: #E9FBF2;
            color: #166534;
            border: 1px solid #C8F0DA;
        }

        .alert-error {
            background: #FDECEC;
            color: #991B1B;
            border: 1px solid #F6D0D0;
        }

        /* =========================
           FILTER
        ========================= */

        .filter-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 13px;
            margin-bottom: 16px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-label {
            color: var(--muted);
            font-size: 10px;
            margin-right: 4px;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none;
            color: var(--muted);
            background: #F7F9FC;
            border: 1px solid var(--border);
            font-size: 10px;
            font-weight: 600;
        }

        .filter-btn:hover {
            color: var(--blue-dark);
            border-color: #BFDDF7;
            background: var(--blue-soft);
        }

        /* =========================
           TABLE CARD
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
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 9px;
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

        .card-title h2 {
            font-size: 14px;
        }

        .total-data {
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 780px;
        }

        th {
            text-align: left;
            padding: 10px 8px;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
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

        .user-name {
            font-weight: 700;
        }

        .user-email {
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

        .admin {
            background: #F1EDFF;
            color: #6D4AFF;
        }

        .ketua {
            background: #EAF4FF;
            color: #0E63B6;
        }

        .anggota {
            background: #E9FBF2;
            color: #128A50;
        }

        .status-active {
            background: #E9FBF2;
            color: #128A50;
        }

        .status-inactive {
            background: #FDECEC;
            color: #B42318;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 9px;
            border-radius: 6px;
            border: none;
            color: white;
            text-decoration: none;
            font-size: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-edit {
            background: var(--blue);
        }

        .btn-edit:hover {
            background: var(--blue-dark);
        }

        .btn-toggle-on {
            background: #F59E0B;
        }

        .btn-toggle-on:hover {
            background: #D97706;
        }

        .btn-toggle-off {
            background: #22C55E;
        }

        .btn-toggle-off:hover {
            background: #16A34A;
        }

        .btn-delete {
            background: var(--red);
        }

        .btn-delete:hover {
            background: #D92D20;
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

        @media (max-width: 1050px) {
            .sidebar {
                width: 195px;
            }

            .main {
                margin-left: 195px;
            }

            .search-box {
                width: 330px;
            }
        }

        @media (max-width: 760px) {
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
        }

        @media (max-width: 520px) {
            .search-box {
                display: none;
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


        <a href="{{ route('admin.pemeriksaan') }}" class="menu">

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


        <a href="{{ route('admin.users') }}" class="menu active">

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


            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchUser"
                    placeholder="Cari user berdasarkan nama atau email..."
                    autocomplete="off"
                >

            </div>


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


            <div class="page-heading">

                <div>

                    <h1>
                        Kelola User
                    </h1>

                    <p>
                        Kelola akun, peran, dan status pengguna GARDU4.
                    </p>

                </div>


                <a href="{{ route('admin.users.create') }}"
                   class="btn-add">

                    <i class="bi bi-person-plus"></i>

                    Tambah User

                </a>

            </div>


            @if (session('success'))

                <div class="alert alert-success">

                    ✅ {{ session('success') }}

                </div>

            @endif


            @if (session('error'))

                <div class="alert alert-error">

                    ❌ {{ session('error') }}

                </div>

            @endif


            <!-- FILTER -->
            <div class="filter-card">

                <span class="filter-label">
                    Filter:
                </span>

                <a href="{{ route('admin.users') }}"
                   class="filter-btn">
                    Semua
                </a>

                <a href="{{ route('admin.users', ['role' => 'admin']) }}"
                   class="filter-btn">
                    Admin
                </a>

                <a href="{{ route('admin.users', ['role' => 'ketua']) }}"
                   class="filter-btn">
                    Ketua
                </a>

                <a href="{{ route('admin.users', ['role' => 'anggota']) }}"
                   class="filter-btn">
                    Anggota
                </a>

            </div>


            <!-- TABLE -->
            <div class="card">


                <div class="card-header">

                    <div class="card-title">

                        <div class="section-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h2>
                            Daftar Pengguna
                        </h2>

                    </div>


                    <div class="total-data" id="totalUser">

                        Total: {{ $users->count() }} user

                    </div>

                </div>


                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Nama</th>

                                <th>Email</th>

                                <th>Role</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($users as $user)

                                <tr class="user-row">


                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        <div class="user-name">
                                            {{ $user->name }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="user-email">
                                            {{ $user->email }}
                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge {{ $user->role }}">
                                            {{ ucfirst($user->role) }}
                                        </span>

                                    </td>


                                    <td>

                                        @if ($user->is_active)

                                            <span class="badge status-active">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="badge status-inactive">
                                                Nonaktif
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="action-group">


                                            <a
                                                href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn-action btn-edit"
                                            >
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </a>


                                            @if ($user->id !== Auth::id())

                                                <form
                                                    action="{{ route('admin.users.toggle-status', $user->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }} akun ini?');"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="btn-action {{ $user->is_active ? 'btn-toggle-on' : 'btn-toggle-off' }}"
                                                    >

                                                        <i class="bi bi-power"></i>

                                                        {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}

                                                    </button>

                                                </form>

                                            @endif


                                            @if ($user->id !== Auth::id())

                                                <form
                                                    action="{{ route('admin.users.delete', $user->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus user ini?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-action btn-delete"
                                                    >

                                                        <i class="bi bi-trash"></i>

                                                        Hapus

                                                    </button>

                                                </form>

                                            @endif


                                        </div>

                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="6" class="empty">

                                        <i class="bi bi-people"
                                           style="font-size: 24px; display:block; margin-bottom:8px;">
                                        </i>

                                        Belum ada user.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


            </div>


        </main>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('searchUser');
            const rows = document.querySelectorAll('.user-row');
            const totalUser = document.getElementById('totalUser');

            if (!searchInput || !totalUser) {
                return;
            }

            searchInput.addEventListener('input', function () {

                const keyword = this.value.trim().toLowerCase();
                let visibleCount = 0;

                rows.forEach(function (row) {

                    const rowText = row.textContent.toLowerCase();

                    if (rowText.includes(keyword)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }

                });

                totalUser.textContent = `Total: ${visibleCount} user`;
            });

        });
    </script>

</body>
</html>