<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\AccountDeactivated;
use Illuminate\Support\Facades\Mail;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*
        |==================================================
        | USER BIASA
        | role = 0
        |==================================================
        */
        $users = User::where('role', '0')->where('status', 1)->orderBy('nama', 'asc')->get();

        /*
        |==================================================
        | ADMIN
        | role = 1
        |==================================================
        */
        $admins = User::where('role', '1')->where('status', 1)->orderBy('nama', 'asc')->get();

        return view('backend.v_manage-user.index', [

            'judul' => 'Manage Users',

            'users' => $users,

            'admins' => $admins,

            // TOTAL YANG AKTIF SAJA
            'totalUsers' => $users->count(),

            'totalAdmins' => $admins->count(),

        ]);

        return view('backend.v_beranda.Admin', [
            'judul' => 'Dashboard',
            'totalUser' => User::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('frontend.v_manage_user.edit', [

            'judul' => 'Edit User',

            'edit' => $user

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([

            'nama' => 'required|max:255',

            'email' => 'required|email',

            'hp' => 'required|min:10|max:15'

        ]);

        $user->update($validatedData);

        return redirect()
            ->route('manage-user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->status = 0;
        $user->save();

        // Kirim email notifikasi
        Mail::to($user->email)->send(new AccountDeactivated($user));

        return back()->with('success', 'User berhasil dinonaktifkan dan email notifikasi telah dikirim');
    }
}
