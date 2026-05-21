<?php

namespace App\Http\Controllers;



class CreateRecipeController extends Controller
{
    public function index()
    {
    return view('backend.v_recipes.create');
    }
}
