@extends('frontend.v_layouts.app')
{{-- TITIP CSS: Kita bisa pakai file CSS yang sama dengan makanan biar nggak capek bikin dua kali --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/makanan.css') }}?v={{ time() }}">
@endpush

@section('content')
    <div class="kategori-container">
        <h2>Resep Minuman </h2>

        <div class="recipe-grid">
            @foreach($recipes as $resep)
                <div class="recipe-card">

                    {{-- Gambar dibungkus tag <a> agar bisa diklik ke halaman detail --}}
                        <a href="{{ route('resep.detail', $resep->id) }}">
                            <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}"
                                class="recipe-image">
                        </a>

                        <div class="recipe-info">
                            {{-- Nama Resep --}}
                            <h3 class="recipe-title">{{ $resep->recipe_name }}</h3>

                            {{-- Tags --}}
                            <div class="recipe-tags" style="display:flex; flex-wrap:wrap; gap:6px; margin-top:4px;">
                                @foreach($resep->tags as $tag)
                                    <span class="tag-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
            @endforeach
            </div>

            @if($recipes->isEmpty())
                <p class="empty-message">Belum ada resep minuman yang ditambahkan.</p>
            @endif
        </div>
@endsection