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
        Schema::create('penginapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penginapan', 255)->unique()->nullable(false);
            $table->text('deskripsi');
            $table->string('fasilitas');
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->text('foto5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginapans');
    }
};
