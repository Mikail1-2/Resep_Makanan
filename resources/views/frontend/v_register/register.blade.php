<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul ?? 'Register - ResepKu' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="login-card">

            <div class="logo">
                <h2>Resepku</h2>
                <p>Daftar untuk membuat akun resep makanan</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <label>No HP</label>
                <input type="text" name="hp" class="form-control" placeholder="Masukkan No HP" value="{{ old('hp') }}">
                @error('hp')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <button type="submit" class="login-btn">Register</button>

                <div class="register-text">
                    Sudah punya akun? <a href="{{ route('login') }}" class="register-link">Login</a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>