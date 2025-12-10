<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbUser;
use Illuminate\Support\Facades\Hash;

class TbUserController extends Controller
{
    // ========================
    // CREATE - FORM TAMBAH
    // ========================
    public function create()
    {
        return view('admin.users.create'); // resources/views/users/create.blade.php
    }

    // ========================
    // STORE - SIMPAN DATA
    // ========================
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:tb_user,email',
            'password' => 'required|min:3',
        ]);

        TbUser::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // ========================
    // EDIT - FORM EDIT
    // ========================
    public function edit($id)
    {
        $user = TbUser::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }


    public function index()
{
    $users = TbUser::all();
    return view('admin.users.index', compact('users'));
}


    // ========================
    // UPDATE - UPDATE DATA
    // ========================
    public function update(Request $request, $id)
    {
        $user = TbUser::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:tb_user,email,' . $id,
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    // ========================
    // DELETE - HAPUS DATA
    // ========================
    public function destroy($id)
{
    $user = TbUser::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Data berhasil dihapus!');
}
}
