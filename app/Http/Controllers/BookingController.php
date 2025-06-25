<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use App\Models\Reservasi;
use App\Models\Diskon;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $paketWisatas = PaketWisata::all();
        $diskons = Diskon::all();
        $metodePembayarans = MetodePembayaran::all();
        return view('booking.form', compact('paketWisatas', 'diskons', 'metodePembayarans'), [
            'title' => 'Booking'
        ]);
    }
    public function create()
    {
        $paketWisatas = PaketWisata::all();
        $diskons = Diskon::all();
        $metodePembayarans = MetodePembayaran::all();
        return view('booking.form', compact('paketWisatas', 'diskons', 'metodePembayarans'), [
            'title' => 'Booking'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'id_paket' => 'required|exists:paket_wisatas,id',
            'tgl_reservasi_wisata' => 'required|date',
            'tgl_selesai_reservasi' => 'nullable|date|after_or_equal:tgl_reservasi_wisata',
            'jumlah_peserta' => 'required|integer|min:1',
            'id_diskon' => 'nullable|exists:diskons,id',
            'id_metode_pembayaran' => 'nullable|exists:metode_pembayarans,id',
            'file_bukti_tf' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
            'status_reservasi_wisata' => 'required|in:Dipesan,Dibayar,Selesai,Dibatalkan',
        ]);

        // Simpan data pelanggan (jika belum ada)
        $pelanggan = Pelanggan::updateOrCreate(
            ['id_user' => Auth::id()],
                [
                'nama_lengkap' => $validated['nama_pelanggan'],
                'no_hp' => $validated['no_hp'],
                'alamat' => $validated['alamat'],
                'id_user' => Auth::id(),
            ]
        );

        // Hitung harga, diskon, subtotal, total bayar
        $paket = PaketWisata::find($validated['id_paket']);
        $harga = $paket->harga_per_pack;
        $subtotal = $harga * $validated['jumlah_peserta'];
        $persentaseDiskon = 0;
        $nilaiDiskon = 0;
        if (!empty($validated['id_diskon'])) {
            $diskon = Diskon::find($validated['id_diskon']);
            $persentaseDiskon = $diskon->persentase_diskon;
            $nilaiDiskon = $subtotal * ($persentaseDiskon / 100);
        }
        $totalBayar = $subtotal - $nilaiDiskon;

        // Simpan bukti transfer
        $buktiTfPath = $request->file('file_bukti_tf')->store('bukti-transfer', 'public');

        // Simpan reservasi
        $reservasi = Reservasi::create([
            'id_pelanggan' => $pelanggan->id,
            'id_paket' => $validated['id_paket'],
            'id_diskon' => $validated['id_diskon'] ?? null,
            'id_metode_pembayaran' => $validated['id_metode_pembayaran'] ?? null,
            'nama_pelanggan' => $pelanggan->nama_lengkap,
            'email' => Auth::user()->email ?? null,
            'tgl_reservasi_wisata' => $validated['tgl_reservasi_wisata'],
            'tgl_selesai_reservasi' => $validated['tgl_selesai_reservasi'] ?? null,
            'harga' => $harga,
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'persentase_diskon' => $persentaseDiskon,
            'nilai_diskon' => $nilaiDiskon,
            'subtotal' => $subtotal,
            'total_bayar' => $totalBayar,
            'file_bukti_tf' => $buktiTfPath,
            'status_reservasi_wisata' => $validated['status_reservasi_wisata'],
        ]);

        return redirect()->route('booking.success', $reservasi->id);
    }

    public function success($id)
    {
        $reservasi = Reservasi::with(['pelanggan', 'paketWisata', 'diskon', 'metodePembayaran'])->findOrFail($id);
        return view('booking.success', compact('reservasi'), [
            'title' => 'Booking Success'
        ]);
    }

    public function generatePdf($id)
    {
        $reservasi = Reservasi::with(['pelanggan', 'paketWisata', 'diskon', 'metodePembayaran'])->findOrFail($id);
        $pdf = Pdf::loadView('booking.pdf', compact('reservasi'));
        return $pdf->download('Data_Reservasi_Desa_Wisata_Waerebo.pdf');
    }
}