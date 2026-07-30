<footer class="bg-gradient-to-b from-[#1A1A1A] to-[#2C2C2C] text-white font-['Poppins'] relative overflow-hidden">
    {{-- Dekorasi latar abstrak --}}
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#8B5E3C]/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#D9B99B]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- Kolom 1: Tentang Sekolah --}}
            <div class="md:col-span-1">
                <h3 class="text-xl font-bold text-[#D9B99B] mb-4">SD N 3<br>Mandiraja Kulon</h3>
                <p class="text-gray-400 text-sm leading-relaxed font-light">
                    Mewujudkan generasi beriman, cerdas, terampil, berkarakter, dan berwawasan lingkungan melalui pendidikan berkualitas.
                </p>
            </div>

            {{-- Kolom 2: Tautan Cepat --}}
            <div>
                <h4 class="text-sm font-semibold text-[#D9B99B] uppercase tracking-wider mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm font-light">
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Beranda</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Profil Sekolah</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Akademik</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Berita & Kegiatan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Galeri</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#D9B99B] transition-colors">Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div>
                <h4 class="text-sm font-semibold text-[#D9B99B] uppercase tracking-wider mb-4">Kontak Kami</h4>
                <ul class="space-y-3 text-sm font-light">
                    <li class="flex items-start gap-3 text-gray-400">
                        <i class="fa-solid fa-location-dot text-[#D9B99B] mt-1"></i>
                        <span>Jl. Raya Mandiraja Kulon,<br>Kec. Mandiraja, Kab. Banjarnegara</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-400">
                        <i class="fa-solid fa-phone text-[#D9B99B]"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-400">
                        <i class="fa-solid fa-envelope text-[#D9B99B]"></i>
                        <span>info@sd3mandirajakulon.sch.id</span>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Sosial Media --}}
            <div>
                <h4 class="text-sm font-semibold text-[#D9B99B] uppercase tracking-wider mb-4">Ikuti Kami</h4>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#D9B99B] hover:bg-[#D9B99B] hover:text-[#1A1A1A] transition-all duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#D9B99B] hover:bg-[#D9B99B] hover:text-[#1A1A1A] transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#D9B99B] hover:bg-[#D9B99B] hover:text-[#1A1A1A] transition-all duration-300">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#D9B99B] hover:bg-[#D9B99B] hover:text-[#1A1A1A] transition-all duration-300">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </div>
                <p class="text-gray-500 text-xs mt-6 font-light">Ikuti media sosial kami untuk info terbaru.</p>
            </div>

        </div>

        {{-- Garis pemisah dengan aksen emas --}}
        <div class="border-t border-[#D9B99B]/20 my-10"></div>

        {{-- Hak Cipta --}}
        <div class="text-center text-sm text-gray-400 font-light">
            <p>&copy; {{ date('Y') }} SD Negeri 3 Mandiraja Kulon. All Rights Reserved.</p>
            <p class="mt-1 text-xs text-gray-500">Dikelola oleh Tim IT SDN 3 Mandiraja Kulon</p>
        </div>

    </div>
</footer>