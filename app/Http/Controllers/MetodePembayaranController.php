<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metodes = MetodePembayaran::all();
        return view('metode_pembayaran.index', compact('metodes'), [
            'title' => 'Bendahara',
            'menu' => 'Metode Pembayaran',
        ]);
    }

    public function create()
    {
        return view('metode_pembayaran.create', [
            'title' => 'Bendahara',
            'menu' => 'Metode Pembayaran',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|max:255',
            'nomor_rekening' => 'required|max:30',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['metode_pembayaran', 'nomor_rekening']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('metode_pembayaran', 'public');
        }

        MetodePembayaran::create($data);
        return redirect()->route('metode_pembayaran.index')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        return view('metode_pembayaran.edit', compact('metode'), [
            'title' => 'Bendahara',
            'menu' => 'Metode Pembayaran',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|max:255',
            'nomor_rekening' => 'required|max:30',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $metode = MetodePembayaran::findOrFail($id);
        $data = $request->only(['metode_pembayaran', 'nomor_rekening']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($metode->foto && Storage::disk('public')->exists($metode->foto)) {
                Storage::disk('public')->delete($metode->foto);
            }
            $data['foto'] = $request->file('foto')->store('metode_pembayaran', 'public');
        }

        $metode->update($data);
        return redirect()->route('metode_pembayaran.index')->with('pesan', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        if ($metode->foto && Storage::disk('public')->exists($metode->foto)) {
            Storage::disk('public')->delete($metode->foto);
        }
        $metode->delete();
        return redirect()->route('metode_pembayaran.index')->with('pesan', 'Data berhasil dihapus!');
    }
}
