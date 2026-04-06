<?php

namespace Database\Seeders;

use App\Models\Penginapan;
use Illuminate\Database\Seeder;

class PenginapanSeeder extends Seeder
{
    public function run(): void
    {
        $penginapans = [
            [
                'nama_penginapan' => 'Homestay Waerebo Premium - Rumah Tradisional',
                'deskripsi' => 'Menginap di rumah tradisional Mbaru Niang dengan design arsitektur khas Flores. Pengalaman autentik bersama keluarga lokal yang ramah.',
                'fasilitas' => 'Kamar Tradisional, Mandi Air Hangat, Makan Bersama Keluarga, Wifi Basic',
                'foto1' => 'fe/images/gallery1.jpg',
                'foto2' => 'fe/images/gallery2.jpg',
                'foto3' => 'fe/images/gallery3.jpg',
                'foto4' => 'fe/images/gallery4.jpg',
                'foto5' => 'fe/images/gallery5.jpg',
            ],
            [
                'nama_penginapan' => 'Guesthouse Waerebo Central',
                'deskripsi' => 'Akomodasi yang nyaman di pusat desa dengan akses mudah ke semua aktivitas wisata dan pemandangan alam yang indah.',
                'fasilitas' => 'Kamar Clean, Hot Water, Restoran, Ruang Duduk Bersama, Wifi',
                'foto1' => 'fe/images/gallery6.jpg',
                'foto2' => 'fe/images/gallery7.jpg',
                'foto3' => 'fe/images/gallery8.jpg',
                'foto4' => 'fe/images/gallery9.jpg',
                'foto5' => 'fe/images/gallery10.jpg',
            ],
            [
                'nama_penginapan' => 'Simple Lodge Backpacker Waerebo',
                'deskripsi' => 'Penginapan budget-friendly yang sempurna untuk backpacker dengan suasana komunitas dan fasilitas ruang bersama yang hangat.',
                'fasilitas' => 'Dorm & Private Room, Shared Kitchen, Common Area, Wifi, Loker',
                'foto1' => 'fe/images/gallery11.jpeg',
                'foto2' => 'fe/images/gallery12.jpg',
                'foto3' => 'fe/images/gallery13.jpg',
                'foto4' => 'fe/images/gallery14.jpg',
                'foto5' => 'fe/images/gallery15.jpg',
            ],
            [
                'nama_penginapan' => 'Villa View Waerebo - Hillside Retreat',
                'deskripsi' => 'Villa eksklusif di tepi bukit dengan pemandangan pegunungan yang memukau, private terrace, dan layanan personal yang istimewa.',
                'fasilitas' => 'Kamar Mewah, Private Bathroom, Pemandangan Panorama, Staff Personal, Makan Spesial',
                'foto1' => 'fe/images/gallery16.jpg',
                'foto2' => 'fe/images/gallery17.jpeg',
                'foto3' => 'fe/images/gallery18.jpg',
                'foto4' => 'fe/images/gallery19.jpg',
                'foto5' => 'fe/images/gallery20.jpg',
            ],
            [
                'nama_penginapan' => 'Cottage Tradisional Waerebo Stay',
                'deskripsi' => 'Cottage dengan gaya tradisional Flores yang dipadukan dengan kenyamanan modern. Lokasi strategis untuk sunrise dan sunset photography.',
                'fasilitas' => 'Cottage Pribadi, Pemandangan Alam, Breakfast Lokal, Nature Guide, Wifi',
                'foto1' => 'fe/images/gallery21.jpg',
                'foto2' => 'fe/images/gallery22.jpg',
                'foto3' => 'fe/images/gallery23.jpg',
                'foto4' => 'fe/images/gallery24.jpg',
                'foto5' => 'fe/images/about.jpg',
            ],
        ];

        foreach ($penginapans as $penginapan) {
            Penginapan::create($penginapan);
        }
    }
}
