@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection

@section('content')
<div class="container-fluid">
    <h2>Edit User</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control-file" id="foto">
            @if($user->foto)
                <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto" class="img-fluid mt-2" width="100">
            @else
                <img src="{{ asset('images/default.png') }}" alt="Foto" class="img-fluid mt-2" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control" required>
                <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="bendahara" {{ $user->level == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                <option value="pelanggan" {{ $user->level == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                <option value="pemilik" {{ $user->level == 'pemilik' ? 'selected' : '' }}>Owner</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection