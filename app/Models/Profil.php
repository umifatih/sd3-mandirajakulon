<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah',
        'sejarah',
        'visi',
        'misi',
        'gambar_struktur',
    ];

    // Selalu ambil baris pertama (data profil cuma 1), buat kalau belum ada
    public static function current(): self
    {
        return static::firstOrCreate([], [
            'nama_sekolah' => 'SD Negeri 3 Mandiraja Kulon',
        ]);
    }
}