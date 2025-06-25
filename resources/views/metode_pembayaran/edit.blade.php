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
            <h2>Edit Metode Pembayaran</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('metode_pembayaran.update', $metode->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-2">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="metode_pembayaran" class="form-control" value="{{ $metode->metode_pembayaran }}" required>
                </div>
                <div class="mb-2">
                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control" value="{{ $metode->nomor_rekening }}" required>
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    @if($metode->foto)
                        <img src="{{ asset('storage/'.$metode->foto) }}" width="80" class="mb-2"><br>
                    @endif
                    <input type="file" name="foto" class="form-control">
                    <small>Kosongkan jika tidak ingin mengubah foto</small>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('metode_pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>  
@endsection
