@extends('backend.v_layouts.app')

@section('content')

<h2 style="margin-bottom: 25px;">
    Recipes
</h2>

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

</div>

@endsection