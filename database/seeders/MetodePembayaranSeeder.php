<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $metodes = [
            [
                'metode_pembayaran' => 'Bank Transfer BCA',
                'nomor_rekening' => '1234567890',
                'foto' => 'fe/images/gallery1.jpg',
            ],
            [
                'metode_pembayaran' => 'Bank Transfer Mandiri',
                'nomor_rekening' => '0987654321',
                'foto' => 'fe/images/gallery2.jpg',
            ],
            [
                'metode_pembayaran' => 'Bank Transfer BNI',
                'nomor_rekening' => '1122334455',
                'foto' => 'fe/images/gallery3.jpg',
            ],
            [
                'metode_pembayaran' => 'Transfer GCash (OFW)',
                'nomor_rekening' => '09123456789',
                'foto' => 'fe/images/gallery4.jpg',
            ],
            [
                'metode_pembayaran' => 'E-Wallet OVO',
                'nomor_rekening' => '08987654321',
                'foto' => 'fe/images/gallery5.jpg',
            ],
            [
                'metode_pembayaran' => 'Pembayaran Kartu Kredit',
                'nomor_rekening' => 'Cicilan 0% hingga 12 bulan',
                'foto' => 'fe/images/gallery6.jpg',
            ],
        ];

        foreach ($metodes as $metode) {
            MetodePembayaran::create($metode);
        }
    }
}
