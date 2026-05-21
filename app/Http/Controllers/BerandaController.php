<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        if (Auth::check() && Auth::user()->role == '1') {

            return view('backend.v_beranda.admin');

        }

        return view('backend.v_beranda.index');
    }
}