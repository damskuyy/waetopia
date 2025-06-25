@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection

@section('content')
<div class="container-fluid">
    <h2>Edit Karyawan</h2>
    <form action="{{ route('data_karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control" value="{{ $karyawan->nama_karyawan }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $karyawan->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $karyawan->no_hp }}" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="administrasi" {{ $karyawan->jabatan == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                <option value="bendahara" {{ $karyawan->jabatan == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                <option value="pemilik" {{ $karyawan->jabatan == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_user">User</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $karyawan->id_user == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('data_karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection