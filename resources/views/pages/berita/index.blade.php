@extends('layouts.app')

@section('title','Berita & Informasi | SD Negeri 3 Mandiraja Kulon')

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

    /* Scrollbar tipis khusus panel Trending */
    .trending-scroll::-webkit-scrollbar { width: 5px; }
    .trending-scroll::-webkit-scrollbar-track { background: transparent; }
    .trending-scroll::-webkit-scrollbar-thumb { background: #85C2DB; border-radius: 10px; }
    .trending-scroll::-webkit-scrollbar-thumb:hover { background: #18587A; }
</style>

<div
    x-data="beritaApp(@js($items))"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#051A24]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Berita & Informasi <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    SD Negeri 3 Mandiraja Kulon
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Kabar terbaru seputar kegiatan sekolah, prestasi siswa, dan pengumuman resmi &mdash; semua kabar penting ada di sini.
            </p>
        </div>
    </section>

    {{-- ===================== FILTER BAR ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 p-4">

            <div class="flex flex-col md:flex-row md:items-center gap-4">

                {{-- Search --}}
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari berita, misal: OSN, PPDB, prestasi..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition">
                </div>

                {{-- Category Pills --}}
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

        </div>
    </section>

    {{-- ===================== BERITA UTAMA (CAROUSEL) + TRENDING ===================== --}}
    <section
        class="pt-16 pb-4 bg-[#EBF5FA]"
        x-show="!search && activeCategory === 'semua' && items.length > 0"
        x-cloak>
        <div class="max-w-6xl mx-auto px-6">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                {{-- ================= KIRI: BERITA UTAMA (CAROUSEL) ================= --}}
                <div class="lg:col-span-8">

                    <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-4 block">Berita Utama</span>

                    {{-- Carousel Slide Utama --}}
                    <div
                        class="relative rounded-3xl overflow-hidden shadow-[0_20px_60px_rgb(0,0,0,0.12)] group"
                        @mouseenter="pauseAutoplay()" @mouseleave="resumeAutoplay()">

                        <div class="relative h-[300px] md:h-[420px]">
                            <template x-for="(slide, i) in heroSlides" :key="slide.id">
                                <a
                                    :href="slide.url"
                                    x-show="heroIndex === i"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    class="absolute inset-0 block">
                                    <img :src="slide.img" :alt="slide.title" class="absolute inset-0 w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-gray-950/30 to-transparent"></div>

                                    <div class="absolute inset-x-0 bottom-0 p-6 md:p-9">
                                        <span class="inline-block px-3.5 py-1.5 rounded-full bg-[#18587A] text-white text-xs font-semibold uppercase tracking-wide shadow-lg mb-3" x-text="slide.categoryLabel"></span>
                                        <h2 class="text-xl md:text-3xl font-black text-white font-['Poppins'] leading-tight max-w-2xl mb-3" x-text="slide.title"></h2>
                                        <div class="flex items-center gap-2 text-xs md:text-sm text-white/75 font-medium">
                                            <i class="fa-regular fa-clock"></i>
                                            <span x-text="slide.timeAgo"></span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>

                        {{-- Arrow Kanan --}}
                        <button
                            @click.prevent="nextHero()"
                            class="absolute top-1/2 right-4 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 backdrop-blur text-gray-700 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all hover:bg-white">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <button
                            @click.prevent="prevHero()"
                            class="absolute top-1/2 left-4 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 backdrop-blur text-gray-700 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all hover:bg-white">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>

                        {{-- Dot Indicator --}}
                        <div class="absolute bottom-4 right-6 flex items-center gap-1.5">
                            <template x-for="(slide, i) in heroSlides" :key="'dot-'+slide.id">
                                <button
                                    @click.prevent="heroIndex = i"
                                    :class="heroIndex === i ? 'w-5 bg-white' : 'w-1.5 bg-white/50'"
                                    class="h-1.5 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    </div>

                    {{-- Secondary Cards (di bawah carousel) --}}
                    <div class="grid grid-cols-2 gap-5 mt-5">
                        <template x-for="item in secondarySlides" :key="'sec-'+item.id">
                            <a :href="item.url" class="group relative rounded-2xl overflow-hidden shadow-md h-40 md:h-48 block">
                                <img :src="item.img" :alt="item.title" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-gray-950/20 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 p-4">
                                    <h3 class="text-white font-bold text-sm md:text-base font-['Poppins'] leading-snug line-clamp-2" x-text="item.title"></h3>
                                    <span class="text-[11px] text-white/70 mt-1 block" x-text="item.timeAgo"></span>
                                </div>
                            </a>
                        </template>
                    </div>

                </div>

                {{-- ================= KANAN: TRENDING (SCROLL INTERNAL) ================= --}}
                <div class="lg:col-span-4">

                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 flex flex-col h-[300px] md:h-[420px] lg:h-[calc(420px+11rem)]">

                        {{-- Header Trending --}}
                        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100 shrink-0">
                            <h3 class="flex items-center gap-2 text-lg font-black text-gray-800 font-['Poppins']">
                                <span class="w-1.5 h-5 bg-[#18587A] rounded-full"></span>
                                Trending
                            </h3>
                            <button @click="activeCategory = 'semua'; search = ''" class="text-xs font-semibold text-[#18587A] hover:underline flex items-center gap-1">
                                Lihat lainnya
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </button>
                        </div>

                        {{-- List Trending: scroll di DALAM kotak, bukan scroll halaman --}}
                        <div class="trending-scroll flex-1 overflow-y-auto px-4 py-2">
                            <template x-for="(item, index) in trending" :key="'trend-'+item.id">
                                <a :href="item.url" class="flex items-start gap-3 py-3.5 border-b border-gray-50 last:border-0 group">
                                    <img :src="item.img" :alt="item.title" class="w-16 h-16 rounded-xl object-cover shrink-0">
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-bold text-gray-800 leading-snug line-clamp-2 group-hover:text-[#18587A] transition-colors" x-text="item.title"></h4>
                                        <div class="flex items-center gap-1.5 mt-1.5">
                                            <span class="text-[11px] text-[#18587A] font-semibold" x-text="item.categoryLabel"></span>
                                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                            <span class="text-[11px] text-gray-400" x-text="item.timeAgo"></span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- ===================== SEMUA BERITA + SIDEBAR KATEGORI ===================== --}}
    <section class="py-16 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#85C2DB]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

                {{-- ================= MAIN CONTENT ================= --}}
                <div>

                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-2 block">Semua Kabar</span>
                            <h2 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Semua Berita</h2>
                        </div>
                        <span class="hidden md:block text-sm text-gray-400 font-medium" x-text="filteredItems.length + ' berita ditemukan'"></span>
                    </div>

                    {{-- Empty State --}}
                    <div
                        x-show="filteredItems.length === 0"
                        x-cloak
                        class="text-center py-24">
                        <div class="w-20 h-20 mx-auto rounded-2xl bg-[#CCE5F0] flex items-center justify-center text-3xl text-[#18587A] mb-4">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 font-['Poppins']" x-text="items.length === 0 ? 'Belum ada berita dipublikasikan' : 'Belum ada berita ditemukan'"></h3>
                        <p class="text-gray-500 text-sm mt-2" x-text="items.length === 0 ? 'Admin dapat menambahkannya lewat menu Berita & Pengumuman di dashboard.' : 'Coba ganti kata kunci atau pilih kategori lain.'"></p>
                    </div>

                    {{-- Grid --}}
                    <div
                        x-show="filteredItems.length > 0"
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        <template x-for="(item, index) in visibleItems" :key="item.id">
                            <a
                                :href="item.url"
                                class="group flex flex-col bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 opacity-0 animate-fade-in-up"
                                :style="'animation-delay:' + ((index % 6) * 80) + 'ms'">

                                <div class="relative h-44 overflow-hidden">
                                    <img :src="item.img" :alt="item.title" loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/90 backdrop-blur text-[#18587A] text-[11px] font-semibold uppercase tracking-wide shadow-sm" x-text="item.categoryLabel"></div>
                                </div>

                                <div class="p-5 flex flex-col flex-1">
                                    <div class="flex items-center gap-3 text-xs text-gray-400 mb-2 font-medium">
                                        <span x-text="item.date"></span>
                                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                        <span x-text="item.readTime + ' baca'"></span>
                                    </div>

                                    <h3 class="font-bold text-gray-800 font-['Poppins'] leading-snug mb-2 line-clamp-2 group-hover:text-[#18587A] transition-colors" x-text="item.title"></h3>

                                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4" x-text="item.excerpt"></p>

                                    <span class="mt-auto inline-flex items-center gap-2 text-[#18587A] font-semibold text-sm">
                                        Baca Selengkapnya
                                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1.5 transition-transform"></i>
                                    </span>
                                </div>
                            </a>
                        </template>

                    </div>

                    {{-- Load More --}}
                    <div class="mt-12 text-center" x-show="visibleCount < filteredItems.length" x-cloak>
                        <button
                            @click="visibleCount += 9"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#18587A] text-[#18587A] rounded-xl font-semibold hover:bg-[#18587A] hover:text-white transition-all shadow-sm hover:shadow-lg transform hover:-translate-y-1">
                            <span>Muat Lebih Banyak</span>
                            <i class="fa-solid fa-arrow-down"></i>
                        </button>
                    </div>

                </div>

        </div>
    </section>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function beritaApp(initialItems) {
    return {
        search: '',
        activeCategory: 'semua',
        visibleCount: 9,
        heroIndex: 0,
        autoplayTimer: null,

        categories: [
            { key: 'semua', label: 'Semua', icon: 'fa-solid fa-border-all' },
            { key: 'kegiatan', label: 'Kegiatan Sekolah', icon: 'fa-solid fa-calendar-days' },
            { key: 'prestasi', label: 'Prestasi', icon: 'fa-solid fa-trophy' },
            { key: 'pengumuman', label: 'Pengumuman', icon: 'fa-solid fa-bullhorn' },
            { key: 'artikel-guru', label: 'Artikel Guru', icon: 'fa-solid fa-chalkboard-user' },
        ],

        // Data berita dikirim dari controller (tabel `beritas`, status = published),
        // sudah diurutkan terbaru dulu & dibentuk sesuai shape yang dipakai di sini:
        // { id, category, categoryLabel, title, excerpt, date, timeAgo, author, readTime, url, img }
        items: initialItems || [],

        init() {
            this.startAutoplay();
        },

        get heroSlides() {
            return this.items.slice(0, 3);
        },

        get secondarySlides() {
            return this.items.slice(3, 5);
        },

        // Tidak ada kolom "trending" di database — cukup ambil beberapa berita
        // terbaru (items sudah diurutkan latest() dari controller).
        get trending() {
            return this.items.slice(0, 6);
        },

        nextHero() {
            if (this.heroSlides.length === 0) return;
            this.heroIndex = (this.heroIndex + 1) % this.heroSlides.length;
        },
        prevHero() {
            if (this.heroSlides.length === 0) return;
            this.heroIndex = (this.heroIndex - 1 + this.heroSlides.length) % this.heroSlides.length;
        },
        startAutoplay() {
            this.autoplayTimer = setInterval(() => this.nextHero(), 6000);
        },
        pauseAutoplay() {
            clearInterval(this.autoplayTimer);
        },
        resumeAutoplay() {
            this.startAutoplay();
        },

        get filteredItems() {
            let list = this.items;

            if (this.activeCategory !== 'semua') {
                list = list.filter(i => i.category === this.activeCategory);
            }

            if (this.search.trim() !== '') {
                const q = this.search.trim().toLowerCase();
                list = list.filter(i =>
                    i.title.toLowerCase().includes(q) ||
                    (i.excerpt || '').toLowerCase().includes(q) ||
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

@endsection