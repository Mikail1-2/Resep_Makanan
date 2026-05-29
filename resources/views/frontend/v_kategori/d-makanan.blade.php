@extends('frontend.v_layouts.app')
@section('content')
<div class="detail-container" style="padding: 20px; background: #fff; border-radius: 10px; margin-top: 20px;">
    
    {{-- Tombol Kembali --}}
    <a href="{{ url()->previous() }}" style="display: inline-block; margin-bottom: 20px; text-decoration: none; color: #3498db;">
        ⬅ Kembali
    </a>

    {{-- Judul dan Gambar --}}
    <h1 style="margin-bottom: 15px;">{{ $resep->recipe_name }}</h1>
    <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}" style="width: 100%; max-width: 600px; border-radius: 10px; margin-bottom: 20px;">

    {{-- Bahan-bahan --}}
    <h3>Bahan-bahan:</h3>
    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        {{-- Karena biasanya bahan pakai enter, kita pakai nl2br biar enternya terbaca --}}
        <p>{!! nl2br(e($resep->ingredients)) !!}</p>
    </div>

    {{-- Cara Membuat --}}
    <h3>Cara Membuat:</h3>
    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px;">
        <p>{!! nl2br(e($resep->instructions)) !!}</p>
    </div>

</div>
@endsection