@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/show.css') }}">
@endpush

@section('content')

<div class="recipe-detail-container">

    <a href="{{ route('frontend.myrecipe') }}" class="back-btn">← Kembali</a>

    <div class="recipe-card">
        <div class="recipe-info">
            <h1>{{ $recipe->recipe_name }}</h1>

            @if($recipe->status == 'approved')
                <div class="status approved">✅ Disetujui</div>
            @elseif($recipe->status == 'pending')
                <div class="status pending">⏳ Tertunda</div>
            @else
                <div class="status rejected">❌ Ditolak</div>
            @endif
        </div>

        <img src="{{ asset('uploads/recipes/' . $recipe->image) }}"
            class="recipe-image" alt="{{ $recipe->recipe_name }}">
    </div>

    @if($recipe->status == 'rejected')
        <div class="reject-box">
            <h3>Catatan Penolakan</h3>
            <p>{{ $recipe->reject_reason }}</p>
        </div>
    @endif

    @if($recipe->description)
        <div class="section">
            <h2>Deskripsi</h2>
            <div class="content-box">
                {!! $recipe->description !!}
            </div>
        </div>
    @endif

    <div class="section">
        <h2>Bahan-Bahan</h2>
        <div class="content-box">
            <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
        </div>
    </div>

    <div class="section">
        <h2>Cara Membuat</h2>
        <div class="content-box">
            <p>{!! nl2br(e($recipe->instructions)) !!}</p>
        </div>
    </div>

    <div class="action-buttons">
        @if($recipe->status == 'rejected')
            <a href="{{ route('frontend.recipe.edit', $recipe->id) }}" class="edit-btn">
                Edit Resep
            </a>
        @endif
    </div>

</div>

@endsection