@extends('layouts.app')

@section('title','Beranda | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- ===================== HERO SECTION ===================== --}}
<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    {{-- Background Image dengan Efek Zoom Halus --}}
    <img src="https://www.tangselpos.id/storage/2024/11/sd-negeri-atau-swasta-harusnya-semua-gratis-12112024-095250.jpg" 
     class="absolute inset-0 w-full h-full object-cover scale-105 transition-transform duration-[10000ms] hover:scale-110" alt="Banner Sekolah">
    
    {{-- Overlay Gradient Modern (Gelap di bawah, transparan di atas) --}}
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/60 via-gray-900/50 to-gray-900/90"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center mt-16">
        
        {{-- Badge Pengumuman UI/UX Modern --}}
        <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-white mb-8 animate-fade-in-up">
            <span class="flex h-2.5 w-2.5 rounded-full bg-green-400 animate-pulse"></span>
            <span class="text-sm font-medium tracking-wide">Penerimaan Peserta Didik Baru 2026 Telah Dibuka</span>
        </div>

        {{-- Main Heading dengan Kombinasi Warna --}}
        <h1 class="text-5xl md:text-7xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg">
            Mencetak Generasi <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9B99B] to-[#E8D8C4]">
                Berprestasi & Berkarakter
            </span>
        </h1>

        <p class="mt-6 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed font-light">
            Selamat datang di website resmi SD Negeri 3 Mandiraja Kulon. Mewujudkan pendidikan berkualitas yang berlandaskan iman, takwa, dan inovasi masa depan.
        </p>

        {{-- Call to Action (CTA) Buttons --}}
        <div class="mt-10 flex flex-wrap justify-center gap-5">
            <a href="#" class="group relative px-8 py-4 bg-[#8B5E3C] text-white rounded-xl font-semibold overflow-hidden transition-all hover:bg-[#724D31] hover:shadow-[0_0_20px_rgba(139,94,60,0.5)] transform hover:-translate-y-1">
                <span class="relative z-10 flex items-center gap-2">
                    Jelajahi Profil <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>
            <a href="#" class="px-8 py-4 bg-white/10 text-white border border-white/30 backdrop-blur-md rounded-xl font-semibold hover:bg-white/20 transition-all transform hover:-translate-y-1">
                Portal PPDB
            </a>
        </div>
    </div>
</section>

{{-- ===================== RUNNING TEXT (NEWS TICKER) ===================== --}}
<section class="bg-[#8B5E3C] text-white relative overflow-hidden flex items-center border-y-4 border-[#5C3A21]">
    <div class="flex items-center w-full max-w-7xl mx-auto">
        
        {{-- Area Marquee (Berjalan) --}}
        <div class="flex-1 overflow-hidden relative">
            <style>
                @keyframes scroll {
                    0% { transform: translateX(100%); }
                    100% { transform: translateX(-100%); }
                }
                .animate-scroll {
                    display: inline-block;
                    white-space: nowrap;
                    animation: scroll 25s linear infinite;
                }
                .animate-scroll:hover {
                    animation-play-state: paused;
                }
            </style>
            <div class="animate-scroll py-3 flex gap-12 text-sm font-medium items-center cursor-pointer px-4">
                <span>🌟 Selamat kepada Ananda Budi meraih Juara 1 OSN Matematika Tingkat Kabupaten.</span>
                <span>📅 Pengambilan Rapor Semester Genap dilaksanakan pada tanggal 20 Juni 2026.</span>
                <span>🏆 SD Negeri 3 Mandiraja Kulon berhasil meraih penghargaan Sekolah Adiwiyata Tingkat Provinsi.</span>
            </div>
        </div>
        
    </div>
</section>

{{-- ===================== QUICK INFO CARDS ===================== --}}
<section class="max-w-7xl mx-auto px-6 pt-12 pb-6 hidden md:block">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Card 1: Akreditasi --}}
        <div class="bg-white rounded-2xl p-6 shadow-md shadow-gray-200/50 border border-gray-100 flex items-start gap-4 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl cursor-pointer group">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-800 font-['Poppins']">Akreditasi A</h3>
                <p class="text-sm text-gray-500 mt-1">Terakreditasi sangat baik oleh BAN-S/M.</p>
            </div>
        </div>

        {{-- Card 2: Fasilitas --}}
        <div class="bg-white rounded-2xl p-6 shadow-md shadow-gray-200/50 border border-gray-100 flex items-start gap-4 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl cursor-pointer group">
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-800 font-['Poppins']">Fasilitas Lengkap</h3>
                <p class="text-sm text-gray-500 mt-1">Perpustakaan, lab komputer, & ruang kelas nyaman.</p>
            </div>
        </div>

        {{-- Card 3: Guru --}}
        <div class="bg-white rounded-2xl p-6 shadow-md shadow-gray-200/50 border border-gray-100 flex items-start gap-4 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl cursor-pointer group">
            <div class="w-12 h-12 bg-[#F8F5F2] text-[#8B5E3C] rounded-xl flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-800 font-['Poppins']">Guru Profesional</h3>
                <p class="text-sm text-gray-500 mt-1">Tenaga pendidik tersertifikasi & berpengalaman.</p>
            </div>
        </div>
    </div>
</section>

{{-- Lanjutan Konten Home Lainnya (Sambutan Kepsek, Berita, dll) --}}
<section class="py-24 bg-[#F8F5F2]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        {{-- Isi konten selanjutnya disini --}}
    </div>
</section>

@endsection