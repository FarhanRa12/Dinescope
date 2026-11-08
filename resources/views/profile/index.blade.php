
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - DINE Scope</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #2b1d15;
            color: white;
            min-height: 100vh;
        }

        .navbar {
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .logo img {
            width: 100px;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            font-size: 12px;
        }

        .nav-menu a {
            color: #c49a3a;
            text-decoration: none;
        }

        .profile-icon {
            color: #fff;
            font-size: 22px;
        }

        .container {
            width: 88%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .profile-card,
        .history-card {
            border: 1px solid #a99b8e;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .profile-card {
            min-height: 120px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .contribution {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 65px;
            height: 65px;
            border: 4px solid #a77b00;
            border-radius: 50%;
            color: #a77b00;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
        }

        .contribution small {
            color: #d8b46a;
            font-size: 11px;
        }

        .contribution h2 {
            font-size: 25px;
            font-weight: normal;
            margin-top: 4px;
        }

        .edit-button {
            background: transparent;
            border: none;
            color: #c49a3a;
            cursor: pointer;
            font-size: 13px;
        }

        .history-title {
            padding: 12px;
            color: #c49a3a;
            font-size: 12px;
            border-bottom: 1px solid #a99b8e;
        }

        .review-item {
            background: #49372c;
            margin: 8px;
            padding: 18px;
            border-radius: 10px;
        }

        .review-item h3 {
            font-size: 15px;
            font-weight: normal;
        }

        .review-item small {
            color: #bba997;
            font-size: 10px;
        }

        .stars {
            color: #d6a500;
            margin: 8px 0;
        }

        .review-item p {
            font-size: 12px;
            color: #eee0d0;
        }

        /* POPUP EDIT PROFIL */

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            width: 100%;
            max-width: 780px;
            min-height: 300px;
            background: #49372c;
            border: 1px solid #806d5d;
            border-radius: 12px;
            padding: 35px 40px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 55px;
        }

        .modal-avatar {
            width: 110px;
            text-align: center;
            flex-shrink: 0;
        }

        .modal-avatar .avatar {
            width: 70px;
            height: 70px;
            margin: auto;
            border: 2px solid white;
            color: white;
            font-size: 35px;
        }

        .modal-avatar small {
            display: block;
            font-size: 10px;
            margin-top: 10px;
        }

        .modal-form {
            flex: 1;
        }

        .field {
            margin-bottom: 13px;
        }

        .field label {
            display: block;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            height: 38px;
            border: none;
            border-radius: 4px;
            padding: 0 10px;
            outline: none;
            background: white;
            color: #333;
        }

        .password-button {
            background: #aa8000;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 22px;
            font-size: 11px;
            cursor: pointer;
        }

        .password-fields {
            display: none;
            margin-top: 15px;
        }

        .password-fields.active {
            display: block;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 35px;
        }

        .btn {
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 11px;
            cursor: pointer;
        }

        .btn-cancel {
            background: #78634e;
            color: white;
        }

        .btn-save {
            background: #b88b00;
            color: white;
        }

        .error {
            color: #ffaaaa;
            font-size: 11px;
            margin-top: 5px;
        }

        .alert {
            background: #294b32;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 13px;
        }

        @media(max-width: 650px) {
            .navbar {
                padding: 0 15px;
            }

            .nav-menu {
                gap: 10px;
                font-size: 10px;
            }

            .modal {
                flex-direction: column;
                gap: 20px;
                padding: 25px;
            }

            .modal-form {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/dine-scope.png') }}" alt="DINE Scope">
        </div>

        <div class="nav-menu">
            <a href="#">Jelajahi Restoran</a>
            <a href="#">Ulasan Saya</a>
            <a href="#">About Us</a>
        </div>

        <div class="profile-icon">◎</div>
    </nav>

    <main class="container">

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <section class="profile-card">
            <div class="contribution">
                <div class="avatar">◎</div>

                <div>
                    <small>Kontribusi</small>
                    <h2>0</h2>
                </div>
            </div>

            <button class="edit-button" onclick="openModal()">
                Edit Profil ◈
            </button>
        </section>

        <section class="history-card">
            <div class="history-title">
                Riwayat Ulasan
            </div>

            <div style="
                padding: 35px 15px;
                text-align: center;
                color: #bba997;
            ">
                <div style="font-size: 30px; margin-bottom: 12px;">
                    ☆
                </div>

                <h3 style="font-size: 15px; font-weight: normal;">
                    Belum Ada Ulasan
                </h3>

                <p style="font-size: 12px; margin-top: 8px;">
                    Anda belum memberikan ulasan restoran maupun menu.
                </p>
            </div>
        </section>

    </main>

    <!-- POPUP EDIT PROFIL -->

    <div class="modal-overlay" id="editModal">
        <div class="modal">

            <div class="modal-avatar">
                <div class="avatar">◎</div>
                <small>Ubah Foto</small>
            </div>

            <div class="modal-form">

                <!-- FORM EDIT NAMA DAN EMAIL -->
                <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <label>Nama</label>
                        <input type="text" name="name"
                            value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </form>

                <!-- TOMBOL UNTUK MEMBUKA FORM PASSWORD -->
                <button type="button" class="password-button"
                    onclick="togglePassword()">
                    Ganti Password
                </button>

                <!-- FORM GANTI PASSWORD TERPISAH -->
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="password-fields" id="passwordFields">
                        <div class="field">
                            <label>Password Baru</label>
                            <input type="password" name="password"
                                id="newPassword"
                                placeholder="Masukkan password baru">
                            @error('password')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Konfirmasi Password</label>
                            <input type="password"
                                name="password_confirmation"
                                id="confirmPassword"
                                placeholder="Ulangi password baru">
                        </div>

                        <div class="modal-actions" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-save">
                                Simpan Password
                            </button>
                        </div>
                    </div>
                </form>

                <!-- TOMBOL AKSI EDIT PROFIL -->
                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel"
                        onclick="closeModal()">
                        Batal
                    </button>

                    <button type="submit" form="profileForm" class="btn btn-save">
                        Simpan
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('editModal')
                .classList.add('active');
        }

        function closeModal() {
            document.getElementById('editModal')
                .classList.remove('active');
        }

        function togglePassword() {
            document.getElementById('passwordFields')
                .classList.toggle('active');
        }

        document.getElementById('editModal').addEventListener(
            'click', function(event) {
                if (event.target === this) {
                    closeModal();
                }
            }
        );

        @if($errors->any())
            document.getElementById('editModal')
                .classList.add('active');

            @if($errors->has('password'))
                document.getElementById('passwordFields')
                    .classList.add('active');
            @endif
        @endif
    </script>

</body>
</html>
