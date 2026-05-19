@extends('backend.v_layouts.app')

@section('content')

<div class="card">

    <h2>Super Admin Profile</h2>

    <br>

    <p>Name : {{ Auth::user()->nama }}</p>


    <br>

    <h3>Admin Access</h3>

    <p>
        You can manage all website data.
    </p>

</div>

@endsection