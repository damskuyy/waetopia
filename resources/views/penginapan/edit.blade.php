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
            <h2>Edit Penginapan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('penginapan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_penginapan">Nama Penginapan</label>
                    <input type="text" name="nama_penginapan" class="form-control" value="{{ $data->nama_penginapan }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" value="{{ $data->fasilitas }}" required>
                </div>
                <div class="form-group">
                    <label for="foto1">Foto 1</label>
                    <input type="file" name="foto1" class="form-control-file">
                    @if ($data->foto1)
                        <img src="{{ asset('storage/' . $data->foto1) }}" alt="Foto 1" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto2">Foto 2</label>
                    <input type="file" name="foto2" class="form-control-file">
                    @if ($data->foto2)
                        <img src="{{ asset('storage/' . $data->foto2) }}" alt="Foto 2" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto3">Foto 3</label>
                    <input type="file" name="foto3" class="form-control-file">
                    @if ($data->foto3)
                        <img src="{{ asset('storage/' . $data->foto3) }}" alt="Foto 3" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto4">Foto 4</label>
                    <input type="file" name="foto4" class="form-control-file">
                    @if ($data->foto4)
                        <img src="{{ asset('storage/' . $data->foto4) }}" alt="Foto 4" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="foto5">Foto 5</label>
                    <input type="file" name="foto5" class="form-control-file">
                    @if ($data->foto5)
                        <img src="{{ asset('storage/' . $data->foto5) }}" alt="Foto 5" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('penginapan.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection