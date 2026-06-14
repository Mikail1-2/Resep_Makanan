{{-- 1. WAJIB ADA: Ini yang memanggil layout dan semua CSS kamu --}}
@extends('frontend.v_layouts.app')

@section('content')

    <div class="topbar">
        <h1>Resepku</h1>
    </div>

    {{-- 2. Kodingan recipes-nya taruh di dalam sini --}}
    <div class="recipes">

        @foreach($recipes as $data)

            <a href="{{ route('resep.detail', $data->id) }}" style="text-decoration:none; color:inherit;">

                <div class="recipe-card">

                    <img src="{{ asset('uploads/recipes/' . $data->image) }}" alt="{{ $data->recipe_name }}">

                    <div class="recipe-content">

                        <h3>{{ $data->recipe_name }}</h3>

                        <div class="recipe-tags" style="display:flex; flex-wrap:wrap; gap:8px; margin-top:10px;">

                            @foreach($data->tags as $tag)
                                <span class="tag-green">
                                    {{ $tag->name }}
                                </span>
                            @endforeach

                        </div>

                    </div>

                </div>

            </a>

        @endforeach

    </div>

    {{-- 3. WAJIB ADA: Penutup --}}
@endsection