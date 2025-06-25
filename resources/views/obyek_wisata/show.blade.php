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
            <h2>Detail Obyek Wisata</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Wisata:</label>
                <p>{{ $obyekWisata->nama_wisata }}</p>
            </div>
            <div class="form-group">
                <label>Deskripsi Wisata:</label>
                <p>{{ $obyekWisata->deskripsi_wisata }}</p>
            </div>
            <div class="form-group">
                <label>Kategori Wisata:</label>
                <p>{{ $obyekWisata->kategoriWisata->kategori_wisata }}</p>
            </div>
            <div class="form-group">
                <label>Fasilitas:</label>
                <p>{{ $obyekWisata->fasilitas }}</p>
            </div>
            <div class="form-group">
                <label>Foto:</label>
                <div>
                    @for($i = 1; $i <= 5; $i++)
                        @php $foto = 'foto' . $i; @endphp
                        @if($obyekWisata->$foto)
                            <!-- Thumbnail -->
                            <img src="{{ asset('storage/' . $obyekWisata->$foto) }}" alt="Foto {{ $i }}" style="width: 100px; margin-right: 10px; cursor: pointer;" 
                                data-bs-toggle="modal" data-bs-target="#fotoModal{{ $i }}">
                            
                            <!-- Modal -->
                            <div class="modal fade" id="fotoModal{{ $i }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $i }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fotoModalLabel{{ $i }}">Foto {{ $i }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/' . $obyekWisata->$foto) }}" alt="Foto {{ $i }}" style="width: 100%; max-height: 500px; object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
            <a href="{{ route('obyek_wisata.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
@section('footer')
    @include('be.footer')
@endsection