@extends('layouts.app')

@section('title', ($profil->nama_sekolah ?? 'Profil Sekolah') . ' | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- Hero Section dengan gradien gelap agar navbar putih terlihat --}}
<section class="relative bg-gradient-to-b from-[#18587A]/95 to-[#18587A] pt-24 md:pt-32 pb-16 md:pb-24 text-white text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/always-grey.png')]"></div>
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <span class="text-[#85C2DB] font-bold tracking-widest uppercase text-xs mb-3 block">
            <i class="fa-solid fa-school mr-1"></i> Profil Sekolah
        </span>
        <h1 class="text-4xl md:text-6xl font-black font-['Poppins'] mb-4 drop-shadow-lg">{{ $profil->nama_sekolah ?? 'Profil Sekolah' }}</h1>
        <p class="text-lg text-white/80 font-light max-w-2xl mx-auto">Mengenal lebih dekat identitas dan perjalanan sekolah kami.</p>
    </div>
    {{-- Wave divider ke bawah --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-[40px] md:h-[60px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3.38C1132.19,31.61,1055.71,33.85,985.66,92.83Z" fill="#EBF5FA"></path>
        </svg>
    </div>
</section>

{{-- Sejarah Sekolah --}}
<section class="py-16 md:py-24 bg-[#EBF5FA] relative">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Perjalanan Kami</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Sejarah Sekolah</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-10">
            @if ($profil->sejarah)
            <div class="prose prose-slate max-w-none text-gray-600 leading-relaxed text-base md:text-lg">
                {!! nl2br(e($profil->sejarah)) !!}
            </div>
            @else
            <div class="text-center py-10 text-gray-400">
                <i class="fa-solid fa-book-open text-3xl mb-3"></i>
                <p>Sejarah sekolah belum diisi. Admin dapat menambahkannya lewat menu Profil Sekolah.</p>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection