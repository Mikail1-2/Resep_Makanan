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

                <tr>
                    <td>Nasi Goreng</td>
                    <td>Makanan</td>
                    <td>Pending</td>
                    <td>
                        <button class="approve-btn">Approve</button>
                        <button class="reject-btn">Reject</button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

@endsection