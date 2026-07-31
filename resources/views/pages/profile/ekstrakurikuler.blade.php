@extends('layouts.app')

@section('title','Ekstrakurikuler | SD Negeri 3 Mandiraja Kulon')

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

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(12px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>

<div
    x-data="ekskulApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">
        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Kembangkan Bakat <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    di Luar Jam Pelajaran
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Wadah pengembangan minat, bakat, dan karakter siswa melalui kegiatan Pramuka, Drumband, dan Hadroh di SD Negeri 3 Mandiraja Kulon.
            </p>

            {{-- Stat Strip --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4 opacity-0 animate-fade-in-up delay-400">
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">3</span>
                    <span class="text-xs text-white/70">Ekstrakurikuler</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">120+</span>
                    <span class="text-xs text-white/70">Peserta Aktif</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">4</span>
                    <span class="text-xs text-white/70">Kelas 3&ndash;6</span>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== TAB SELECTOR ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 p-3">
            <div class="grid grid-cols-3 gap-2">
                <template x-for="ekskul in ekskuls" :key="ekskul.key">
                    <button
                        @click="activeTab = ekskul.key"
                        :class="activeTab === ekskul.key
                            ? 'bg-[#18587A] text-white shadow-md'
                            : 'bg-[#EBF5FA] text-gray-600 hover:bg-[#CCE5F0]'"
                        class="flex flex-col md:flex-row items-center justify-center gap-2 px-4 py-3.5 rounded-xl text-sm font-semibold transition-all">
                        <i :class="ekskul.icon" class="text-lg md:text-base"></i>
                        <span x-text="ekskul.name"></span>
                    </button>
                </template>
            </div>
        </div>
    </section>

    {{-- ===================== DETAIL PANEL ===================== --}}
    <section class="py-16 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

            <template x-for="ekskul in ekskuls" :key="'panel-'+ekskul.key">
                <div x-show="activeTab === ekskul.key" x-cloak class="animate-fade-in">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                        {{-- ================= GAMBAR (KIRI) ================= --}}
                        <div class="lg:col-span-5 flex justify-center">
                            <div class="relative w-full max-w-md">
                                <div class="absolute inset-0 border-4 border-[#85C2DB] rounded-3xl translate-x-4 translate-y-4"></div>
                                <img :src="ekskul.img" :alt="ekskul.name"
                                     class="relative z-10 rounded-3xl shadow-xl w-full object-cover aspect-[4/5]">

                                <div class="absolute -bottom-6 -right-4 z-20 bg-white/95 backdrop-blur-lg p-4 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.15)] border border-white">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-[#18587A] rounded-full flex items-center justify-center text-white shrink-0 shadow-inner">
                                            <i :class="ekskul.icon" class="text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-sm font-['Poppins']" x-text="ekskul.pembina"></h4>
                                            <p class="text-xs text-[#18587A] font-medium">Pembina</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= TEKS (KANAN) ================= --}}
                        <div class="lg:col-span-7">

                            <span class="inline-block px-4 py-1.5 rounded-full bg-[#18587A] text-white text-xs font-semibold uppercase tracking-wide shadow-sm mb-4" x-text="ekskul.name"></span>

                            <h2 class="text-3xl md:text-4xl font-black text-gray-800 leading-tight font-['Poppins'] mb-5" x-text="ekskul.tagline"></h2>

                            <p class="text-gray-600 leading-relaxed text-lg mb-8 font-light" x-text="ekskul.desc"></p>

                            {{-- Info Grid --}}
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                                    <i class="fa-regular fa-calendar text-[#18587A] mb-1.5"></i>
                                    <p class="text-xs text-gray-400">Jadwal</p>
                                    <p class="text-sm font-bold text-gray-800" x-text="ekskul.jadwal"></p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                                    <i class="fa-solid fa-user-graduate text-[#18587A] mb-1.5"></i>
                                    <p class="text-xs text-gray-400">Sasaran</p>
                                    <p class="text-sm font-bold text-gray-800" x-text="ekskul.sasaran"></p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                                    <i class="fa-solid fa-users text-[#18587A] mb-1.5"></i>
                                    <p class="text-xs text-gray-400">Peserta</p>
                                    <p class="text-sm font-bold text-gray-800" x-text="ekskul.peserta"></p>
                                </div>
                            </div>

                            {{-- Highlights --}}
                            <ul class="space-y-2.5">
                                <template x-for="point in ekskul.highlights" :key="point">
                                    <li class="flex items-start gap-3">
                                        <span class="text-[#61B1D0] mt-0.5">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </span>
                                        <span class="text-gray-600 leading-relaxed" x-text="point"></span>
                                    </li>
                                </template>
                            </ul>

                        </div>

                    </div>

                    {{-- ================= MINI GALERI ================= --}}
                    <div class="mt-14">
                        <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-4 block">Dokumentasi</span>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <template x-for="(photo, i) in ekskul.gallery" :key="'gal-'+ekskul.key+'-'+i">
                                <div class="relative group overflow-hidden rounded-2xl aspect-square shadow-md">
                                    <img :src="photo" :alt="ekskul.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-[#092B3A]/0 group-hover:bg-[#092B3A]/20 transition-colors duration-300"></div>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>
            </template>

        </div>
    </section>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function ekskulApp() {
    return {
        activeTab: 'pramuka',

        ekskuls: [
            {
                key: 'pramuka',
                name: 'Pramuka',
                icon: 'fa-solid fa-campground',
                tagline: 'Melatih Kemandirian, Disiplin, dan Kerja Sama',
                desc: 'Kegiatan Pramuka menjadi wadah utama pembentukan karakter siswa melalui latihan baris-berbaris, tali-temali, permainan kelompok, dan kegiatan berkemah. Siswa dilatih untuk mandiri, disiplin, serta memiliki jiwa kepemimpinan dan gotong royong.',
                pembina: 'Kak Slamet',
                jadwal: 'Jumat, 14.00 WIB',
                sasaran: 'Kelas 3&ndash;6',
                peserta: '±50 Siswa',
                highlights: [
                    'Latihan rutin tali-temali dan baris-berbaris',
                    'Kegiatan perkemahan (persami) setiap semester',
                    'Persiapan lomba pramuka tingkat kecamatan',
                ],
                gallery: [
                    'https://images.unsplash.com/photo-1602001068491-b4f00e2c86f0?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1508163356291-7dfea4a5c8b7?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?auto=format&fit=crop&q=80&w=500',
                ],
                img: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=900',
            },
            {
                key: 'drumband',
                name: 'Drumband',
                icon: 'fa-solid fa-drum',
                tagline: 'Kekompakan dalam Irama dan Langkah',
                desc: 'Ekstrakurikuler Drumband melatih siswa bermain alat musik pukul secara berkelompok dengan formasi baris-berbaris yang rapi. Kegiatan ini menumbuhkan rasa percaya diri, kekompakan tim, dan apresiasi seni musik sejak usia dini.',
                pembina: 'Pak Yusuf',
                jadwal: 'Sabtu, 08.00 WIB',
                sasaran: 'Kelas 4&ndash;6',
                peserta: '±35 Siswa',
                highlights: [
                    'Latihan alat musik pukul: snare, bass drum, dan pianika',
                    'Pembentukan formasi barisan untuk tampil di acara sekolah',
                    'Tampil rutin dalam acara peringatan hari besar nasional',
                ],
                gallery: [
                    'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1519683384663-c9b34271669c?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1461784180009-27c1303a64b6?auto=format&fit=crop&q=80&w=500',
                ],
                img: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&q=80&w=900',
            },
            {
                key: 'hadroh',
                name: 'Hadroh',
                icon: 'fa-solid fa-music',
                tagline: 'Melestarikan Seni Islami Sejak Dini',
                desc: 'Kegiatan Hadroh mengenalkan siswa pada kesenian musik Islami tradisional berupa tabuhan rebana yang diiringi lantunan sholawat. Ekstrakurikuler ini menumbuhkan kecintaan pada seni budaya religi sekaligus mempererat nilai-nilai keagamaan.',
                pembina: 'Ustadz Fauzan',
                jadwal: 'Kamis, 14.00 WIB',
                sasaran: 'Kelas 3&ndash;6',
                peserta: '±25 Siswa',
                highlights: [
                    'Latihan tabuhan rebana dan lantunan sholawat',
                    'Tampil dalam acara keagamaan dan peringatan hari besar Islam',
                    'Menumbuhkan kecintaan pada seni budaya religi',
                ],
                gallery: [
                    'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1466442929976-97f336a657be?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1507838153414-b4b713384a76?auto=format&fit=crop&q=80&w=500',
                    'https://images.unsplash.com/photo-1478147427282-58a87a120781?auto=format&fit=crop&q=80&w=500',
                ],
                img: 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&q=80&w=900',
            },
        ],

        init() {
            // no-op placeholder untuk future async data loading (mis. fetch dari controller)
        },
    }
}
</script>

@endsection