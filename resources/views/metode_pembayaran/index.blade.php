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
            <h2>Daftar Metode Pembayaran</h2>
            <a href="{{ route('metode_pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Metode Pembayaran</a>
        </div>
        <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Metode</th>
                        <th>No. Rekening</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($metodes as $metode)
                    <tr>
                        <td>{{ $metode->metode_pembayaran }}</td>
                        <td>{{ $metode->nomor_rekening }}</td>
                        <td>
                            @if($metode->foto)
                                <img src="{{ asset('storage/'.$metode->foto) }}" width="80">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('metode_pembayaran.edit', $metode->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('metode_pembayaran.destroy', $metode) }}" onclick="hapus (event, this)"
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