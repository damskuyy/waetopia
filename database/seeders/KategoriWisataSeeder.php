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
        KategoriWisata::create([
            'kategori_wisata' => 'alam',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'budaya',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'sejarah',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'kuliner',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'religi',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'edukasi',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'olahraga',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'hiburan',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'belanja',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'transportasi',
        ]);
        KategoriWisata::create([
            'kategori_wisata' => 'penginapan',
        ]);
    }
}
