@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="bg-[#F8F5F2] min-h-screen flex items-center">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>

                <span class="inline-block bg-[#E8D8C4] text-[#8B5E3C] px-4 py-2 rounded-full text-sm font-semibold">
                    Website Resmi Sekolah
                </span>

                <h1 class="mt-6 text-5xl lg:text-6xl font-bold leading-tight text-gray-800">

                    Selamat Datang
                    <br>

                    <span class="text-[#8B5E3C]">
                        Website Sekolah
                    </span>

                </h1>

                <p class="mt-6 text-lg text-gray-600 leading-8">

                    Template website sekolah modern yang dapat dikelola melalui dashboard admin.
                    Cocok digunakan oleh SD, SMP maupun SMA.

                </p>

                <div class="mt-10 flex gap-4">

                    <a href="#"
                        class="bg-[#8B5E3C] hover:bg-[#71492D] text-white px-8 py-4 rounded-xl transition">

                        Profil Sekolah

                    </a>

                    <a href="#"
                        class="border border-[#8B5E3C] text-[#8B5E3C] px-8 py-4 rounded-xl hover:bg-[#8B5E3C] hover:text-white transition">

                        PPDB

                    </a>

                </div>

            </div>

            <div class="hidden lg:flex justify-center">

                <img
                    src="https://placehold.co/600x500?text=Foto+Sekolah"
                    class="rounded-3xl shadow-2xl">

            </div>

        </div>

    </div>

</section>

@endsection