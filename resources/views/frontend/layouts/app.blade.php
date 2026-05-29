<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resepku - Temukan Resep Favoritmu!</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- COLOKAN AJAIB UNTUK CSS TAMBAHAN --}}
    @stack('styles')
</head>

<body>
    <div class="container">

        {{-- SIDEBAR PUBLIK (Lebih Bersih Tanpa Menu Admin) --}}
        <aside class="sidebar">
            <div class="logo">
                <h2>Resepku</h2>
            </div>

            <ul>
                <li>
                    <a href="{{ route('beranda.publik') }}">Beranda</a>
                </li>
                
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

                {{-- Kalau user sudah login (Admin), kasih jalan pintas ke Dashboard Backend --}}
                @auth
                    <li style="margin-top: 20px;">
                        <a href="{{ route('backend.beranda') }}" style="color: #3498db; font-weight: bold;">➡️ Masuk Dashboard</a>
                    </li>
                @endauth
            </ul>
        </aside>

        <main class="main-content">
            
            {{-- TOPBAR PUBLIK --}}
            <div class="topbar">
                <h1>Jelajahi Resep Nusantara</h1>

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