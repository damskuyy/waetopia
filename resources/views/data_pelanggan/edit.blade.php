@extends('be.master')
@section('navbar')
    @include('be.navbar')  
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <h2>Edit Pelanggan</h2>
    <form action="{{ route('data_pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ $pelanggan->nama_lengkap }}" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $pelanggan->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="id_user">User</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $pelanggan->id_user == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            @if($pelanggan->foto)
                <div>
                    <img src="{{ asset('storage/' . $pelanggan->foto) }}" alt="Foto Pelanggan" style="width: 100px; margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" name="foto" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('data_pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection