@extends('frontend.v_layouts.app')

@section('content')

<div class="stats">

    <div class="card">
        <h3>Total Recipes</h3>
        <h2>128</h2>
    </div>

    <div class="card">
        <h3>Categories</h3>
        <h2>12</h2>
    </div>

    <div class="card">
        <h3>Visitors</h3>
        <h2>24K</h2>
    </div>

    <div class="card">
        <h3>Comments</h3>
        <h2>842</h2>
    </div>

</div>

<div class="recipes">

    <div class="recipe-card">
        <img src="{{ asset('frontend/images/salad.jpg') }}">

        <div class="recipe-content">
            <h3>Healthy Salad Bowl</h3>
            <p>Fresh vegetables with creamy dressing.</p>
        </div>
    </div>

    <div class="recipe-card">
        <img src="{{ asset('frontend/images/steak.jpg') }}">

        <div class="recipe-content">
            <h3>Steak & Potato</h3>
            <p>Juicy steak with crispy potato.</p>
        </div>
    </div>

    <div class="recipe-card">
        <img src="{{ asset('frontend/images/veganbowl.jpg') }}">

        <div class="recipe-content">
            <h3>Hidup Jokowiiiiiiii</h3>
            <p>Healthy vegan recipe with nutrition.</p>
        </div>
    </div>

</div>

@endsection