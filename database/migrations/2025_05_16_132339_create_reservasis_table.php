<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_diskon')->nullable();
            $table->unsignedBigInteger('id_metode_pembayaran')->nullable();
            $table->string('nama_pelanggan');
            $table->string('email')->nullable();
            $table->datetime('tgl_reservasi_wisata')->nullable(false);
            $table->datetime('tgl_selesai_reservasi')->nullable();
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->decimal('persentase_diskon', 5, 2)->default(0);
            $table->decimal('nilai_diskon', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('total_bayar', 12, 2)->default(0);
            $table->text('file_bukti_tf')->nullable();
            $table->enum('status_reservasi_wisata', ['Dipesan', 'Dibayar', 'Selesai', 'Dibatalkan'])->default('Dipesan');
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('paket_wisatas')->onDelete('cascade');
            $table->foreign('id_diskon')->references('id')->on('diskons')->onDelete('set null');
            $table->foreign('id_metode_pembayaran')->references('id')->on('metode_pembayarans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
