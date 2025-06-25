@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection

@section('content')
<div class="container mt-3">
    <h3>Edit Reservasi</h3>
    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-2">
            <label>Nama (Pelanggan)</label>
            <select name="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}" {{ $reservasi->id_pelanggan == $p->id ? 'selected' : '' }}>{{ $p->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Email</label>
            <input type="text" class="form-control" 
                value="{{ $reservasi->pelanggan && $reservasi->pelanggan->user ? $reservasi->pelanggan->user->email : '-' }}" readonly>
        </div>
        <div class="mb-2">
            <label>Paket Wisata</label>
            <select name="id_paket" class="form-control" required>
                <option value="">Pilih Paket</option>
                @foreach($paketWisatas as $p)
                    <option value="{{ $p->id }}" {{ $reservasi->id_paket == $p->id ? 'selected' : '' }}>{{ $p->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Tgl Mulai</label>
            <input type="datetime-local" name="tgl_reservasi_wisata" class="form-control"
                value="{{ $reservasi->tgl_reservasi_wisata ? \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->format('Y-m-d\TH:i') : '' }}" required>
        </div>
        <div class="mb-2">
            <label>Tgl Selesai</label>
            <input type="datetime-local" name="tgl_selesai_reservasi" class="form-control"
                value="{{ $reservasi->tgl_selesai_reservasi ? \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div class="mb-2">
            <label>Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" class="form-control" min="1" value="{{ $reservasi->jumlah_peserta }}" required>
        </div>
        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" min="0" value="{{ $reservasi->harga }}" readonly>
        </div>
        <div class="mb-2">
            <label>Subtotal</label>
            <input type="number" name="subtotal" class="form-control" value="{{ $reservasi->subtotal }}" readonly>
        </div>
        <div class="mb-2">
            <label>Diskon</label>
            <select name="id_diskon" class="form-control">
                <option value="">Tidak Ada</option>
                @foreach($diskons as $d)
                    <option value="{{ $d->id }}" {{ $reservasi->id_diskon == $d->id ? 'selected' : '' }}>{{ $d->nama_diskon }} ({{ $d->persentase_diskon }}%)</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Nilai Diskon</label>
            <input type="number" name="nilai_diskon" class="form-control" value="{{ $reservasi->nilai_diskon }}" readonly>
        </div>
        <div class="mb-2">
            <label>Total Bayar</label>
            <input type="number" name="total_bayar" class="form-control" value="{{ $reservasi->total_bayar }}" readonly>
        </div>
        <div class="mb-2">
            <label>Metode Pembayaran</label>
            <select name="id_metode_pembayaran" class="form-control">
                <option value="">Pilih Metode</option>
                @foreach($metodePembayarans as $m)
                    <option value="{{ $m->id }}" {{ $reservasi->id_metode_pembayaran == $m->id ? 'selected' : '' }}>{{ $m->metode_pembayaran }} ({{ $m->nomor_rekening }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Bukti Transfer</label>
            @if($reservasi->file_bukti_tf)
                <a href="{{ Storage::url($reservasi->file_bukti_tf) }}" target="_blank">Lihat Bukti</a><br>
            @endif
            <input type="file" name="file_bukti_tf" class="form-control">
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="status_reservasi_wisata" class="form-control" required>
                <option value="Dipesan" {{ $reservasi->status_reservasi_wisata == 'Dipesan' ? 'selected' : '' }}>Dipesan</option>
                <option value="Dibayar" {{ $reservasi->status_reservasi_wisata == 'Dibayar' ? 'selected' : '' }}>Dibayar</option>
                <option value="Selesai" {{ $reservasi->status_reservasi_wisata == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Dibatalkan" {{ $reservasi->status_reservasi_wisata == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection