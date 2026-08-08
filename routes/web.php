<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SaranaController;
use App\Http\Controllers\Admin\KalenderController;
use App\Models\Profil;
use App\Models\Sarana;
use App\Models\KalenderAkademik;
use App\Models\Warga;
use App\Models\Berita;

Route::view('/', 'pages.home.index')->name('home');

// ================= PROFIL (nama sekolah, sejarah, visi, misi) =================
Route::get('/profil', function () {
    $profil = Profil::current();
    return view('pages.profile.index', compact('profil'));
})->name('profil');

// ================= VISI & MISI =================
Route::get('/profil/visi-misi', function () {
    $profil = Profil::current();
    return view('pages.profile.visi-misi', compact('profil'));
})->name('profile.visi-misi');

// ================= STRUKTUR ORGANISASI =================
Route::get('/profil/struktur', function () {
    $profil = Profil::current();

    $paraGuru = Warga::where('jenis', 'guru')->get()->map(function ($g) {
        return [
            'nama' => $g->nama,
            'foto' => $g->foto ? asset('storage/' . $g->foto) : 'https://i.pravatar.cc/300?u=' . $g->id,
        ];
    })->values();

    return view('pages.profile.struktur', compact('profil', 'paraGuru'));
})->name('profile.struktur');

// ================= SARANA & PRASARANA =================
Route::get('/profil/sarana-prasarana', function () {
    $categoryLabels = [
        'belajar'   => 'Ruang Belajar',
        'olahraga'  => 'Olahraga',
        'penunjang' => 'Penunjang',
        'ibadah'    => 'Ibadah & Kesehatan',
    ];

    $sarana = Sarana::all()->map(function ($item) use ($categoryLabels) {
        return [
            'id'            => $item->id,
            'category'      => $item->kategori,
            'categoryLabel' => $categoryLabels[$item->kategori] ?? $item->kategori,
            'name'          => $item->nama,
            'desc'          => $item->deskripsi,
            'size'          => $item->ukuran,
            'qty'           => $item->jumlah,
            'condition'     => $item->kondisi,
            'img'           => $item->gambar
                ? asset('storage/' . $item->gambar)
                : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&q=80&w=900',
        ];
    })->values();

    return view('pages.profile.sarana-prasarana', compact('sarana'));
})->name('profile.sarana');

// ================= EKSTRAKURIKULER =================
Route::get('/profil/ekstrakurikuler', function () {
    return view('pages.profile.ekstrakurikuler');
})->name('profile.ekstrakurikuler');

// ================= WARGA SEKOLAH =================
Route::get('/warga-sekolah', function () {
    $guru   = Warga::where('jenis', 'guru')->get();
    $siswa  = Warga::where('jenis', 'siswa')->get();
    $alumni = Warga::where('jenis', 'alumni')->get();

    return view('pages.warga.index', compact('guru', 'siswa', 'alumni'));
})->name('warga');

// ================= AKADEMIK =================
Route::view('/akademik', 'pages.akademik.index')->name('akademik');

Route::get('/akademik/kalender', function () {
    $dotColors = [
        'KBM'      => 'bg-[#10B981]',
        'Ujian'    => 'bg-[#F59E0B]',
        'Kegiatan' => 'bg-[#3E9FC6]',
        'Libur'    => 'bg-[#F43F5E]',
    ];

    $kegiatanSekolah = collect();

    foreach (KalenderAkademik::orderBy('tanggal_mulai')->get() as $item) {
        $start = $item->tanggal_mulai->copy();
        $end   = $item->tanggal_selesai ? $item->tanggal_selesai->copy() : $start->copy();

        for ($tanggal = $start->copy(); $tanggal->lte($end); $tanggal->addDay()) {
            $kegiatanSekolah->push([
                'date'     => $tanggal->format('Y-m-d'),
                'title'    => $item->kegiatan,
                'category' => $item->kategori,
                'dotColor' => $dotColors[$item->kategori] ?? 'bg-[#94A3B8]',
            ]);
        }
    }

    return view('pages.akademik.kalender', compact('kegiatanSekolah'));
})->name('akademik.kalender');

// ================= BERITA & INFORMASI =================
Route::get('/berita', function () {
    $categoryLabels = [
        'kegiatan'     => 'Kegiatan Sekolah',
        'prestasi'     => 'Prestasi',
        'pengumuman'   => 'Pengumuman',
        'artikel-guru' => 'Artikel Guru',
    ];

    $items = Berita::where('status', 'published')
        ->latest()
        ->get()
        ->map(function ($b) use ($categoryLabels) {
            $jumlahKata = str_word_count(strip_tags($b->konten));

            return [
                'id'            => $b->id,
                'category'      => $b->kategori,
                'categoryLabel' => $categoryLabels[$b->kategori] ?? $b->kategori,
                'title'         => $b->judul,
                'excerpt'       => $b->ringkasan,
                'date'          => $b->created_at->translatedFormat('d F Y'),
                'timeAgo'       => $b->created_at->diffForHumans(),
                'author'        => $b->penulis,
                'readTime'      => max(1, (int) ceil($jumlahKata / 200)),
                'url'           => route('berita.show', $b->slug),
                'img'           => $b->gambar
                    ? asset('storage/' . $b->gambar)
                    : 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&q=80&w=800',
            ];
        })
        ->values();

    return view('pages.berita.index', compact('items'));
})->name('berita.index');

Route::get('/berita/{slug}', function (string $slug) {
    $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();
    return view('pages.berita.show', compact('berita'));
})->name('berita.show');

// ================= HALAMAN LAIN =================
Route::view('/informasi', 'pages.informasi.index')->name('informasi');
Route::view('/ppdb', 'pages.ppdb.index')->name('ppdb');
Route::view('/kontak', 'pages.kontak.index')->name('kontak');

Route::post('/kontak', function (\Illuminate\Http\Request $request) {
    // TODO: proses simpan pesan, kirim email, dsb
    return back()->with('success', 'Pesan terkirim!');
})->name('kontak.store');


/*
|--------------------------------------------------------------------------
| ADMINISTRATOR
|--------------------------------------------------------------------------
*/

// 1. Halaman Login
Route::get('/admin/sdn3-mandirajakulon', function () {
    return view('admin.login');
})->name('admin.login');

// 2. Proses Login (masih dummy -- ganti ke AuthController kalau sudah siap cek DB)
Route::post('/admin/sdn3-mandirajakulon', function () {
    return redirect()->route('admin.dashboard');
})->name('admin.login.submit');

// 3. Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'totalBerita'   => Berita::count(),
        'totalWarga'    => Warga::count(),
        'beritaTerbaru' => Berita::latest()->take(5)->get(),
        'aktivitas'     => collect(), // isi kalau sudah ada activity log
    ]);
})->name('admin.dashboard');

// 4. Logout
Route::post('/keluar/sdn3-mandirajakulon', function () {
    return redirect()->route('admin.login');
})->name('admin.logout');

// 5. CRUD Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('sarana', SaranaController::class);
    Route::resource('kalender', KalenderController::class);

    // Profil sekolah: singleton, cuma edit & update
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
});