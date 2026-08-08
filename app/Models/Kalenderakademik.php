<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan',
        'kategori',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    // Warna titik di kalender publik, sesuai kategori
    public function getDotColorAttribute(): string
    {
        return match ($this->kategori) {
            'KBM'      => 'bg-[#10B981]',
            'Ujian'    => 'bg-[#F59E0B]',
            'Kegiatan' => 'bg-[#3E9FC6]',
            'Libur'    => 'bg-[#F43F5E]',
            default    => 'bg-[#3E9FC6]',
        };
    }
}