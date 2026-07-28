<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home');

Route::view('/profil', 'pages.profile.index')->name('profil');

Route::view('/warga-sekolah', 'pages.warga.index')->name('warga');

Route::view('/akademik', 'pages.akademik.index')->name('akademik');

Route::view('/berita', 'pages.berita.index')->name('berita');

Route::view('/galeri', 'pages.galeri.index')->name('galeri');

Route::view('/informasi', 'pages.informasi.index')->name('informasi');

Route::view('/ppdb', 'pages.ppdb.index')->name('ppdb');

Route::view('/kontak', 'pages.kontak.index')->name('kontak');