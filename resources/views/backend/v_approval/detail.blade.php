@extends('backend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/approval-detail.css') }}">
@endpush

@section('content')

    <div class="detail-card">

        <div class="detail-header">

            <h2>{{ $recipe->recipe_name }}</h2>

            <a href="{{ route('backend.approval') }}" class="back-btn">
                ← Back
            </a>

        </div>

        <div class="recipe-info">

            <p>
                <strong>Category :</strong>
                {{ $recipe->kategori->name }}
            </p>

            <p>
                <strong>Submitted By :</strong>
                {{ $recipe->user->nama }}
            </p>

        </div>

        <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" class="recipe-image">

        <div class="recipe-section">

            <h3>Ingredients</h3>

            <div class="recipe-content">
                {!! nl2br(e($recipe->ingredients)) !!}
            </div>

        </div>

        <div class="recipe-section">

            <h3>Instructions</h3>

            <div class="recipe-content">
                {!! nl2br(e($recipe->instructions)) !!}
            </div>

        </div>

    </div>

@endsection