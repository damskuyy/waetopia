@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Owner</h1>

    {{-- <!-- Statistik -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Omset</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalOmset, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Paket Selesai</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalSelesai }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Paket Dibatalkan</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCancel }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Paket Dibayar</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalDibayar }}</h5>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <!-- Frist box -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-default bg-secondary">
            <div class="d-flex p-5 justify-content-between">
              <div class="icon-md bg-white rounded-circle mr-3">
                <i class="mdi mdi-account-plus-outline text-secondary"></i>
              </div>
              <div class="text-right">
                <span class="h2 d-block text-white">Rp {{ number_format($totalOmset, 0, ',', '.') }}</span>
                <p class="text-white">Total Omzet</p>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Second box -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-default bg-success">
            <div class="d-flex p-5 justify-content-between">
              <div class="icon-md bg-white rounded-circle mr-3">
                <i class="mdi mdi-table-edit text-success"></i>
              </div>
              <div class="text-right">
                <span class="h2 d-block text-white">{{ $totalSelesai }}</span>
                <p class="text-white">Paket Selesai</p>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Third box -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-default bg-primary">
            <div class="d-flex p-5 justify-content-between">
              <div class="icon-md bg-white rounded-circle mr-3">
                <i class="mdi mdi-content-save-edit-outline text-primary"></i>
              </div>
              <div class="text-right">
                <span class="h2 d-block text-white">{{ $totalDipesan }}</span>
                <p class="text-white">Paket Dipesan</p>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Fourth box -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-default bg-info">
            <div class="d-flex p-5 justify-content-between">
              <div class="icon-md bg-white rounded-circle mr-3">
                <i class="mdi mdi-bell text-info"></i>
              </div>
              <div class="text-right">
                <span class="h2 d-block text-white">{{ $totalDibayar }}</span>
                <p class="text-white">Paket Dibayar</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- <div class="mt-4">
        <a href="{{ route('owner.laporan') }}" class="btn btn-primary">
            <i class="fas fa-chart-line"></i> Lihat Laporan
        </a>
    </div> --}}

    <!-- Tabel Data Reservasi -->
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

    <!-- Tombol Ekspor -->
    <div class="mt-4">
        {{-- <a href="{{ route('owner.laporan.export') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Export ke Excel
        </a> --}}
        <a href="{{ route('owner.laporan.exportPdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export ke PDF
        </a>
    </div>
</div>
@endsection
@section('footer')
    @include('be.footer')
@endsection