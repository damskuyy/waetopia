<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBerita::create([
            'kategori_berita' => 'bencana',
        ]);
        KategoriBerita::create([
            'kategori_berita' => 'wisata',
        ]);
        KategoriBerita::create([
            'kategori_berita' => 'budaya',
        ]);
    }
}
