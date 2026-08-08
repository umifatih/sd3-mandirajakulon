<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kalender_akademiks', function (Blueprint $table) {
            $table->enum('kategori', ['KBM', 'Ujian', 'Kegiatan', 'Libur'])->default('Kegiatan')->after('kegiatan');
        });
    }

    public function down(): void
    {
        Schema::table('kalender_akademiks', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};