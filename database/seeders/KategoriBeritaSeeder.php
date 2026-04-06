<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['kategori_berita' => 'Tips Trekking Waerebo'],
            ['kategori_berita' => 'Destinasi Flores'],
            ['kategori_berita' => 'Event & Festival Lokal'],
            ['kategori_berita' => 'Promo Spesial Waerebo'],
            ['kategori_berita' => 'Berita Komunitas'],
            ['kategori_berita' => 'Panduan Fotografer'],
        ];

        foreach ($kategoris as $kategori) {
            KategoriBerita::create($kategori);
        }
    }
}
