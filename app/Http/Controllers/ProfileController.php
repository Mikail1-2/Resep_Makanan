<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == '1'){

            return view('frontend.v_profil.admin');

        } else {

            return view('frontend.v_profil.user');

        }
    }
}