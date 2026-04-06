<?php

namespace Database\Seeders;

use App\Models\Diskon;
use Illuminate\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run(): void
    {
        $diskons = [
            [
                'kode_diskon' => 'WAEREBO15',
                'nama_diskon' => 'Diskon 15% Paket Sunrise Waerebo',
                'persentase_diskon' => 15.00,
                'tanggal_mulai' => now()->format('Y-m-d'),
                'tanggal_berakhir' => now()->addDays(30)->format('Y-m-d'),
                'deskripsi' => 'Dapatkan diskon 15% untuk paket Sunrise di Puncak Waerebo dan paket adventur 2 hari.',
                'aktif' => 1,
            ],
            [
                'kode_diskon' => 'FAMILY20',
                'nama_diskon' => 'Diskon 20% Paket Keluarga Waerebo',
                'persentase_diskon' => 20.00,
                'tanggal_mulai' => now()->format('Y-m-d'),
                'tanggal_berakhir' => now()->addDays(60)->format('Y-m-d'),
                'deskripsi' => 'Diskon 20% untuk paket keluarga 3 hari 2 malam di Desa Waerebo dengan aktivitas budaya.',
                'aktif' => 1,
            ],
            [
                'kode_diskon' => 'EARLYBIRD18',
                'nama_diskon' => 'Promo Early Bird 18% - Pesan Sekarang',
                'persentase_diskon' => 18.00,
                'tanggal_mulai' => now()->format('Y-m-d'),
                'tanggal_berakhir' => now()->addDays(14)->format('Y-m-d'),
                'deskripsi' => 'Promo khusus early bird untuk pemesanan paket Waerebo gelombang pertama bulan ini.',
                'aktif' => 1,
            ],
            [
                'kode_diskon' => 'PHOTOGRAPHER25',
                'nama_diskon' => 'Diskon 25% Paket Fotografer',
                'persentase_diskon' => 25.00,
                'tanggal_mulai' => now()->format('Y-m-d'),
                'tanggal_berakhir' => now()->addDays(90)->format('Y-m-d'),
                'deskripsi' => 'Diskon khusus 25% untuk paket fotografer profesional dengan tour guide spesialis fotografi alam.',
                'aktif' => 1,
            ],
            [
                'kode_diskon' => 'REFERRAL10',
                'nama_diskon' => 'Bonus Referral 10% Selamanya',
                'persentase_diskon' => 10.00,
                'tanggal_mulai' => now()->format('Y-m-d'),
                'tanggal_berakhir' => now()->addYear()->format('Y-m-d'),
                'deskripsi' => 'Dapatkan bonus diskon 10% untuk setiap teman yang Anda ajak berkunjung ke Waerebo dan melakukan pemesanan.',
                'aktif' => 1,
            ],
        ];

        foreach ($diskons as $diskon) {
            Diskon::create($diskon);
        }
    }
}
