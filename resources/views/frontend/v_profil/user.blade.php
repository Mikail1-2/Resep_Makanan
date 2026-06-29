@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
@endpush

@section('content')

    <div class="profile-card">

        <div class="profile-header">

            <div class="profile-avatar">
                @if($user->foto)
                    <img src="{{ asset('uploads/profile/' . $user->foto) }}" alt="Profile">
                @else
                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                @endif
            </div>

            <h2>{{ $user->nama }}</h2>

        </div>

        <div class="profile-info">

            <div class="info-item">
                <span>Email</span>
                <p>{{ $user->email }}</p>
            </div>

            <div class="info-item">
                <span>No HP</span>
                <p>{{ $user->hp }}</p>
            </div>

            <div class="info-item">
                <span>Total Resep</span>
                <p>{{ $totalRecipe }}</p>
            </div>

        </div>

        <a href="{{ route('frontend.profile.edit') }}" class="edit-btn">
            Edit Profil
        </a>

    </div>

@endsection