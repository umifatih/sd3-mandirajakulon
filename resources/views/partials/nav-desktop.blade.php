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

                <a href="#" class="dropdown-item">
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

        <a href="#" class="nav-link">Berita</a>

        <a href="#" class="nav-link">Galeri</a>

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