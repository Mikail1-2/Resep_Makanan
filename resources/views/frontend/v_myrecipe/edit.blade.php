@extends('frontend.v_layouts.app')

<link rel="stylesheet" href="{{ asset('frontend/css/create-recipe.css') }}">
@push('scripts')

    <script src="{{ asset('frontend/js/recipe-edit.js') }}?v={{ time() }}"></script>
@endpush

@section('content')

    <h1 class="page-title">
        Edit Recipe
    </h1>

    <div class="create-recipe-card">

        <form id="recipeForm" action="{{ route('frontend.recipe.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- RECIPE NAME --}}
            <div class="form-group">

                <label>
                    Recipe Name
                </label>

                <input type="text" name="recipe_name" value="{{ $recipe->recipe_name }}" class="form-control">

            </div>

            {{-- CATEGORY --}}
            <div class="form-row">

                <div class="form-group half">

                    <label>
                        Category
                    </label>

                    <select name="kategori_id" class="form-control">

                        <option value="1" {{ $recipe->kategori_id == 1 ? 'selected' : '' }}>
                            Makanan
                        </option>

                        <option value="2" {{ $recipe->kategori_id == 2 ? 'selected' : '' }}>
                            Minuman
                        </option>

                        <option value="3" {{ $recipe->kategori_id == 3 ? 'selected' : '' }}>
                            Dessert
                        </option>

                    </select>

                </div>

            </div>

            {{-- CURRENT IMAGE --}}
            <div class="form-group">

                <label>
                    Current Image
                </label>

                <br>

                <img src="{{ asset('uploads/recipes/' . $recipe->image) }}" style="
                        width:250px;
                        border-radius:14px;
                        margin-top:10px;
                    ">

            </div>

            {{-- NEW IMAGE --}}
            <div class="form-group">

                <label>
                    Replace Image (Optional)
                </label>

                <input type="file" name="image" class="form-control">

            </div>

            {{-- INGREDIENTS --}}
            <div class="form-group">

                <label>
                    Ingredients
                </label>

                <textarea name="ingredients" rows="5" class="form-control">{{ $recipe->ingredients }}</textarea>

            </div>

            {{-- INSTRUCTIONS --}}
            <div class="form-group">

                <label>
                    Instructions
                </label>

                <textarea name="instructions" rows="6" class="form-control">{{ $recipe->instructions }}</textarea>

            </div>

            <button type="button" class="publish-btn" onclick="confirmSave()">

                Send

            </button>

        </form>

    </div>

@endsection