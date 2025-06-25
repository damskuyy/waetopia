<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil tanggal dari request atau gunakan default
        // $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        // $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        // Ambil data reservasi berdasarkan rentang tanggal
        $reservasis = Reservasi::all();

        // Hitung statistik
        $totalOmset = $reservasis->where('status_reservasi_wisata', 'selesai')->sum('total_bayar');
        $totalSelesai = $reservasis->where('status_reservasi_wisata', 'selesai')->count();
        // $totalCancel = $reservasis->where('status_reservasi_wisata', 'cancel')->count();
        $totalDibayar = $reservasis->where('status_reservasi_wisata', 'dibayar')->count();
        $totalDipesan = $reservasis->where('status_reservasi_wisata', 'pesan')->count();

        // Kirim data ke tampilan
        return view('owner.index', [
            'title' => 'Owner',
            'menu' => 'Dashboard',
            'reservasis' => $reservasis,
            'totalOmset' => $totalOmset,
            'totalSelesai' => $totalSelesai,
            // 'totalCancel' => $totalCancel,
            'totalDibayar' => $totalDibayar,
            'totalDipesan' => $totalDipesan,
            // 'startDate' => $startDate,
            // 'endDate' => $endDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function laporan(Request $request)
    {
        // Ambil tanggal dari request atau gunakan default
        // $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        // $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        // Ambil data reservasi berdasarkan rentang tanggal
        $reservasis = Reservasi::all();

        // Hitung statistik
        $totalOmset = $reservasis->where('status_reservasi_wisata', 'selesai')->sum('total_bayar');
        $totalSelesai = $reservasis->where('status_reservasi_wisata', 'selesai')->count();
        // $totalCancel = $reservasis->where('status_reservasi_wisata', 'cancel')->count();
        $totalDibayar = $reservasis->where('status_reservasi_wisata', 'dibayar')->count();
        $totalDipesan = $reservasis->where('status_reservasi_wisata', 'pesan')->count();

        // Kirim data ke tampilan
        return view('owner.laporan', [
            'title' => 'Laporan Omset',
            'menu' => 'Laporan',
            'reservasis' => $reservasis,
            'totalOmset' => $totalOmset,
            'totalSelesai' => $totalSelesai,
            // 'totalCancel' => $totalCancel,
            'totalDibayar' => $totalDibayar,
            'totalDipesan' => $totalDipesan,
            // 'startDate' => $startDate,
            // 'endDate' => $endDate,
        ]);
    }

    // public function export(Request $request)
    // {
    //     // $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
    //     // $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

    //     return Excel::download(new LaporanExport(null, null), 'Laporan Reservasi Desa Waerebo.xlsx');
    // }

    public function exportPdf(Request $request)
    {
        // $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        // $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $reservasis = Reservasi::all();

        $pdf = Pdf::loadView('owner.laporan_pdf', [
            'reservasis' => $reservasis,
            'startDate' => null,
            'endDate' => null,
        ]);
        return $pdf->download('Laporan Reservasi Desa Waerebo.pdf');
    }
}
