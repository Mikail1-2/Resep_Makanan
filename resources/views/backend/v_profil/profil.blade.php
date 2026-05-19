    @extends('backend.v_layouts.app')

    @section('content')

<div class="card">
    <h2>Profile Page</h2>

    <p>Welcome, {{ Auth::user()->name }}</p>
</div>

@endsection