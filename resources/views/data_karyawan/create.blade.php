@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <h2>Tambah Karyawan</h2>
    <form action="{{ route('data_karyawan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="administrasi">Administrasi</option>
                <option value="bendahara">Bendahara</option>
                <option value="pemilik">Pemilik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_user">User</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('data_karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection