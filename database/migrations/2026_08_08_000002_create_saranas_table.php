<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saranas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori'); // belajar, olahraga, penunjang, ibadah
            $table->text('deskripsi')->nullable();
            $table->string('ukuran')->nullable(); // luas/ukuran, misal "7 x 8 m"
            $table->string('jumlah')->nullable(); // misal "6 Ruang"
            $table->enum('kondisi', ['Baik', 'Cukup', 'Rusak'])->default('Baik');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saranas');
    }
};