@extends('backend.v_layouts.app')

@section('content')

<h1 style="margin-bottom:30px;">
    Dashboard Admin
</h1>

<div class="metrics">

    <div class="metric-card">
        <h4>Total Recipe</h4>
        <h2>120</h2>
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

        <div class="log-item">
            Hilman Saukani
        </div>

        <div class="log-item">
            Mikail Al Ghifary
        </div>

        <div class="log-item">
            Dwi Ario
        </div>

    </div>

    <div class="card">

        <h3>
            Recent Recipe
        </h3>

        <div class="log-item">
            Nasi Goreng
        </div>

        <div class="log-item">
            Steak Potato
        </div>

        <div class="log-item">
            Orange Juice
        </div>

    </div>

</div>

<div class="row2">

    <div class="card">

        <h3>
            Comment Moderation
        </h3>

        <div class="comment-item">
            Great recipe!
        </div>

        <div class="comment-item">
            Very delicious food
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

</div>

@endsection