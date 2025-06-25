<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategoriBerita')->get();
        return view('berita.index', [
            'title' => 'Admin',
            'menu' => 'Berita',
            'beritas' => $beritas,
        ]);
    }

    public function create()
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('berita.create', [
            'title' => 'Admin',
            'menu' => 'Berita',
            'kategoriBeritas' => $kategoriBeritas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'berita' => 'required|string',
            'tgl_post' => 'required|date',
            'id_kategori_berita' => 'required|exists:kategori_beritas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('berita', 'public') : null;

        Berita::create([
            'judul' => $request->judul,
            'berita' => $request->berita,
            'tgl_post' => $request->tgl_post,
            'id_kategori_berita' => $request->id_kategori_berita,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('berita.index')->with('pesan', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategoriBeritas = KategoriBerita::all();
        return view('berita.edit', [
            'title' => 'Admin',
            'menu' => 'Berita',
            'berita' => $berita,
            'kategoriBeritas' => $kategoriBeritas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'berita' => 'required|string',
            'tgl_post' => 'required|date',
            'id_kategori_berita' => 'required|exists:kategori_beritas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $berita->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('berita');
        }

        $berita->update([
            'judul' => $request->judul,
            'berita' => $request->berita,
            'tgl_post' => $request->tgl_post,
            'id_kategori_berita' => $request->id_kategori_berita,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('berita.index')->with('pesan', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil path foto dari database
        $foto1 = DB::table('beritas')->where('id', '=', $id)->value('foto');

        // Hapus file foto jika ada
        if ($foto1 !== null) {
            Storage::delete($foto1);
        }

        // Hapus data berita
        $berita = Berita::find($id);
        if ($berita) {
            $berita->delete();
        }

        return redirect()->route('berita.index')->with('pesan', 'Berita berhasil dihapus.');
    }
}
