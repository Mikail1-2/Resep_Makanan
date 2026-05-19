<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody Dashboard</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="container">

        <aside class="sidebar">

            <div class="logo">
                <h2>Foody.</h2>
            </div>

            <ul>
                <li class="active">Dashboard</li>
                <li>Recipes</li>
                <li>Categories</li>
                <li>Analytics</li>
                <li>Settings</li>
            </ul>

        </aside>

        <main class="main-content">

            <div class="topbar">
                <h1>Food Dashboard</h1>
                @guest
                <a href="{{ route('backend.login') }}" class="profile-btn">
                    Login
                </a>
                @endguest

                @auth
                <a href="{{ route('backend.profile') }}" class="profile-btn">
                    Profile
                </a>

                <form action="{{ route('backend.logout') }}" method="POST">
                    @csrf
                    <button class="logout-btn">Logout</button>
                @endauth
                </form>
            </div>

            @yield('content')

        </main>

    </div>

</body>

</html>