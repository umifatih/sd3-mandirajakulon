<nav
    x-data="{
        mobileMenu: false,
        scrolled: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 60
        })
    "
    class="fixed inset-x-0 top-5 z-50 transition-all duration-500">

    <div
        class="max-w-7xl mx-auto px-4 lg:px-8">

        <div
            :class="scrolled
                ? 'bg-white/95 shadow-2xl border border-gray-200 backdrop-blur-xl'
                : 'bg-white/15 border border-white/20 backdrop-blur-lg'"
            class="transition-all duration-500 rounded-2xl">

            <div class="h-20 px-6 flex items-center justify-between">

                {{-- ===================== LOGO ===================== --}}
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-4 group shrink-0">

                    <div class="relative">

                        <img
                            src="https://placehold.co/60x60?text=Logo"
                            alt="Logo Sekolah"
                            class="w-14 h-14 rounded-full object-cover ring-4 ring-white shadow-lg transition duration-300 group-hover:scale-105">

                    </div>

                    <div>

                        <h1
                            :class="scrolled ? 'text-gray-800' : 'text-white'"
                            class="font-bold text-lg leading-tight transition">

                            SD Negeri 3

                        </h1>

                        <p
                            :class="scrolled ? 'text-gray-500' : 'text-white/80'"
                            class="text-sm transition">

                            Mandiraja Kulon

                        </p>

                        <span class="text-xs font-medium text-[#D9B99B]">

                            Website Resmi

                        </span>

                    </div>

                </a>

                {{-- ===================== DESKTOP ===================== --}}
                <!-- Inline dari nav-desktop.blade.php -->
                <div
                    class="hidden lg:flex items-center gap-10"
                    :class="scrolled ? 'text-gray-700' : 'text-white'">

                    {{-- ================= MENU ================= --}}
                    <div class="flex items-center gap-8 font-medium text-[15px]">

                        {{-- Home --}}
                        <a href="{{ route('home') }}"
                            class="nav-link">

                            Home

                        </a>

                        {{-- ================= PROFIL ================= --}}
                        <div
                            class="relative"
                            x-data="{open:false}"
                            @mouseenter="open=true"
                            @mouseleave="open=false">

                            <button class="nav-link flex items-center gap-2">

                                Profil

                                <i class="fa-solid fa-chevron-down text-[10px] transition"
                                    :class="open && 'rotate-180'"></i>

                            </button>

                            <div
                                x-show="open"
                                x-transition.opacity.scale.origin.top
                                class="dropdown-menu">

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-school"></i>
                                    Profil Sekolah
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-landmark"></i>
                                    Sejarah
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-bullseye"></i>
                                    Visi & Misi
                                </a>

                                <a href="{{ route('profile.struktur') }}" class="dropdown-item">
                                    <i class="fa-solid fa-sitemap"></i>
                                    Struktur Organisasi
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-building"></i>
                                    Sarana & Prasarana
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-person-running"></i>
                                    Ekstrakurikuler
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-trophy"></i>
                                    Prestasi Sekolah
                                </a>

                            </div>

                        </div>

                        {{-- ================= WARGA ================= --}}

                        <div
                            class="relative"
                            x-data="{open:false}"
                            @mouseenter="open=true"
                            @mouseleave="open=false">

                            <button class="nav-link flex items-center gap-2">

                                Warga

                                <i class="fa-solid fa-chevron-down text-[10px]"
                                    :class="open && 'rotate-180'"></i>

                            </button>

                            <div
                                x-show="open"
                                x-transition.opacity.scale.origin.top
                                class="dropdown-menu w-60">

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    Guru
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-user-graduate"></i>
                                    Siswa
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-users"></i>
                                    Alumni
                                </a>

                            </div>

                        </div>

                        {{-- ================= AKADEMIK ================= --}}

                        <div
                            class="relative"
                            x-data="{open:false}"
                            @mouseenter="open=true"
                            @mouseleave="open=false">

                            <button class="nav-link flex items-center gap-2">

                                Akademik

                                <i class="fa-solid fa-chevron-down text-[10px]"
                                    :class="open && 'rotate-180'"></i>

                            </button>

                            <div
                                x-show="open"
                                x-transition.opacity.scale.origin.top
                                class="dropdown-menu">

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-calendar"></i>
                                    Kalender Akademik
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-lightbulb"></i>
                                    Program Unggulan
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-medal"></i>
                                    Prestasi Akademik
                                </a>

                            </div>

                        </div>

                        <a href="{{ route('berita.index') }}" class="nav-link">Berita</a>

                        <a href="{{ route('galeri.index') }}" class="nav-link">Galeri</a>

                        <a href="#" class="nav-link">Kontak</a>

                    </div>

                    {{-- ================= ACTION ================= --}}

                    <div class="flex items-center gap-3">

                        <button
                            class="action-btn">

                            <i class="fa-solid fa-magnifying-glass"></i>

                        </button>

                        <button
                            class="action-btn">

                            <i class="fa-solid fa-moon"></i>

                        </button>

                        <a
                            href="#"
                            class="bg-[#8B5E3C] hover:bg-[#6F4A2D]
                            text-white px-6 py-2.5 rounded-full
                            font-semibold shadow-lg
                            hover:scale-105 transition">

                            Portal Admin

                        </a>

                    </div>

                </div>

                {{-- ===================== MOBILE BUTTON ===================== --}}
                <button
                    @click="mobileMenu = !mobileMenu"
                    class="lg:hidden flex items-center justify-center w-11 h-11 rounded-xl transition"

                    :class="scrolled
                        ? 'bg-[#F8F5F2] text-[#8B5E3C]'
                        : 'bg-white/20 text-white backdrop-blur'">

                    <i class="fa-solid fa-bars text-xl"></i>

                </button>

            </div>

        </div>

    </div>

    {{-- ===================== MOBILE MENU ===================== --}}
    <!-- Inline dari nav-mobile.blade.php -->
    <div
        x-show="mobileMenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden bg-white border-t shadow-xl">

        <div class="px-6 py-6 space-y-2">

            <a href="{{ route('home') }}"
                class="block py-3 font-medium hover:text-[#8B5E3C]">
                Home
            </a>

            {{-- Profil --}}
            <div x-data="{ open:false }">

                <button
                    @click="open=!open"
                    class="w-full flex justify-between items-center py-3 font-medium hover:text-[#8B5E3C]">

                    Profil

                    <i class="fa-solid fa-chevron-down"
                        :class="{ 'rotate-180': open }"></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="pl-4 pb-3 space-y-2 text-gray-600">

                    <a href="#" class="block">Profil Sekolah</a>
                    <a href="#" class="block">Sejarah</a>
                    <a href="#" class="block">Visi & Misi</a>
                    <a href="{{ route('profile.struktur') }}" class="block">Struktur Organisasi</a>
                    <a href="#" class="block">Sarana Prasarana</a>
                    <a href="#" class="block">Ekstrakurikuler</a>
                    <a href="#" class="block">Prestasi</a>

                </div>

            </div>

            {{-- Warga --}}
            <div x-data="{ open:false }">

                <button
                    @click="open=!open"
                    class="w-full flex justify-between items-center py-3 font-medium hover:text-[#8B5E3C]">

                    Warga Sekolah

                    <i class="fa-solid fa-chevron-down"
                        :class="{ 'rotate-180': open }"></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="pl-4 pb-3 space-y-2 text-gray-600">

                    <a href="#" class="block">Guru</a>
                    <a href="#" class="block">Siswa</a>
                    <a href="#" class="block">Alumni</a>

                </div>

            </div>

            {{-- Akademik --}}
            <div x-data="{ open:false }">

                <button
                    @click="open=!open"
                    class="w-full flex justify-between items-center py-3 font-medium hover:text-[#8B5E3C]">

                    Akademik

                    <i class="fa-solid fa-chevron-down"
                        :class="{ 'rotate-180': open }"></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="pl-4 pb-3 space-y-2 text-gray-600">

                    <a href="#" class="block">Kalender Akademik</a>
                    <a href="#" class="block">Program Unggulan</a>
                    <a href="#" class="block">Prestasi Akademik</a>

                </div>

            </div>

            <a href="#" class="block py-3 font-medium">Berita</a>

            <a href="#" class="block py-3 font-medium">Galeri</a>

            {{-- Informasi --}}
            <div x-data="{ open:false }">

                <button
                    @click="open=!open"
                    class="w-full flex justify-between items-center py-3 font-medium hover:text-[#8B5E3C]">

                    Informasi

                    <i class="fa-solid fa-chevron-down"
                        :class="{ 'rotate-180': open }"></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="pl-4 pb-3 space-y-2 text-gray-600">

                    <a href="#" class="block">Pengumuman</a>
                    <a href="#" class="block">Download</a>
                    <a href="#" class="block">Pengaduan</a>

                </div>

            </div>

            <a href="#" class="block py-3 font-medium">PPDB</a>

            <a href="#" class="block py-3 font-medium">Kontak</a>

            <hr class="my-4">

            <div class="flex gap-3">

                <button
                    class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-[#8B5E3C] hover:text-white transition">

                    <i class="fa-solid fa-magnifying-glass"></i>

                </button>

                <button
                    class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-[#8B5E3C] hover:text-white transition">

                    <i class="fa-solid fa-moon"></i>

                </button>

                <a href="#"
                    class="flex-1 bg-[#8B5E3C] text-center text-white rounded-xl py-3 font-semibold hover:bg-[#6F4A2D] transition">

                    Login Admin

                </a>

            </div>

        </div>

    </div>

</nav>

<!-- Script untuk mengubah posisi top saat scroll -->
<script>
document.addEventListener("alpine:init", () => {

    window.addEventListener("scroll", () => {

        const navbar = document.querySelector("nav");

        if (window.scrollY > 60) {

            navbar.classList.remove("top-5");

            navbar.classList.add("top-0");

        } else {

            navbar.classList.remove("top-0");

            navbar.classList.add("top-5");

        }

    });

});
</script>