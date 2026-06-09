<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
class ProfileController extends Controller
{
    public function index()
    {

    }
    public function profile()
    {
        $user = Auth::user();

        $totalRecipe = $user
            ->recipes()
            ->count();

        return view(
            'frontend.v_profil.user',
            compact(
                'user',
                'totalRecipe'
            )
        );
    }
    public function edit()
    {
        $user = Auth::user();

        return view(
            'frontend.v_profil.edit',
            compact('user')
        );
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->hp = $request->hp;

        if ($request->hasFile('foto')) {

            $filename = time() . '.' .
                $request->foto->extension();

            $request->foto->move(
                public_path('uploads/profile'),
                $filename
            );

            $user->foto = $filename;
        }
        if ($request->remove_photo == 1) {

            $user->foto = null;
        }
        $user->save();

        return redirect()
            ->route('frontend.profile')
            ->with(
                'success',
                'Profile updated successfully'
            );
    }
}