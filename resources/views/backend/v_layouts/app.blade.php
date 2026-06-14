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
    @stack('styles')
</head>

<body>
    <div class="container">

        <aside class="sidebar">

            <a class="logo" href="{{ route('backend.beranda') }}">
                <img src="{{ asset('image/Logo.png') }}" alt="Logo Resepku" class="logo-img">
                <h2>Resepku</h2>
            </a>

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

                    <a href="{{ route('manage-user.index') }}">

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
    <script src="{{ asset('frontend/js/dropdown.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success', // Ini yang bikin gambar ceklis hijau
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#ff8c42', // Warna tombol disamakan dengan tema DAA
                timer: 3000 // Otomatis hilang dalam 3 detik (opsional)
            });
        </script>
    @endif

</body>

</html>