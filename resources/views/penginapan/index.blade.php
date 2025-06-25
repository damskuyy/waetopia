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
            <h2>Daftar Penginapan</h2>
            <a href="{{ route('penginapan.create') }}" class="btn btn-primary">Tambah Penginapan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penginapan</th>
                        <th>Deskripsi</th>
                        <th>Fasilitas</th>
                        <th>Foto 1</th>
                        <th>Foto 2</th>
                        <th>Foto 3</th>
                        <th>Foto 4</th>
                        <th>Foto 5</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penginapan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (strlen($data['nama_penginapan']) > 10) 
                                <td data-bs-toggle="tooltip" data-bs-placement="right" 
                                    data-bs-title="{{ $data['nama_penginapan'] }}"> 
                                    {{substr($data['nama_penginapan'], 0, 10) . '...' }}</td>
                            @else
                                <td>{{ $data['nama_penginapan'] }}</td>
                            @endif
                        @if (strlen($data['deskripsi']) > 15) 
                            <td data-bs-toggle="tooltip" data-bs-placement="right" 
                                data-bs-title="{{ $data['deskripsi'] }}"> 
                                {{substr($data['deskripsi'], 0, 15) . '...' }}</td> 
                            @else
                                <td>{{ $data['deskripsi'] }}</td> 
                            @endif
                        @if (strlen($data['fasilitas']) > 15) 
                            <td data-bs-toggle="tooltip" data-bs-placement="right" 
                                data-bs-title="{{ $data['fasilitas'] }}"> 
                                {{substr($data['fasilitas'], 0, 15) . '...' }}</td> 
                        @else
                            <td>{{ $data['fasilitas'] }}</td> 
                        @endif

                        <!-- Foto -->
                        <td>
                            @if ($data['foto1'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $data['foto1']) }}" alt="Foto 1" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto1Modal_{{ $data->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto1Modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="foto1ModalLabel_{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto1ModalLabel_{{ $data->id }}">Foto 1 - {{ $data->nama_penginapan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $data['foto1']) }}" alt="Foto 1" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($data['foto2'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $data['foto2']) }}" alt="Foto 2" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto2Modal_{{ $data->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto2Modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="foto2ModalLabel_{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto2ModalLabel_{{ $data->id }}">Foto 2 - {{ $data->nama_penginapan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $data['foto2']) }}" alt="Foto 2" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($data['foto3'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $data['foto3']) }}" alt="Foto 3" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto3Modal_{{ $data->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto3Modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="foto3ModalLabel_{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto3ModalLabel_{{ $data->id }}">Foto 3 - {{ $data->nama_penginapan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $data['foto3']) }}" alt="Foto 3" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($data['foto4'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $data['foto4']) }}" alt="Foto 4" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto4Modal_{{ $data->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto4Modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="foto4ModalLabel_{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto4ModalLabel_{{ $data->id }}">Foto 4 - {{ $data->nama_penginapan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $data['foto4']) }}" alt="Foto 4" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($data['foto5'] !== null)
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $data['foto5']) }}" alt="Foto 5" style="width: 50px; cursor: pointer;" 
                                    class="img-thumbnail" data-toggle="modal" data-target="#foto5Modal_{{ $data->id }}">
                                
                                <!-- Modal -->
                                <div class="modal fade" id="foto5Modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="foto5ModalLabel_{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="foto5ModalLabel_{{ $data->id }}">Foto 5 - {{ $data->nama_penginapan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $data['foto5']) }}" alt="Foto 5" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>

                        <!-- Aksi -->
                        <td class="text-center">
                            <a href="{{ route('penginapan.show', $data->id) }}" class="mdi mdi-eye" title="Detail"></a>
                            <a href="{{ route('penginapan.edit', $data->id) }}" class="mdi mdi-open-in-new"></a>
                            <a href="{{ route('penginapan.destroy', $data) }}" onclick="hapus (event, this)"
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