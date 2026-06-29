@extends('backend.v_layouts.app')

@section('content')

    <div class="metrics">

        <div class="metric-card">

            <div class="metric-top">

                <div class="metric-icon">
                    🍜
                </div>

            </div>

            <h4>Total Recipe</h4>

            <h2>{{ $totalRecipe }}</h2>

        </div>

        <div class="metric-card">

            <div class="metric-top">

                <div class="metric-icon">
                    👤
                </div>

            </div>

            <h4>Total User</h4>

            <h2>{{ $totalUser }}</h2>

        </div>

        <div class="metric-card">

            <div class="metric-top">

                <div class="metric-icon">
                    👁️
                </div>

            </div>

            <h4>Today's Visitor</h4>

            <h2>230</h2>

        </div>

        <div class="metric-card">

            <div class="metric-top">

                <div class="metric-icon">
                    ⏳
                </div>

            </div>

            <h4>Pending Approval</h4>

            <h2>{{ $totalPending }}</h2>

        </div>
    </div>

    <div class="row2">

        <div class="card">

            <h3>
                Recent User
            </h3>

            @foreach ($recentUsers as $user)
                <div class="user-item">
                    <div class="user-info">
                        <h4>{{ $user->name }}</h4>
                        <small>{{ $user->role == '1' ? 'Admin' : 'User' }}</small>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="card">

        <h3>
            Recent Recipe
        </h3>

        @foreach ($recentRecipes as $recipe)
            <div class="recipe-item">
                <div>
                    <h4>{{ $recipe->recipe_name }}</h4>
                    <small>{{ $recipe->kategori->nama_kategori ?? '-' }}</small>
                </div>
                <span class="recipe-status {{ $recipe->status == 'approved' ? 'published' : $recipe->status }}">
                    {{ $recipe->status == 'approved' ? 'Published' : ucfirst($recipe->status) }}
                </span>
            </div>
        @endforeach

    </div>
    <div class="card">

        <h3>
            Recipe Categories
        </h3>

        <div class="chart-container">

            <canvas id="recipeChart"></canvas>

        </div>

    </div>
    </div>

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