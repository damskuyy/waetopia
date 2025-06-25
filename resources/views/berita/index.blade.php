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
            <h2>Daftar Berita</h2>
            <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Berita</th>
                        <th class="text-center">Tanggal Posting</th>
                        <th class="text-center">Kategori Berita</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $berita)
                    <tr class="text-bold text-dark">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->berita }}</td>
                        <td>{{ $berita->tgl_post }}</td>
                        <td>{{ $berita->kategoriBerita->kategori_berita }}</td>
                        <td>
                            @if ($berita['foto'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $berita['foto']) }}" alt="Foto 1" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#fotoModal_{{ $berita->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="fotoModal_{{ $berita->id }}" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel_{{ $berita->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fotoModalLabel_{{ $berita->id }}">Foto - {{ $berita->judul }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $berita['foto']) }}" alt="Foto 1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('berita.edit', $berita->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('berita.destroy', $berita) }}" onclick="hapus (event, this)"
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