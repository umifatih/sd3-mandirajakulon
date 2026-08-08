<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('siswa'); // nama siswa / tim
            $table->string('kategori'); // akademik, olahraga, seni, pramuka
            $table->string('tingkat'); // Kecamatan, Kabupaten, Provinsi, Nasional
            $table->string('tahun');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};