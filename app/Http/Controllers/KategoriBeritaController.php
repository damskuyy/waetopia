<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('kategori_berita.index', compact('kategoriBeritas'), [
            'title' => 'Admin',
            'menu' => 'Kategori Berita',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_berita.create', [
            'title' => 'Admin',
            'menu' => 'Kategori Berita',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        KategoriBerita::create($request->all());
        return redirect()->route('kategori_berita.index')->with('pesan', 'Kategori Berita berhasil ditambahkan.');
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
    public function edit(KategoriBerita $kategoriBerita)
    {
        return view('kategori_berita.edit', compact('kategoriBerita'), [
            'title' => 'Admin',
            'menu' => 'Kategori Berita',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $request->validate([
            'kategori_berita' => 'required|string|max:255',
        ]);

        $kategoriBerita->update($request->all());
        return redirect()->route('kategori_berita.index')->with('pesan', 'Kategori Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->delete();
        return redirect()->route('kategori_berita.index')->with('pesan', 'Kategori Berita berhasil dihapus.');
    }
}
