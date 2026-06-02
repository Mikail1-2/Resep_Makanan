@extends('frontend.v_layouts.app')

<link rel="stylesheet" href="{{ asset('frontend/css/create-recipe.css') }}">

@section('content')

<h1 class="page-title">
    Create Recipe
</h1>

<div class="create-recipe-card">

    <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        {{-- ========================= --}}
        {{-- RECIPE NAME --}}
        {{-- ========================= --}}
        <div class="form-group">

            <label>
                Recipe Name
            </label>

            <input type="text"
                name="recipe_name"
                placeholder="Enter recipe name"
                class="form-control">

        </div>

        {{-- ========================= --}}
        {{-- CATEGORY + TAG --}}
        {{-- ========================= --}}
        <div class="form-row">

            {{-- CATEGORY --}}
            <div class="form-group half">

                <label>
                    Category
                </label>

                <select name="kategori_id" class="form-control">

                    {{-- GANTI CATEGORY DISINI --}}
                    <option value="">
                        Select Category
                    </option>

                    <option value="1">
                        Makanan
                    </option>

                    <option value="2">
                        Minuman
                    </option>

                    <option value="3">
                        Dessert
                    </option>

                </select>

            </div>

            {{-- TAG --}}
            <div class="form-group half">

                <label>
                    Tags
                </label>

                {{-- GANTI LIST TAG DISINI --}}
                <select id="tagSelector" class="form-control">

                    <option value="">
                        Select Tag
                    </option>

                    <option value="Vegetarian">
                        Vegetarian
                    </option>

                    <option value="Tradisional">
                        Tradisional
                    </option>

                    <option value="CepatSaji">
                        CepatSaji
                    </option>

                    <option value="Goreng">
                        Goreng
                    </option>

                    <option value="Tumis">
                        Tumis
                    </option>

                    <option value="Rebus">
                        Rebus
                    </option>

                    <option value="Kukus">
                        Kukus
                    </option>

                    <option value="Panggang">
                        Panggang
                    </option>

                    <option value="Bakar">
                        Bakar
                    </option>

                </select>

                {{-- TAG YANG SUDAH DIPILIH USER --}}
                <div id="selectedTags" class="selected-tags">

                </div>

                <small class="tag-info">
                    Pilih minimal 1 tag
                </small>

            </div>

        </div>

        {{-- ========================= --}}
        {{-- IMAGE --}}
        {{-- ========================= --}}
        <div class="form-group">

            <label>
                Recipe Image
            </label>

            <input type="file"
                name="image"
                class="form-control">

        </div>

        {{-- ========================= --}}
        {{-- INGREDIENTS --}}
        {{-- ========================= --}}
        <div class="form-group">

            <label>
                Ingredients
            </label>

            <textarea name="ingredients"
                rows="5"
                placeholder="Enter ingredients"
                class="form-control"></textarea>

        </div>

        {{-- ========================= --}}
        {{-- INSTRUCTIONS --}}
        {{-- ========================= --}}
        <div class="form-group">

            <label>
                Instructions
            </label>

            <textarea name="instructions"
                rows="6"
                placeholder="Enter cooking instructions"
                class="form-control"></textarea>

        </div>

        <button type="submit" class="publish-btn">
            Publish Recipe
        </button>   

    </form>

</div>

@endsection