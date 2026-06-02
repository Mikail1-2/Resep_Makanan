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

            <h2>120</h2>

        </div>

        <div class="metric-card">

            <div class="metric-top">

                <div class="metric-icon">
                    👤
                </div>

            </div>

            <h4>Total User</h4>

            <h2>45</h2>

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

            <h2>7</h2>

        </div>

        <div class="metric-card">

            <h4>Total User</h4>

            <h2>45</h2>

        </div>

        <div class="metric-card">

            <h4>Today's Visitor</h4>

            <h2>230</h2>

        </div>

        <div class="metric-card">

            <h4>Pending Approval</h4>

            <h2>7</h2>

        </div>

    </div>

    <div class="row2">

        <div class="card">

            <h3>
                Recent User
            </h3>

            <div class="user-item">

                <div class="user-info">

                    <h4>Hilman Saukani</h4>

                    <small>User</small>

                </div>

            </div>

            <div class="user-item">

                <div class="user-info">

                    <h4>Mikail Al Ghifary</h4>

                    <small>User</small>

                </div>

            </div>

            <div class="user-item">

                <div class="user-info">

                    <h4>Dwi Ario</h4>

                    <small>User</small>

                </div>

            </div>

        </div>

        <div class="card">

            <h3>
                Recent Recipe
            </h3>

            <div class="recipe-item">

                <div>

                    <h4>Nasi Goreng</h4>

                    <small>Makanan</small>

                </div>

                <span class="recipe-status">
                    Published
                </span>

            </div>

            <div class="recipe-item">

                <div>

                    <h4>Orange Juice</h4>

                    <small>Minuman</small>

                </div>

                <span class="recipe-status">
                    Published
                </span>

            </div>

            <div class="recipe-item">

                <div>

                    <h4>Ice Cream</h4>

                    <small>Dessert</small>

                </div>

                <span class="recipe-status">
                    Pending
                </span>

            </div>

        </div>

    </div>

    <div class="row2">

        <div class="card">

            <h3>
                Comment Moderation
            </h3>

            <div class="comment-item">
                Great Recipe!
            </div>

            <div class="comment-item">
                Delicious Food!
            </div>

        </div>

        <div class="card">

            <h3>
                Recipe Categories
            </h3>

            <div class="chart-container">

                <canvas id="recipeChart"></canvas>

            </div>

        </div>
        <script>

            const ctx = document.getElementById('recipeChart');

            new Chart(ctx, {

                type: 'pie',

                data: {

                    labels: ['Makanan', 'Minuman', 'Dessert'],

                    datasets: [{

                        data: [45, 25, 30],

                        backgroundColor: [
                            '#ff8c42',
                            '#ffa94d',
                            '#ffd8a8'
                        ],

                        borderWidth: 0

                    }]

                },

                options: {

                    responsive: true,

                    plugins: {

                        legend: {

                            position: 'bottom'

                        }

                    }

                }

            });

        </script>
    </div>

@endsection