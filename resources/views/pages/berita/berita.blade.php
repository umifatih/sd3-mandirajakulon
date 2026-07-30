{{-- ===================== BERITA TERBARU ===================== --}}
<section class="py-24 bg-white relative overflow-hidden">
    
    {{-- Aksen Latar Ringan --}}
    <div class="absolute top-10 right-10 w-72 h-72 bg-[#F8F5F2] rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        {{-- HEADER SECTION --}}
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[#8B5E3C] font-bold tracking-widest uppercase text-xs mb-3 block">Informasi & Kegiatan Sekolah</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Berita Terbaru</h2>
            <div class="w-20 h-1.5 bg-[#8B5E3C] mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- 1. GRID BERITA UTAMA (3 Kolom - Atas) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Item Berita Utama 1 --}}
            <article class="bg-[#F8F5F2] rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col">
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&q=80&w=800" 
                         alt="Berita 1" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-[#8B5E3C] text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-md">
                        Prestasi
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span><i class="fa-regular fa-calendar-days text-[#8B5E3C] mr-1.5"></i> 25 Juni 2026</span>
                    </div>
                    <h3 class="font-bold text-gray-800 text-xl font-['Poppins'] mb-3 group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Siswa SDN 3 Mandiraja Kulon Raih Juara 1 OSN Matematika Tingkat Kabupaten
                    </h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed mb-6 line-clamp-3">
                        Kebanggaan kembali datang dari siswa-siswi terbaik kami yang berhasil menorehkan prestasi gemilang di ajang Olimpiade Sains Nasional.
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-200/60">
                        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-[#8B5E3C] group-hover:underline">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>

            {{-- Item Berita Utama 2 --}}
            <article class="bg-[#F8F5F2] rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col">
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&q=80&w=800" 
                         alt="Berita 2" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-[#8B5E3C] text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-md">
                        Kegiatan
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span><i class="fa-regular fa-calendar-days text-[#8B5E3C] mr-1.5"></i> 18 Juni 2026</span>
                    </div>
                    <h3 class="font-bold text-gray-800 text-xl font-['Poppins'] mb-3 group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Kegiatan Pelepasan & Pentas Seni Kelas VI Tahun Ajaran 2025/2026
                    </h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed mb-6 line-clamp-3">
                        Suasana haru dan penuh gembira menyelimuti acara pelepasan siswa kelas VI yang dimeriahkan dengan berbagai penampilan seni.
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-200/60">
                        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-[#8B5E3C] group-hover:underline">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>

            {{-- Item Berita Utama 3 --}}
            <article class="bg-[#F8F5F2] rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col">
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=800" 
                         alt="Berita 3" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-[#8B5E3C] text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-md">
                        Pengumuman
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span><i class="fa-regular fa-calendar-days text-[#8B5E3C] mr-1.5"></i> 10 Juni 2026</span>
                    </div>
                    <h3 class="font-bold text-gray-800 text-xl font-['Poppins'] mb-3 group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Jadwal Lengkap PPDB Tahun Ajaran 2026/2027 SD Negeri 3 Mandiraja Kulon
                    </h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed mb-6 line-clamp-3">
                        Informasi penting bagi para orang tua wali murid mengenai persyaratan, alur pendaftaran, dan jadwal seleksi penerimaan.
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-200/60">
                        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-[#8B5E3C] group-hover:underline">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>

        </div>

        {{-- 2. GRID BERITA LIST (2 Kolom Kanan-Kiri - Tanpa Pemisah) --}}
        {{-- Dibuat 4 item agar rapi mengisi 2 kolom kanan kiri --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mt-10">
            
            {{-- List Kiri 1 --}}
            <a href="#" class="group flex flex-row gap-4 md:gap-6 items-center hover:bg-gray-50 p-3 -ml-3 md:p-4 md:-ml-4 rounded-2xl transition-all duration-300">
                <div class="w-28 md:w-44 shrink-0 aspect-[4/3] md:aspect-[16/10] overflow-hidden rounded-xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&q=80&w=600" 
                         alt="Thumbnail" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="flex-col flex">
                    <h4 class="text-base md:text-lg font-bold text-gray-800 font-['Poppins'] leading-snug group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Persiapan Lomba Pramuka Tingkat Kwartir Ranting Mandiraja
                    </h4>
                    <p class="text-xs text-gray-500 font-medium mt-2 flex items-center gap-2">
                        <i class="fa-regular fa-clock"></i> 55 menit yang lalu
                    </p>
                </div>
            </a>

            {{-- List Kanan 1 --}}
            <a href="#" class="group flex flex-row gap-4 md:gap-6 items-center hover:bg-gray-50 p-3 -ml-3 md:p-4 md:-ml-4 rounded-2xl transition-all duration-300">
                <div class="w-28 md:w-44 shrink-0 aspect-[4/3] md:aspect-[16/10] overflow-hidden rounded-xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=600" 
                         alt="Thumbnail" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="flex-col flex">
                    <h4 class="text-base md:text-lg font-bold text-gray-800 font-['Poppins'] leading-snug group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Kunjungan Dinas Pendidikan Kabupaten Terkait Program Penggerak
                    </h4>
                    <p class="text-xs text-gray-500 font-medium mt-2 flex items-center gap-2">
                        <i class="fa-regular fa-clock"></i> 1 jam yang lalu
                    </p>
                </div>
            </a>

            {{-- List Kiri 2 --}}
            <a href="#" class="group flex flex-row gap-4 md:gap-6 items-center hover:bg-gray-50 p-3 -ml-3 md:p-4 md:-ml-4 rounded-2xl transition-all duration-300">
                <div class="w-28 md:w-44 shrink-0 aspect-[4/3] md:aspect-[16/10] overflow-hidden rounded-xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&q=80&w=600" 
                         alt="Thumbnail" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="flex-col flex">
                    <h4 class="text-base md:text-lg font-bold text-gray-800 font-['Poppins'] leading-snug group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Rapat Komite Sekolah Membahas Program Ekstrakurikuler Baru
                    </h4>
                    <p class="text-xs text-gray-500 font-medium mt-2 flex items-center gap-2">
                        <i class="fa-regular fa-clock"></i> 3 jam yang lalu
                    </p>
                </div>
            </a>

            {{-- List Kanan 2 --}}
            <a href="#" class="group flex flex-row gap-4 md:gap-6 items-center hover:bg-gray-50 p-3 -ml-3 md:p-4 md:-ml-4 rounded-2xl transition-all duration-300">
                <div class="w-28 md:w-44 shrink-0 aspect-[4/3] md:aspect-[16/10] overflow-hidden rounded-xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=600" 
                         alt="Thumbnail" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="flex-col flex">
                    <h4 class="text-base md:text-lg font-bold text-gray-800 font-['Poppins'] leading-snug group-hover:text-[#8B5E3C] transition-colors line-clamp-2">
                        Kegiatan Jumat Bersih dan Tanam Pohon di Lingkungan Sekolah
                    </h4>
                    <p class="text-xs text-gray-500 font-medium mt-2 flex items-center gap-2">
                        <i class="fa-regular fa-clock"></i> 5 jam yang lalu
                    </p>
                </div>
            </a>

        </div>

        {{-- Button Lihat Semua Berita --}}
        <div class="mt-16 text-center">
            <a href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#8B5E3C] text-[#8B5E3C] rounded-xl font-semibold hover:bg-[#8B5E3C] hover:text-white transition-all shadow-sm hover:shadow-lg transform hover:-translate-y-1">
                <span>Lihat Semua Berita</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>