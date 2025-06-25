<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\ObyekWisata;
use App\Models\Penginapan;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketWisatas = PaketWisata::all();
        $penginapans = Penginapan::all();
        $obyekWisatas = ObyekWisata::all();

        return view('packages.index', compact('paketWisatas', 'penginapans', 'obyekWisatas'), [
            'title' => 'Packages',
            'menu' => 'Packages',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:paket,obyek,penginapan',
            'id' => 'required|integer',
        ]);

        $packages = session()->get('packages', []);

        if ($request->type === 'paket') {
            $item = PaketWisata::findOrFail($request->id);
            $type = 'Paket Wisata';
        } elseif ($request->type === 'obyek') {
            $item = ObyekWisata::findOrFail($request->id);
            $type = 'Obyek Wisata';
        } elseif ($request->type === 'penginapan') {
            $item = Penginapan::findOrFail($request->id);
            $type = 'Penginapan';
        }

        if (isset($packages[$request->type][$item->id])) {
            $packages[$request->type][$item->id]['quantity']++;
        } else {
            $packages[$request->type][$item->id] = [
                'nama' => $item->nama ?? $item->nama_paket ?? $item->nama_penginapan,
                'harga' => $item->harga ?? $item->harga_paket ?? $item->harga_penginapan,
                'foto' => $item->foto1 ?? null,
                'quantity' => 1,
                'type' => $type,
            ];
        }

        session()->put('packages', $packages);

        return redirect()->route('packages.index')->with('success', "$type berhasil ditambahkan ke daftar.");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type, $id)
    {
        $packages = session()->get('packages', []);

        if (isset($packages[$type][$id])) {
            $packages[$type][$id]['quantity'] = $request->input('quantity', 1);
            session()->put('packages', $packages);
        }

        return redirect()->route('packages.index')->with('success', 'Daftar diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, $id)
    {
        $packages = session()->get('packages', []);

        if (isset($packages[$type][$id])) {
            unset($packages[$type][$id]);
            session()->put('packages', $packages);
        }

        return redirect()->route('packages.index')->with('success', 'Item dihapus dari daftar.');
    }

    /**
     * Clear all items from the packages.
     */
    public function clear()
    {
        session()->forget('packages');
        return redirect()->route('packages.index')->with('success', 'Daftar dikosongkan.');
    }
}
