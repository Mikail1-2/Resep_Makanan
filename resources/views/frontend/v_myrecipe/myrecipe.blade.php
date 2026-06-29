@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/myrecipe.css') }}">
@endpush

@section('content')

    <div class="myrecipe-header">

        <h2>Resepku</h2>

        <p>
            Kelola semua resep yang telah Anda kirimkan.
        </p>

    </div>

    {{-- PENDING --}}
    @if($pendingRecipes->count())

        <h3 class="section-title">
            Resep yang Menunggu Persetujuan
        </h3>

        <div class="recipe-grid">

            @foreach($pendingRecipes as $recipe)

                <div class="recipe-card">

                    <a href="{{ route('frontend.myrecipe.show', $recipe->id) }}">

                        <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" alt="{{ $recipe->recipe_name }}">

                    </a>

                    <div class="recipe-content">

                        <h3>
                            {{ $recipe->recipe_name }}
                        </h3>

                        <p class="category">
                            {{ $recipe->kategori->name }}
                        </p>

                        <span class="status pending">
                            Tertunda
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    {{-- REJECTED --}}
    @if($rejectedRecipes->count())

        <h3 class="section-title">
            Resep yang Ditolak
        </h3>

        <div class="recipe-grid">

            @foreach($rejectedRecipes as $recipe)

                <div class="recipe-card">

                    <a href="{{ route('frontend.myrecipe.show', $recipe->id) }}">

                        <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" alt="{{ $recipe->recipe_name }}">

                    </a>

                    <div class="recipe-content">

                        <h3>
                            {{ $recipe->recipe_name }}
                        </h3>

                        <p class="category">
                            {{ $recipe->kategori->name }}
                        </p>

                        <span class="status rejected">
                            Ditolak
                        </span>

                        <p class="reject-note">
                            {{ Str::limit($recipe->reject_reason, 80) }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    {{-- APPROVED --}}
    @if($approvedRecipes->count())

        <h3 class="section-title">
            Resep yang Disetujui
        </h3>

        <div class="recipe-grid">

            @foreach($approvedRecipes as $recipe)

                <div class="recipe-card">

                    <a href="{{ route('frontend.myrecipe.show', $recipe->id) }}">

                        <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" alt="{{ $recipe->recipe_name }}">

                    </a>

                    <div class="recipe-content">

                        <h3>
                            {{ $recipe->recipe_name }}
                        </h3>

                        <p class="category">
                            {{ $recipe->kategori->name }}
                        </p>

                        <span class="status approved">
                            Disetujui
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    @if(
            !$pendingRecipes->count() &&
            !$rejectedRecipes->count() &&
            !$approvedRecipes->count()
        )

        <div class="empty-state">

            <h3>Belum Ada Resep</h3>

            <p>
                Anda belum mengirimkan resep apa pun.
            </p>

        </div>

    @endif

@endsection