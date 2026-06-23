<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody Dashboard</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @stack('styles')
</head>

<body>

    <div class="container">

        <aside class="sidebar">

            <a class="logo" href="{{ route('web.utama') }}">
                <img src="{{ asset('image/Logo.png') }}" alt="Logo Resepku" class="logo-img">
                <h2>Resepku</h2>
            </a>

            <ul>

                <li>
                    <a href="{{ route('web.utama') }}">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('publik.recipe') }}">
                        Recipes
                    </a>
                </li>

                <li class="category-wrapper">

                    <div class="category-toggle">
                        Categories ▼
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
                    <a href="{{ route('frontend.create') }}">
                        Create Recipe
                    </a>
                </li>

                <li>
                    <a href="{{ route('frontend.myrecipe') }}">
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

            @if(Request::route()->getName() == 'web.utama')

            <div class="topbar">

                <h1>Food Dashboard</h1>

                <div class="topbar-action">

                    @guest

                    <a href="{{ route('login') }}" class="profile-btn">
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

                        <button class="logout-btn">
                            Logout
                        </button>

                    </form>

                    @endauth

                </div>

            </div>

            @endif

            <div class="content-wrapper">

                <div class="content">

                    @yield('content')

                </div>

            </div>

            <footer class="footer">

                <div class="footer-content">

                    <div class="footer-brand">

                        <img src="{{ asset('image/Logo.png') }}" alt="Resepku Logo">

                        <h2>Resepku</h2>

                        <p>
                            Discover delicious recipes and share your culinary creations
                            with food lovers around the world.
                        </p>

                    </div>

                    <div class="footer-column">

                        <h4>Explore</h4>

                        <a href="{{ route('web.utama') }}">
                            Home
                        </a>

                        <a href="{{ route('publik.recipe') }}">
                            Recipes
                        </a>

                    </div>

                    <div class="footer-column">

                        <h4>Categories</h4>

                        <a href="{{ route('publik.makanan') }}">
                            Food
                        </a>

                        <a href="{{ route('publik.minuman') }}">
                            Drinks
                        </a>

                        <a href="{{ route('publik.dessert') }}">
                            Dessert
                        </a>

                    </div>

                    <div class="footer-column">

                        <h4>Follow Us</h4>

                        <a href="#">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>

                        <a href="#">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>

                        <a href="#">
                            <i class="fab fa-youtube"></i> YouTube
                        </a>

                    </div>

                </div>

                <div class="footer-bottom">

                    © {{ date('Y') }} Resepku. All Rights Reserved.

                </div>

            </footer>

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/js/dropdown.js') }}"></script>

    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#ff8c42'
            });
        });
    </script>
    @endif

    @stack('scripts')

</body>

</html>