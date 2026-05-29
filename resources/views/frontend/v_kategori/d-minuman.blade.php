@extends('frontend.v_layouts.app')
@section('content')
<div class="detail-container" style="padding: 20px; background: #fff; border-radius: 10px; margin-top: 20px; border-top: 5px solid #3498db;">
    
    {{-- Tombol Kembali --}}
    <a href="{{ url()->previous() }}" style="display: inline-block; margin-bottom: 20px; text-decoration: none; color: #3498db; font-weight: bold;">
        ⬅ Kembali ke Kategori
    </a>

    {{-- Judul dan Gambar --}}
    <h1 style="margin-bottom: 10px; color: #2c3e50;">{{ $resep->recipe_name }} 🧊</h1>
    <p style="color: #888; margin-bottom: 20px;">Oleh: {{ $resep->user->nama ?? 'Anonim' }}</p>
    
    <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}" style="width: 100%; max-width: 600px; border-radius: 10px; margin-bottom: 25px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

    {{-- Bahan-bahan (Dengan background kebiruan segar) --}}
    <h3 style="color: #3498db; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px;">Bahan-bahan:</h3>
    <div style="background: #e4fdcc; padding: 18px; border-radius: 8px; margin-bottom: 25px; line-height: 1.6;">
        <p>{!! nl2br(e($resep->ingredients)) !!}</p>
    </div>

    {{-- Cara Membuat --}}
    <h3 style="color: #3498db; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px;">Cara Membuat:</h3>
    <div style="background: #f9f9f9; padding: 18px; border-radius: 8px; line-height: 1.6;">
        <p>{!! nl2br(e($resep->instructions)) !!}</p>
    </div>

</div>
@endsection