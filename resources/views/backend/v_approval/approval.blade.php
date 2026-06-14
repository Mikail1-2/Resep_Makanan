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
                    <th>Submitted By</th>
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

                        <td>
                            <span class="status-badge {{ strtolower($recipe->status) }}">
                                {{ $recipe->status }}
                            </span>
                        </td>

                        <td>

                            <div class="action-container">

                                <div class="button-row">
                                    <form action="{{ route('backend.approve', $recipe->id) }}" method="POST"
                                        class="form-inline">
                                        @csrf
                                        <button type="submit" class="approve-btn">Approve</button>
                                    </form>

                                    <form action="{{ route('backend.reject', $recipe->id) }}" method="POST" class="form-inline"
                                        id="reject-form-{{ $recipe->id }}">
                                        @csrf
                                        <button type="submit" class="reject-btn">Reject</button>
                                    </form>
                                </div>

                                <div class="comment-row">
                                    <textarea name="reject_reason" form="reject-form-{{ $recipe->id }}" class="reject-reason"
                                        placeholder="Enter rejection reason..." required rows="3"></textarea>
                                </div>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection