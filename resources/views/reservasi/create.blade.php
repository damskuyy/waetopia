{{-- filepath: resources/views/reservasi/create.blade.php --}}
@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection

@section('content')
<div class="container mt-3">
    <h3>Tambah Reservasi</h3>
    <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label>Nama (Pelanggan)</label>
            <select name="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Email</label>
            <input type="text" class="form-control" value="Otomatis dari pelanggan" readonly>
        </div>
        <div class="mb-2">
            <label>Paket Wisata</label>
            <select name="id_paket" class="form-control" required>
                <option value="">Pilih Paket</option>
                @foreach($paketWisatas as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Tgl Mulai</label>
            <input type="datetime-local" name="tgl_reservasi_wisata" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Tgl Selesai</label>
            <input type="datetime-local" name="tgl_selesai_reservasi" class="form-control">
        </div>
        <div class="mb-2">
            <label>Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" class="form-control" min="1" required>
        </div>
        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" min="0" placeholder="Otomatis dari paket, diisi backend" readonly>
        </div>
        <div class="mb-2">
            <label>Subtotal</label>
            <input type="number" name="subtotal" class="form-control" placeholder="Otomatis di backend" readonly>
        </div>
        <div class="mb-2">
            <label>Diskon</label>
            <select name="id_diskon" class="form-control">
                <option value="">Tidak Ada</option>
                @foreach($diskons as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_diskon }} ({{ $d->persentase_diskon }}%)</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Nilai Diskon</label>
            <input type="number" name="nilai_diskon" class="form-control" placeholder="Otomatis di backend" readonly>
        </div>
        <div class="mb-2">
            <label>Total Bayar</label>
            <input type="number" name="total_bayar" class="form-control" placeholder="Otomatis di backend" readonly>
        </div>
        <div class="mb-2">
            <label>Metode Pembayaran</label>
            <select name="id_metode_pembayaran" class="form-control">
                <option value="">Pilih Metode</option>
                @foreach($metodePembayarans as $m)
                    <option value="{{ $m->id }}">{{ $m->metode_pembayaran }} ({{ $m->nomor_rekening }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Bukti Transfer</label>
            <input type="file" name="file_bukti_tf" class="form-control">
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="status_reservasi_wisata" class="form-control" required>
                <option value="Dipesan">Dipesan</option>
                <option value="Dibayar">Dibayar</option>
                <option value="Selesai">Selesai</option>
                <option value="Dibatalkan">Dibatalkan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection