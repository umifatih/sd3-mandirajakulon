@extends('layouts.app')

@section('title','Home')

@section('content')

<section class="relative min-h-[90vh] overflow-hidden">

    <img
        src="https://placehold.co/1920x1080?text=Banner+Sekolah"
        class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/45 to-black/20"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 h-full flex items-center pt-20">

        <div class="max-w-3xl text-white">

            <span class="bg-white/20 backdrop-blur px-5 py-2 rounded-full">

                Website Resmi Sekolah

            </span>

            <h1 class="mt-8 text-6xl font-black leading-tight">

                Mencetak Generasi

                <span class="text-[#E8D8C4]">

                    Berprestasi

                </span>

            </h1>

            <p class="mt-6 text-xl leading-9">

                Selamat datang di website resmi sekolah.
                Semua informasi sekolah dapat diakses secara cepat,
                mudah dan transparan.

            </p>

            <div class="mt-10 flex gap-5">

                <a href="#"
                    class="bg-[#8B5E3C] px-8 py-4 rounded-xl">

                    Profil Sekolah

                </a>

                <a href="#"
                    class="bg-white text-black px-8 py-4 rounded-xl">

                    PPDB

                </a>

            </div>

        </div>

    </div>

</section>

@endsection