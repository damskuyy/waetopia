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
            <h2>Daftar Karyawan</h2>
            <a href="{{ route('data_karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Jabatan</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $karyawan)
                    <tr class="text-bold text-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->nama_karyawan }}</td>
                        <td>{{ $karyawan->alamat }}</td>
                        <td>{{ $karyawan->no_hp }}</td>
                        <td>{{ ucfirst($karyawan->jabatan) }}</td>
                        <td>{{ $karyawan->user->name }}</td>
                        <td>
                            <a href="{{ route('data_karyawan.edit', $karyawan->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('data_karyawan.destroy', $karyawan) }}" onclick="hapus (event, this)"
                                        class="mdi mdi-close text-danger"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form action="" id="delete" method="POST">
    @method('delete')
    @csrf 
</form>
    
<script>
    const body = document.getElementById('body')
    const form = document.getElementById('delete')

    function hapus(event, el){
        event.preventDefault()
        swal({
            title: "Are you sure?",
            text: "Your will delete this package permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                form.setAttribute('action', el.getAttribute('href'))
                form.submit()
            });
    }

    function tampil_pesan(){
        const pesan = "{{session('pesan')}}"

        if(pesan.trim() !== ''){
            swal('Good Job', pesan, 'success')
        }
    }

    body.onload = function(){
        tampil_pesan()
    }
</script>
@endsection
@section('footer')
    @include('be.footer')
@endsection