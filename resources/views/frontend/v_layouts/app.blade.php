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

    {{-- INI DIA COLOKAN AJAIBNYA! --}}
    @stack('styles')
</head>

<body>
    <div class="container">

        <aside class="sidebar">

            <div class="logo">
                <h2>Resepku</h2>
            </div>

            <ul>
                <li>
                    <a href="{{ route('web.utama') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('publik.recipe') }}">Recipes</a>
                </li>
                <li class="category-wrapper">

                    <div class="category-toggle">
                        Categories
                    </div>

                    <div class="subcategory">

                        <a href="{{ route('publik.makanan') }}">
                            Makanan
                        </a>

                        <a href="{{ route('publik.minuman') }}">
                            Minuman
                        </a>

                        <a href="{{ route('publik.dessert') }}">
                            Dessert
                        </a>

                    </div>

                </li>
                @auth

                    @if(Auth::user()->role == '0')
                        <li>
                            <a href="{{ route('frontend.create') }}">Create Recipe</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.myrecipe') }}">My Recipes</a>
                        </li>
                    @endif

                    @if(Auth::user()->role == '1')
                        <li>
                            <a href="#">Recipes Approval</a>
                        </li>
                    @endif

                @endauth
            </ul>

        </aside>

        <main class="main-content">
            {{-- TOPBAR CUMA MUNCUL KALAU RUTE SAAT INI ADALAH 'backend.beranda' --}}
            @if(Request::route()->getName() == 'web.utama')

                <div class="topbar">
                    <h1>Food Dashboard</h1>

                    <div class="topbar-action" style="display: flex; gap: 15px; align-items: center;">

                        @guest
                            <a href="{{ route('login') }}" class="profile-btn" style="text-decoration: none;">
                                Login
                            </a>
                        @endguest

                        @auth

                            <a href="{{ route('frontend.profile') }}" class="navbar-profile">

                                @if(Auth::user()->foto)

                                    <img src="{{ asset('uploads/profile/' . Auth::user()->foto) }}" class="topbar-avatar">

                                @else

                                    <div class="navbar-avatar-letter">
                                        {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                                    </div>

                                @endif

                            </a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="logout-btn">Logout</button>
                            </form>

                        @endauth
                    </div>
                </div>

            @endif

            <div class="content" style="padding-top: 20px;">
                @yield('content')
            </div>

        </main>

    </div>
    <script src="{{ asset('frontend/js/dropdown.js') }}"></script>
    @stack('scripts')
</body>

</html>