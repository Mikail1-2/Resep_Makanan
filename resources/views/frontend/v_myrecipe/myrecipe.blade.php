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

    <div class="recipe-grid">

        @foreach($recipes as $recipe)

            <div class="recipe-card">
                <a href="{{ route('resep.detail', $recipe->id) }}">
                    <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" alt="{{ $recipe->recipe_name }}">
                </a>
                <div class="recipe-content">

                    <h3>
                        {{ $recipe->recipe_name }}
                    </h3>

                    <p class="category">
                        {{ $recipe->kategori->name }}
                    </p>

                    @if($recipe->status == 'approved')

                        <span class="status approved">
                            Approved
                        </span>

                    @elseif($recipe->status == 'pending')

                        <span class="status pending">
                            Pending
                        </span>

                    @else

                        <span class="status rejected">
                            Rejected
                        </span>

                        <p class="reject-note">
                            {{ $recipe->reject_reason }}
                        </p>

                    @endif

                </div>

            </div>

        @endforeach

    </div>

@endsection