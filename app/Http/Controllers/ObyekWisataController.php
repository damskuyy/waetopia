<?php

namespace App\Http\Controllers;

use App\Models\ObyekWisata;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ObyekWisataController extends Controller
{
    public function index()
    {
        $obyekWisatas = ObyekWisata::with('kategoriWisata')->get();
        return view('obyek_wisata.index', [
            'title' => 'Bendahara',
            'menu' => 'Obyek Wisata',
            'obyekWisatas' => $obyekWisatas,
        ]);
    }

    public function create()
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('obyek_wisata.create', [
            'title' => 'Bendahara',
            'menu' => 'Obyek Wisata',
            'kategoriWisatas' => $kategoriWisatas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisatas,id',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        foreach (['foto1', 'foto2', 'foto3', 'foto4', 'foto5'] as $foto) {
            if ($request->hasFile($foto)) {
                $data[$foto] = $request->file($foto)->store('obyek_wisata', 'public');
            }
        }

        ObyekWisata::create($data);

        return redirect()->route('obyek_wisata.index')->with('pesan', 'Obyek Wisata berhasil ditambahkan.');
    }

    public function show($id)
    {
        $obyekWisata = ObyekWisata::with('kategoriWisata')->findOrFail($id);
        return view('obyek_wisata.show', compact('obyekWisata'), [
            'title' => 'Bendahara',
            'menu' => 'Obyek Wisata',
        ]);
    }

    public function edit($id)
    {
        $obyekWisata = ObyekWisata::findOrFail($id);
        $kategoriWisatas = KategoriWisata::all();
        return view('obyek_wisata.edit', [
            'title' => 'Bendahara',
            'menu' => 'Obyek Wisata',
            'obyekWisata' => $obyekWisata,
            'kategoriWisatas' => $kategoriWisatas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $obyekWisata = ObyekWisata::findOrFail($id);

        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisatas,id',
            'fasilitas' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        foreach (['foto1', 'foto2', 'foto3', 'foto4', 'foto5'] as $foto) {
            if ($request->hasFile($foto)) {
                $data[$foto] = $request->file($foto)->store('obyek_wisata', 'public');
            }
        }

        $obyekWisata->update($data);

        return redirect()->route('obyek_wisata.index')->with('pesan', 'Obyek Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $foto1 = DB::table('obyek_wisatas')->where('id', '=', $id)->value('foto1');
        $foto2 = DB::table('obyek_wisatas')->where('id', '=', $id)->value('foto2');
        $foto3 = DB::table('obyek_wisatas')->where('id', '=', $id)->value('foto3');
        $foto4 = DB::table('obyek_wisatas')->where('id', '=', $id)->value('foto4');
        $foto5 = DB::table('obyek_wisatas')->where('id', '=', $id)->value('foto5');

        if($foto1 !== null) Storage::delete($foto1);
        if($foto2 !== null) Storage::delete($foto2);
        if($foto3 !== null) Storage::delete($foto3);
        if($foto4 !== null) Storage::delete($foto4);
        if($foto5 !== null) Storage::delete($foto5);

        $obyekWisata = ObyekWisata::findOrFail($id);
        $obyekWisata->delete();

        return redirect()->route('obyek_wisata.index')->with('pesan', 'Obyek Wisata berhasil dihapus.');
    }
}
