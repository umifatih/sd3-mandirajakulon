@extends('layouts.app')

@section('title', 'Struktur Organisasi | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- Hero Section dengan gradien gelap agar navbar putih terlihat --}}
<section class="relative bg-gradient-to-b from-[#18587A]/95 to-[#18587A] pt-24 md:pt-32 pb-16 md:pb-24 text-white text-center overflow-hidden">
    {{-- Optional subtle pattern overlay --}}
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/always-grey.png')]"></div>
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <h1 class="text-4xl md:text-6xl font-black font-['Poppins'] mb-4 drop-shadow-lg">Struktur Organisasi</h1>
        <p class="text-lg text-white/80 font-light max-w-2xl mx-auto">SD Negeri 3 Mandiraja Kulon</p>
    </div>
    {{-- Wave divider ke bawah --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-[40px] md:h-[60px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3.38C1132.19,31.61,1055.71,33.85,985.66,92.83Z" fill="#EBF5FA"></path>
        </svg>
    </div>
</section>

{{-- Gambar Struktur Organisasi (diunggah admin lewat Profil Sekolah) --}}
<section class="py-16 md:py-24 bg-[#EBF5FA] relative">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Komando & Koordinasi</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Bagan Organisasi</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
        </div>

        @if ($profil->gambar_struktur ?? false)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6">
            <img src="{{ Storage::url($profil->gambar_struktur) }}"
                 alt="Bagan Struktur Organisasi SD Negeri 3 Mandiraja Kulon"
                 class="w-full h-auto rounded-xl">
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-10 text-center text-gray-400">
            <i class="fa-solid fa-sitemap text-3xl mb-3"></i>
            <p>Gambar struktur organisasi belum diunggah. Admin dapat menambahkannya lewat menu Profil Sekolah.</p>
        </div>
        @endif
    </div>
</section>

{{-- Daftar Dewan Guru --}}
<section class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Tenaga Pendidik</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Dewan Guru</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Para pendidik profesional yang siap membimbing dan menginspirasi siswa.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-10">
            @forelse ($paraGuru as $g)
            <div class="bg-[#EBF5FA] rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <img src="{{ $g['foto'] }}" class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-white shadow-md group-hover:border-[#85C2DB] transition-colors mb-3" alt="foto">
                <h4 class="font-semibold text-gray-800 font-['Poppins'] text-sm">{{ $g['nama'] }}</h4>
                <p class="text-xs text-gray-400 mt-1">Guru Kelas</p>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-400 py-10">Belum ada data guru. Tambahkan lewat menu Data Warga di admin.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection