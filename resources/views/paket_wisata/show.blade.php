@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Detail Paket Wisata: {{ $paketWisata->nama_paket }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Informasi Paket Wisata</h6>
                            <hr>
                            <p><strong>Nama Paket:</strong> {{ $paketWisata->nama_paket }}</p>
                            <p><strong>Deskripsi:</strong> {{ $paketWisata->deskripsi }}</p>
                            <p><strong>Fasilitas:</strong> {{ $paketWisata->fasilitas }}</p>
                            <p><strong>Harga per Pack:</strong> Rp {{ number_format($paketWisata->harga_per_pack, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Foto Paket Wisata</h6>
                            <hr>
                            <div class="row">
                                @if ($paketWisata->foto1)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $paketWisata->foto1) }}" alt="Foto 1" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($paketWisata->foto2)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $paketWisata->foto2) }}" alt="Foto 2" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($paketWisata->foto3)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $paketWisata->foto3) }}" alt="Foto 3" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($paketWisata->foto4)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $paketWisata->foto4) }}" alt="Foto 4" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($paketWisata->foto5)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $paketWisata->foto5) }}" alt="Foto 5" class="img-fluid rounded">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('paket_wisata.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection