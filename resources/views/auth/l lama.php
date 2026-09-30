<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - GARDU4</title>

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
            min-height: 590px;
            background: #ffffff;
            border: 1px solid #e8eaf2;
            border-radius: 24px;
            box-shadow: 0 18px 55px rgba(48, 42, 94, 0.12);
            overflow: hidden;
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
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
            padding: 50px 58px;
        }

        .auth-form {
            width: 100%;
            max-width: 390px;
        }

        .form-heading {
            margin-bottom: 30px;
        }

        .form-heading h1 {
            font-size: 28px;
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

        .alert-success {
            background: #f0fbf7;
            border: 1px solid #ccefe1;
            color: #258061;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
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
            font-size: 16px;
        }

        .form-group input {
            width: 100%;
            height: 46px;
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

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #9aa4b5;
            cursor: pointer;
            padding: 4px;
            font-size: 15px;
            line-height: 1;
        }

        .password-toggle:hover {
            color: #1E5EB8;
        }

        .eye-icon {
            width: 18px;
            height: 18px;
            display: block;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .password-input {
            padding-right: 42px !important;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: -9px;
            margin-bottom: 18px;
            color: #1E5EB8;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .forgot-info {
            display: none;
            margin-top: 10px;
            margin-bottom: 16px;
            padding: 11px 12px;
            border: 1px solid #dce9f8;
            background: #f4f8fd;
            border-radius: 10px;
            color: #5f7088;
            font-size: 11px;
            line-height: 1.6;
        }

        .forgot-info strong {
            color: #174B96;
        }

        .btn-auth {
            width: 100%;
            height: 46px;
            margin-top: 4px;
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
            margin-top: 22px;
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
                padding: 40px 30px;
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
                padding: 32px 24px;
            }

            .form-heading h1 {
                font-size: 24px;
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
                    Kelola pemeriksaan, anggota tim, dan dokumen secara terpusat
                    melalui satu sistem.
                </p>

            </div>
        </section>

        <section class="auth-form-area">

            <div class="auth-form">

                <div class="form-heading">
                    <h1>Selamat Datang 👋</h1>
                    <p>Masuk ke akun Anda untuk melanjutkan.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

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
                                class="password-input"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePassword"
                                aria-label="Tampilkan password"
                                title="Tampilkan password"
                            >
                                <svg class="eye-icon" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M2.5 12s3.5-5.5 9.5-5.5S21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12Z"></path>
                                    <circle cx="12" cy="12" r="2.5"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <a href="#"
                       class="forgot-password"
                       id="forgotPassword">
                        Lupa password?
                    </a>

                    <div class="forgot-info" id="forgotInfo">
                        Lupa password? Silakan hubungi <strong>Admin GARDU4</strong>
                        untuk membantu melakukan reset password akun Anda.
                    </div>

                    <button type="submit" class="btn-auth">
                        Masuk
                    </button>

                </form>

                <div class="auth-switch">
                    Belum punya akun?
                    <a href="/register">Daftar sekarang</a>
                </div>

            </div>

        </section>

    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const forgotPassword = document.getElementById('forgotPassword');
        const forgotInfo = document.getElementById('forgotInfo');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword
                ? `<svg class="eye-icon" viewBox="0 0 24 24" aria-hidden="true">
                       <path d="M2.5 12s3.5-5.5 9.5-5.5S21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12Z"></path>
                       <circle cx="12" cy="12" r="2.5"></circle>
                   </svg>`
                : `<svg class="eye-icon" viewBox="0 0 24 24" aria-hidden="true">
                       <path d="M3 3l18 18"></path>
                       <path d="M10.6 6.7A10.6 10.6 0 0 1 12 6.5c6 0 9.5 5.5 9.5 5.5a17.4 17.4 0 0 1-3.4 3.6"></path>
                       <path d="M6.6 9.1A17.4 17.4 0 0 0 2.5 12S6 17.5 12 17.5c1.3 0 2.5-.3 3.5-.7"></path>
                   </svg>`;

            this.style.opacity = '1';

            this.setAttribute(
                'aria-label',
                isPassword ? 'Sembunyikan password' : 'Tampilkan password'
            );

            this.setAttribute(
                'title',
                isPassword ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });

        forgotPassword.addEventListener('click', function (event) {
            event.preventDefault();

            const isOpen = forgotInfo.style.display === 'block';

            forgotInfo.style.display = isOpen ? 'none' : 'block';
        });
    </script>

</body>
</html>
