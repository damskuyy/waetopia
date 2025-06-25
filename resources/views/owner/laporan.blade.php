@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container">
    <h1>Laporan Omset</h1>
    <form method="POST" action="{{ route('owner.laporan') }}">
    @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-4">
                <label for="end_date">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <h3 class="mt-4">Statistik</h3>
    <p>Total Omset: Rp {{ $totalOmset ?? 'Data tidak tersedia' }}</p>
    <p>Total Selesai: {{ $totalSelesai ?? 'Data tidak tersedia' }}</p>
    <p>Total Cancel: {{ $totalCancel ?? 'Data tidak tersedia' }}</p>
    <p>Total Dibayar: {{ $totalDibayar ?? 'Data tidak tersedia' }}</p>
    <p>Total Dipesan: {{ $totalDipesan ?? 'Data tidak tersedia' }}</p>

    <h3 class="mt-4">Data Reservasi</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Reservasi</th>
                <th>Status</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $reservasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservasi->tgl_reservasi_wisata }}</td>
                    <td>{{ ucfirst($reservasi->status_reservasi_wisata) }}</td>
                    <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('owner.laporan.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success">Export ke Excel</a>
    <a href="{{ route('owner.laporan.exportPdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-danger">Export ke PDF</a>
</div>
@endsection