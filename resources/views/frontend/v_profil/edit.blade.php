@extends('frontend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/edit-profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/js/profile.js') }}?v={{ time() }}"></script>
@endpush

@section('content')

    <div class="edit-profile-container">

        <div class="edit-profile-card">

            <h2>Pengaturan Profil</h2>

            <div class="profile-preview">

                <div id="avatar-letter" class="avatar-letter" @if($user->foto) style="display:none;" @endif>

                    {{ strtoupper(substr($user->nama, 0, 1)) }}

                </div>

                <img id="preview-image" class="profile-image"
                    src="{{ $user->foto ? asset('uploads/profile/' . $user->foto) : '' }}" @if(!$user->foto)
                    style="display:none;" @endif>

                <label for="foto" class="change-photo-btn">
                    <i class="fas fa-pen"></i>
                    Ubah
                </label>

                <button type="button" id="remove-btn" class="remove-photo-btn" onclick="handleRemovePhoto()" {{ !$user->foto ? 'disabled' : '' }}>

                    <i class="fas fa-trash"></i>
                    Hapus

                </button>



            </div>

            <form id="deletePhotoForm" action="{{ route('frontend.profile.deletephoto') }}" method="POST">

                @csrf

            </form>

            <form id="profileForm" action="{{ route('frontend.profile.update') }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <input type="file" id="foto" name="foto" hidden>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $user->nama }}" required minlength="2">
                    @error('nama')
                        <small style="color:red; font-weight:bold;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" required>
                    @error('email')
                        <small style="color:red; font-weight:bold;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="hp" value="{{ $user->hp }}" required pattern="[0-9]{10,13}">
                    @error('hp')
                        <small style="color:red; font-weight:bold;">{{ $message }}</small>
                    @enderror
                </div>
                <button type="button" class="save-btn" onclick="confirmSave()">

                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

@endsection