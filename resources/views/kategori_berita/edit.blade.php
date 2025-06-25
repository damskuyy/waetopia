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
            <h2>Tambah Katgeori Berita</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_berita.update', $kategoriBerita->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="kategori_berita">Kategori Berita</label>
                    <input type="text" name="kategori_berita" id="kategori_berita" class="form-control" value="{{ $kategoriBerita->kategori_berita }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori_berita.index') }}" class="btn btn-secondary">Batal</a> 
            </form>
        </div>
    </div>
</div>
@endsection