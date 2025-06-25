@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container mt-3">
    <h3>Detail Reservasi</h3>
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">{{ $reservasi->nama_pelanggan ?? ($reservasi->pelanggan->nama_lengkap ?? '-') }}</h4>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><strong>Email:</strong> {{ $reservasi->pelanggan && $reservasi->pelanggan->user ? $reservasi->pelanggan->user->email : '-' }}</li>
                <li class="list-group-item"><strong>Paket Wisata:</strong> {{ $reservasi->paketWisata->nama_paket ?? '-' }}</li>
                <li class="list-group-item"><strong>Tgl Mulai:</strong>
                    @if($reservasi->tgl_reservasi_wisata)
                        {{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->format('d/m/Y H:i') }}
                    @else
                        -
                    @endif
                </li>
                <li class="list-group-item"><strong>Tgl Selesai:</strong>
                    @if($reservasi->tgl_selesai_reservasi)
                        {{ \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->format('d/m/Y H:i') }}
                    @else
                        -
                    @endif
                </li>
                <li class="list-group-item"><strong>Jumlah Peserta:</strong> {{ $reservasi->jumlah_peserta }}</li>
                <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Subtotal:</strong> Rp {{ number_format($reservasi->subtotal, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Diskon:</strong>
                    @if($reservasi->diskon)
                        {{ $reservasi->diskon->nama_diskon }} ({{ $reservasi->persentase_diskon }}%)
                    @else
                        -
                    @endif
                </li>
                <li class="list-group-item"><strong>Nilai Diskon:</strong> Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Total Bayar:</strong> Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Metode Pembayaran:</strong> {{ $reservasi->metodePembayaran->metode_pembayaran ?? '-' }}</li>
                <li class="list-group-item"><strong>Bukti TF:</strong>
                    @if($reservasi->file_bukti_tf)
                        <a href="{{ Storage::url($reservasi->file_bukti_tf) }}" target="_blank">Lihat Bukti</a>
                    @else
                        -
                    @endif
                </li>
                <li class="list-group-item"><strong>Status:</strong>
                    <span class="badge 
                        @if($reservasi->status_reservasi_wisata == 'Dipesan') badge-warning
                        @elseif($reservasi->status_reservasi_wisata == 'Dibayar') badge-primary
                        @elseif($reservasi->status_reservasi_wisata == 'Selesai') badge-success
                        @else badge-danger @endif">
                        {{ $reservasi->status_reservasi_wisata }}
                    </span>
                </li>
            </ul>
            <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('reservasi.download', $reservasi->id) }}" class="btn btn-primary ml-2">
                <i class="fas fa-download"></i> Download PDF
            </a>
        </div>
    </div>
</div>
@endsection