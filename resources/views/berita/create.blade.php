@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <h2>Tambah Berita</h2>
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="berita">Konten</label>
            <textarea name="berita" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="tgl_post">Tanggal Posting</label>
            <input type="date" name="tgl_post" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_kategori_berita">Kategori</label>
            <select name="id_kategori_berita" class="form-control" required>
                @foreach($kategoriBeritas as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori_berita }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection