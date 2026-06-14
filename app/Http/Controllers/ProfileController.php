<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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

        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email',
            'hp' => 'nullable|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->hp = $request->hp;

        if ($request->hasFile('foto')) {

            if ($user->foto) {

                $oldPath = public_path(
                    'uploads/profile/' . $user->foto
                );

                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $filename =
                time() . '.' .
                $request->foto->extension();

            $request->foto->move(
                public_path('uploads/profile'),
                $filename
            );

            $user->foto = $filename;
        }

        $user->save();

        return redirect()
            ->route('frontend.profile')
            ->with(
                'success',
                'Profile updated successfully'
            );
    }

    public function delete()
    {
        $user = Auth::user();

        if ($user->foto) {

            $path = public_path(
                'uploads/profile/' . $user->foto
            );

            if (file_exists($path)) {
                unlink($path);
            }

            $user->foto = null;
            $user->save();
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Photo removed successfully'
            );
    }
}