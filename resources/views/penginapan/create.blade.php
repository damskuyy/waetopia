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
            <h2>Tambah Penginapan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('penginapan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_penginapan">Nama Penginapan</label>
                    <input type="text" name="nama_penginapan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="foto1">Foto 1</label>
                    <input type="file" name="foto1" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="foto2">Foto 2</label>
                    <input type="file" name="foto2" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="foto3">Foto 3</label>
                    <input type="file" name="foto3" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="foto4">Foto 4</label>
                    <input type="file" name="foto4" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="foto5">Foto 5</label>
                    <input type="file" name="foto5" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('penginapan.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection