<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriTips = KategoriBerita::where('kategori_berita', 'Tips Trekking Waerebo')->first();
        $kategoriDestinasi = KategoriBerita::where('kategori_berita', 'Destinasi Flores')->first();
        $kategoriEvent = KategoriBerita::where('kategori_berita', 'Event & Festival Lokal')->first();
        $kategoriPromo = KategoriBerita::where('kategori_berita', 'Promo Spesial Waerebo')->first();

        $beritas = [
            [
                'judul' => '7 Tips Trekking aman di Desa Waerebo untuk Pemula',
                'berita' => 'Trekking di Desa Waerebo dengan ketinggian 1.500 meter memerlukan persiapan yang matang. Tips penting: 1. Mulai trekking sejak pukul 3 pagi untuk sunrise. 2. Bawa jaket yang cukup hangat. 3. Gunakan sepatu trekking yang nyaman dan tahan air. 4. Bawa air minum 2-3 liter per orang. 5. Lakukan pemanasan sebelum memulai. 6. Ikuti pemandu lokal yang berpengalaman. 7. Jangan tergesa-gesa, nikmati setiap langkah.',
                'tgl_post' => now()->subDays(5),
                'id_kategori_berita' => $kategoriTips->id ?? 1,
                'foto' => 'fe/images/gallery1.jpg',
            ],
            [
                'judul' => 'Desa Waerebo: Destinasi Trekking Paling Spektakuler di Flores',
                'berita' => 'Desa Waerebo di Nusa Tenggara Timur adalah salah satu destinasi trekking paling menakjubkan di Indonesia. Dengan pemandangan pegunungan yang memukau, rumah-rumah tradisional Mbaru Niang yang unik, dan masyarakat lokal yang ramah, Waerebo menawarkan pengalaman wisata yang tak terlupakan. Kunjungi pada bulan April-Oktober untuk cuaca terbaik.',
                'tgl_post' => now()->subDays(10),
                'id_kategori_berita' => $kategoriDestinasi->id ?? 2,
                'foto' => 'fe/images/gallery2.jpg',
            ],
            [
                'judul' => 'Festival Budaya Waerebo 2026 - Rayakan Tradisi Bersama Kami',
                'berita' => 'Desa Waerebo akan mengadakan Festival Budaya Tahunan pada Mei 2026 dengan menampilkan pertunjukan tari tradisional Flores, upacara adat, pameran kerajinan tangan, dan kuliner lokal autentik. Acara ini adalah kesempatan sempurna untuk merasakan budaya Flores secara mendalam. Jangan lewatkan!',
                'tgl_post' => now()->subDays(3),
                'id_kategori_berita' => $kategoriEvent->id ?? 3,
                'foto' => 'fe/images/gallery3.jpg',
            ],
            [
                'judul' => 'Promo Menarik Bulan Ini: Diskon Hingga 25% untuk Paket Waerebo',
                'berita' => 'Liburan impian Anda ke Desa Waerebo sekarang lebih terjangkau! Kami menawarkan diskon hingga 25% untuk semua paket trekking, photografi, dan family package di bulan ini. Pesan sekarang dan dapatkan bonus minuman hangat tradisional Flores. Promo terbatas hanya untuk 50 pendaftar pertama!',
                'tgl_post' => now(),
                'id_kategori_berita' => $kategoriPromo->id ?? 4,
                'foto' => 'fe/images/gallery4.jpg',
            ],
            [
                'judul' => 'Panduan Fotografer: Spot Terbaik untuk Sunrise & Sunset Waerebo',
                'berita' => 'Untuk para fotografer, Desa Waerebo menawarkan spot-spot menakjubkan. Sunrise paling spektakuler terlihat dari Puncak Desa dengan latar belakang pegunungan yang berbukit. Untuk sunset, coba ambil dari area sekitar rumah tradisional Mbaru Niang. Waktu terbaik: 30 menit sebelum sunrise dan 1 jam sebelum sunset untuk golden hour yang sempurna.',
                'tgl_post' => now()->subDays(7),
                'id_kategori_berita' => $kategoriTips->id ?? 1,
                'foto' => 'fe/images/gallery5.jpg',
            ],
            [
                'judul' => 'Rumah Tradisional Mbaru Niang: Arsitektur Legendaris Flores',
                'berita' => 'Rumah tradisional Mbaru Niang merupakan kebanggaan Desa Waerebo. Dengan bentuk karakteristik bumbung tinggi dan arsitektur yang mencerminkan filosofi masyarakat Flores, setiap rumah memiliki cerita dan makna tersendiri. Komunitas lokal dengan senang hati memandu wisatawan untuk memahami setiap detail dan nilai budaya di balik arsitektur megah ini.',
                'tgl_post' => now()->subDays(15),
                'id_kategori_berita' => $kategoriDestinasi->id ?? 2,
                'foto' => 'fe/images/gallery6.jpg',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
