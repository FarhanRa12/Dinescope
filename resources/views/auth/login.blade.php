
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DINE Scope</title>

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

        /* LOGO */
        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 150px;
            height: auto;
            object-fit: contain;
        }

        /* CONTAINER LOGIN */
        .login-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 150px 20px 25px;
        }

        /* JUDUL */
        .login-title {
            font-family: Georgia, serif;
            font-size: 90px;
            font-weight: normal;
            color: #b88608;
            margin-bottom: 40px;
            text-align: center;
        }

        /* FORM */
        .login-form {
            width: 100%;
            max-width: 407px;
        }

        .form-group {
            margin-bottom: 30px;
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
            margin-top: 75px;
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

        /* LOGIN */
        .login-button {
            background-color: #b88608;
            border: 1px solid #b88608;
            color: #ffffff;
            font-weight: bold;
        }

        .login-button:hover {
            background-color: #d2a000;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .logo {
                width: 110px;
                top: 18px;
                right: 18px;
            }

            .login-wrapper {
                padding-top: 150px;
            }

            .login-title {
                font-size: 65px;
            }

            .login-form {
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

    <!-- HALAMAN LOGIN -->
    <main class="login-wrapper">

        <h1 class="login-title">Login</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form class="login-form"
              action="{{ route('login.process') }}"
              method="POST">

            @csrf

            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required
                >

                <p class="instruction">
                    Masukkan email yang telah terdaftar.
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
                    Masukkan password akun DINE Scope kamu.
                </p>

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- TOMBOL -->
            <div class="button-group">

                <a href="{{ route('register') }}" class="back-button">
    Daftar
</a>

                <button type="submit" class="login-button">
                    Login
                </button>

            </div>

        </form>

    </main>

</body>
</html>
