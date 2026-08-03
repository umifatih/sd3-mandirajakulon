@extends('layouts.app')

@section('title','Program Unggulan | SD Negeri 3 Mandiraja Kulon')

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

    @keyframes popIn {
        0% { opacity: 0; transform: scale(0.92); }
        100% { opacity: 1; transform: scale(1); }
    }
    .animate-pop-in { animation: popIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>

<div
    x-data="programApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Program Unggulan <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    SD Negeri 3 Mandiraja Kulon
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Rangkaian program pembiasaan dan pembelajaran khas sekolah kami yang dirancang untuk membentuk siswa unggul secara akademik, karakter, dan spiritual.
            </p>

            {{-- Stat Strip --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4 opacity-0 animate-fade-in-up delay-400">
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="programs.length"></span>
                    <span class="text-xs text-white/70">Program Unggulan</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">Setiap Hari</span>
                    <span class="text-xs text-white/70">Pembiasaan Rutin</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">Kelas 1&ndash;6</span>
                    <span class="text-xs text-white/70">Berlaku untuk Semua</span>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== PROGRAM GRID ===================== --}}
    <section class="pt-20 pb-24 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-60 h-60 bg-white/60 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <template x-for="(program, index) in programs" :key="program.id">
                    <div
                        @click="openDetail(program)"
                        class="group relative bg-white rounded-3xl p-7 shadow-md border border-gray-100 cursor-pointer overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl opacity-0 animate-fade-in-up"
                        :style="'animation-delay:' + (index * 80) + 'ms'">

                        {{-- Aksen Blob --}}
                        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full bg-[#EBF5FA] group-hover:scale-150 transition-transform duration-500"></div>

                        <div class="relative z-10">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl text-white mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300"
                                 :class="program.color">
                                <i :class="program.icon"></i>
                            </div>

                            <h3 class="text-lg font-black text-gray-800 font-['Poppins'] leading-snug mb-2" x-text="program.name"></h3>

                            <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 mb-5" x-text="program.short"></p>

                            <span class="inline-flex items-center gap-2 text-[#18587A] font-semibold text-sm">
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1.5 transition-transform"></i>
                            </span>
                        </div>
                    </div>
                </template>

            </div>

        </div>
    </section>

    {{-- ===================== DETAIL MODAL ===================== --}}
    <div
        x-show="detailOpen"
        x-cloak
        @keydown.escape.window="closeDetail()"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-10"
    >
        {{-- Backdrop --}}
        <div
            x-show="detailOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="closeDetail()"
            class="absolute inset-0 bg-[#051A24]/85 backdrop-blur-sm">
        </div>

        {{-- Content --}}
        <div
            x-show="detailOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="relative z-10 max-w-2xl w-full max-h-[85vh] overflow-y-auto">

            <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl animate-pop-in" x-show="activeProgram">

                <div class="relative px-8 pt-10 pb-8" :class="activeProgram?.color">
                    <div class="absolute inset-0 opacity-90" :class="activeProgram?.color"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center text-3xl text-white mb-5">
                            <i :class="activeProgram?.icon"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-black text-white font-['Poppins']" x-text="activeProgram?.name"></h3>
                    </div>
                </div>

                <div class="p-8">
                    <p class="text-gray-600 leading-relaxed mb-6" x-text="activeProgram?.desc"></p>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-[#EBF5FA] rounded-xl p-4">
                            <i class="fa-regular fa-calendar text-[#18587A] mb-1.5"></i>
                            <p class="text-xs text-gray-400">Jadwal</p>
                            <p class="text-sm font-bold text-gray-800" x-text="activeProgram?.jadwal"></p>
                        </div>
                        <div class="bg-[#EBF5FA] rounded-xl p-4">
                            <i class="fa-solid fa-user-graduate text-[#18587A] mb-1.5"></i>
                            <p class="text-xs text-gray-400">Sasaran</p>
                            <p class="text-sm font-bold text-gray-800" x-text="activeProgram?.sasaran"></p>
                        </div>
                    </div>

                    <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide mb-3">Manfaat & Tujuan</h4>
                    <ul class="space-y-2.5">
                        <template x-for="point in activeProgram?.points || []" :key="point">
                            <li class="flex items-start gap-3">
                                <span class="text-[#61B1D0] mt-0.5">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                                <span class="text-gray-600 text-sm leading-relaxed" x-text="point"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>

            {{-- Close Button --}}
            <button
                @click="closeDetail()"
                class="absolute -top-4 -right-4 w-11 h-11 rounded-full bg-white text-gray-700 shadow-lg flex items-center justify-center hover:bg-[#18587A] hover:text-white transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function programApp() {
    return {
        detailOpen: false,
        activeProgram: null,

        programs: [
            {
                id: 1,
                name: 'Tadarus & Sholat Dhuha',
                icon: 'fa-solid fa-book-quran',
                color: 'bg-gradient-to-br from-[#18587A] to-[#092B3A]',
                short: 'Pembiasaan mengaji dan sholat dhuha berjamaah setiap pagi sebelum kegiatan belajar dimulai.',
                desc: 'Setiap pagi sebelum pelajaran dimulai, seluruh siswa mengikuti kegiatan tadarus Al-Qur\'an dan sholat dhuha berjamaah di mushola sekolah. Program ini bertujuan menanamkan nilai-nilai religius dan membiasakan siswa dekat dengan ajaran agama sejak dini.',
                jadwal: 'Setiap hari, 06.45 WIB',
                sasaran: 'Kelas 1&ndash;6',
                points: [
                    'Menumbuhkan kecintaan siswa pada Al-Qur\'an sejak dini',
                    'Membiasakan ibadah sunnah sebagai bagian dari rutinitas harian',
                    'Menciptakan suasana sekolah yang religius dan tenang',
                ],
            },
            {
                id: 2,
                name: 'Literasi Pagi 15 Menit',
                icon: 'fa-solid fa-book-open-reader',
                color: 'bg-gradient-to-br from-[#61B1D0] to-[#18587A]',
                short: 'Kegiatan membaca buku non-pelajaran selama 15 menit sebelum jam pelajaran pertama dimulai.',
                desc: 'Program Gerakan Literasi Sekolah (GLS) mengajak siswa membaca buku cerita, dongeng, atau bacaan ringan lain selama 15 menit setiap pagi. Kegiatan ini bertujuan menumbuhkan minat dan kebiasaan membaca siswa sejak usia sekolah dasar.',
                jadwal: 'Senin&ndash;Sabtu, 07.00 WIB',
                sasaran: 'Kelas 1&ndash;6',
                points: [
                    'Menumbuhkan minat baca dan kecintaan pada buku',
                    'Meningkatkan kemampuan literasi dan kosakata siswa',
                    'Didukung sudut baca di setiap ruang kelas',
                ],
            },
            {
                id: 3,
                name: 'English Corner',
                icon: 'fa-solid fa-comments',
                color: 'bg-gradient-to-br from-[#3E9FC6] to-[#134A64]',
                short: 'Klub bahasa Inggris yang melatih kosakata dan percakapan sederhana lewat permainan dan lagu.',
                desc: 'English Corner merupakan kegiatan pengayaan bahasa Inggris di luar jam pelajaran reguler. Siswa diajak belajar kosakata, lagu, dan percakapan sederhana melalui permainan interaktif agar belajar bahasa asing terasa menyenangkan.',
                jadwal: 'Rabu, 14.00 WIB',
                sasaran: 'Kelas 4&ndash;6',
                points: [
                    'Memperkenalkan bahasa Inggris dengan metode menyenangkan',
                    'Melatih kepercayaan diri siswa dalam berbicara bahasa asing',
                    'Menggunakan media lagu, kartu kata, dan permainan kelompok',
                ],
            },
            {
                id: 4,
                name: 'Sains Ceria',
                icon: 'fa-solid fa-flask',
                color: 'bg-gradient-to-br from-[#134A64] to-[#092B3A]',
                short: 'Eksperimen sains sederhana yang mengajak siswa belajar sambil praktik langsung.',
                desc: 'Program Sains Ceria mengajak siswa melakukan eksperimen sains sederhana yang aman dan mudah dipahami, seperti percobaan gunung meletus mini hingga percobaan sifat air. Kegiatan ini bertujuan menumbuhkan rasa ingin tahu dan kecintaan siswa pada sains sejak dini.',
                jadwal: 'Sabtu, 09.30 WIB (2 minggu sekali)',
                sasaran: 'Kelas 3&ndash;6',
                points: [
                    'Belajar konsep sains dasar melalui praktik langsung',
                    'Melatih kemampuan observasi dan berpikir kritis siswa',
                    'Menumbuhkan rasa ingin tahu terhadap fenomena alam sekitar',
                ],
            },
            {
                id: 5,
                name: 'Sekolah Adiwiyata (Green School)',
                icon: 'fa-solid fa-leaf',
                color: 'bg-gradient-to-br from-emerald-500 to-[#134A64]',
                short: 'Pembiasaan cinta lingkungan lewat kegiatan menanam, memilah sampah, dan menjaga kebersihan sekolah.',
                desc: 'Sebagai sekolah peraih penghargaan Adiwiyata, kami menanamkan kepedulian lingkungan melalui kegiatan rutin seperti Jumat Bersih, pemilahan sampah organik dan anorganik, serta program menanam dan merawat tanaman di taman sekolah.',
                jadwal: 'Jumat, 07.00 WIB (Jumat Bersih)',
                sasaran: 'Kelas 1&ndash;6',
                points: [
                    'Menanamkan kesadaran menjaga kebersihan dan kelestarian lingkungan',
                    'Praktik pemilahan sampah dan pengelolaan sampah organik',
                    'Mendukung capaian sekolah sebagai peraih penghargaan Adiwiyata',
                ],
            },
            {
                id: 6,
                name: 'Kelas Digital',
                icon: 'fa-solid fa-laptop-code',
                color: 'bg-gradient-to-br from-[#85C2DB] to-[#3E9FC6]',
                short: 'Pengenalan literasi digital dan teknologi informasi dasar sejak sekolah dasar.',
                desc: 'Kelas Digital mengenalkan siswa pada dasar-dasar teknologi informasi, mulai dari pengoperasian komputer, mengetik, hingga penggunaan aplikasi belajar interaktif di laboratorium komputer sekolah, sebagai bekal keterampilan di era digital.',
                jadwal: 'Selasa, 09.00 WIB',
                sasaran: 'Kelas 4&ndash;6',
                points: [
                    'Mengenalkan dasar pengoperasian komputer dan internet sehat',
                    'Melatih keterampilan mengetik dan penggunaan aplikasi belajar',
                    'Membekali siswa dengan literasi digital sejak usia dini',
                ],
            },
        ],

        init() {
            // no-op placeholder untuk future async data loading (mis. fetch dari controller)
        },

        openDetail(program) {
            this.activeProgram = program;
            this.detailOpen = true;
            document.body.style.overflow = 'hidden';
        },

        closeDetail() {
            this.detailOpen = false;
            document.body.style.overflow = '';
        },
    }
}
</script>

@endsection