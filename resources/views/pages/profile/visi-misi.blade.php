@extends('layouts.app')

@section('title', 'Visi & Misi | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- Hero Section dengan gradien gelap agar navbar putih terlihat --}}
<section class="relative bg-gradient-to-b from-[#18587A]/95 to-[#18587A] pt-24 md:pt-32 pb-16 md:pb-24 text-white text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/always-grey.png')]"></div>
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <span class="text-[#85C2DB] font-bold tracking-widest uppercase text-xs mb-3 block">
            <i class="fa-solid fa-bullseye mr-1"></i> Profil Sekolah
        </span>
        <h1 class="text-4xl md:text-6xl font-black font-['Poppins'] mb-4 drop-shadow-lg">Visi & Misi</h1>
        <p class="text-lg text-white/80 font-light max-w-2xl mx-auto">{{ $profil->nama_sekolah ?? 'SD Negeri 3 Mandiraja Kulon' }}</p>
    </div>
    {{-- Wave divider ke bawah --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-[40px] md:h-[60px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3.38C1132.19,31.61,1055.71,33.85,985.66,92.83Z" fill="#EBF5FA"></path>
        </svg>
    </div>
</section>

{{-- Visi --}}
<section class="py-16 md:py-24 bg-[#EBF5FA] relative">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Cita-cita Kami</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Visi</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
        </div>

        @if ($profil->visi)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-12 text-center relative">
            <i class="fa-solid fa-quote-left text-3xl text-[#85C2DB] mb-4"></i>
            <p class="text-xl md:text-2xl font-bold text-[#092B3A] font-['Poppins'] leading-relaxed italic">
                {{ $profil->visi }}
            </p>
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-10 text-center text-gray-400">
            <i class="fa-solid fa-bullseye text-3xl mb-3"></i>
            <p>Visi sekolah belum diisi. Admin dapat menambahkannya lewat menu Profil Sekolah.</p>
        </div>
        @endif
    </div>
</section>

{{-- Misi --}}
<section class="py-16 md:py-24 bg-white relative">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Langkah Mewujudkannya</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Misi</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
        </div>

        @php
            $poinMisi = $profil->misi
                ? collect(preg_split('/\r\n|\r|\n/', $profil->misi))->map(fn ($p) => trim($p))->filter()
                : collect();
        @endphp

        @if ($poinMisi->isNotEmpty())
        <div class="space-y-4">
            @foreach ($poinMisi as $index => $poin)
            <div class="flex items-start gap-4 bg-[#EBF5FA] rounded-2xl p-5 md:p-6 border border-gray-100">
                <div class="w-9 h-9 rounded-full bg-[#18587A] text-white flex items-center justify-center font-bold text-sm shrink-0">
                    {{ $index + 1 }}
                </div>
                <p class="text-gray-700 leading-relaxed pt-1">{{ $poin }}</p>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-[#EBF5FA] rounded-2xl p-10 text-center text-gray-400">
            <i class="fa-solid fa-list-check text-3xl mb-3"></i>
            <p>Misi sekolah belum diisi. Admin dapat menambahkannya lewat menu Profil Sekolah.</p>
        </div>
        @endif
    </div>
</section>

@endsection