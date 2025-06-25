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
            <h2>Daftar Obyek Wisata</h2>
            <a href="{{ route('obyek_wisata.create') }}" class="btn btn-primary mb-3">Tambah Obyek Wisata</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Wisata</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Fasilitas</th>
                        <th class="text-center">Foto 1</th>
                        <th class="text-center">Foto 2</th>
                        <th class="text-center">Foto 3</th>
                        <th class="text-center">Foto 4</th>
                        <th class="text-center">Foto 5</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obyekWisatas as $obyekWisata)
                    <tr class="text-bold text-dark">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $obyekWisata->nama_wisata }}</td>
                        <td>{{ $obyekWisata->deskripsi_wisata}}</td>
                        <td>{{ $obyekWisata->kategoriWisata->kategori_wisata }}</td>
                        <td>{{ $obyekWisata->fasilitas }}</td>
                        <td>
                            @if ($obyekWisata['foto1'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $obyekWisata['foto1']) }}" alt="Foto 1" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto1Modal_{{ $obyekWisata->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto1Modal_{{ $obyekWisata->id }}" tabindex="-1" role="dialog" aria-labelledby="foto1ModalLabel_{{ $obyekWisata->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto1ModalLabel_{{ $obyekWisata->id }}">Foto 1 - {{ $obyekWisata->nama_wisata }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $obyekWisata['foto1']) }}" alt="Foto 1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($obyekWisata['foto2'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $obyekWisata['foto2']) }}" alt="Foto 2" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto2Modal_{{ $obyekWisata->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto2Modal_{{ $obyekWisata->id }}" tabindex="-1" role="dialog" aria-labelledby="foto2ModalLabel_{{ $obyekWisata->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto2ModalLabel_{{ $obyekWisata->id }}">Foto 2 - {{ $obyekWisata->nama_wisata }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $obyekWisata['foto2']) }}" alt="Foto 2" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($obyekWisata['foto3'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $obyekWisata['foto3']) }}" alt="Foto 3" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto3Modal_{{ $obyekWisata->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto3Modal_{{ $obyekWisata->id }}" tabindex="-1" role="dialog" aria-labelledby="foto3ModalLabel_{{ $obyekWisata->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto3ModalLabel_{{ $obyekWisata->id }}">Foto 3 - {{ $obyekWisata->nama_wisata }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $obyekWisata['foto3']) }}" alt="Foto 3" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($obyekWisata['foto4'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $obyekWisata['foto4']) }}" alt="Foto 4" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto4Modal_{{ $obyekWisata->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto4Modal_{{ $obyekWisata->id }}" tabindex="-1" role="dialog" aria-labelledby="foto4ModalLabel_{{ $obyekWisata->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto4ModalLabel_{{ $obyekWisata->id }}">Foto 4 - {{ $obyekWisata->nama_wisata }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $obyekWisata['foto4']) }}" alt="Foto 4" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($obyekWisata['foto5'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $obyekWisata['foto5']) }}" alt="Foto 5" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto5Modal_{{ $obyekWisata->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto5Modal_{{ $obyekWisata->id }}" tabindex="-1" role="dialog" aria-labelledby="foto5ModalLabel_{{ $obyekWisata->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto5ModalLabel_{{ $obyekWisata->id }}">Foto 5 - {{ $obyekWisata->nama_wisata }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $obyekWisata['foto5']) }}" alt="Foto 5" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('obyek_wisata.show', $obyekWisata->id) }}" class="mdi mdi-eye"></a>
                            <a href="{{ route('obyek_wisata.edit', $obyekWisata->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('obyek_wisata.destroy', $obyekWisata) }}" onclick="hapus (event, this)"
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