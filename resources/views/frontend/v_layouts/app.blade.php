<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resepku</title>
    <link rel="icon" type="image/png" href="{{ asset('image/Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- INI DIA COLOKAN AJAIBNYA! --}}
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
                    <a href="{{ route('web.utama') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('publik.recipe') }}">Resep</a>
                </li>
                <li class="category-wrapper">

                    <div class="category-toggle">
                        Kategori ▼
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
                            <a href="{{ route('frontend.create') }}">Buat Resep</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.myrecipe') }}">Resepku</a>
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
                    <h1>Dashboard Resepku</h1>

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

    <footer class="footer">

        <div class="footer-container">

            <div class="footer-col">

                <div class="footer-logo">

                    <img src="{{ asset('image/Logo.png') }}" alt="Resepku">

                    <h3>Resepku</h3>

                </div>

                <p>
                    Temukan resep-resep lezat, bagikan ide memasak Anda, dan inspirasi orang lain melalui kreasi kuliner Anda.
                </p>

            </div>

            <div class="footer-col">

                <h4>Quick Links</h4>

                <ul>
                    <li>
                        <a href="{{ route('web.utama') }}">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('publik.recipe') }}">
                            Resep
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('frontend.create') }}">
                                Buat Resep
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('frontend.myrecipe') }}">
                                Resepku
                            </a>
                        </li>
                    @endauth

                </ul>

            </div>

            <div class="footer-col">

                <h4>Kategori</h4>

                <ul>

                    <li>
                        <a href="{{ route('publik.makanan') }}">
                            Makanan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('publik.minuman') }}">
                            Minuman
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('publik.dessert') }}">
                            Desserts
                        </a>
                    </li>

                </ul>

            </div>

            <div class="footer-col">

                <h4>Ikuti Kami</h4>

                <div class="footer-social">

                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-youtube"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-tiktok"></i>
                    </a>

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            © {{ date('Y') }} Resepku. All Rights Reserved.

        </div>

    </footer>
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