@extends('backend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/approval-recipes.css') }}">
@endpush

@section('content')

    <div class="card">

        <h2>Recipe Approval</h2>

        <table class="approval-table">

            <thead>
                <tr>
                    <th>Recipe</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($recipes as $recipe)

                    <tr>

                        <td>{{ $recipe->recipe_name }}</td>

                        <td>{{ $recipe->kategori->name }}</td>

                        <td>{{ $recipe->user->nama }}</td>

                        <td>{{ $recipe->status }}</td>

                        <td>

                            <form action="{{ route('backend.approve', $recipe->id) }}" method="POST">

                                @csrf

                                <button class="approve-btn">
                                    Approve
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection