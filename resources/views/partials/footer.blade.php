<footer class="bg-gradient-to-b from-[#18587A] to-[#134A64] text-white font-['Poppins'] relative overflow-hidden">
    {{-- Dekorasi latar abstrak --}}
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#EBF5FA]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#85C2DB]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- Kolom 1: Tentang Sekolah --}}
            <div class="md:col-span-1">
                <h3 class="text-xl font-bold text-[#85C2DB] mb-4">SD N 3<br>Mandiraja Kulon</h3>
                <p class="text-[#EBF5FA]/80 text-sm leading-relaxed font-light">
                    Mewujudkan generasi beriman, cerdas, terampil, berkarakter, dan berwawasan lingkungan melalui pendidikan berkualitas.
                </p>
            </div>

            {{-- Kolom 2: Tautan Cepat --}}
            <div>
                <h4 class="text-sm font-semibold text-[#85C2DB] uppercase tracking-wider mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm font-light">
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Beranda</a></li>
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Profil Sekolah</a></li>
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Akademik</a></li>
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Berita & Kegiatan</a></li>
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Galeri</a></li>
                    <li><a href="#" class="text-[#EBF5FA]/80 hover:text-[#85C2DB] transition-colors">Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div>
                <h4 class="text-sm font-semibold text-[#85C2DB] uppercase tracking-wider mb-4">Kontak Kami</h4>
                <ul class="space-y-3 text-sm font-light">
                    <li class="flex items-start gap-3 text-[#EBF5FA]/80">
                        <i class="fa-solid fa-location-dot text-[#85C2DB] mt-1"></i>
                        <span>Jl. Raya Mandiraja Kulon,<br>Kec. Mandiraja, Kab. Banjarnegara</span>
                    </li>
                    <li class="flex items-center gap-3 text-[#EBF5FA]/80">
                        <i class="fa-solid fa-phone text-[#85C2DB]"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center gap-3 text-[#EBF5FA]/80">
                        <i class="fa-solid fa-envelope text-[#85C2DB]"></i>
                        <span>info@sd3mandirajakulon.sch.id</span>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Sosial Media --}}
            <div>
                <h4 class="text-sm font-semibold text-[#85C2DB] uppercase tracking-wider mb-4">Ikuti Kami</h4>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#85C2DB] hover:bg-[#85C2DB] hover:text-[#134A64] transition-all duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#85C2DB] hover:bg-[#85C2DB] hover:text-[#134A64] transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#85C2DB] hover:bg-[#85C2DB] hover:text-[#134A64] transition-all duration-300">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-[#85C2DB] hover:bg-[#85C2DB] hover:text-[#134A64] transition-all duration-300">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </div>
                <p class="text-[#EBF5FA]/60 text-xs mt-6 font-light">Ikuti media sosial kami untuk info terbaru.</p>
            </div>
        </div>

        {{-- Garis pemisah dengan aksen --}}
        <div class="border-t border-[#85C2DB]/30 my-10"></div>

        {{-- Hak Cipta --}}
        <div class="text-center text-sm text-[#EBF5FA]/80 font-light">
            <p>&copy; {{ date('Y') }} SD Negeri 3 Mandiraja Kulon. All Rights Reserved.</p>
            <p class="mt-1 text-xs text-[#EBF5FA]/60">Dikelola oleh Tim IT SDN 3 Mandiraja Kulon</p>
        </div>
    </div>
</footer>