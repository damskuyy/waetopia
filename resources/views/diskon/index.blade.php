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
            <h2>Daftar Diskon</h2>
            <a href="{{ route('diskon.create') }}" class="btn btn-primary mb-3">Tambah Diskon</a>
        </div>
        <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Persentase</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Berakhir</th>
                        {{-- <th>Aktif</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diskons as $diskon)
                    <tr>
                        <td>{{ $diskon->kode_diskon }}</td>
                        <td>{{ $diskon->nama_diskon }}</td>
                        <td>{{ $diskon->persentase_diskon }}%</td>
                        <td>{{ $diskon->tanggal_mulai }}</td>
                        <td>{{ $diskon->tanggal_berakhir }}</td>
                        {{-- <td>{{ $diskon->aktif ? 'Ya' : 'Tidak' }}</td> --}}
                        <td>
                            <a href="{{ route('diskon.edit', $diskon->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('diskon.destroy', $diskon) }}" onclick="hapus (event, this)"
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