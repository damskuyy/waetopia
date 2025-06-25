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
            <h2>Daftar User</h2>
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="text-bold text-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($u->foto)
                                <img src="{{ asset('storage/'.$u->foto) }}" alt="Foto" class="img-fluid" width="50">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Foto" class="img-fluid" width="50">
                            @endif
                        </td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ ucfirst($u->level) }}</td>
                        <td>
                            <a href="{{ route('user.edit', $u->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('user.destroy', $u) }}" onclick="hapus (event, this)"
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