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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('metode_pembayaran.update', $metode->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-2">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" value="{{ old('metode_pembayaran', $metode->metode_pembayaran) }}" required>
                    @error('metode_pembayaran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $metode->nomor_rekening) }}" required>
                    @error('nomor_rekening')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    @if($metode->foto)
                        <img src="{{ asset('storage/'.$metode->foto) }}" width="80" class="mb-2"><br>
                    @endif
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small>Kosongkan jika tidak ingin mengubah foto</small>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('metode_pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>  
@endsection
