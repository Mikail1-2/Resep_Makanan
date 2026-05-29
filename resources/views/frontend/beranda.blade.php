@extends('frontend.layouts.app')

{{-- Kita pinjam CSS makanan.css agar bentuk grid kartunya seragam dan rapi --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/makanan.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="beranda-container">
    
    {{-- 1. BANNER SELAMAT DATANG --}}
    <div class="welcome-banner" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 40px 20px; border-radius: 12px; margin-bottom: 30px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Selamat Datang di Resepku! 🍲</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Temukan inspirasi masakan harianmu atau bagikan resep andalanmu di sini.</p>
    </div>

    {{-- 2. DAFTAR RESEP TERBARU --}}
    <h2 style="margin-bottom: 20px; color: #333; border-left: 4px solid #3498db; padding-left: 10px;">Resep Terbaru</h2>

    <div class="recipe-grid">
        {{-- Melakukan perulangan untuk menampilkan resep dari database --}}
        @forelse($resep_terbaru as $resep)
            <div class="recipe-card">
                
                {{-- Gambar yang bisa diklik menuju detail resep --}}
                <a href="{{ route('resep.detail', $resep->id) }}">
                    <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}" class="recipe-image">
                </a>
                
                <div class="recipe-info">
                    <h3 class="recipe-title">{{ $resep->recipe_name }}</h3>
                    <p class="recipe-publisher">Oleh: {{ $resep->user->nama ?? 'Anonim' }}</p>
                    
                    <div class="recipe-stats">
                        {{-- Menampilkan asal kategori resepnya --}}
                        <span class="stat-item">📂 {{ $resep->kategori->nama_kategori ?? 'Umum' }}</span>
                    </div>
                </div>

            </div>
        @empty
            {{-- Pesan ini muncul kalau database resep masih kosong --}}
            <p class="empty-message">Belum ada resep yang dibagikan. Yuk login dan jadi yang pertama!</p>
        @endforelse
    </div>

</div>
@endsection