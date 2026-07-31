@extends('layouts.app')

@section('title','Prestasi Sekolah | SD Negeri 3 Mandiraja Kulon')

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

<div
    x-data="prestasiApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Torehan Prestasi <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    Siswa & Sekolah Kami
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Kumpulan capaian membanggakan dari bidang akademik, olahraga, seni, hingga kepramukaan yang diraih siswa SD Negeri 3 Mandiraja Kulon.
            </p>

            {{-- Stat Strip --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4 opacity-0 animate-fade-in-up delay-400">
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="items.length + '+'"></span>
                    <span class="text-xs text-white/70">Total Prestasi</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="countByLevel('Provinsi')"></span>
                    <span class="text-xs text-white/70">Tingkat Provinsi</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="countByLevel('Nasional')"></span>
                    <span class="text-xs text-white/70">Tingkat Nasional</span>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== FILTER BAR ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 p-4 space-y-4">

            <div class="flex flex-col md:flex-row md:items-center gap-4">

                {{-- Search --}}
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari prestasi, misal: OSN, pramuka, juara..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition">
                </div>

                {{-- Kategori Pills --}}
                <div class="flex flex-wrap gap-2 md:justify-end">
                    <template x-for="cat in categories" :key="cat.key">
                        <button
                            @click="activeCategory = cat.key"
                            :class="activeCategory === cat.key
                                ? 'bg-[#18587A] text-white shadow-md'
                                : 'bg-[#EBF5FA] text-gray-600 hover:bg-[#CCE5F0]'"
                            class="px-4 py-2 rounded-xl text-xs md:text-sm font-semibold transition-all whitespace-nowrap">
                            <i :class="cat.icon" class="mr-1.5"></i>
                            <span x-text="cat.label"></span>
                        </button>
                    </template>
                </div>

            </div>

            {{-- Tingkat Filter --}}
            <div class="flex flex-wrap items-center gap-2 pt-4 border-t border-gray-100">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide mr-2">Tingkat:</span>
                <template x-for="lvl in levels" :key="lvl.key">
                    <button
                        @click="activeLevel = lvl.key"
                        :class="activeLevel === lvl.key
                            ? 'bg-[#61B1D0] text-white shadow-sm'
                            : 'bg-[#EBF5FA] text-gray-500 hover:bg-[#CCE5F0]'"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-all whitespace-nowrap"
                        x-text="lvl.label"></button>
                </template>
            </div>

        </div>
    </section>

    {{-- ===================== FEATURED ACHIEVEMENT ===================== --}}
    <section
        class="pt-16 pb-4 bg-[#EBF5FA]"
        x-show="!search && activeCategory === 'semua' && activeLevel === 'semua' && featured"
        x-cloak>
        <div class="max-w-6xl mx-auto px-6">

            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-4 block">Prestasi Terbaik</span>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-0 bg-white rounded-3xl overflow-hidden shadow-[0_20px_60px_rgb(0,0,0,0.1)] border border-gray-100">

                <div class="relative h-64 lg:h-full min-h-[320px] overflow-hidden">
                    <img :src="featured?.img" :alt="featured?.title" class="w-full h-full object-cover">
                    <div class="absolute top-5 left-5 flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500 text-white text-xs font-bold uppercase tracking-wide shadow-lg">
                        <i class="fa-solid fa-trophy"></i>
                        <span x-text="featured?.level"></span>
                    </div>
                </div>

                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-3 text-xs text-gray-400 mb-4 font-medium">
                        <span x-text="featured?.categoryLabel"></span>
                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                        <span x-text="featured?.year"></span>
                    </div>

                    <h2 class="text-2xl lg:text-3xl font-black text-gray-800 font-['Poppins'] leading-snug mb-3" x-text="featured?.title"></h2>

                    <p class="text-[#18587A] font-semibold mb-4 flex items-center gap-2">
                        <i class="fa-regular fa-user"></i>
                        <span x-text="featured?.student"></span>
                    </p>

                    <p class="text-gray-500 leading-relaxed" x-text="featured?.desc"></p>
                </div>

            </div>

        </div>
    </section>

    {{-- ===================== ACHIEVEMENTS GRID ===================== --}}
    <section class="py-16 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-2 block">Daftar Lengkap</span>
                    <h2 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Semua Prestasi</h2>
                </div>
                <span class="hidden md:block text-sm text-gray-400 font-medium" x-text="filteredItems.length + ' prestasi ditemukan'"></span>
            </div>

            {{-- Empty State --}}
            <div
                x-show="filteredItems.length === 0"
                x-cloak
                class="text-center py-24">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-white flex items-center justify-center text-3xl text-[#18587A] mb-4">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 font-['Poppins']">Belum ada prestasi ditemukan</h3>
                <p class="text-gray-500 text-sm mt-2">Coba ganti kata kunci, kategori, atau tingkat lain.</p>
            </div>

            {{-- Grid --}}
            <div
                x-show="filteredItems.length > 0"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <template x-for="(item, index) in visibleItems" :key="item.id">
                    <div
                        class="group relative flex flex-col bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 opacity-0 animate-fade-in-up"
                        :style="'animation-delay:' + ((index % 6) * 80) + 'ms'">

                        <div class="relative h-44 overflow-hidden">
                            <img :src="item.img" :alt="item.title" loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                            <div class="absolute top-4 left-4 flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold shadow-sm"
                                 :class="levelBadgeClass(item.level)">
                                <i class="fa-solid fa-trophy"></i>
                                <span x-text="item.level"></span>
                            </div>

                            <div class="absolute top-4 right-4 px-2.5 py-1 rounded-lg bg-white/90 backdrop-blur text-[#18587A] text-[11px] font-semibold shadow-sm" x-text="item.year"></div>
                        </div>

                        <div class="p-5 flex flex-col flex-1">
                            <span class="text-xs font-semibold text-[#61B1D0] uppercase tracking-wide mb-2" x-text="item.categoryLabel"></span>

                            <h3 class="font-bold text-gray-800 font-['Poppins'] leading-snug mb-2 line-clamp-2" x-text="item.title"></h3>

                            <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4" x-text="item.desc"></p>

                            <div class="mt-auto flex items-center gap-2 text-sm text-gray-600 font-medium pt-3 border-t border-gray-50">
                                <i class="fa-regular fa-user text-[#18587A]"></i>
                                <span x-text="item.student"></span>
                            </div>
                        </div>
                    </div>
                </template>

            </div>

            {{-- Load More --}}
            <div class="mt-12 text-center" x-show="visibleCount < filteredItems.length" x-cloak>
                <button
                    @click="visibleCount += 6"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#18587A] text-[#18587A] rounded-xl font-semibold hover:bg-[#18587A] hover:text-white transition-all shadow-sm hover:shadow-lg transform hover:-translate-y-1">
                    <span>Muat Lebih Banyak</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </button>
            </div>

        </div>
    </section>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function prestasiApp() {
    return {
        search: '',
        activeCategory: 'semua',
        activeLevel: 'semua',
        visibleCount: 6,

        categories: [
            { key: 'semua', label: 'Semua', icon: 'fa-solid fa-border-all' },
            { key: 'akademik', label: 'Akademik', icon: 'fa-solid fa-book' },
            { key: 'olahraga', label: 'Olahraga', icon: 'fa-solid fa-futbol' },
            { key: 'seni', label: 'Seni & Budaya', icon: 'fa-solid fa-palette' },
            { key: 'pramuka', label: 'Kepramukaan', icon: 'fa-solid fa-campground' },
        ],

        levels: [
            { key: 'semua', label: 'Semua Tingkat' },
            { key: 'Kecamatan', label: 'Kecamatan' },
            { key: 'Kabupaten', label: 'Kabupaten' },
            { key: 'Provinsi', label: 'Provinsi' },
            { key: 'Nasional', label: 'Nasional' },
        ],

        items: [
            { id: 1, category: 'akademik', categoryLabel: 'Akademik', title: 'Juara 1 OSN Matematika Tingkat Kabupaten', student: 'Budi Santoso &mdash; Kelas 5', year: '2026', level: 'Kabupaten', desc: 'Meraih nilai tertinggi dalam Olimpiade Sains Nasional bidang Matematika se-Kabupaten Banjarnegara.', img: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=900' },
            { id: 2, category: 'pramuka', categoryLabel: 'Kepramukaan', title: 'Juara Umum Lomba Pramuka Tingkat Kecamatan', student: 'Regu Pramuka Garuda', year: '2026', level: 'Kecamatan', desc: 'Regu putra dan putri berhasil menyabet gelar juara umum dalam Perkemahan Jumat Sabtu (Persami) tingkat kecamatan.', img: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=900' },
            { id: 3, category: 'olahraga', categoryLabel: 'Olahraga', title: 'Juara 2 Lomba Lari 60 Meter O2SN Kabupaten', student: 'Siti Aminah &mdash; Kelas 6', year: '2025', level: 'Kabupaten', desc: 'Mewakili kecamatan dalam ajang Olimpiade Olahraga Siswa Nasional (O2SN) cabang atletik.', img: 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&q=80&w=900' },
            { id: 4, category: 'seni', categoryLabel: 'Seni & Budaya', title: 'Juara 1 Lomba Mewarnai Tingkat Provinsi', student: 'Nayla Putri &mdash; Kelas 2', year: '2026', level: 'Provinsi', desc: 'Karya mewarnai bertema lingkungan berhasil meraih juara pertama dalam ajang tingkat provinsi Jawa Tengah.', img: 'https://images.unsplash.com/photo-1499892477393-f675706cbe6e?auto=format&fit=crop&q=80&w=900' },
            { id: 5, category: 'akademik', categoryLabel: 'Akademik', title: 'Sekolah Adiwiyata Tingkat Provinsi', student: 'Tim Adiwiyata Sekolah', year: '2026', level: 'Provinsi', desc: 'Penghargaan atas komitmen sekolah dalam pengelolaan lingkungan hidup yang berkelanjutan.', img: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=900' },
            { id: 6, category: 'seni', categoryLabel: 'Seni & Budaya', title: 'Juara Harapan 1 Festival Hadroh Tingkat Kabupaten', student: 'Grup Hadroh Nurul Iman', year: '2025', level: 'Kabupaten', desc: 'Penampilan grup hadroh sekolah mendapat apresiasi dewan juri dalam festival seni Islami se-kabupaten.', img: 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&q=80&w=900' },
            { id: 7, category: 'pramuka', categoryLabel: 'Kepramukaan', title: 'Juara 3 Lomba Tata Upacara Bendera (LTUB) Kabupaten', student: 'Tim Paskibra Sekolah', year: '2025', level: 'Kabupaten', desc: 'Tim petugas upacara bendera tampil disiplin dan kompak dalam lomba tingkat kabupaten.', img: 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?auto=format&fit=crop&q=80&w=900' },
            { id: 8, category: 'olahraga', categoryLabel: 'Olahraga', title: 'Juara 1 Turnamen Futsal Antar SD Se-Kecamatan', student: 'Tim Futsal SDN 3 Mandiraja Kulon', year: '2025', level: 'Kecamatan', desc: 'Tim futsal sekolah tampil solid dan berhasil menjadi juara dalam turnamen antar sekolah dasar.', img: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&q=80&w=900' },
            { id: 9, category: 'akademik', categoryLabel: 'Akademik', title: 'Juara 2 Lomba Cerdas Cermat Tingkat Kabupaten', student: 'Tim CC SDN 3 Mandiraja Kulon', year: '2024', level: 'Kabupaten', desc: 'Tim cerdas cermat menunjukkan penguasaan materi yang kuat dalam kompetisi antar sekolah dasar.', img: 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&q=80&w=900' },
            { id: 10, category: 'akademik', categoryLabel: 'Akademik', title: 'Juara 1 OSN IPA Tingkat Nasional', student: 'Ahmad Fauzi &mdash; Kelas 6', year: '2026', level: 'Nasional', desc: 'Prestasi tertinggi sekolah tahun ini, berhasil lolos hingga tingkat nasional dalam Olimpiade Sains Nasional bidang IPA.', img: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&q=80&w=900' },
        ],

        init() {
            // no-op placeholder untuk future async data loading (mis. fetch dari controller)
        },

        get featured() {
            // Prioritaskan prestasi tingkat Nasional, lalu Provinsi, sebagai sorotan utama
            return this.items.find(i => i.level === 'Nasional')
                || this.items.find(i => i.level === 'Provinsi')
                || this.items[0]
                || null;
        },

        countByLevel(level) {
            return this.items.filter(i => i.level === level).length;
        },

        levelBadgeClass(level) {
            switch (level) {
                case 'Nasional': return 'bg-amber-500 text-white';
                case 'Provinsi': return 'bg-purple-500 text-white';
                case 'Kabupaten': return 'bg-[#18587A] text-white';
                default: return 'bg-[#61B1D0] text-white';
            }
        },

        get filteredItems() {
            let list = this.items;

            if (this.activeCategory !== 'semua') {
                list = list.filter(i => i.category === this.activeCategory);
            }

            if (this.activeLevel !== 'semua') {
                list = list.filter(i => i.level === this.activeLevel);
            }

            if (this.search.trim() !== '') {
                const q = this.search.trim().toLowerCase();
                list = list.filter(i =>
                    i.title.toLowerCase().includes(q) ||
                    i.desc.toLowerCase().includes(q) ||
                    i.student.toLowerCase().includes(q) ||
                    i.categoryLabel.toLowerCase().includes(q)
                );
            }

            return list;
        },

        get visibleItems() {
            return this.filteredItems.slice(0, this.visibleCount);
        },
    }
}
</script>

@endsectionx