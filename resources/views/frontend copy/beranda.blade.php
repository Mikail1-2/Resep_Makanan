@extends('frontend.layouts.app')

@section('content')
{{-- KITA TANAM CSS DISINI BIAR NGGAK ADA ALASAN CACHE NYANGKUT --}}
<style>
    .stats-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
        gap: 20px; 
        margin-bottom: 30px; 
    }
    .stat-box { 
        background-color: #ffffff; 
        padding: 20px; 
        border-radius: 12px; 
        box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
        border: 1px solid #eee;
    }
    .stat-box .title { 
        font-size: 13px; 
        color: #777; 
        font-weight: 600; 
        margin-bottom: 8px; 
        display: block; 
    }
    .stat-box .number { 
        font-size: 28px; 
        color: #111; 
        font-weight: 700; 
        margin: 0; 
    }
    
    .recipe-grid-home { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr); 
        gap: 25px; 
    }
    .recipe-card-home { 
        background: #ffffff; 
        border-radius: 16px; 
        overflow: hidden; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
        transition: transform 0.2s ease; 
        text-decoration: none; 
        color: inherit; 
        display: block; 
        border: 1px solid #eee;
    }
    .recipe-card-home:hover { 
        transform: translateY(-5px); 
    }
    .recipe-card-home img { 
        width: 100%; 
        height: 200px; 
        object-fit: cover; 
        border-bottom: 1px solid #f0f0f0; 
    }
    
    .recipe-info-home { 
        padding: 20px; 
    }
    .recipe-info-home h4 { 
        font-size: 16px; 
        font-weight: 700; 
        color: #111; 
        margin: 0 0 8px 0; 
    }
    .recipe-info-home p { 
        font-size: 13px; 
        color: #888; 
        margin: 0; 
        line-height: 1.5; 
        display: -webkit-box; 
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical; 
        overflow: hidden; 
    }
</style>

<div class="beranda-container">
    
    {{-- BARISAN KOTAK STATISTIK --}}
    <div class="stats-grid">
        <div class="stat-box">
            <span class="title">Total Recipes</span>
            <h3 class="number">{{ $total_resep ?? 0 }}</h3>
        </div>
        <div class="stat-box">
            <span class="title">Categories</span>
            <h3 class="number">{{ $total_kategori ?? 0 }}</h3>
        </div>
        <div class="stat-box">
            <span class="title">Visitors</span>
            <h3 class="number">24K</h3>
        </div>
        <div class="stat-box">
            <span class="title">Comments</span>
            <h3 class="number">842</h3>
        </div>
    </div>

    {{-- BARISAN KARTU RESEP --}}
    <div class="recipe-grid-home">
        @if(isset($resep_terbaru) && count($resep_terbaru) > 0)
            @foreach($resep_terbaru as $resep)
                <a href="{{ route('resep.detail', $resep->id) }}" class="recipe-card-home">
                    <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}">
                    <div class="recipe-info-home">
                        <h4>{{ $resep->recipe_name }}</h4>
                        <p>{{ Str::limit(strip_tags($resep->instructions), 60) }}</p>
                    </div>
                </a>
            @endforeach
        @else
            <p>Belum ada resep yang ditampilkan.</p>
        @endif
    </div>

</div>
@endsection