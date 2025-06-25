<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskons = Diskon::all();
        return view('diskon.index', compact('diskons'), [
            'title' => 'Bendahara',
            'menu' => 'Diskon'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diskon.create', [
            'title' => 'Bendahara',
            'menu' => 'Diskon'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_diskon' => 'required|max:50',
            'nama_diskon' => 'required|max:100',
            'persentase_diskon' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'aktif' => 'required|boolean',
        ]);
        Diskon::create($request->all());
        return redirect()->route('diskon.index')->with('pesan', 'Diskon berhasil ditambahkan!');
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
        $diskon = Diskon::findOrFail($id);
        return view('diskon.edit', compact('diskon'), [
            'title' => 'Bendahara',
            'menu' => 'Diskon'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_diskon' => 'required|max:50',
            'nama_diskon' => 'required|max:100',
            'persentase_diskon' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'aktif' => 'required|boolean',
        ]);
        $diskon = Diskon::findOrFail($id);
        $diskon->update($request->all());
        return redirect()->route('diskon.index')->with('pesan', 'Diskon berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $diskon = Diskon::findOrFail($id);
        $diskon->delete();
        return redirect()->route('diskon.index')->with('pesan', 'Diskon berhasil dihapus!');
    }
}
