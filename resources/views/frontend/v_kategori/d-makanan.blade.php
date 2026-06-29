@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail.css') }}">
@endpush

@section('content')
<div class="detail-container">

    <a href="{{ url()->previous() }}" class="back-btn">⬅ Kembali</a>

    <h1>{{ $resep->recipe_name }}</h1>

    <img src="{{ asset('uploads/recipes/' . $resep->image) }}"
        alt="{{ $resep->recipe_name }}" class="detail-image">

    @if($resep->description)
    <div class="detail-section">
        <h3>Deskripsi:</h3>
        <div class="detail-box">
            {!! $resep->description !!}
        </div>
    </div>
    @endif

    <div class="detail-section">
        <h3>Bahan-bahan:</h3>
        <div class="detail-box">
            <p>{!! nl2br(e($resep->ingredients)) !!}</p>
        </div>
    </div>

    <div class="detail-section">
        <h3>Cara Membuat:</h3>
        <div class="detail-box">
            <p>{!! nl2br(e($resep->instructions)) !!}</p>
        </div>
    </div>

</div>
@endsection