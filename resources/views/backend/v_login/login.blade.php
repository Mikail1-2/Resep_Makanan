<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
</head>

<body>

    <div class="login-container">
        <div class="login-card">

            <div class="logo">
                <h2>Foody</h2>
                <p>Login untuk mengakses dashboard resep makanan</p>
            </div>

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('backend.login') }}" method="post">
                @csrf

                <label>Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">

                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror

                <label>Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan Password">

                @error('password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror

                <div class="forgot-wrapper">
                    <a href="#" class="forgot-link">
                        Forgot Password?
                    </a>
                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>

                <div class="register-text">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="register-link">
                        Create Account
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>