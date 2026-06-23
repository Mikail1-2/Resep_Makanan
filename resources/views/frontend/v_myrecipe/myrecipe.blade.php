@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/myrecipe.css') }}">
@endpush

@section('content')

    <div class="myrecipe-header">

        <h2>My Recipes</h2>

        <p>
            Manage all recipes you have submitted.
        </p>

    </div>

    {{-- PENDING --}}
    @if($pendingRecipes->count())

        <h3 class="section-title">
            Pending Recipes
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
                            Pending
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    {{-- REJECTED --}}
    @if($rejectedRecipes->count())

        <h3 class="section-title">
            Rejected Recipes
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
                            Rejected
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
            Approved Recipes
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
                            Approved
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

            <h3>No Recipes Yet</h3>

            <p>
                You haven't submitted any recipes yet.
            </p>

        </div>

    @endif

@endsection