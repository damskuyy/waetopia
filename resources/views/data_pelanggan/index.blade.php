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
            <h2>Daftar Pelanggan</h2>
            <a href="{{ route('data_pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $pelanggan)
                    <tr class="text-bold text-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelanggan->nama_lengkap }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>
                            @if ($pelanggan['foto'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $pelanggan['foto']) }}" alt="Foto 1" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#fotoModal_{{ $pelanggan->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="fotoModal_{{ $pelanggan->id }}" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel_{{ $pelanggan->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fotoModalLabel_{{ $pelanggan->id }}">Foto 1 - {{ $pelanggan->nama_lengkap }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $pelanggan['foto']) }}" alt="Foto 1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>{{ $pelanggan->user?->name }}</td>
                        <td>
                            <a href="{{ route('data_pelanggan.edit', $pelanggan->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('data_pelanggan.destroy', $pelanggan) }}" onclick="hapus (event, this)"
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