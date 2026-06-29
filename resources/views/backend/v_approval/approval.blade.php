@extends('backend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/approval-recipes.css') }}">
@endpush

@section('content')

    <div class="card">

        <h2>Persetujuan Resep</h2>

        @foreach($recipes as $recipe)

            <div class="approval-item">

                {{-- FOTO + NAMA --}}
                <div class="recipe-section">

                    <h4>{{ $recipe->recipe_name }}</h4>

                    <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" class="preview-image"
                        alt="{{ $recipe->recipe_name }}">

                </div>

                {{-- INFORMASI --}}
                <div class="info-section">

                    <p>
                        <strong>Kategori :</strong>
                        {{ $recipe->kategori->name }}
                    </p>

                    <p>
                        <strong>Diajukan oleh :</strong>
                        {{ $recipe->user->nama }}
                    </p>

                    <p>
                        <strong>Status :</strong>

                        <span class="status-badge {{ strtolower($recipe->status) }}">
                            {{ $recipe->status }}
                        </span>
                    </p>

                </div>

                {{-- ACTION --}}
                <div class="action-section">

                    <div class="button-row">

                        <a href="{{ route('backend.approval.detail', $recipe->id) }}" class="detail-btn">
                            Detail
                        </a>

                        <form action="{{ route('backend.approve', $recipe->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="approve-btn">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('backend.reject', $recipe->id) }}" method="POST"
                            id="reject-form-{{ $recipe->id }}">

                            @csrf

                            <button type="submit" class="reject-btn">
                                Tolak
                            </button>

                        </form>

                    </div>

                    <textarea name="reject_reason" form="reject-form-{{ $recipe->id }}" class="reject-reason"
                        placeholder="Masukkan alasan penolakan..." required></textarea>

                </div>

            </div>

        @endforeach

    </div>

@endsection