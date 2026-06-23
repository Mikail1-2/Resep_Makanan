@extends('frontend.v_layouts.app')

@section('content')

    <div class="banner-slider">

        <div class="slider-wrapper" id="sliderWrapper">

            <div class="slide">
                <img src="{{ asset('image/banner1.jpeg') }}" alt="Banner 1">
            </div>

            <div class="slide">
                <img src="{{ asset('image/banner2.jpeg') }}" alt="Banner 2">
            </div>

            <div class="slide">
                <img src="{{ asset('image/banner3.jpeg') }}" alt="Banner 3">
            </div>

        </div>

        <button class="slider-btn prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="slider-btn next" onclick="moveSlide(1)">&#10095;</button>

        <div class="slider-dots" id="sliderDots"></div>

    </div>

    <div class="search-filter-container">
        <form action="{{ route('web.utama') }}" method="GET" class="search-form"
            style="display:flex;gap:10px;align-items:center;">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari resep makanan..."
                class="search-input">

            <div class="dropdown-check-list" tabindex="100">
                <span class="anchor" onclick="toggleDropdown()">
                    Pilih Tag...
                </span>

                <ul id="list-items" class="items" style="display:none;list-style:none;padding:0;margin:0;">
                    @foreach($tags as $t)
                        <li>
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $t->name }}" {{ in_array($t->name, (array) request('tags')) ? 'checked' : '' }}>
                                {{ $t->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <button type="submit" class="search-btn">
                Cari
            </button>

            @if(request('search') || request('tags'))
                <a href="{{ route('web.utama') }}" class="search-btn"
                    style="background:#e74c3c; color:white;text-decoration:none; padding:10px; border-radius:5px;">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <section class="menu-hari-ini">
        <h2>Menu Hari Ini</h2>
        <div class="recipes">
            @foreach($menuHariIni as $resep)
                <a href="{{ route('resep.detail', $resep->id) }}" class="recipe-link">
                    <div class="recipe-card">
                        <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}">
                        <div class="recipe-content">
                            <h3>{{ $resep->recipe_name }}</h3>
                            <p>{{ $resep->kategori->name }}</p>
                            <div class="recipe-tags">
                                @foreach($resep->tags as $tag)
                                    <span class="tag-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    @auth
        @if($lastViewed->isNotEmpty())
            <section class="terakhir-dilihat">
                <h2>Terakhir Dilihat</h2>
                <div class="recipes">
                    @foreach($lastViewed as $resep)
                        <a href="{{ route('resep.detail', $resep->id) }}" class="recipe-link">
                            <div class="recipe-card">
                                <img src="{{ asset('uploads/recipes/' . $resep->image) }}" alt="{{ $resep->recipe_name }}">
                                <div class="recipe-content">
                                    <h3>{{ $resep->recipe_name }}</h3>
                                    <p>{{ $resep->kategori->name }}</p>
                                    <div class="recipe-tags">
                                        @foreach($resep->tags as $tag)
                                            <span class="tag-green">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    @endauth

    <section class="menu-lainnya">
        <h2>Menu Lainnya</h2>
        <div class="recipes">
            @foreach($resep_terbaru as $data)
                <a href="{{ route('resep.detail', $data->id) }}" class="recipe-link">
                    <div class="recipe-card">
                        <img src="{{ asset('uploads/recipes/' . $data->image) }}" alt="{{ $data->recipe_name }}">
                        <div class="recipe-content">
                            <h3>{{ $data->recipe_name }}</h3>
                            <p>{{ $data->kategori->name }}</p>
                            <div class="recipe-tags">
                                @foreach($data->tags as $tag)
                                    <span class="tag-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <script>
        function toggleDropdown() {
            var list = document.getElementById('list-items');
            if (list.style.display === 'block') {
                list.style.display = 'none';
            } else {
                list.style.display = 'block';
            }
        }
    </script>
    <script>
        let currentSlide = 0;
        const wrapper = document.getElementById('sliderWrapper');
        const totalSlides = document.querySelectorAll('.slide').length;
        const dotsContainer = document.getElementById('sliderDots');

        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.onclick = () => goToSlide(i);
            dotsContainer.appendChild(dot);
        }

        function updateSlide() {
            wrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function moveSlide(direction) {
            currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
            updateSlide();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlide();
        }

        setInterval(() => {
            moveSlide(1);
        }, 4000);
    </script>
@endsection