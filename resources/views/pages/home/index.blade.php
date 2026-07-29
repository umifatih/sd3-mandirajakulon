@extends('layouts.app')

@section('title','Beranda | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- ===================== CUSTOM ANIMATIONS ===================== --}}
<style>
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
</style>

{{-- ===================== HERO SECTION ===================== --}}
<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    {{-- Background Image dengan Efek Zoom Halus --}}
    <img src="https://www.tangselpos.id/storage/2024/11/sd-negeri-atau-swasta-harusnya-semua-gratis-12112024-095250.jpg" 
         class="absolute inset-0 w-full h-full object-cover scale-105 transition-transform duration-[10000ms] hover:scale-110" alt="Banner Sekolah">
    
    {{-- Overlay Gradient Modern (Gelap di bawah, transparan di atas) --}}
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/60 via-gray-900/50 to-gray-900/90"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center mt-16">
        
        {{-- Badge Pengumuman UI/UX Modern (Animasi ke-1) --}}
        <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-white mb-8 opacity-0 animate-fade-in-up delay-100">
            <span class="flex h-2.5 w-2.5 rounded-full bg-green-400 animate-pulse"></span>
            <span class="text-sm font-medium tracking-wide">Penerimaan Peserta Didik Baru 2026 Telah Dibuka</span>
        </div>

        {{-- Main Heading dengan Kombinasi Warna (Animasi ke-2) --}}
        <h1 class="text-5xl md:text-7xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
            Mencetak Generasi <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9B99B] to-[#E8D8C4]">
                Berprestasi & Berkarakter
            </span>
        </h1>

        {{-- Deskripsi (Animasi ke-3) --}}
        <p class="mt-6 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
            Selamat datang di website resmi SD Negeri 3 Mandiraja Kulon. Mewujudkan pendidikan berkualitas yang berlandaskan iman, takwa, dan inovasi masa depan.
        </p>

        {{-- Call to Action Buttons (Animasi ke-4) --}}
        <div class="mt-10 flex flex-wrap justify-center gap-5 opacity-0 animate-fade-in-up delay-400">
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

{{-- ===================== SAMBUTAN KEPALA SEKOLAH ===================== --}}
<section class="pt-24 pb-40 bg-white relative overflow-hidden">
    
    {{-- Dekorasi Background Abstrak --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-[#F8F5F2] rounded-full mix-blend-multiply filter blur-3xl opacity-70"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#E8D8C4] rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-12 items-center">
            
            {{-- ================= KOLOM GAMBAR (KIRI) ================= --}}
            <div class="lg:col-span-5 flex justify-center lg:justify-end pr-0 lg:pr-8 mt-8 lg:mt-0 px-4 sm:px-10 lg:px-0">
                <div class="relative group w-full max-w-[280px] sm:max-w-[320px] lg:max-w-[360px]">
                    
                    {{-- Frame Offset (Bingkai Bergeser) --}}
                    <div class="absolute inset-0 border-4 border-[#D9B99B] rounded-3xl translate-x-4 translate-y-4 transition-transform duration-500 group-hover:translate-x-6 group-hover:translate-y-6 z-0"></div>
                    
                    {{-- Foto Utama --}}
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSksJZvxPUhKV-MQAoMziyxjOJ8SqNtdDnMmdj09uO5E1k2bSMaB_JSTc0&s=10" 
                         alt="Kepala Sekolah SD N 3 Mandiraja Kulon" 
                         class="relative z-10 rounded-3xl shadow-xl w-full object-cover aspect-[3/4] transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-2xl">
                    
                    {{-- Floating Badge Nama --}}
                    <div class="absolute -bottom-6 -right-2 sm:-right-6 z-20 bg-white/90 backdrop-blur-lg p-3 sm:p-4 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.15)] border border-white transition-transform duration-500 group-hover:-translate-y-2 group-hover:scale-105">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#8B5E3C] rounded-full flex items-center justify-center text-white shrink-0 shadow-inner">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm font-['Poppins']">Bpk. H. Ahmad</h4>
                                <p class="text-xs text-[#8B5E3C] font-medium">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            {{-- ================= KOLOM TEKS (KANAN) ================= --}}
            <div class="lg:col-span-7 lg:pl-10 mt-16 lg:mt-0">
                
                {{-- Judul Sambutan --}}
                <h2 class="text-4xl md:text-5xl font-black text-gray-800 leading-tight font-['Poppins'] mb-6">
                    Selamat Datang di <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#8B5E3C] to-[#D9B99B]">
                        SD Negeri 3 Mandiraja Kulon
                    </span>
                </h2>

                {{-- Paragraf dengan Ikon Kutip besar --}}
                <div class="relative z-10">
                    <i class="fa-solid fa-quote-left absolute -top-6 -left-6 text-7xl text-[#F8F5F2] -z-10"></i>
                    
                    <p class="text-gray-600 leading-relaxed text-lg mb-5 text-justify font-light">
                        Puji syukur kita panjatkan kehadirat Tuhan Yang Maha Esa. Di era digital yang terus berkembang pesat ini, kami menyadari pentingnya pemanfaatan teknologi informasi dalam dunia pendidikan. 
                    </p>
                    <p class="text-gray-600 leading-relaxed text-lg mb-10 text-justify font-light">
                        Website ini hadir sebagai wujud komitmen kami dalam memberikan layanan informasi yang transparan, cepat, dan akurat kepada seluruh masyarakat. Mari kita bersama-sama bersinergi mewujudkan generasi yang tidak hanya unggul dalam prestasi akademik, tetapi juga memiliki karakter yang kuat dan akhlak mulia.
                    </p>
                </div>

                {{-- Action Area --}}
                <div class="flex flex-wrap items-center gap-8">
                    <a href="#" class="group relative inline-flex items-center gap-3 px-8 py-4 bg-[#8B5E3C] text-white rounded-xl font-semibold overflow-hidden transition-all duration-300 hover:bg-[#724D31] hover:shadow-[0_8px_25px_-5px_rgba(139,94,60,0.5)] hover:-translate-y-1">
                        <span>Baca Sambutan Lengkap</span>
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1.5 transition-transform"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>

    {{-- ===================== ORNAMEN GELOMBANG BAWAH (WAVE DIVIDER) ===================== --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-0">
        <svg class="relative block w-full h-[60px] md:h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3.38C1132.19,31.61,1055.71,33.85,985.66,92.83Z" fill="#F8F5F2"></path>
        </svg>
    </div>
</section>

{{-- ===================== VISI & MISI SEKOLAH (MODERN CENTERED) ===================== --}}
<section class="py-20 bg-[#F8F5F2] relative">
    
    {{-- Aksen Latar Ringan --}}
    <div class="absolute top-1/4 left-10 w-32 h-32 bg-[#E8D8C4]/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-10 w-40 h-40 bg-white/60 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        {{-- HEADER SECTION --}}
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[#8B5E3C] font-bold tracking-widest uppercase text-xs mb-3 block">Arah & Tujuan Bersama</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Visi & Misi Sekolah</h2>
            <div class="w-20 h-1.5 bg-[#8B5E3C] mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- VISI CARD (TAMPIL UTAMA DI TENGAH) --}}
        <div class="max-w-4xl mx-auto bg-white rounded-3xl p-10 md:p-14 shadow-[0_10px_40px_rgb(0,0,0,0.03)] border border-white text-center mb-20 relative transform transition-all hover:-translate-y-1 hover:shadow-[0_15px_50px_rgb(0,0,0,0.06)] group">
            
            {{-- Floating Icon Visi --}}
            <div class="absolute -top-7 left-1/2 -translate-x-1/2 w-14 h-14 bg-[#8B5E3C] text-white rounded-2xl rotate-3 flex items-center justify-center text-2xl shadow-lg group-hover:rotate-12 transition-transform duration-300">
                <i class="fa-regular fa-lightbulb"></i>
            </div>
            
            <h3 class="text-gray-400 uppercase tracking-widest text-sm font-bold mb-6 mt-4">Visi Utama</h3>
            
            <p class="text-2xl md:text-3xl text-gray-700 font-light leading-relaxed font-['Poppins']">
                "Terwujudnya Peserta Didik yang <span class="font-bold text-[#8B5E3C]">Beriman, Cerdas, Terampil, Berkarakter,</span> dan Berwawasan Lingkungan."
            </p>
        </div>

        {{-- MISI GRID (4 KOTAK DI BAWAH) --}}
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-2xl font-bold text-gray-800 font-['Poppins'] mb-10">Misi Kami</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Misi Item 1 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group cursor-default">
                    <div class="w-12 h-12 mx-auto bg-[#F8F5F2] text-[#8B5E3C] rounded-full flex items-center justify-center text-xl font-black mb-5 group-hover:bg-[#8B5E3C] group-hover:text-white transition-colors">
                        01
                    </div>
                    <h4 class="font-bold text-gray-800 mb-3 text-lg font-['Poppins']">Iman & Taqwa</h4>
                    <p class="text-gray-500 text-sm font-light leading-relaxed">
                        Menanamkan keyakinan dan ketaqwaan melalui pengamalan ajaran agama secara nyata dalam kehidupan sehari-hari.
                    </p>
                </div>

                {{-- Misi Item 2 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group cursor-default">
                    <div class="w-12 h-12 mx-auto bg-[#F8F5F2] text-[#8B5E3C] rounded-full flex items-center justify-center text-xl font-black mb-5 group-hover:bg-[#8B5E3C] group-hover:text-white transition-colors">
                        02
                    </div>
                    <h4 class="font-bold text-gray-800 mb-3 text-lg font-['Poppins']">Inovatif</h4>
                    <p class="text-gray-500 text-sm font-light leading-relaxed">
                        Mengoptimalkan proses pembelajaran secara aktif, kreatif, efektif, dan menyenangkan (PAKEM).
                    </p>
                </div>

                {{-- Misi Item 3 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group cursor-default">
                    <div class="w-12 h-12 mx-auto bg-[#F8F5F2] text-[#8B5E3C] rounded-full flex items-center justify-center text-xl font-black mb-5 group-hover:bg-[#8B5E3C] group-hover:text-white transition-colors">
                        03
                    </div>
                    <h4 class="font-bold text-gray-800 mb-3 text-lg font-['Poppins']">Potensi Siswa</h4>
                    <p class="text-gray-500 text-sm font-light leading-relaxed">
                        Mengembangkan minat, bakat, serta potensi siswa di bidang akademik maupun non-akademik secara maksimal.
                    </p>
                </div>

                {{-- Misi Item 4 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group cursor-default">
                    <div class="w-12 h-12 mx-auto bg-[#F8F5F2] text-[#8B5E3C] rounded-full flex items-center justify-center text-xl font-black mb-5 group-hover:bg-[#8B5E3C] group-hover:text-white transition-colors">
                        04
                    </div>
                    <h4 class="font-bold text-gray-800 mb-3 text-lg font-['Poppins']">Lingkungan</h4>
                    <p class="text-gray-500 text-sm font-light leading-relaxed">
                        Menciptakan lingkungan sekolah yang bersih, asri, sehat, dan kondusif untuk mendukung kegiatan belajar.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection