<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('janji_periksas', function (Blueprint $table) {
            $table->id();

            // Relasi ke users (pasien)
            $table->foreignId('id_pasien')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Relasi ke jadwal_periksas
            $table->foreignId('id_jadwal_periksa')
                  ->constrained('jadwal_periksas')
                  ->onDelete('cascade');

            // Kolom keluhan bisa nullable jika tidak wajib diisi
            $table->text('keluhan')->nullable();

            // Kolom antrian bisa dibiarkan string 10 karakter jika ingin format bebas
            $table->string('no_antrian', 10);

            // Kolom status, default 'menunggu' (jika dibutuhkan)
            $table->string('status')->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('janji_periksas');
    }
};
