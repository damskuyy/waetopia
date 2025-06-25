<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketWisata = PaketWisata::all();
        return view('paket_wisata.index', compact('paketWisata'), [
            'title' => 'Bendahara',
            'menu' => 'Paket Wisata',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket_wisata.create', [
            'title' => 'Bendahara',
            'menu' => 'Paket Wisata',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nama_paket' => 'required|string|max:255',
        //     'deskripsi' => 'required|string',
        //     'fasilitas' => 'required|string',
        //     'harga_per_pack' => 'required|numeric',
        //     'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // $data = $request->all();

        // // Upload foto1
        // if ($request->hasFile('foto1')) {
        //     $data['foto1'] = $request->file('foto1')->store('paket_wisata', 'public');
        // }
        // if ($request->hasFile('foto2')) {
        //     $data['foto2'] = $request->file('foto2')->store('paket_wisata', 'public');
        // }
        // if ($request->hasFile('foto3')) {
        //     $data['foto3'] = $request->file('foto3')->store('paket_wisata', 'public');
        // }
        // if ($request->hasFile('foto4')) {
        //     $data['foto4'] = $request->file('foto4')->store('paket_wisata', 'public');
        // }
        // if ($request->hasFile('foto5')) {
        //     $data['foto5'] = $request->file('foto5')->store('paket_wisata', 'public');
        // }

        // PaketWisata::create($data);

        // return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata berhasil ditambahkan.');

        $PaketWisata = DB::table('paket_wisatas')->where('nama_paket', '=', $request->nama_paket)->value('nama_paket');

        // dd($PaketWisata);

        if($PaketWisata){
            return view('paket_wisata.create', [
                'title' => 'Bendahara',
                'menu' => 'Paket Wisata',
                'PaketWisata' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'hargaPaket' => $request->harga_per_pack,
                'pesan' => 'Package ' . $request['nama_paket'] . ' is already in the database!'
            ]);
            // return redirect()->route('paket.create')->with('duplikat', 'Package ' . $request['nama_paket'] . ' is already in the database!');
        }else{
            $data = $request->only([
                'nama_paket', 'deskripsi', 'fasilitas', 'harga_per_pack'
            ]);
            if($request->file('foto1') !== null) {
                $data['foto1'] = $request->file('foto1')->store('paket_wisata', 'public');
            }
            if($request->file('foto2') !== null) {
                $data['foto2'] = $request->file('foto2')->store('paket_wisata', 'public');
            }
            if($request->file('foto3') !== null) {
                $data['foto3'] = $request->file('foto3')->store('paket_wisata', 'public');
            }
            if($request->file('foto4') !== null) {
                $data['foto4'] = $request->file('foto4')->store('paket_wisata', 'public');
            }
            if($request->file('foto5') !== null) {
                $data['foto5'] = $request->file('foto5')->store('paket_wisata', 'public');
            }
            $simpan = PaketWisata::create($data);
            if($simpan){
                return redirect()->route('paket_wisata.index')->with('pesan', 'The New ' . $data['nama_paket'] . ' package was successfully saved!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paketWisata = PaketWisata::findOrFail($id);

        return view('paket_wisata.show', [
            'title' => 'Bendahara',
            'menu' => 'Paket Wisata',
            'paketWisata' => $paketWisata,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $paketWisata = PaketWisata::find($id);
        // return view('paket_wisata.edit', compact('paketWisata'));

        $paket = PaketWisata::find($id);
        return view('paket_wisata.edit', [
            'title' => 'Bendahara',
            'menu' => 'Paket Wisata',
            'data' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'nama_paket' => 'required|string|max:255',
        //     'deskripsi' => 'required|string',
        //     'fasilitas' => 'required|string',
        //     'harga_per_pack' => 'required|numeric',
        //     'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // $data = $request->all();

        // // Upload foto1 jika ada
        // if ($request->hasFile('foto1')) {
        //     $data['foto1'] = $request->file('foto1')->store('paket_wisata', 'public');
        // }

        // $paketWisata->update($data);

        // return redirect()->route('paket_wisata.index')->with('success', 'Paket Wisata berhasil diperbarui.');

        $nama_paket = $request->nama_paket;
        $nama_paket_lama = DB::table('paket_wisatas')->where('id', '=', $id)->value('nama_paket');
        if(trim($nama_paket) === trim($nama_paket_lama)){
            $data = PaketWisata::find($id);
            $data->nama_paket = $request->nama_paket;
            $data->deskripsi = $request->deskripsi;
            $data->fasilitas = $request->fasilitas;
            $data->harga_per_pack = $request->harga_per_pack;
            $foto1_lama = PaketWisata::find($id)->value('foto1');
            $foto2_lama = PaketWisata::find($id)->value('foto2');
            $foto3_lama = PaketWisata::find($id)->value('foto3');
            $foto4_lama = PaketWisata::find($id)->value('foto4');
            $foto5_lama = PaketWisata::find($id)->value('foto5');

            if($request->file('foto1') !== null){
                $data['foto1'] = $request->file('foto1')->store('paket_wisata');
                Storage::delete($foto1_lama);
            }
            if($request->file('foto2') !== null){
                $data['foto2'] = $request->file('foto2')->store('paket_wisata');
                Storage::delete($foto2_lama);
            }
            if($request->file('foto3') !== null){
                $data['foto3'] = $request->file('foto3')->store('paket_wisata');
                Storage::delete($foto3_lama);
            }
            if($request->file('foto4') !== null){
                $data['foto4'] = $request->file('foto4')->store('paket_wisata');
                Storage::delete($foto4_lama);
            }
            if($request->file('foto5') !== null){
                $data['foto5'] = $request->file('foto5')->store('paket_wisata');
                Storage::delete($foto5_lama);
            }
            $data->save();
            return redirect()->route('paket_wisata.index')->with('pesan', 'Data of Travel Package ' . $nama_paket_lama . ' has been successfully edited!');
        }else if(trim($nama_paket) !== trim($nama_paket_lama)){
            $nama_paket_baru = DB::table('paket_wisatas')->where('nama_paket', '=', $request->nama_paket)->value('nama_paket');

            if($nama_paket_baru){
                return redirect()->route('paket_wisata.edit', $id)->with('pesan', 'Travel Package Name ' . $request->nama_paket . ' Data is already in the database!')->withInput();
            }else{
                $data = PaketWisata::find($id);
                $data->nama_paket = $request->nama_paket;
                $data->deskripsi = $request->deskripsi;
                $data->fasilitas = $request->fasilitas;
                $data->harga_per_pack = $request->harga_per_pack;
                $foto1_lama = PaketWisata::find($id)->value('foto1');
                $foto2_lama = PaketWisata::find($id)->value('foto2');
                $foto3_lama = PaketWisata::find($id)->value('foto3');
                $foto4_lama = PaketWisata::find($id)->value('foto4');
                $foto5_lama = PaketWisata::find($id)->value('foto5');

                if($request->file('foto1') !== null){
                    $data['foto1'] = $request->file('foto1')->store('paket_wisata', 'public');
                    Storage::delete($foto1_lama);
                }
                if($request->file('foto2') !== null){
                    $data['foto2'] = $request->file('foto2')->store('paket_wisata', 'public');
                    Storage::delete($foto2_lama);
                }
                if($request->file('foto3') !== null){
                    $data['foto3'] = $request->file('foto3')->store('paket_wisata', 'public');
                    Storage::delete($foto3_lama);
                }
                if($request->file('foto4') !== null){
                    $data['foto4'] = $request->file('foto4')->store('paket_wisata', 'public');
                    Storage::delete($foto4_lama);
                }
                if($request->file('foto5') !== null){
                    $data['foto5'] = $request->file('foto5')->store('paket_wisata', 'public');
                    Storage::delete($foto5_lama);
                }
                $data->save();
                return redirect()->route('paket_wisata.index')->with('pesan', 'Data of Travel Package ' . $nama_paket_lama . ' has been successfully edited!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foto1 = DB::table('paket_wisatas')->where('id', '=', $id)->value('foto1');
        $foto2 = DB::table('paket_wisatas')->where('id', '=', $id)->value('foto2');
        $foto3 = DB::table('paket_wisatas')->where('id', '=', $id)->value('foto3');
        $foto4 = DB::table('paket_wisatas')->where('id', '=', $id)->value('foto4');
        $foto5 = DB::table('paket_wisatas')->where('id', '=', $id)->value('foto5');

        if($foto1 !== null) Storage::delete($foto1);
        if($foto2 !== null) Storage::delete($foto2);
        if($foto3 !== null) Storage::delete($foto3);
        if($foto4 !== null) Storage::delete($foto4);
        if($foto5 !== null) Storage::delete($foto5);

        $paketWisata = PaketWisata::findOrFail($id);

        // Hapus file foto jika ada
        // if ($paketWisata->foto1) {
        //     Storage::delete('public/' . $paketWisata->foto1);
        // }
        // if ($paketWisata->foto2) {
        //     Storage::delete('public/' . $paketWisata->foto2);
        // }
        // if ($paketWisata->foto3) {
        //     Storage::delete('public/' . $paketWisata->foto3);
        // }
        // if ($paketWisata->foto4) {
        //     Storage::delete('public/' . $paketWisata->foto4);
        // }
        // if ($paketWisata->foto5) {
        //     Storage::delete('public/' . $paketWisata->foto5);
        // }

        // Hapus data dari database
        $paketWisata->delete();

        return redirect()->route('paket_wisata.index')->with('pesan', 'Paket Wisata berhasil dihapus.');
    }
}
