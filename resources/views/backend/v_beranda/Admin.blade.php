@extends('backend.v_layouts.app')

@section('content')

    <div class="metrics">
        <div class="metric-card">
            <div class="metric-top">
                <div class="metric-icon">🍜</div>
            </div>
            <h4>Total Resep</h4>
            <h2>{{ $totalRecipe }}</h2>
        </div>

        <div class="metric-card">
            <div class="metric-top">
                <div class="metric-icon">👤</div>
            </div>
            <h4>Total Pengguna</h4>
            <h2>{{ $totalUser }}</h2>
        </div>

        <div class="metric-card">
            <div class="metric-top">
                <div class="metric-icon">👁️</div>
            </div>
            <h4>Pengunjung Hari Ini</h4>
            <h2>230</h2>
        </div>

        <div class="metric-card">
            <div class="metric-top">
                <div class="metric-icon">⏳</div>
            </div>
            <h4>Pending Approval</h4>
            <h2>{{ $totalPending }}</h2>
        </div>
    </div>

    {{-- row2 dibuka di sini, mencakup KETIGA card --}}
    <div class="row2">

        {{-- Card 1: Recent User --}}
        <div class="card">
            <h3>User Terbaru</h3>

            @foreach ($recentUsers as $user)
                <div class="user-item">
                    <div class="user-left">
                        <div class="user-avatar">
                            {{ strtoupper(substr($user->nama, 0, 1)) }}
                        </div>
                        <div class="user-info">
                            <h4>{{ $user->nama }}</h4>
                            <small>{{ $user->role == '1' ? 'Admin' : 'User' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Card 2: Recent Recipe --}}
        <div class="card">
            <h3>Resep Terbaru</h3>

            @foreach ($recentRecipes as $recipe)
                <div class="recipe-item">
                    <div class="recipe-left">
                        <div class="user-info">
                            <h4>{{ $recipe->recipe_name }}</h4>
                            <small>{{ $recipe->kategori->nama_kategori ?? '-' }}</small>
                        </div>
                    </div>
                    <span class="recipe-status status-{{ $recipe->status == 'approved' ? 'approved' : $recipe->status }}">
                        {{ $recipe->status == 'approved' ? 'Published' : ucfirst($recipe->status) }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- Card 3: Chart --}}
        <div class="card">
            <h3>Kategori Resep</h3>
            <div class="chart-container">
                <canvas id="recipeChart"></canvas>
            </div>
        </div>

    </div> {{-- row2 ditutup di sini --}}

    <script>
        const ctx = document.getElementById('recipeChart');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Makanan', 'Minuman', 'Dessert'],
                datasets: [{
                    data: [
                        {{ $chartMakanan }},
                        {{ $chartMinuman }},
                        {{ $chartDessert }}
                    ],
                    backgroundColor: ['#ff8c42', '#ffa94d', '#ffd8a8'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>

@endsection