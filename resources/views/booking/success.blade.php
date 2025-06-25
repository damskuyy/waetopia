@extends('fe.master')
@section('content')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Konfirmasi Reservasi</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Reservation Confirmation -->
<div class="reservation-confirmation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="confirmation-card p-4 shadow-sm">
                    <div class="alert alert-success text-center">
                        <i class="fas fa-check-circle fa-3x mb-3 text-success"></i>
                        <h3 class="mb-3">Reservasi Berhasil!</h3>
                        <p>Terima kasih telah melakukan reservasi di Desa Wisata kami. Berikut detail reservasi Anda:</p>
                    </div>
                    <div class="confirmation-details mt-4">
                        <div class="row">
                            <!-- Informasi Pelanggan -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-user mr-2"></i>Informasi Pelanggan</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Nama:</strong> {{ $reservasi->nama_pelanggan }}</p>
                                        {{-- <p><strong>Email:</strong> {{ $reservasi->pelanggan->user->email ?? '-'}}</p> --}}
                                        <p><strong>No HP:</strong> {{ $reservasi->pelanggan->no_hp ?? '-' }}</p>
                                        <p><strong>Alamat:</strong> {{ $reservasi->pelanggan->alamat ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Detail Reservasi -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-calendar-alt mr-2"></i>Detail Reservasi</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Kode Reservasi:</strong> RES-{{ str_pad($reservasi->id, 5, '0', STR_PAD_LEFT) }}</p>
                                        <p><strong>Paket Wisata:</strong> {{ $reservasi->paketWisata->nama_paket ?? '-' }}</p>
                                        <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->translatedFormat('l, d F Y H:i') }}</p>
                                        @if($reservasi->tgl_selesai_reservasi)
                                        <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->translatedFormat('l, d F Y H:i') }}</p>
                                        @endif
                                        <p><strong>Status:</strong>
                                            @if($reservasi->status_reservasi_wisata == 'Dipesan')
                                                <span class="badge badge-warning p-2">Dipesan</span>
                                            @elseif($reservasi->status_reservasi_wisata == 'Dibayar')
                                                <span class="badge badge-success p-2">Dibayar</span>
                                            @elseif($reservasi->status_reservasi_wisata == 'Selesai')
                                                <span class="badge badge-primary p-2">Selesai</span>
                                            @else
                                                <span class="badge badge-danger p-2">Dibatalkan</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rincian Pembayaran -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-receipt mr-2"></i>Rincian Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Jumlah Peserta:</strong> {{ $reservasi->jumlah_peserta }} orang</p>
                                        <p><strong>Harga per Paket:</strong> Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</p>
                                        <p><strong>Subtotal:</strong> Rp {{ number_format($reservasi->subtotal, 0, ',', '.') }}</p>
                                        @if($reservasi->diskon)
                                            <p><strong>Diskon:</strong> {{ $reservasi->persentase_diskon }}% (Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }})</p>
                                        @else
                                            <p><strong>Diskon:</strong> -</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Total Bayar:</strong> <span class="h5 text-success">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</span></p>
                                        <p><strong>Metode Pembayaran:</strong> {{ $reservasi->metodePembayaran->metode_pembayaran ?? '-' }} {{ $reservasi->metodePembayaran->nomor_rekening ? '(' . $reservasi->metodePembayaran->nomor_rekening . ')' : '' }}</p>
                                        <div class="mt-3">
                                            <p><strong>Bukti Transfer:</strong></p>
                                            <td>
                                                @if ($reservasi['file_bukti_tf'] !== null)
                                                    <!-- Thumbnail -->
                                                    <img src="{{ asset('storage/' . $reservasi['file_bukti_tf']) }}" alt="Foto 1" style="width: 50px; cursor: pointer;" 
                                                        class="img-thumbnail" data-toggle="modal" data-target="#foto1Modal_{{ $reservasi->id }}">
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="foto1Modal_{{ $reservasi->id }}" tabindex="-1" role="dialog" aria-labelledby="foto1ModalLabel_{{ $reservasi->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="foto1ModalLabel_{{ $reservasi->id }}">Foto 1 - {{ $reservasi->paketWisata->nama_paket }}</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <img src="{{ asset('storage/' . $reservasi['file_bukti_tf']) }}" alt="Foto 1" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Aksi -->
                        <div class="text-center mt-4">
                            <a href="{{ route('booking.form') }}" class="btn btn-outline-primary mr-2">
                                <i class="fas fa-plus-circle"></i> Buat Reservasi Baru
                            </a>
                            <a href="{{ route('booking.pdf', $reservasi->id) }}" class="btn btn-outline-danger mr-2">
                                <i class="fas fa-file-pdf"></i> Cetak PDF
                            </a>
                            {{-- <button onclick="window.print()" class="btn btn-outline-secondary">
                                <i class="fas fa-print"></i> Cetak Invoice
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Reservation Confirmation -->

<style>
    .reservation-confirmation {
        padding: 60px 0;
        background-color: #f8f9fa;
    }
    .confirmation-card {
        background: #fff;
        border-radius: 10px;
    }
    .card-header {
        font-weight: 600;
    }
    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }
    .badge-success {
        background-color: #28a745;
    }
    .badge-primary {
        background-color: #007bff;
    }
    .badge-danger {
        background-color: #dc3545;
    }
</style>
@endsection