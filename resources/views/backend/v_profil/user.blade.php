@extends('backend.v_layouts.app')

@section('content')

<div class="card">

    <h2>User Profile</h2>

    <br>

    <p>Name : {{ Auth::user()->nama }}</p>


    <br>

    <h3>Favorite Recipes</h3>

    <p>
        Your favorite recipes will appear here.
    </p>

</div>

@endsection