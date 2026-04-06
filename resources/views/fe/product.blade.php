<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Packages</h2>
                    <p class="text-muted">Temukan paket wisata terbaik yang sudah tersedia dan rencanakan petualangan Anda bersama kami.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".wisata">Wisata</button>
                        <button data-filter=".homestay">Homestay</button>
                        <button data-filter=".paket-wisata">Paket Wisata</button>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="row special-list">
            @forelse ($paketWisatas as $paket)
                <div class="col-lg-4 col-md-6 special-grid paket-wisata">
                    <div class="gallery-single fix">
                        <img src="{{ asset($paket->foto1 ? 'storage/' . $paket->foto1 : 'fe/images/img-01.jpg') }}" class="img-fluid" alt="{{ $paket->nama_paket }}">
                        <div class="why-text">
                            <h4>{{ $paket->nama_paket }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($paket->deskripsi, 80) }}</p>
                            <h5>Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-secondary">Belum ada paket wisata yang tersedia saat ini. Silakan kunjungi halaman paket untuk melihat update terbaru.</p>
                </div>
            @endforelse
        </div>

        <div class="row">
            <div class="col-lg-12 text-center mt-4">
                <a href="/packages" class="nav-link btn-login btn-lg">Lihat Semua Paket</a>
            </div>
        </div>
    </div>
</div>
<!-- End Menu -->