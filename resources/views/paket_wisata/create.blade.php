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
        <h2>Tambah Paket Wisata</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('paket_wisata.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_paket">Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" id="nama_paket" placeholder="Masukkan Nama Paket" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Masukkan Deskripsi Paket" required></textarea>
          </div>
          <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <textarea name="fasilitas" class="form-control" id="fasilitas" rows="3" placeholder="Masukkan Fasilitas Paket" required></textarea>
          </div>
          <div class="form-group">
            <label for="harga_per_pack">Harga per Paket</label>
            <input type="number" name="harga_per_pack" class="form-control" id="harga_per_pack" placeholder="Masukkan Harga per Paket" required>
          </div>
          <div class="form-group">
            <label for="foto1">Foto 1</label>
            <input type="file" name="foto1" class="form-control-file" id="foto1">
          </div>
          <div class="form-group">
            <label for="foto2">Foto 2</label>
            <input type="file" name="foto2" class="form-control-file" id="foto2">
          </div>
          <div class="form-group">
            <label for="foto3">Foto 3</label>
            <input type="file" name="foto3" class="form-control-file" id="foto3">
          </div>
          <div class="form-group">
            <label for="foto4">Foto 4</label>
            <input type="file" name="foto4" class="form-control-file" id="foto4">
          </div>
          <div class="form-group">
            <label for="foto5">Foto 5</label>
            <input type="file" name="foto5" class="form-control-file" id="foto5">
          </div>
          <div class="form-footer mt-6">
            <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
            <a href="{{ route('paket_wisata.index') }}" class="btn btn-light btn-pill">Batal</a>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection