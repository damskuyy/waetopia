<?php

namespace Database\Seeders;

use App\Models\ObyekWisata;
use App\Models\KategoriWisata;
use Illuminate\Database\Seeder;

class ObyekWisataSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriTrekking = KategoriWisata::where('kategori_wisata', 'Trekking & Hiking')->first();
        $kategoriBudaya = KategoriWisata::where('kategori_wisata', 'Budaya Lokal')->first();
        $kategoriSunrise = KategoriWisata::where('kategori_wisata', 'Sunrise/Sunset')->first();
        $kategoriNature = KategoriWisata::where('kategori_wisata', 'Nature')->first();
        $kategoriKuliner = KategoriWisata::where('kategori_wisata', 'Kuliner Tradisional')->first();
        $kategoriKerajinan = KategoriWisata::where('kategori_wisata', 'Kerajinan Lokal')->first();

        $obyek = [
            [
                'nama_wisata' => 'Desa Waerebo - Puncak Desa',
                'deskripsi_wisata' => 'Puncak Desa Waerebo yang terletak di ketinggian 1.500 meter dengan pemandangan pegunungan Flores yang menakjubkan. Tempat terbaik untuk melihat sunrise dan sunset.',
                'id_kategori_wisata' => $kategoriSunrise->id ?? 5,
                'fasilitas' => 'Jalur Trekking Aman, Pemandu Lokal, Area Photografi, Toilet',
                'foto1' => 'fe/images/slider1.jpg',
                'foto2' => 'fe/images/slider2.jpg',
                'foto3' => 'fe/images/slider3.jpg',
                'foto4' => 'fe/images/gallery1.jpg',
                'foto5' => 'fe/images/gallery2.jpg',
            ],
            [
                'nama_wisata' => 'Rumah Tradisional Mbaru Niang',
                'deskripsi_wisata' => 'Rumah adat tradisional Flores dengan arsitektur megah dan unik. Setiap rumah memiliki cerita budaya dan sejarah masyarakat Waerebo yang kaya.',
                'id_kategori_wisata' => $kategoriBudaya->id ?? 2,
                'fasilitas' => 'Tour Budaya, Pemandu Budaya, Dokumentasi, Souvenir Lokal',
                'foto1' => 'fe/images/gallery3.jpg',
                'foto2' => 'fe/images/gallery4.jpg',
                'foto3' => 'fe/images/gallery5.jpg',
                'foto4' => 'fe/images/gallery6.jpg',
                'foto5' => 'fe/images/gallery7.jpg',
            ],
            [
                'nama_wisata' => 'Jalur Trekking Pegunungan Waerebo',
                'deskripsi_wisata' => 'Jalur trekking yang menantang dengan pemandangan alam asri, hutan pinus yang indah, dan akses menuju puncak dengan panorama spektakuler.',
                'id_kategori_wisata' => $kategoriTrekking->id ?? 1,
                'fasilitas' => 'Jalur Bertanda, Pemandu Berpengalaman, Shelter, Air Minum',
                'foto1' => 'fe/images/gallery8.jpg',
                'foto2' => 'fe/images/gallery9.jpg',
                'foto3' => 'fe/images/gallery10.jpg',
                'foto4' => 'fe/images/gallery11.jpeg',
                'foto5' => 'fe/images/gallery12.jpg',
            ],
            [
                'nama_wisata' => 'Ladang Bunga Liar Waerebo',
                'deskripsi_wisata' => 'Padang bunga-bunga liar yang tumbuh alami di musim tertentu dengan warna-warna cerah yang menakjubkan untuk fotografi alam.',
                'id_kategori_wisata' => $kategoriNature->id ?? 4,
                'fasilitas' => 'Area Fotografi Terbuka, Best Season Info, Pemandu Nature',
                'foto1' => 'fe/images/gallery13.jpg',
                'foto2' => 'fe/images/gallery14.jpg',
                'foto3' => 'fe/images/gallery15.jpg',
                'foto4' => 'fe/images/gallery16.jpg',
                'foto5' => 'fe/images/gallery17.jpeg',
            ],
            [
                'nama_wisata' => 'Warung Kuliner Tradisional Flores',
                'deskripsi_wisata' => 'Kuliner autentik Flores dengan menu tradisional seperti jagung bakar, ubi rebus, nasi kuning, dan minuman tradisional yang lezat dan bergizi.',
                'id_kategori_wisata' => $kategoriKuliner->id ?? 6,
                'fasilitas' => 'Menu Lokal, Seating Tradisional, Minuman Panas, Informasi Resep',
                'foto1' => 'fe/images/gallery18.jpg',
                'foto2' => 'fe/images/gallery19.jpg',
                'foto3' => 'fe/images/gallery20.jpg',
                'foto4' => 'fe/images/gallery21.jpg',
                'foto5' => 'fe/images/gallery22.jpg',
            ],
            [
                'nama_wisata' => 'Workshop Kerajinan Tangan Lokal',
                'deskripsi_wisata' => 'Pembelajaran langsung pembuatan kerajinan tangan tradisional Flores seperti tenun, ukiran kayu, dan seni keramik dari pengrajin lokal.',
                'id_kategori_wisata' => $kategoriKerajinan->id ?? 11,
                'fasilitas' => 'Instruktur Lokal, Bahan Baku, Peralatan Lengkap, Sertifikat Peserta',
                'foto1' => 'fe/images/gallery23.jpg',
                'foto2' => 'fe/images/gallery24.jpg',
                'foto3' => 'fe/images/about.jpg',
                'foto4' => 'fe/images/profile-1.jpg',
                'foto5' => 'fe/images/profile-3.jpg',
            ],
        ];

        foreach ($obyek as $item) {
            ObyekWisata::create($item);
        }
    }
}
