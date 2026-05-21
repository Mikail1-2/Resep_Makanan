<?php

namespace App\Http\Controllers;



class RecipeController extends Controller
{
    public function index()
    {
    return view('backend.v_recipes.recipes');
    }
}
