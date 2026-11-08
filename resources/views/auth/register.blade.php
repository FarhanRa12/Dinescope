
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DINE Scope</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-color: #2b1d15;
            font-family: Arial, sans-serif;
            color: #ffffff;
        }

        /* LOGO DINE SCOPE */
        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 150px;
            height: auto;
            object-fit: contain;
        }

        /* CONTAINER REGISTER */
        .register-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 110px 20px 25px;
        }

        /* JUDUL REGISTER */
        .register-title {
            font-family: Georgia, serif;
            font-size: 90px;
            font-weight: normal;
            color: #b88608;
            margin-bottom: 32px;
            text-align: center;
        }

        /* FORM REGISTER */
        .register-form {
            width: 100%;
            max-width: 407px;
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-group label {
            display: block;
            color: #c99a00;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            height: 31px;
            padding: 7px 10px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            background-color: #ffffff;
            color: #302219;
            font-size: 12px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #c99a00;
        }

        .form-group input::placeholder {
            color: #888888;
        }

        /* KETERANGAN */
        .instruction {
            color: #ffffff;
            font-size: 10px;
            margin-top: 5px;
        }

        .error {
            color: #ff9999;
            font-size: 11px;
            margin-top: 5px;
        }

        .success {
            color: #a5e6a5;
            font-size: 12px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* TOMBOL */
        .button-group {
            width: 100%;
            display: flex;
            gap: 10px;
            margin-top: 88px;
        }

        .button-group button,
        .button-group a {
            flex: 1;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 7px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }

        /* KEMBALI */
        .back-button {
            background: transparent;
            border: 1px solid #a77d00;
            color: #c99a00;
        }

        .back-button:hover {
            background-color: rgba(167, 125, 0, 0.12);
        }

        /* DAFTAR */
        .register-button {
            background-color: #b88608;
            border: 1px solid #b88608;
            color: #ffffff;
            font-weight: bold;
        }

        .register-button:hover {
            background-color: #d2a000;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .logo {
                width: 110px;
                top: 18px;
                right: 18px;
            }

            .register-title {
                font-size: 65px;
                margin-top: 45px;
            }

            .register-form {
                max-width: 100%;
            }

            .button-group {
                margin-top: 65px;
            }
        }
    </style>
</head>

<body>

    <!-- LOGO DINE SCOPE -->
    <img
        src="{{ asset('images/dine-scope.png') }}"
        alt="DINE Scope Logo"
        class="logo"
    >

    <!-- HALAMAN REGISTER -->
    <main class="register-wrapper">

        <h1 class="register-title">Register</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form class="register-form"
              action="{{ route('register.process') }}"
              method="POST">

            @csrf

            <!-- NAMA LENGKAP -->
            <div class="form-group">
                <label for="name">Nama Lengkap</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="contoh: Udin Hasanudin"
                    value="{{ old('name') }}"
                    required
                >

                <p class="instruction">
                    Masukan Nama lengkap yang sesuai dengan identitas.
                </p>

                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh: hasanudin@email.com"
                    value="{{ old('email') }}"
                    required
                >

                <p class="instruction">
                    Gunakan email aktif agar verifikasi akun berjalan lancar.
                </p>

                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                <p class="instruction">
                    Pastikan password minimal 8 karakter.
                </p>

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- TOMBOL -->
            <div class="button-group">

                <a href="/" class="back-button">
                    Kembali
                </a>

                <button type="submit" class="register-button">
                    Daftar
                </button>

            </div>

        </form>

    </main>

</body>
</html>
