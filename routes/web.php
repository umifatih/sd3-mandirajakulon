<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home');

Route::view('/profil', 'pages.profile.index')->name('profil');
Route::view('/profil/struktur', 'pages.profile.struktur')->name('profile.struktur');

Route::view('/warga-sekolah', 'pages.warga.index')->name('warga');

Route::view('/akademik', 'pages.akademik.index')->name('akademik');

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