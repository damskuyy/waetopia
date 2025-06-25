<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataPelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('user')->get();
        return view('data_pelanggan.index', [
            'title' => 'Admin',
            'menu' => 'Data Pelanggan',
            'pelanggans' => $pelanggans,
        ]);
    }

    public function create()
    {
        $users = User::whereNotIn('id', Pelanggan::pluck('id_user')->toArray())->get();
        return view('data_pelanggan.create', [
            'title' => 'Admin',
            'menu' => 'Data Pelanggan',
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_user' => 'required|exists:users,id',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('pelanggan', 'public') : null;

        Pelanggan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('data_pelanggan.index')->with('pesan', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $users = User::whereNotIn('id', Pelanggan::pluck('id_user')->toArray())->orWhere('id', $pelanggan->id_user)->get();
        return view('data_pelanggan.edit', [
            'title' => 'Admin',
            'menu' => 'Data Pelanggan',
            'pelanggan' => $pelanggan,
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_user' => 'required|exists:users,id',
        ]);

        $fotoPath = $pelanggan->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pelanggan');
        }

        $pelanggan->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('data_pelanggan.index')->with('pesan', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $foto1 = DB::table('pelanggans')->where('id', '=', $id)->value('foto');

        if($foto1 !== null) Storage::delete($foto1);
        // Pelanggan::find($id)->delete();

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('data_pelanggan.index')->with('pesan', 'Pelanggan berhasil dihapus.');
    }
}
