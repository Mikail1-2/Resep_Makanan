@extends('frontend.v_layouts.app')

@section('content')

<div class="topbar">
    <h1>Resepku</h1>
</div>

<div class="search-filter-container">
    <form action="{{ route('web.utama') }}" method="GET" class="search-form"
        style="display:flex;gap:10px;align-items:center;">

        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari resep makanan..." class="search-input">

        <div class="dropdown-check-list" tabindex="100">
            <span class="anchor" onclick="toggleDropdown()">
                Pilih Tag...
            </span>
            <ul id="list-items" class="items" style="display:none;list-style:none;padding:0;margin:0;">
                @foreach($tags as $t)
                    <li>
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $t->name }}"
                                {{ in_array($t->name, (array) request('tags')) ? 'checked' : '' }}>
                            {{ $t->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <button type="submit" class="search-btn">Cari</button>

         @if(request('search') || request('tags'))
                <a href="{{ route('web.utama') }}" class="search-btn" style="
                                            background:#e74c3c;
                                            color:white;
                                            text-decoration:none;
                                            padding:10px;
                                            border-radius:5px;
                                        ">
                    Reset
                </a>
            @endif


    </form>  {{-- ← DITUTUP DI SINI --}}
</div>   {{-- ← DITUTUP DI SINI --}}

<div class="recipes">
    @foreach($recipes as $data)
        <a href="{{ route('resep.detail', $data->id) }}" style="text-decoration:none; color:inherit;">
            <div class="recipe-card">
                <img src="{{ asset('uploads/recipes/' . $data->image) }}" alt="{{ $data->recipe_name }}">
                <div class="recipe-content">
                    <h3>{{ $data->recipe_name }}</h3>
                    <div class="recipe-tags" style="display:flex; flex-wrap:wrap; gap:8px; margin-top:10px;">
                        @foreach($data->tags as $tag)
                            <span class="tag-green">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>

<script>
function toggleDropdown() {
    var ul = document.getElementById('list-items');
    ul.style.display = ul.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
    var dropdown = document.querySelector('.dropdown-check-list');
    if (!dropdown.contains(e.target)) {
        document.getElementById('list-items').style.display = 'none';
    }
});
</script>
@endsection