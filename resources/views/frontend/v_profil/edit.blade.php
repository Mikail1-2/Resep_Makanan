@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/edit-profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
@endpush

@section('content')

    <div class="edit-profile-container">

        <div class="edit-profile-card">

            <h2>Edit Profile</h2>

            <form action="{{ route('frontend.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="profile-preview">

                    <div id="avatar-letter" class="avatar-letter" @if($user->foto) style="display:none;" @endif>

                        {{ strtoupper(substr($user->nama, 0, 1)) }}

                    </div>

                    <img id="preview-image" class="profile-image"
                        src="{{ $user->foto ? asset('uploads/profile/' . $user->foto) : '' }}" @if(!$user->foto)
                        style="display:none;" @endif>

                    <button type="button" class="remove-photo-btn" onclick="hapusFoto()">

                        <i class="fas fa-trash"></i> Remove

                    </button>

                    <label for="foto" class="change-photo-btn">
                        <i class="fas fa-pen"></i> Edit
                    </label>
                    
                    <input type="file" id="foto" name="foto" hidden>
                    <input type="hidden" id="remove_photo" name="remove_photo" value="0">
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $user->nama }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="hp" value="{{ $user->hp }}">
                </div>

                <button type="submit" class="save-btn">
                    Save Changes
                </button>

            </form>

        </div>

    </div>

@endsection