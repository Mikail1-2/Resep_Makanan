<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <div class="login-card">

            <div class="back-wrapper">
                <a href="{{ route('login') }}" class="back-btn">
                    ✕
                </a>
            </div>

            <div class="logo">
                <h2>Resepku</h2>
                <p>Masukkan email kamu untuk reset password</p>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan Email">

                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror

                <button type="submit" class="login-btn">
                    Kirim Link Reset Password
                </button>

                <div class="register-text">
                    Sudah ingat password?
                    <a href="{{ route('login') }}" class="register-link">
                        Login
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
