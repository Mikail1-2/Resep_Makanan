@extends('frontend.v_layouts.app')
{{-- TITIP CSS KHUSUS HALAMAN MAKANAN --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/makanan.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="kategori-container">
    <h2>Resep Makanan</h2>
    
    <div class="recipe-grid">
        @foreach($recipes as $resep)
            <div class="recipe-card">
                
                {{-- 1. Gambar dibungkus tag <a> agar bisa diklik dan pindah halaman --}}
                <a href="{{ route('resep.detail', $resep->id) }}">
                    <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}" class="recipe-image">
                </a>
                
                <div class="recipe-info">
                    {{-- 2. Nama Resep --}}
                    <h3 class="recipe-title">{{ $resep->recipe_name }}</h3>
                    
                    {{-- 3. Nama Publisher --}}
                    <p class="recipe-publisher">Oleh: {{ $resep->user->nama ?? 'Anonim' }}</p>
                </div   >

            </div>
        @endforeach
    </div>

    @if($recipes->isEmpty())
        <p class="empty-message">Belum ada resep makanan yang ditambahkan.</p>
    @endif
</div>
@endsection