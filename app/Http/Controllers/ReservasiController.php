<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use App\Models\Diskon;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['pelanggan.user', 'paketWisata', 'diskon', 'metodePembayaran'])->get();
        return view('reservasi.index', compact('reservasis'), [
            'title' => 'Bendahara',
            'menu' => 'Reservasi'
        ]);
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $paketWisatas = PaketWisata::all();
        $diskons = Diskon::all();
        $metodePembayarans = MetodePembayaran::all();
        return view('reservasi.create', compact('pelanggans', 'paketWisatas', 'diskons', 'metodePembayarans'), [
            'title' => 'Bendahara',
            'menu' => 'Reservasi'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_paket' => 'required|exists:paket_wisatas,id',
            'id_diskon' => 'nullable|exists:diskons,id',
            'id_metode_pembayaran' => 'nullable|exists:metode_pembayarans,id',
            'tgl_reservasi_wisata' => 'required|date',
            'tgl_selesai_reservasi' => 'nullable|date|after_or_equal:tgl_reservasi_wisata',
            'jumlah_peserta' => 'required|integer|min:1',
            'file_bukti_tf' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status_reservasi_wisata' => 'required|in:Dipesan,Dibayar,Selesai,Dibatalkan',
        ]);

        $pelanggan = Pelanggan::find($validated['id_pelanggan']);
        $paket = PaketWisata::find($validated['id_paket']);
        $harga = $paket->harga_per_pack;
        $nilaiDiskon = 0;
        $persentaseDiskon = 0;
        if (!empty($validated['id_diskon'])) {
            $diskon = Diskon::find($validated['id_diskon']);
            $persentaseDiskon = $diskon->persentase_diskon;
            $nilaiDiskon = ($persentaseDiskon / 100) * $harga * $validated['jumlah_peserta'];
        }
        $subtotal = $harga * $validated['jumlah_peserta'];
        $totalBayar = $subtotal - $nilaiDiskon;

        $filePath = null;
        if ($request->hasFile('file_bukti_tf')) {
            $filePath = $request->file('file_bukti_tf')->store('bukti_transfer', 'public');
        }

        Reservasi::create([
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_paket' => $validated['id_paket'],
            'id_diskon' => $validated['id_diskon'] ?? null,
            'id_metode_pembayaran' => $validated['id_metode_pembayaran'] ?? null,
            'nama_pelanggan' => $pelanggan->nama_lengkap,
            'email' => $pelanggan->email ?? null,
            'tgl_reservasi_wisata' => $validated['tgl_reservasi_wisata'],
            'tgl_selesai_reservasi' => $validated['tgl_selesai_reservasi'] ?? null,
            'harga' => $harga,
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'persentase_diskon' => $persentaseDiskon,
            'nilai_diskon' => $nilaiDiskon,
            'subtotal' => $subtotal,
            'total_bayar' => $totalBayar,
            'file_bukti_tf' => $filePath,
            'status_reservasi_wisata' => $validated['status_reservasi_wisata'],
        ]);

        return redirect()->route('reservasi.index')->with('pesan', 'Reservasi berhasil dibuat!');
    }

    public function show(Reservasi $reservasi)
    {
        $reservasi->load(['pelanggan', 'paketWisata', 'diskon', 'metodePembayaran']);
        return view('reservasi.show', compact('reservasi'), [
            'title' => 'Bendahara',
            'menu' => 'Reservasi'
        ]);
    }

    public function edit(Reservasi $reservasi)
    {
        $pelanggans = Pelanggan::all();
        $paketWisatas = PaketWisata::all();
        $diskons = Diskon::all();
        $metodePembayarans = MetodePembayaran::all();
        return view('reservasi.edit', compact('reservasi', 'pelanggans', 'paketWisatas', 'diskons', 'metodePembayarans'), [
            'title' => 'Bendahara',
            'menu' => 'Reservasi'
        ]);
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_paket' => 'required|exists:paket_wisatas,id',
            'id_diskon' => 'nullable|exists:diskons,id',
            'id_metode_pembayaran' => 'nullable|exists:metode_pembayarans,id',
            'tgl_reservasi_wisata' => 'required|date',
            'tgl_selesai_reservasi' => 'nullable|date|after_or_equal:tgl_reservasi_wisata',
            'jumlah_peserta' => 'required|integer|min:1',
            'file_bukti_tf' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status_reservasi_wisata' => 'required|in:Dipesan,Dibayar,Selesai,Dibatalkan',
        ]);

        $pelanggan = Pelanggan::find($validated['id_pelanggan']);
        $paket = PaketWisata::find($validated['id_paket']);
        $harga = $paket->harga_per_pack;
        $nilaiDiskon = 0;
        $persentaseDiskon = 0;
        if (!empty($validated['id_diskon'])) {
            $diskon = Diskon::find($validated['id_diskon']);
            $persentaseDiskon = $diskon->persentase_diskon;
            $nilaiDiskon = ($persentaseDiskon / 100) * $harga * $validated['jumlah_peserta'];
        }
        $subtotal = $harga * $validated['jumlah_peserta'];
        $totalBayar = $subtotal - $nilaiDiskon;

        $filePath = $reservasi->file_bukti_tf;
        if ($request->hasFile('file_bukti_tf')) {
            if ($reservasi->file_bukti_tf) {
                Storage::delete('public/' . $reservasi->file_bukti_tf);
            }
            $filePath = $request->file('file_bukti_tf')->store('bukti_transfer', 'public');
        }

        $reservasi->update([
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_paket' => $validated['id_paket'],
            'id_diskon' => $validated['id_diskon'] ?? null,
            'id_metode_pembayaran' => $validated['id_metode_pembayaran'] ?? null,
            'nama_pelanggan' => $pelanggan->nama_lengkap,
            'email' => $pelanggan->email ?? null,
            'tgl_reservasi_wisata' => $validated['tgl_reservasi_wisata'],
            'tgl_selesai_reservasi' => $validated['tgl_selesai_reservasi'] ?? null,
            'harga' => $harga,
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'persentase_diskon' => $persentaseDiskon,
            'nilai_diskon' => $nilaiDiskon,
            'subtotal' => $subtotal,
            'total_bayar' => $totalBayar,
            'file_bukti_tf' => $filePath,
            'status_reservasi_wisata' => $validated['status_reservasi_wisata'],
        ]);

        return redirect()->route('reservasi.index')->with('pesan', 'Reservasi berhasil diperbarui!');
    }

    public function destroy(Reservasi $reservasi)
    {
        if ($reservasi->file_bukti_tf) {
            Storage::delete('public/' . $reservasi->file_bukti_tf);
        }
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('pesan', 'Reservasi berhasil dihapus.');
    }

    public function downloadPdf($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Konversi bukti transfer ke Base64 (jika ada)
        $buktiBase64 = null;
        if ($reservasi->file_bukti_tf && file_exists(public_path($reservasi->file_bukti_tf))) {
            $buktiPath = public_path($reservasi->file_bukti_tf);
            $buktiBase64 = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($buktiPath));
        }

        $pdf = Pdf::loadView('be.reservasi.pdf', [
            'reservasi' => $reservasi,
            'buktiBase64' => $buktiBase64,
        ]);
        return $pdf->download('Data Reservasi Desa Wisata Waerebo.pdf');
    }
}