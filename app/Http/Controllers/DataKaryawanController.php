<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::with('user')->get(); // Ambil data karyawan beserta user
        return view('data_karyawan.index', compact('karyawans'), [
            'title' => 'Admin',
            'menu' => 'Data_karyawan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNotIn('id', Karyawan::pluck('id_user'))->get(); // Ambil user yang belum menjadi karyawan
        return view('data_karyawan.create', compact('users'), [
            'title' => 'Admin',
            'menu' => 'Data_karyawan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'jabatan' => 'required|in:administrasi,bendahara,pemilik',
            'id_user' => 'required|exists:users,id',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('data_karyawan.index')->with('pesan', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $users = User::whereNotIn('id', Karyawan::pluck('id_user'))->orWhere('id', $karyawan->id_user)->get();
        return view('data_karyawan.edit', compact('karyawan', 'users'), [
            'title' => 'Admin',
            'menu' => 'Data_karyawan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'jabatan' => 'required|in:administrasi,bendahara,pemilik',
            'id_user' => 'required|exists:users,id',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('data_karyawan.index')->with('pesan', 'Karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('data_karyawan.index')->with('pesan', 'Karyawan berhasil dihapus.');
    }
}
