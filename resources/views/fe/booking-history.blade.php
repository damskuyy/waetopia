@extends('fe.master')

@section('content')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Riwayat Booking</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Booking History -->
<div class="booking-history-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center mb-4">
                    <h2>Riwayat Reservasi Wisata Anda</h2>
                    <p>Lihat semua reservasi yang telah Anda buat</p>
                </div>
            </div>
        </div>

        @if($reservasis->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Paket Wisata</th>
                            <th>Tanggal Reservasi</th>
                            <th>Jumlah Peserta</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasis as $reservasi)
                            <tr>
                                <td>{{ $loop->iteration + ($reservasis->currentPage() - 1) * $reservasis->perPage() }}</td>
                                <td>{{ $reservasi->paketWisata->nama_paket ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->format('d M Y H:i') }}</td>
                                <td>{{ $reservasi->jumlah_peserta }} orang</td>
                                <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                                <td>
                                    @if($reservasi->status_reservasi_wisata == 'Dipesan')
                                        <span class="badge bg-warning text-dark">Dipesan</span>
                                    @elseif($reservasi->status_reservasi_wisata == 'Dibayar')
                                        <span class="badge bg-info">Dibayar</span>
                                    @elseif($reservasi->status_reservasi_wisata == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($reservasi->status_reservasi_wisata == 'Dibatalkan')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('booking.success', $reservasi->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('booking.pdf', $reservasi->id) }}" class="btn btn-sm btn-danger" title="Download PDF">
                                        <i class="mdi mdi-file-pdf"></i> PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($reservasis->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $reservasis->links() }}
                </div>
            @endif
        @else
            <div class="alert alert-info text-center" role="alert">
                <h5>Belum Ada Riwayat Booking</h5>
                <p>Anda belum melakukan reservasi apapun. <a href="{{ route('booking.index') }}">Pesan sekarang</a></p>
            </div>
        @endif

        <!-- Tombol Kembali -->
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <a href="{{ route('home.index') }}" class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Booking History -->

<style>
.booking-history-box {
    padding: 50px 0;
    background-color: #f8f9fa;
    min-height: 500px;
}

.table-hover tbody tr:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.badge {
    padding: 0.5rem 0.75rem;
}
</style>
@endsection
