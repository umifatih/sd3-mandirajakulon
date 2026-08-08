<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->longText('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->longText('misi')->nullable(); // simpan per baris/poin, pisah pakai enter
            $table->string('gambar_struktur')->nullable(); // foto struktur organisasi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};