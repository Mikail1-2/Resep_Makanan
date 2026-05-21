@extends('backend.v_layouts.app')
<link rel="stylesheet" href="{{ asset('frontend/css/create-recipe.css') }}">
@section('content')

<h1 class="page-title">
    Create Recipe
</h1>

<div class="create-recipe-card">

    <form action="{{ route('backend.recipe.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>
                Recipe Name
            </label>

            <input type="text"
                   name="recipe_name"
                   placeholder="Enter recipe name"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>
                Category
            </label>

            <select name="category" class="form-control">

                <option value="">
                    Select Category
                </option>

                <option value="Breakfast">
                    Breakfast
                </option>

                <option value="Lunch">
                    Desert
                </option>

                <option value="Dinner">
                    Minuman
                </option>

                <option value="Dessert">
                    Dessert
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>
                Recipe Image
            </label>

            <input type="file"
                   name="image"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>
                Ingredients
            </label>

            <textarea name="ingredients"
                      rows="5"
                      placeholder="Enter ingredients"
                      class="form-control"></textarea>

        </div>

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