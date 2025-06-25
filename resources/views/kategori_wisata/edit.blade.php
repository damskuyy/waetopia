@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container">
    <h1>Edit Kategori Wisata</h1>
    <form action="{{ route('kategori_wisata.update', $kategoriWisata->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="kategori_wisata">Kategori Wisata</label>
            <input type="text" name="kategori_wisata" id="kategori_wisata" class="form-control" value="{{ $kategoriWisata->kategori_wisata }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori_wisata.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection