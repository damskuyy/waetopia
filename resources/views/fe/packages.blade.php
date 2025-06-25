<!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Packages</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Packages</h2>
                        <p>Explore our amazing packages, destinations, and accommodations</p>
                    </div>
                </div>
            </div>
    
            <!-- Filter Buttons -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".wisata">Wisata</button>
                            <button data-filter=".penginapan">Penginapan</button>
                            <button data-filter=".paket-wisata">Paket Wisata</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Packages List -->
            <div class="row special-list">
                <!-- Paket Wisata -->
                @foreach ($paketWisatas as $paket)
                <div class="col-lg-4 col-md-6 special-grid paket-wisata">
                    <div class="gallery-single fix" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalPaket{{ $paket->id }}">
                        <img src="{{ asset('storage/' . ($paket->gambar ?? $paket->foto1)) }}" class="img-fluid" alt="{{ $paket->nama ?? $paket->nama_paket }}">
                        <div class="why-text">
                            <h4>{{ $paket->nama ?? $paket->nama_paket }}</h4>
                            <p>{{ $paket->deskripsi ?? '-' }}</p>
                            <h5>Rp {{ number_format($paket->harga ?? $paket->harga_per_pack, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalPaket{{ $paket->id }}" tabindex="-1" aria-labelledby="modalPaketLabel{{ $paket->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="modalPaketLabel{{ $paket->id }}">{{ $paket->nama ?? $paket->nama_paket }}</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Foto utama -->
                                        <div class="col-md-6 mb-3">
                                            <div id="owlPaket{{ $paket->id }}" class="owl-carousel owl-theme carousel-with-control">
                                                @php
                                                    $fotoList = [];
                                                    if (!empty($paket->foto1 ?? $paket->gambar)) $fotoList[] = $paket->foto1 ?? $paket->gambar;
                                                    for ($i = 2; $i <= 5; $i++) {
                                                        $foto = 'foto'.$i;
                                                        if (!empty($paket->$foto)) $fotoList[] = $paket->$foto;
                                                    }
                                                @endphp
                                                @foreach ($fotoList as $foto)
                                                <div class="single-item bg-overlay-black-40 rounded text-center">
                                                    <img class="rounded" src="{{ asset('storage/' . $foto) }}" alt="Foto Paket" style="max-width:100%;max-height:320px;object-fit:contain;display:inline-block;background:#f8f9fa;">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Info -->
                                        <div class="col-md-6">
                                            <p><strong>Nama Paket:</strong> {{ $paket->nama ?? $paket->nama_paket }}</p>
                                            <p><strong>Deskripsi:</strong> {{ $paket->deskripsi ?? '-' }}</p>
                                            <p><strong>Fasilitas:</strong> {{ $paket->fasilitas ?? '-' }}</p>
                                            <p><strong>Harga:</strong> Rp {{ number_format($paket->harga ?? $paket->harga_per_pack, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('packages.store') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="type" value="paket">
                                        <input type="hidden" name="id" value="{{ $paket->id }}">
                                        <button type="submit" class="btn btn-primary">Add to Packages</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    
                <!-- Penginapan -->
                @foreach ($penginapans as $penginapan)
                <div class="col-lg-4 col-md-6 special-grid penginapan">
                        <div class="gallery-single fix" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalPenginapan{{ $penginapan->id }}">
                        <img src="{{ asset('storage/' . ($penginapan->gambar ?? $penginapan->foto1)) }}" class="img-fluid" alt="{{ $penginapan->nama ?? $penginapan->nama_penginapan }}">
                        <div class="why-text">
                            <h4>{{ $penginapan->nama ?? $penginapan->nama_penginapan }}</h4>
                            {{-- <p>{{ $penginapan->deskripsi ?? '-' }}</p> --}}
                            <p>{{ $penginapan->fasilitas ?? '-' }}</p>
                            {{-- <h5>Rp {{ number_format($penginapan->harga_per_malam ?? $penginapan->harga_penginapan, 0, ',', '.') }}</h5> --}}
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalPenginapan{{ $penginapan->id }}" tabindex="-1" aria-labelledby="modalPenginapanLabel{{ $penginapan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="modalPenginapanLabel{{ $penginapan->id }}">{{ $penginapan->nama ?? $penginapan->nama_penginapan }}</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Foto utama dengan Owl Carousel -->
                                        <div class="col-md-6 mb-3">
                                            <div id="owlPenginapan{{ $penginapan->id }}" class="owl-carousel owl-theme carousel-with-control">
                                                @php
                                                    $fotoList = [];
                                                    if (!empty($penginapan->foto1 ?? $penginapan->gambar)) $fotoList[] = $penginapan->foto1 ?? $penginapan->gambar;
                                                    for ($i = 2; $i <= 5; $i++) {
                                                        $foto = 'foto'.$i;
                                                        if (!empty($penginapan->$foto)) $fotoList[] = $penginapan->$foto;
                                                    }
                                                @endphp
                                                @foreach ($fotoList as $foto)
                                                <div class="single-item bg-overlay-black-40 rounded text-center">
                                                    <img class="rounded" src="{{ asset('storage/' . $foto) }}" alt="Foto Penginapan" style="max-width:100%;max-height:320px;object-fit:contain;display:inline-block;background:#f8f9fa;">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Info -->
                                        <div class="col-md-6">
                                            <p><strong>Nama Penginapan:</strong> {{ $penginapan->nama ?? $penginapan->nama_penginapan }}</p>
                                            <p><strong>Deskripsi:</strong> {{ $penginapan->deskripsi ?? '-' }}</p>
                                            <p><strong>Fasilitas:</strong> {{ $penginapan->fasilitas ?? '-' }}</p>
                                            {{-- <p><strong>Harga:</strong> Rp {{ number_format($penginapan->harga_per_malam ?? $penginapan->harga_penginapan, 0, ',', '.') }}</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <form action="{{ route('packages.store') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="type" value="penginapan">
                                        <input type="hidden" name="id" value="{{ $penginapan->id }}">
                                        <button type="submit" class="btn btn-primary">Add to Packages</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    
                <!-- Obyek Wisata -->
                @foreach ($obyekWisatas as $obyek)
                <div class="col-lg-4 col-md-6 special-grid wisata">
                    <div class="gallery-single fix" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalObyek{{ $obyek->id }}">
                        <img src="{{ asset('storage/' . ($obyek->gambar ?? $obyek->foto1)) }}" class="img-fluid" alt="{{ $obyek->nama_wisata }}">
                        <div class="why-text">
                            <h4>{{ $obyek->nama_wisata }}</h4>
                            {{-- <p>{{ $obyek->deskripsi_wisata ?? '-' }}</p> --}}
                            <p>{{ $obyek->fasilitas ?? '-' }}</p>
                            <h5>{{ $obyek->kategoriWisata->kategori_wisata}}</h5>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalObyek{{ $obyek->id }}" tabindex="-1" aria-labelledby="modalObyekLabel{{ $obyek->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalObyekLabel{{ $obyek->id }}">{{ $obyek->nama_wisata }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Foto utama dengan Owl Carousel -->
                                        <div class="col-md-6 mb-3">
                                            <div id="owlObyek{{ $obyek->id }}" class="owl-carousel owl-theme carousel-with-control">
                                                @php
                                                    $fotoList = [];
                                                    if (!empty($obyek->foto1 ?? $obyek->gambar)) $fotoList[] = $obyek->foto1 ?? $obyek->gambar;
                                                    for ($i = 2; $i <= 5; $i++) {
                                                        $foto = 'foto'.$i;
                                                        if (!empty($obyek->$foto)) $fotoList[] = $obyek->$foto;
                                                    }
                                                @endphp
                                                @foreach ($fotoList as $foto)
                                                <div class="single-item bg-overlay-black-40 rounded text-center">
                                                    <img class="rounded" src="{{ asset('storage/' . $foto) }}" alt="Foto Obyek" style="max-width:100%;max-height:320px;object-fit:contain;display:inline-block;background:#f8f9fa;">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Info -->
                                        <div class="col-md-6">
                                            <p><strong>Nama Obyek:</strong> {{ $obyek->nama_wisata }}</p>
                                            <p><strong>Deskripsi:</strong> {{ $obyek->deskripsi_wisata ?? '-' }}</p>
                                            <p><strong>Kategori:</strong> {{ $obyek->kategoriWisata->kategori_wisata ?? '-' }}</p>
                                            <p><strong>Fasilitas:</strong> {{ $obyek->fasilitas ?? '-' }}</p>
                                            {{-- <p><strong>Harga Tiket:</strong> Rp {{ number_format($obyek->harga_tiket ?? 0, 0, ',', '.') }}</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <form action="{{ route('packages.store') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="type" value="obyek">
                                        <input type="hidden" name="id" value="{{ $obyek->id }}">
                                        <button type="submit" class="btn btn-primary">Add to Packages</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- End Menu -->
    
    {{-- <!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Packages</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Packages</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".drinks">Wisata</button>
                        <button data-filter=".lunch">Homestay</button>
                        <button data-filter=".dinner">Paket Wisata</button>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="row special-list">
            <div class="col-lg-4 col-md-6 special-grid drinks">
                <div class="gallery-single fix">
                    <img src="fe/images/img-01.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid drinks">
                <div class="gallery-single fix">
                    <img src="fe/images/img-02.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid drinks">
                <div class="gallery-single fix">
                    <img src="fe/images/img-03.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid lunch">
                <div class="gallery-single fix">
                    <img src="fe/images/img-04.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid lunch">
                <div class="gallery-single fix">
                    <img src="fe/images/img-05.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid lunch">
                <div class="gallery-single fix">
                    <img src="fe/images/img-06.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid dinner">
                <div class="gallery-single fix">
                    <img src="fe/images/img-07.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid dinner">
                <div class="gallery-single fix">
                    <img src="fe/images/img-08.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/booking">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 special-grid dinner">
                <div class="gallery-single fix">
                    <img src="fe/images/img-09.jpg" class="img-fluid" alt="Image">
                    <div class="why-text">
                        <a href="/tour-detail">
                            <h4>Special Drinks 1</h4>
                            <p>Sed id magna vitae eros sagittis euismod.</p>
                            <h5> $7.79</h5>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- End Menu --> --}}

<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach ($paketWisatas as $paket)
    $('#owlPaket{{ $paket->id }}').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        margin: 10,
        autoHeight: true
    });
    @endforeach

    @foreach ($penginapans as $penginapan)
    $('#owlPenginapan{{ $penginapan->id }}').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        margin: 10,
        autoHeight: true
    });
    @endforeach

    @foreach ($obyekWisatas as $obyek)
    $('#owlObyek{{ $obyek->id }}').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        margin: 10,
        autoHeight: true
    });
    @endforeach
});
</script>