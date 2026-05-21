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
                <h2>Resepku</h2>
            </div>

            <ul>
                <li>
                    <a href="{{ route('backend.beranda') }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.recipe') }}">
                        Recipes
                    </a>
                </li>

                @auth

                    @if(Auth::user()->role == '0')

                        <li>
                            <a href="{{ route('backend.create') }}">
                                Create Recipe
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                My Recipes
                            </a>
                        </li>

                    @endif

                    @if(Auth::user()->role == '1')

                        <li>
                            <a href="#">
                                Recipes Approval
                            </a>
                        </li>

                    @endif

                @endauth
            </ul>

        </aside>

        <main class="main-content">

            @if(Request::route()->getName() == 'backend.beranda')
            
                <div class="topbar">
                    <h1>Food Dashboard</h1>

                    <div class="topbar-action">
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
                            </form>
                        @endauth
                    </div>
                </div>

            @endif

            @yield('content')

        </main>

    </div>

</body>

</html>