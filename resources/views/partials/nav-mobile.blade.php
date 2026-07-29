{{-- Mobile Menu --}}
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
                <a href="#" class="block">Struktur Organisasi</a>
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