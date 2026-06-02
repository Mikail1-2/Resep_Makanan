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
    <link rel="stylesheet" href="{{ asset('frontend/css/beranda-admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="{{ route('backend.beranda') }}">
                        Dashboard
                    </a>
                </li>
                <li>

                    <a href="{{ route('backend.approval') }}">

                        Approved Recipe

                    </a>

                </li>

                <li>

                    <a href="#">

                        Manage Recipe

                    </a>

                </li>

                <li>

                    <a href="#">

                        Manage User

                    </a>

                </li>

            </ul>

        </aside>

        <main class="main-content">
            {{-- TOPBAR CUMA MUNCUL KALAU RUTE SAAT INI ADALAH 'backend.beranda' --}}
            @if(Request::route()->getName() == 'backend.beranda')

                <div class="topbar">
                    <h1>Food Dashboard</h1>

                    <div class="topbar-action">

                        <a href="{{ route('frontend.profile') }}" class="profile-btn" style="text-decoration:none;">

                            Profile

                        </a>

                        <form action="{{ route('logout') }}" method="POST" style="margin:0;">

                            @csrf

                            <button class="logout-btn">

                                Logout

                            </button>

                        </form>

                    </div>
                </div>

            @endif

            <div class="content" style="padding-top: 20px;">
                @yield('content')
            </div>

        </main>

    </div>
    <script src="{{ asset('frontend/js/dropdown.js') }}"></script>
</body>

</html>