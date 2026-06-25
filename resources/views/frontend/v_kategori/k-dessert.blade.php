@extends('frontend.v_layouts.app')

{{-- TITIP CSS KHUSUS HALAMAN DESSERT --}}
@push('styles')
    {{-- Catatan: Kalau gaya tampilannya sama persis, kamu bisa tetap memanggil makanan.css di sini.
    Tapi kalau kamu bikin file CSS khusus, biarkan mengarah ke dessert.css --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/makanan.css') }}?v={{ time() }}">
@endpush

@section('content')
    <div class="kategori-container">
        <h2>Resep Dessert</h2>

        <div class="recipe-grid">
            @foreach($recipes as $resep)
                <div class="recipe-card">

                    {{-- 1. Gambar dibungkus tag <a> agar bisa diklik dan pindah halaman --}}
                        <a href="{{ route('resep.detail', $resep->id) }}">
                            <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}"
                                class="recipe-image">
                        </a>

                        <div class="recipe-info">
                            {{-- 2. Nama Resep --}}
                            <h3 class="recipe-title">{{ $resep->recipe_name }}</h3>

                            {{-- Tags --}}
                            <div class="recipe-tags" style="display:flex; flex-wrap:wrap; gap:6px; margin-top:4px;">
                                @foreach($resep->tags as $tag)
                                    <span class="tag-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>

                </div>
            @endforeach
        </div>

        @if($recipes->isEmpty())
            <p class="empty-message">Belum ada resep dessert yang ditambahkan.</p>
        @endif
    </div>
@endsection