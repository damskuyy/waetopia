@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h2>Edit Paket Wisata</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('paket_wisata.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="{{ $data->nama_paket }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required>{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control" id="fasilitas" rows="3" required>{{ $data->fasilitas }}</textarea>
                </div>
                <div class="form-group">
                    <label for="harga_per_pack">Harga per Paket</label>
                    <input type="number" name="harga_per_pack" class="form-control" id="harga_per_pack" value="{{ $data->harga_per_pack }}" required>
                </div>
                <div class="form-group">
                    <label for="foto1">Foto 1</label>
                    <input type="file" name="foto1" class="form-control-file" id="foto1">
                    @if ($data->foto1)
                        <img src="{{ asset('storage/' . $data->foto1) }}" alt="Foto 1" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto2">Foto 2</label>
                    <input type="file" name="foto2" class="form-control-file" id="foto2">
                    @if ($data->foto2)
                        <img src="{{ asset('storage/' . $data->foto2) }}" alt="Foto 2" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto3">Foto 3</label>
                    <input type="file" name="foto3" class="form-control-file" id="foto3">
                    @if ($data->foto3)
                        <img src="{{ asset('storage/' . $data->foto3) }}" alt="Foto 3" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto1">Foto 4</label>
                    <input type="file" name="foto4" class="form-control-file" id="foto4">
                    @if ($data->foto4)
                        <img src="{{ asset('storage/' . $data->foto4) }}" alt="Foto 4" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto5">Foto 5</label>
                    <input type="file" name="foto5" class="form-control-file" id="foto5">
                    @if ($data->foto5)
                        <img src="{{ asset('storage/' . $data->foto5) }}" alt="Foto 5" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
                <!-- Tambahkan input untuk foto2, foto3, foto4, dan foto5 jika diperlukan -->
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
                    <a href="{{ route('paket_wisata.index') }}" class="btn btn-light btn-pill">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection