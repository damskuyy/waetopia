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
            <h2>Edit Diskon</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('diskon.update', $diskon->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-2">
                    <label>Kode Diskon</label>
                    <input type="text" name="kode_diskon" class="form-control" value="{{ $diskon->kode_diskon }}" required>
                </div>
                <div class="mb-2">
                    <label>Nama Diskon</label>
                    <input type="text" name="nama_diskon" class="form-control" value="{{ $diskon->nama_diskon }}" required>
                </div>
                <div class="mb-2">
                    <label>Persentase Diskon (%)</label>
                    <input type="number" name="persentase_diskon" class="form-control" step="0.01" value="{{ $diskon->persentase_diskon }}" required>
                </div>
                <div class="mb-2">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ $diskon->tanggal_mulai }}" required>
                </div>
                <div class="mb-2">
                    <label>Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" class="form-control" value="{{ $diskon->tanggal_berakhir }}" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $diskon->deskripsi }}</textarea>
                </div>
                <div class="mb-2">
                    <label>Aktif</label>
                    <select name="aktif" class="form-control" required>
                        <option value="1" {{ $diskon->aktif ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ !$diskon->aktif ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('diskon.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
