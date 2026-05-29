<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resepku - Temukan Resep Favoritmu!</title>

    {{-- Kasih time() biar kebal dari cache browser --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}?v={{ time() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- COLOKAN AJAIB UNTUK CSS TAMBAHAN --}}
    @stack('styles')
</head>

<body>
    <div class="container">

        {{-- SIDEBAR PUBLIK & USER --}}
        <aside class="sidebar">
            <div class="logo">
                <h2>Resepku</h2>
            </div>

            <ul>
                {{-- 1. MENU UMUM: Bisa dilihat tamu dan semua role --}}
                <li>
                    <a href="{{ route('beranda.publik') }}">Dashboard</a>
                </li>
                
                {{-- SEKARANG MENU RECIPES BISA DILIHAT TAMU --}}
                <li>
                    <a href="{{ route('backend.recipe') }}">Recipes</a>
                </li>
                
                {{-- 2. MENU KATEGORI UMUM --}}
                <li class="category-wrapper">
                    <div class="category-toggle">
                        Categories
                    </div>
                    <div class="subcategory">
                        <a href="{{ route('publik.makanan') }}">Makanan</a>
                        <a href="{{ route('publik.minuman') }}">Minuman</a>
                        <a href="{{ route('publik.dessert') }}">Dessert</a>
                    </div>
                </li>

                {{-- 3. MENU KHUSUS ROLE 1 (ADMIN) --}}
                @auth
                    @if(Auth::user()->role == '1')
                        {{-- Disembunyikan dulu sementara waktu --}}
                        {{-- <li><a href="#">Menu Admin (Coming Soon)</a></li> --}}
                    @endif
                @endauth
            </ul>
        </aside>

        <main class="main-content">
            
            {{-- TOPBAR PUBLIK --}}
            <div class="topbar">
                <h1>Food Dashboard</h1>
                
                <div class="topbar-action" style="display: flex; gap: 15px; align-items: center;">
                    
                    {{-- Tombol Login & Register untuk Tamu --}}
                    @guest
                        <a href="{{ route('login') }}" class="profile-btn" style="text-decoration: none;">Login</a>
                        <a href="{{ route('register') }}" class="profile-btn" style="text-decoration: none;">Register</a>
                    @endguest

                    {{-- Tombol Logout untuk yang sudah Login --}}
                    @auth
                        <form action="{{ route('backend.logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button class="logout-btn">Logout</button>
                        </form>
                    @endauth

                </div>
            </div>

            {{-- AREA KONTEN --}}
            <div class="content" style="padding-top: 20px;">
                @yield('content')
            </div>

        </main>

    </div>
    <script src="{{ asset('frontend/js/dropdown.js') }}"></script>
</body>

</html>