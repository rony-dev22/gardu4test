<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi - GARDU4</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f7f4ff 0%, #eef5ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            color: #172033;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 1000px;
            min-height: 650px;
            background: #ffffff;
            border: 1px solid #e8eaf2;
            border-radius: 24px;
            box-shadow: 0 18px 55px rgba(48, 42, 94, 0.12);
            overflow: hidden;
            display: grid;
            grid-template-columns: 0.88fr 1.12fr;
        }

        .auth-brand {
            position: relative;
            padding: 55px;
            background: linear-gradient(145deg, #1E5EB8 0%, #3F7FD1 55%, #6EA6E8 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        .auth-brand::before,
        .auth-brand::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .auth-brand::before {
            width: 280px;
            height: 280px;
            top: -100px;
            right: -100px;
        }

        .auth-brand::after {
            width: 210px;
            height: 210px;
            bottom: -95px;
            left: -85px;
        }

        .brand-content {
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 180px;
            height: 180px;
            object-fit: contain;
            margin-bottom: 28px;
            filter: brightness(0) invert(1);
        }

        .brand-name {
            font-size: 38px;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .brand-title {
            font-size: 21px;
            font-weight: 600;
            line-height: 1.45;
            margin-bottom: 14px;
        }

        .brand-description {
            max-width: 360px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 13px;
            line-height: 1.8;
        }

        .auth-form-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 58px;
        }

        .auth-form {
            width: 100%;
            max-width: 410px;
        }

        .form-heading {
            margin-bottom: 25px;
        }

        .form-heading h1 {
            font-size: 27px;
            line-height: 1.3;
            font-weight: 700;
            color: #172033;
            margin-bottom: 7px;
        }

        .form-heading p {
            font-size: 13px;
            color: #7a8497;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            background: #fff2f2;
            border: 1px solid #ffd7d7;
            color: #c33f3f;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 600;
            color: #354052;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa4b5;
            font-size: 15px;
            font-style: normal;
        }

        .form-group input {
            width: 100%;
            height: 44px;
            padding: 0 14px 0 42px;
            border: 1px solid #e2e6ee;
            border-radius: 10px;
            outline: none;
            background: #f8f9fc;
            color: #20283a;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .form-group input::placeholder {
            color: #a2aabb;
        }

        .form-group input:focus {
            border-color: #4A90E2;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.10);
        }

        .account-note {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            margin: 3px 0 18px;
            padding: 11px 12px;
            border: 1px solid #dce9f8;
            background: #f4f8fd;
            border-radius: 10px;
            color: #5f7088;
            font-size: 11px;
            line-height: 1.6;
        }

        .account-note strong {
            color: #174B96;
        }

        .btn-auth {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 10px;
            background: #1E5EB8;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-auth:hover {
            background: #174B96;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(30, 94, 184, 0.22);
        }

        .auth-switch {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #7a8497;
        }

        .auth-switch a {
            color: #1E5EB8;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-switch a:hover {
            text-decoration: underline;
        }

        @media (max-width: 780px) {
            .auth-wrapper {
                grid-template-columns: 1fr;
                max-width: 480px;
                min-height: auto;
            }

            .auth-brand {
                padding: 35px 30px;
                min-height: 250px;
            }

            .brand-logo {
                width: 58px;
                height: 58px;
                margin-bottom: 18px;
            }

            .brand-name {
                font-size: 30px;
            }

            .brand-title {
                font-size: 17px;
            }

            .auth-form-area {
                padding: 38px 30px;
            }
        }

        @media (max-width: 420px) {
            body {
                padding: 15px;
            }

            .auth-wrapper {
                border-radius: 18px;
            }

            .auth-brand {
                padding: 28px 24px;
            }

            .auth-form-area {
                padding: 30px 24px;
            }

            .form-heading h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-wrapper">

        <section class="auth-brand">
            <div class="brand-content">

                <img
                    src="{{ asset('images/logo-gardu4.png') }}"
                    alt="GARDU4"
                    class="brand-logo"
                >

                <div class="brand-name">GARDU4</div>

                <div class="brand-title">
                    Sistem Pemeriksaan
                    <br>
                    Inspektorat
                </div>

                <p class="brand-description">
                    Buat akun untuk bergabung sebagai anggota tim
                    dan mengakses pemeriksaan yang ditugaskan.
                </p>

            </div>
        </section>

        <section class="auth-form-area">

            <div class="auth-form">

                <div class="form-heading">
                    <h1>Buat Akun GARDU4</h1>
                    <p>Lengkapi data berikut untuk membuat akun baru.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="/register" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>

                        <div class="input-wrapper">
                            <i>●</i>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                autocomplete="name"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>

                        <div class="input-wrapper">
                            <i>✉</i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                autocomplete="email"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <div class="input-wrapper">
                            <i>●</i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Minimal 8 karakter"
                                autocomplete="new-password"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>

                        <div class="input-wrapper">
                            <i>●</i>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                autocomplete="new-password"
                                required
                            >
                        </div>
                    </div>

                    <div class="account-note">
                        <span>ⓘ</span>
                        <div>
                            Akun yang dibuat melalui halaman ini otomatis terdaftar
                            sebagai <strong>Anggota</strong>.
                        </div>
                    </div>

                    <button type="submit" class="btn-auth">
                        Daftar
                    </button>

                </form>

                <div class="auth-switch">
                    Sudah punya akun?
                    <a href="/login">Masuk sekarang</a>
                </div>

            </div>

        </section>

    </div>

</body>
</html>
