<?php

namespace Database\Seeders;

use App\Models\PaketWisata;
use Illuminate\Database\Seeder;

class PaketWisataSeeder extends Seeder
{
    public function run(): void
    {
        $pakets = [
            [
                'nama_paket' => 'Paket Sunrise di Puncak Waerebo',
                'deskripsi' => 'Pengalaman hiking fajar menuju puncak Desa Waerebo dengan pemandangan matahari terbit yang memukau dan pemandangan pegunungan Flores yang spektakuler.',
                'fasilitas' => 'Penginapan Homestay, Makan Pagi, Pemandu Lokal, Minuman Hangat',
                'harga_per_pack' => 1800000,
                'foto1' => 'fe/images/gallery10.jpg',
                'foto2' => 'fe/images/gallery11.jpeg',
                'foto3' => 'fe/images/gallery12.jpg',
                'foto4' => 'fe/images/gallery13.jpg',
                'foto5' => 'fe/images/gallery14.jpg',
            ],
            [
                'nama_paket' => 'Paket Petualangan 2 Hari 1 Malam Waerebo',
                'deskripsi' => 'Jelajahi keindahan Desa Waerebo dengan trekking, melihat rumah tradisional Mbaru Niang, berinteraksi dengan komunitas lokal, dan menikmati kuliner tradisional Flores.',
                'fasilitas' => 'Homestay Tradisional, Makan 3x Sehari, Pemandu Berpengalaman, Equipment Hiking',
                'harga_per_pack' => 2200000,
                'foto1' => 'fe/images/gallery15.jpg',
                'foto2' => 'fe/images/gallery16.jpg',
                'foto3' => 'fe/images/gallery17.jpeg',
                'foto4' => 'fe/images/gallery18.jpg',
                'foto5' => 'fe/images/gallery19.jpg',
            ],
            [
                'nama_paket' => 'Paket Keluarga 3 Hari 2 Malam Waerebo Adventure',
                'deskripsi' => 'Paket liburan keluarga di Desa Waerebo dengan aktivitas hiking santai, belajar budaya lokal, fotografi alam, dan workshop kerajinan tangan tradisional Flores.',
                'fasilitas' => 'Penginapan Homestay, Makan 3x Sehari, Pemandu Lokal, Aktivitas Budaya',
                'harga_per_pack' => 3500000,
                'foto1' => 'fe/images/gallery20.jpg',
                'foto2' => 'fe/images/gallery21.jpg',
                'foto3' => 'fe/images/gallery22.jpg',
                'foto4' => 'fe/images/gallery23.jpg',
                'foto5' => 'fe/images/gallery24.jpg',
            ],
            [
                'nama_paket' => 'Paket Fotografer Desa Waerebo',
                'deskripsi' => 'Paket khusus untuk para fotografer dengan lokasi terbaik untuk mengabadikan pemandangan alam, sunset yang memukau, budaya lokal, dan kegiatan sehari-hari masyarakat Waerebo.',
                'fasilitas' => 'Homestay Premium, Makan 3x, Photo Tour Guide, Akses Area Terbaik',
                'harga_per_pack' => 4200000,
                'foto1' => 'fe/images/slider1.jpg',
                'foto2' => 'fe/images/slider2.jpg',
                'foto3' => 'fe/images/slider3.jpg',
                'foto4' => 'fe/images/gallery9.jpg',
                'foto5' => 'fe/images/gallery8.jpg',
            ],
            [
                'nama_paket' => 'Paket Budget Backpacker Waerebo',
                'deskripsi' => 'Paket hemat untuk backpacker muda dengan akomodasi sederhana dan aktivitas outdoor di alam pegunungan Desa Waerebo yang menantang.',
                'fasilitas' => 'Guesthouse Budget, Makan Lokal, Pemandu Komunitas, Aktivitas Alam',
                'harga_per_pack' => 1200000,
                'foto1' => 'fe/images/gallery7.jpg',
                'foto2' => 'fe/images/about.jpg',
                'foto3' => 'fe/images/gallery6.jpg',
                'foto4' => 'fe/images/gallery5.jpg',
                'foto5' => 'fe/images/gallery4.jpg',
            ],
        ];

        foreach ($pakets as $paket) {
            PaketWisata::create($paket);
        }
    }
}
