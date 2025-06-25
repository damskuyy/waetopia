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
                    <h5 class="mb-0">Detail Penginapan: {{ $penginapan->nama_penginapan }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Informasi Penginapan</h6>
                            <hr>
                            <p><strong>Nama:</strong> {{ $penginapan->nama_penginapan }}</p>
                            <p><strong>Deskripsi:</strong> {{ $penginapan->deskripsi }}</p>
                            <p><strong>Fasilitas:</strong> {{ $penginapan->fasilitas }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Foto Penginapan</h6>
                            <hr>
                            <div class="row">
                                @if ($penginapan->foto1)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $penginapan->foto1) }}" alt="Foto 1" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($penginapan->foto2)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $penginapan->foto2) }}" alt="Foto 2" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($penginapan->foto3)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $penginapan->foto3) }}" alt="Foto 3" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($penginapan->foto4)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $penginapan->foto4) }}" alt="Foto 4" class="img-fluid rounded">
                                </div>
                                @endif
                                @if ($penginapan->foto5)
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $penginapan->foto5) }}" alt="Foto 5" class="img-fluid rounded">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">
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