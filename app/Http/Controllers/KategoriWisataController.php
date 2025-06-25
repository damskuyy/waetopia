<?php

namespace App\Http\Controllers;

use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('kategori_wisata.index', compact('kategoriWisatas'), [
            'title' => 'Bendahara',
            'menu' => 'Kategori Wisata',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_wisata.create', [
            'title' => 'Bendahara',
            'menu' => 'Kategori Wisata',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        KategoriWisata::create($request->all());
        return redirect()->route('kategori_wisata.index')->with('pesan', 'Kategori Wisata berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriWisata $kategoriWisata)
    {
        return view('kategori_wisata.edit', compact('kategoriWisata'), [
            'title' => 'Bendahara',
            'menu' => 'Kategori Wisata',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriWisata $kategoriWisata)
    {
        $request->validate([
            'kategori_wisata' => 'required|string|max:255',
        ]);

        $kategoriWisata->update($request->all());
        return redirect()->route('kategori_wisata.index')->with('pesan', 'Kategori Wisata berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriWisata $kategoriWisata)
    {
        $kategoriWisata->delete();
        return redirect()->route('kategori_wisata.index')->with('pesan', 'Kategori Wisata berhasil dihapus.');
    }
}
