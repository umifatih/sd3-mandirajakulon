<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::view('/', 'pages.home.index')->name('home');

Route::view('/profil', 'pages.profile.index')->name('profil');
Route::view('/profil/struktur', 'pages.profile.struktur')->name('profile.struktur');

Route::view('/warga-sekolah', 'pages.warga.index')->name('warga');

Route::view('/akademik', 'pages.akademik.index')->name('akademik');

Route::get('/akademik/program-unggulan', function () {
    return view('pages.akademik.program-unggulan');
})->name('akademik.program-unggulan');

Route::get('/akademik/prestasi-akademik', function () {
    return view('pages.akademik.prestasi-akademik');
})->name('akademik.prestasi-akademik');

Route::get('/akademik/kalender', function () {
    return view('pages.akademik.kalender');
})->name('akademik.kalender');

Route::view('/berita', 'pages.berita.index')->name('berita');

Route::get('/berita/detail', function () {
    return view('pages.berita.show'); 
})->name('berita.show');

Route::get('/berita', function () {
    return view('pages.berita.index');
})->name('berita.index');

Route::get('/galeri', function () {
    return view('pages.galeri.index');
})->name('galeri.index');

Route::view('/informasi', 'pages.informasi.index')->name('informasi');

Route::view('/ppdb', 'pages.ppdb.index')->name('ppdb');

Route::view('/kontak', 'pages.kontak.index')->name('kontak');

Route::post('/kontak', function (\Illuminate\Http\Request $request) {
    // proses simpan pesan, kirim email, dsb
    return back()->with('success', 'Pesan terkirim!');
})->name('kontak.store');

Route::get('/profil/sarana-prasarana', function () {
    return view('pages.profile.sarana-prasarana');
})->name('profile.sarana');

Route::get('/profil/ekstrakurikuler', function () {
    return view('pages.profile.ekstrakurikuler');
})->name('profile.ekstrakurikuler');

Route::get('/profil/prestasi', function () {
    return view('pages.profile.prestasi');
})->name('profile.prestasi');


// ADMINISTRATOR ROUTES
Route::get('/admin/sdn3-mandirajakulon', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/sdn3-mandirajakulon', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/keluar/sdn3-mandirajakulon', [AuthController::class, 'logout'])->name('admin.logout');

// Route Area Admin (Tetap dibungkus middleware auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});