@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <h2>Tambah Obyek Wisata</h2>
    <form action="{{ route('obyek_wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_wisata">Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_wisata">Deskripsi Wisata</label>
            <textarea name="deskripsi_wisata" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_kategori_wisata">Kategori Wisata</label>
            <select name="id_kategori_wisata" class="form-control" required>
                @foreach($kategoriWisatas as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori_wisata }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <textarea name="fasilitas" class="form-control" rows="3" required></textarea>
        </div>
        @for($i = 1; $i <= 5; $i++)
        <div class="form-group">
            <label for="foto{{ $i }}">Foto {{ $i }}</label>
            <input type="file" name="foto{{ $i }}" class="form-control-file">
        </div>
        @endfor
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('obyek_wisata.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection