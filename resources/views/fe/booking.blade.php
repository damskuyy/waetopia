<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reservasi Wisata</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Reservation -->
<div class="reservation-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Form Reservasi Wisata</h2>
                    <p>Silahkan isi form berikut untuk melakukan reservasi wisata</p>
                </div>
            </div>
        </div>
        @auth('pelanggan')
        <form action="{{ route('booking.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_pelanggan" value="{{ Auth::user()->nama_lengkap ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email ?? '' }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nomor HP</label>
                    <input type="text" class="form-control" name="no_hp" value="{{ Auth::user()->no_hp ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="2" required>{{ Auth::user()->alamat ?? '' }}</textarea>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Paket Wisata</label>
                    <select name="id_paket" id="id_paket" class="form-control" required>
                        <option value="">Pilih Paket</option>
                        @foreach($paketWisatas as $p)
                            <option value="{{ $p->id }}" data-harga="{{ $p->harga_per_pack }}">{{ $p->nama_paket }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tgl Mulai</label>
                    <input type="datetime-local" name="tgl_reservasi_wisata" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tgl Selesai</label>
                    <input type="datetime-local" name="tgl_selesai_reservasi" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah Peserta</label>
                    <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" min="1" value="1" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" readonly placeholder="Otomatis dari paket">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Subtotal</label>
                    <input type="number" name="subtotal" id="subtotal" class="form-control" readonly placeholder="Otomatis">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Diskon</label>
                    <select name="id_diskon" id="id_diskon" class="form-control">
                        <option value="">Tidak Ada</option>
                        @foreach($diskons as $d)
                            <option value="{{ $d->id }}" data-persentase="{{ $d->persentase_diskon }}">{{ $d->nama_diskon }} ({{ $d->persentase_diskon }}%)</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nilai Diskon</label>
                    <input type="number" name="nilai_diskon" id="nilai_diskon" class="form-control" readonly placeholder="Otomatis">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Total Bayar</label>
                    <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly placeholder="Otomatis">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Metode Pembayaran</label>
                    <select name="id_metode_pembayaran" class="form-control">
                        <option value="">Pilih Metode</option>
                        @foreach($metodePembayarans as $m)
                            <option value="{{ $m->id }}">{{ $m->metode_pembayaran }} ({{ $m->nomor_rekening }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Bukti Transfer</label>
                    <input type="file" name="file_bukti_tf" class="form-control" required>
                </div>
                {{-- <div class="col-md-6 mb-3">
                    <label>Bukti Transfer</label>
                    <input type="file" name="foto{{ $i }}" class="form-control-file">
                </div> --}}
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status_reservasi_wisata" class="form-control" required>
                        <option value="Dipesan">Dipesan</option>
                        <option value="Dibayar">Dibayar</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Simpan Reservasi</button>
                </div>
            </div>
        </form>
        @else
        <div class="alert alert-warning text-center">
            Anda harus <a href="{{ route('auth_fe.login') }}">login</a> terlebih dahulu untuk melakukan booking.
        </div>
        @endauth
    </div>
</div>
<!-- End Reservation -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paketSelect = document.getElementById('id_paket');
    const hargaInput = document.getElementById('harga');
    const jumlahPeserta = document.getElementById('jumlah_peserta');
    const subtotalInput = document.getElementById('subtotal');
    const diskonSelect = document.getElementById('id_diskon');
    const nilaiDiskonInput = document.getElementById('nilai_diskon');
    const totalBayarInput = document.getElementById('total_bayar');

    function hitung() {
        const harga = Number(paketSelect.options[paketSelect.selectedIndex]?.dataset.harga || 0);
        const peserta = Number(jumlahPeserta.value || 0);
        const subtotal = harga * peserta;
        subtotalInput.value = subtotal;
        hargaInput.value = harga;

        let persentaseDiskon = 0;
        if (diskonSelect.value) {
            persentaseDiskon = Number(diskonSelect.options[diskonSelect.selectedIndex].dataset.persentase || 0);
        }
        const nilaiDiskon = subtotal * (persentaseDiskon / 100);
        nilaiDiskonInput.value = nilaiDiskon;

        const totalBayar = subtotal - nilaiDiskon;
        totalBayarInput.value = totalBayar;
    }

    paketSelect.addEventListener('change', hitung);
    jumlahPeserta.addEventListener('input', hitung);
    diskonSelect.addEventListener('change', hitung);
});
</script>