<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapan = Penginapan::all();
        return view('penginapan.index', compact('penginapan'), [
            'title' => 'Bendahara',
            'menu' => 'Penginapan'
        ]);
    }

    public function create()
    {
        return view('penginapan.create', [
            'title' => 'Bendahara',
            'menu' => 'Penginapan',
        ]);
    }

    public function store(Request $request)
    {
        $Penginapan = DB::table('penginapans')->where('nama_penginapan', '=', $request->nama_penginapan)->value('nama_penginapan');

        // dd($Penginapan);

        if($Penginapan){
            return view('penginapan.create', [
                'title' => 'Bendahara',
                'menu' => 'Penginapan',
                'Penginapan' => $request->nama_penginapan,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'pesan' => 'Package ' . $request['nama_penginapan'] . ' is already in the database!'
            ]);
            // return redirect()->route('paket.create')->with('duplikat', 'Package ' . $request['nama_penginapan'] . ' is already in the database!');
        }else{
            $data = $request->only([
                'nama_penginapan', 'deskripsi', 'fasilitas', 'harga_per_pack'
            ]);
            if($request->file('foto1') !== null) {
                $data['foto1'] = $request->file('foto1')->store('penginapans', 'public');
            }
            if($request->file('foto2') !== null) {
                $data['foto2'] = $request->file('foto2')->store('penginapans', 'public');
            }
            if($request->file('foto3') !== null) {
                $data['foto3'] = $request->file('foto3')->store('penginapans', 'public');
            }
            if($request->file('foto4') !== null) {
                $data['foto4'] = $request->file('foto4')->store('penginapans', 'public');
            }
            if($request->file('foto5') !== null) {
                $data['foto5'] = $request->file('foto5')->store('penginapans', 'public');
            }
            $simpan = Penginapan::create($data);
            if($simpan){
                return redirect()->route('penginapan.index')->with('pesan', 'The New ' . $data['nama_penginapan'] . ' package was successfully saved!');
            }
        }
    }

    public function edit($id)
    {
        $paket = Penginapan::find($id);
        return view('penginapan.edit', [
            'title' => 'Bendahara',
            'menu' => 'Penginapan',
            'data' => $paket
        ]);
    }

    public function update(Request $request, $id)
    {
        $nama_penginapan = $request->nama_penginapan;
        $nama_penginapan_lama = DB::table('penginapans')->where('id', '=', $id)->value('nama_penginapan');
        if(trim($nama_penginapan) === trim($nama_penginapan_lama)){
            $data = Penginapan::find($id);
            $data->nama_penginapan = $request->nama_penginapan;
            $data->deskripsi = $request->deskripsi;
            $data->fasilitas = $request->fasilitas;
            $foto1_lama = Penginapan::find($id)->value('foto1');
            $foto2_lama = Penginapan::find($id)->value('foto2');
            $foto3_lama = Penginapan::find($id)->value('foto3');
            $foto4_lama = Penginapan::find($id)->value('foto4');
            $foto5_lama = Penginapan::find($id)->value('foto5');

            if ($request->file('foto1') !== null) {
                $data->foto1 = $request->file('foto1')->store('penginapans', 'public');
                Storage::delete($foto1_lama);
            }
            if ($request->file('foto2') !== null) {
                $data->foto2 = $request->file('foto2')->store('penginapans', 'public');
                Storage::delete($foto2_lama);
            }
            if ($request->file('foto3') !== null) {
                $data->foto3 = $request->file('foto3')->store('penginapans', 'public');
                Storage::delete($foto3_lama);
            }
            if ($request->file('foto4') !== null) {
                $data->foto4 = $request->file('foto4')->store('penginapans', 'public');
                Storage::delete($foto4_lama);
            }
            if ($request->file('foto5') !== null) {
                $data->foto5 = $request->file('foto5')->store('penginapans', 'public');
                Storage::delete($foto5_lama);
            }
            $data->save();
            return redirect()->route('penginapan.index')->with('pesan', 'Data of Homestay ' . $nama_penginapan_lama . ' has been successfully edited!');
        }else if(trim($nama_penginapan) !== trim($nama_penginapan_lama)){
            $nama_penginapan_baru = DB::table('penginapans')->where('nama_penginapan', '=', $request->nama_penginapan)->value('nama_penginapan');

            if($nama_penginapan_baru){
                return redirect()->route('penginapan.edit', $id)->with('pesan', 'Homestay Name ' . $request->nama_penginapan . ' Data is already in the database!')->withInput();
            }else{
                $data = Penginapan::find($id);
                $data->nama_penginapan = $request->nama_penginapan;
                $data->deskripsi = $request->deskripsi;
                $data->fasilitas = $request->fasilitas;
                
                $foto1_lama = Penginapan::find($id)->value('foto1');
                $foto2_lama = Penginapan::find($id)->value('foto2');
                $foto3_lama = Penginapan::find($id)->value('foto3');
                $foto4_lama = Penginapan::find($id)->value('foto4');
                $foto5_lama = Penginapan::find($id)->value('foto5');

                if ($request->file('foto1') !== null) {
                    $data->foto1 = $request->file('foto1')->store('penginapans', 'public');
                    Storage::delete($foto1_lama);
                }
                if ($request->file('foto2') !== null) {
                    $data->foto2 = $request->file('foto2')->store('penginapans', 'public');
                    Storage::delete($foto2_lama);
                }
                if ($request->file('foto3') !== null) {
                    $data->foto3 = $request->file('foto3')->store('penginapans', 'public');
                    Storage::delete($foto3_lama);
                }
                if ($request->file('foto4') !== null) {
                    $data->foto4 = $request->file('foto4')->store('penginapans', 'public');
                    Storage::delete($foto4_lama);
                }
                if ($request->file('foto5') !== null) {
                    $data->foto5 = $request->file('foto5')->store('penginapans', 'public');
                    Storage::delete($foto5_lama);
                }
                $data->save();
                return redirect()->route('penginapan.index')->with('pesan', 'Data of Homestay ' . $nama_penginapan_lama . ' has been successfully edited!');
            }
        }
    }

    public function destroy($id)
    {
        $foto1 = DB::table('penginapans')->where('id', '=', $id)->value('foto1');
        $foto2 = DB::table('penginapans')->where('id', '=', $id)->value('foto2');
        $foto3 = DB::table('penginapans')->where('id', '=', $id)->value('foto3');
        $foto4 = DB::table('penginapans')->where('id', '=', $id)->value('foto4');
        $foto5 = DB::table('penginapans')->where('id', '=', $id)->value('foto5');

        if($foto1 !== null) Storage::delete($foto1);
        if($foto2 !== null) Storage::delete($foto2);
        if($foto3 !== null) Storage::delete($foto3);
        if($foto4 !== null) Storage::delete($foto4);
        if($foto5 !== null) Storage::delete($foto5);
        Penginapan::find($id)->delete();

        $Penginapan = Penginapan::findOrFail($id);

        // Hapus file foto jika ada
        // if ($Penginapan->foto1) {
        //     Storage::delete('public/' . $Penginapan->foto1);
        // }
        // if ($Penginapan->foto2) {
        //     Storage::delete('public/' . $Penginapan->foto2);
        // }
        // if ($Penginapan->foto3) {
        //     Storage::delete('public/' . $Penginapan->foto3);
        // }
        // if ($Penginapan->foto4) {
        //     Storage::delete('public/' . $Penginapan->foto4);
        // }
        // if ($Penginapan->foto5) {
        //     Storage::delete('public/' . $Penginapan->foto5);
        // }

        // // Hapus data dari database
        // $Penginapan->delete();

        return redirect()->route('penginapan.index')->with('pesan', 'Data Penginapan berhasil dihapus.');
    }

public function show($id)
{
    $penginapan = Penginapan::findOrFail($id);

    return view('penginapan.show', [
        'title' => 'Bendahara',
        'menu' => 'Penginapan',
        'penginapan' => $penginapan,
    ]);
}
}
