<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['guru', 'siswa', 'alumni']);
            $table->string('nama');
            $table->string('foto')->nullable();
            // Guru: jabatan/mapel. Siswa: kelas. Alumni: profesi sekarang.
            $table->string('keterangan')->nullable();
            // Guru: NIP. Siswa: NISN. Alumni: tahun lulus.
            $table->string('info_tambahan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};