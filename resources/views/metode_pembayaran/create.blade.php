@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container mt-3">
    <div class="card card-default">
        <div class="card-header">   
            <h2>Tambah Metode Pembayaran</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('metode_pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="metode_pembayaran" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('metode_pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
