<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori'); // kegiatan, prestasi, pengumuman, artikel-guru
            $table->string('gambar')->nullable();
            $table->text('ringkasan')->nullable(); // excerpt untuk kartu berita
            $table->longText('konten');
            $table->string('penulis')->default('Admin');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};