<?php

namespace Database\Seeders;

use App\Models\KategoriWisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['kategori_wisata' => 'Trekking & Hiking'],
            ['kategori_wisata' => 'Budaya Lokal'],
            ['kategori_wisata' => 'Fotografer'],
            ['kategori_wisata' => 'Nature'],
            ['kategori_wisata' => 'Sunrise/Sunset'],
            ['kategori_wisata' => 'Kuliner Tradisional'],
            ['kategori_wisata' => 'Adventure'],
            ['kategori_wisata' => 'Relaksasi'],
            ['kategori_wisata' => 'Family Package'],
            ['kategori_wisata' => 'Educational Tour'],
            ['kategori_wisata' => 'Kerajinan Lokal'],
        ];

        foreach ($kategoris as $kategori) {
            KategoriWisata::create($kategori);
        }
    }
}
