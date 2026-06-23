@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/show.css') }}">
@endpush

@section('content')

    <div class="recipe-detail-container">

        <a href="{{ route('frontend.myrecipe') }}" class="back-btn">
            ← Back to My Recipes
        </a>

        <div class="recipe-card">

            <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" class="recipe-image">

            <div class="recipe-info">

                <h1>{{ $recipe->recipe_name }}</h1>

                @if($recipe->status == 'approved')

                    <div class="status approved">
                        ✅ Approved
                    </div>

                @elseif($recipe->status == 'pending')

                    <div class="status pending">
                        ⏳ Pending Review
                    </div>

                @else

                    <div class="status rejected">
                        ❌ Rejected
                    </div>

                @endif

            </div>

        </div>

        @if($recipe->status == 'rejected')

            <div class="reject-box">

                <h3>Rejection Notes</h3>

                <p>{{ $recipe->reject_reason }}</p>

            </div>

        @endif

        <div class="section">

            <h2>Ingredients</h2>

            <div class="content-box">

                {!! nl2br(e($recipe->ingredients)) !!}

            </div>

        </div>

        <div class="section">

            <h2>Instructions</h2>

            <div class="content-box">

                {!! nl2br(e($recipe->instructions)) !!}

            </div>

        </div>

        <div class="action-buttons">

            @if($recipe->status == 'rejected')

                <a href="{{ route('frontend.recipe.edit', $recipe->id) }}" class="edit-btn">

                    Edit Recipe

                </a>

            @endif

        </div>

    </div>

@endsection