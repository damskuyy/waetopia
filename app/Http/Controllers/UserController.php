<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all(); // Ambil semua data user
        return view('user.index', compact('user'), [
            'title' => 'Admin',
            'menu' => 'User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'title' => 'Admin',
            'menu' => 'User',
        ]); // Tampilkan form untuk membuat user baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|max:5120|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'level' => 'required|string|in:admin,bendahara,pelanggan,pemilik',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('user', 'public') : null;

        User::create([
            'foto' => $fotoPath,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('pesan', 'User berhasil ditambahkan.');
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
    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('user.edit', compact('user'), [
            'title' => 'Admin',
            'menu' => 'User',
        ]); // Tampilkan form untuk mengedit user
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|max:5120|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|confirmed',
        ]);

        $user = User::findOrFail($id);

        // Jika ada file foto baru, hapus foto lama dan simpan foto baru
        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                unlink(storage_path('app/public/'.$user->foto));
            }
            $user->foto = $request->file('foto')->store('user', 'public');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('pesan', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('pesan', 'User berhasil dihapus.');
    }
}
