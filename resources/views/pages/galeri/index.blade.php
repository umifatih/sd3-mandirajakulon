@extends('layouts.app')

@section('title','Galeri Sekolah | SD Negeri 3 Mandiraja Kulon')

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
    x-data="galeriApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#2A211A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#8b5e3c]/70 via-[#8b5e3c]/60 to-[#F8F5F2]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Momen & Cerita <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9B99B] to-[#E8D8C4]">
                    di SD Negeri 3 Mandiraja Kulon
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Dokumentasi kegiatan belajar, prestasi, dan keseharian siswa &mdash; kumpulan cerita visual dari ruang kelas hingga lapangan upacara.
            </p>
        </div>
    </section>

    {{-- ===================== FILTER BAR ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 p-4">

            <div class="flex flex-col md:flex-row md:items-center gap-4">

                {{-- Search --}}
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari momen, misal: pramuka, kelas, juara..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#F8F5F2] border border-transparent focus:border-[#D9B99B] focus:bg-white outline-none text-sm text-gray-700 transition">
                </div>

                {{-- Category Pills --}}
                <div class="flex flex-wrap gap-2 md:justify-end">
                    <template x-for="cat in categories" :key="cat.key">
                        <button
                            @click="activeCategory = cat.key"
                            :class="activeCategory === cat.key
                                ? 'bg-[#8B5E3C] text-white shadow-md'
                                : 'bg-[#F8F5F2] text-gray-600 hover:bg-[#E8D8C4]'"
                            class="px-4 py-2 rounded-xl text-xs md:text-sm font-semibold transition-all whitespace-nowrap">
                            <i :class="cat.icon" class="mr-1.5"></i>
                            <span x-text="cat.label"></span>
                        </button>
                    </template>
                </div>

            </div>

        </div>
    </section>

    {{-- ===================== GALLERY GRID ===================== --}}
    <section class="py-20 bg-[#F8F5F2] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#E8D8C4]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            {{-- Empty State --}}
            <div
                x-show="filteredItems.length === 0"
                x-cloak
                class="text-center py-24">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-[#F0E6D8] flex items-center justify-center text-3xl text-[#8B5E3C] mb-4">
                    <i class="fa-regular fa-images"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 font-['Poppins']">Belum ada foto ditemukan</h3>
                <p class="text-gray-500 text-sm mt-2">Coba ganti kata kunci atau pilih kategori lain.</p>
            </div>

            {{-- Masonry-style Grid --}}
            <div
                x-show="filteredItems.length > 0"
                class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">

                <template x-for="(item, index) in filteredItems" :key="item.id">
                    <div
                        @click="openLightbox(item)"
                        class="break-inside-avoid relative group overflow-hidden rounded-3xl shadow-md bg-white border border-gray-100 cursor-pointer opacity-0 animate-fade-in-up"
                        :style="'animation-delay:' + ((index % 6) * 80) + 'ms'">

                        <img :src="item.img" :alt="item.title" loading="lazy"
                             class="w-full h-auto object-cover group-hover:scale-110 transition-transform duration-700">

                        <div class="absolute inset-0 bg-gradient-to-t from-gray-950/85 via-gray-950/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5">
                            <span class="text-[11px] font-semibold text-[#D9B99B] uppercase tracking-wider mb-1" x-text="item.categoryLabel"></span>
                            <h3 class="text-white font-bold text-base font-['Poppins'] leading-snug" x-text="item.title"></h3>
                        </div>

                        <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#8B5E3C] opacity-0 group-hover:opacity-100 scale-90 group-hover:scale-100 transition-all duration-300 shadow-md">
                            <i class="fa-solid fa-expand text-sm"></i>
                        </div>
                    </div>
                </template>

            </div>

            {{-- Load More --}}
            <div class="mt-14 text-center" x-show="visibleCount < filteredItems.length" x-cloak>
                <button
                    @click="visibleCount += 6"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#8B5E3C] text-[#8B5E3C] rounded-xl font-semibold hover:bg-[#8B5E3C] hover:text-white transition-all shadow-sm hover:shadow-lg transform hover:-translate-y-1">
                    <span>Muat Lebih Banyak</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </button>
            </div>

        </div>
    </section>

    {{-- ===================== LIGHTBOX MODAL ===================== --}}
    <div
        x-show="lightboxOpen"
        x-cloak
        @keydown.escape.window="closeLightbox()"
        @keydown.arrow-right.window="nextImage()"
        @keydown.arrow-left.window="prevImage()"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-10"
    >
        {{-- Backdrop --}}
        <div
            x-show="lightboxOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="closeLightbox()"
            class="absolute inset-0 bg-gray-950/90 backdrop-blur-sm">
        </div>

        {{-- Content --}}
        <div
            x-show="lightboxOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="relative z-10 max-w-4xl w-full">

            <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl animate-pop-in" x-show="activeItem">
                <img :src="activeItem?.img" :alt="activeItem?.title" class="w-full max-h-[70vh] object-contain bg-gray-950">

                <div class="p-6 flex items-start justify-between gap-4">
                    <div>
                        <span class="text-xs font-semibold text-[#8B5E3C] uppercase tracking-wider" x-text="activeItem?.categoryLabel"></span>
                        <h3 class="text-xl font-bold text-gray-800 font-['Poppins'] mt-1" x-text="activeItem?.title"></h3>
                        <p class="text-sm text-gray-500 mt-1" x-text="activeItem?.desc"></p>
                    </div>
                    <span class="shrink-0 text-xs font-medium text-gray-400 mt-1" x-text="(activeIndex + 1) + ' / ' + filteredItems.length"></span>
                </div>
            </div>

            {{-- Close Button --}}
            <button
                @click="closeLightbox()"
                class="absolute -top-4 -right-4 w-11 h-11 rounded-full bg-white text-gray-700 shadow-lg flex items-center justify-center hover:bg-[#8B5E3C] hover:text-white transition">
                <i class="fa-solid fa-xmark"></i>
            </button>

            {{-- Prev / Next --}}
            <button
                @click="prevImage()"
                class="hidden md:flex absolute top-1/2 -left-16 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 border border-white/30 text-white items-center justify-center hover:bg-white/20 transition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button
                @click="nextImage()"
                class="hidden md:flex absolute top-1/2 -right-16 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 border border-white/30 text-white items-center justify-center hover:bg-white/20 transition">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function galeriApp() {
    return {
        search: '',
        activeCategory: 'semua',
        visibleCount: 9,
        lightboxOpen: false,
        activeItem: null,
        activeIndex: 0,

        categories: [
            { key: 'semua', label: 'Semua', icon: 'fa-solid fa-border-all' },
            { key: 'pembelajaran', label: 'Pembelajaran', icon: 'fa-solid fa-chalkboard' },
            { key: 'ekstrakurikuler', label: 'Ekstrakurikuler', icon: 'fa-solid fa-person-running' },
            { key: 'seni', label: 'Seni & Kreativitas', icon: 'fa-solid fa-palette' },
            { key: 'prestasi', label: 'Prestasi', icon: 'fa-solid fa-trophy' },
            { key: 'fasilitas', label: 'Fasilitas', icon: 'fa-solid fa-building' },
        ],

        items: [
            { id: 1, category: 'pembelajaran', categoryLabel: 'Pembelajaran', title: 'Kegiatan Belajar di Kelas', desc: 'Suasana belajar aktif di ruang kelas.', img: 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&q=80&w=800' },
            { id: 2, category: 'seni', categoryLabel: 'Seni & Kreativitas', title: 'Pentas Seni Siswa', desc: 'Penampilan tari dan musik dari siswa.', img: 'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&q=80&w=800' },
            { id: 3, category: 'ekstrakurikuler', categoryLabel: 'Ekstrakurikuler', title: 'Kegiatan Pramuka & Olahraga', desc: 'Latihan baris-berbaris dan pramuka mingguan.', img: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=800' },
            { id: 4, category: 'fasilitas', categoryLabel: 'Fasilitas', title: 'Perpustakaan Sekolah', desc: 'Ruang baca yang nyaman untuk siswa.', img: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800' },
            { id: 5, category: 'pembelajaran', categoryLabel: 'Pembelajaran', title: 'Upacara Bendera Hari Senin', desc: 'Rutinitas upacara setiap Senin pagi.', img: 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&q=80&w=800' },
            { id: 6, category: 'fasilitas', categoryLabel: 'Fasilitas', title: 'Praktik Lab Komputer', desc: 'Pengenalan teknologi informasi sejak dini.', img: 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&q=80&w=800' },
            { id: 7, category: 'prestasi', categoryLabel: 'Prestasi', title: 'Juara 1 OSN Matematika', desc: 'Penyerahan piala tingkat kabupaten.', img: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=800' },
            { id: 8, category: 'ekstrakurikuler', categoryLabel: 'Ekstrakurikuler', title: 'Latihan Drumband', desc: 'Persiapan tampil di acara desa.', img: 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&q=80&w=800' },
            { id: 9, category: 'seni', categoryLabel: 'Seni & Kreativitas', title: 'Lomba Mewarnai', desc: 'Kreativitas siswa kelas rendah dituangkan lewat warna.', img: 'https://images.unsplash.com/photo-1499892477393-f675706cbe6e?auto=format&fit=crop&q=80&w=800' },
            { id: 10, category: 'pembelajaran', categoryLabel: 'Pembelajaran', title: 'Praktikum IPA Sederhana', desc: 'Eksperimen sains di halaman sekolah.', img: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&q=80&w=800' },
            { id: 11, category: 'fasilitas', categoryLabel: 'Fasilitas', title: 'Taman & Ruang Terbuka Hijau', desc: 'Area hijau untuk kegiatan luar kelas.', img: 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&q=80&w=800' },
            { id: 12, category: 'prestasi', categoryLabel: 'Prestasi', title: 'Sekolah Adiwiyata Provinsi', desc: 'Penghargaan sekolah peduli lingkungan.', img: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800' },
            { id: 13, category: 'ekstrakurikuler', categoryLabel: 'Ekstrakurikuler', title: 'Kunjungan Perpustakaan Keliling', desc: 'Program literasi bekerja sama dengan perpusda.', img: 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=800' },
            { id: 14, category: 'seni', categoryLabel: 'Seni & Kreativitas', title: 'Pameran Karya Siswa', desc: 'Hasil karya kerajinan tangan siswa dipamerkan.', img: 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800' },
            { id: 15, category: 'pembelajaran', categoryLabel: 'Pembelajaran', title: 'Belajar di Luar Kelas', desc: 'Outdoor learning memanfaatkan lingkungan sekolah.', img: 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&q=80&w=800' },
        ],

        init() {
            // no-op placeholder for future async data loading
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
                    i.desc.toLowerCase().includes(q) ||
                    i.categoryLabel.toLowerCase().includes(q)
                );
            }

            return list.slice(0, this.visibleCount);
        },

        openLightbox(item) {
            this.activeItem = item;
            this.activeIndex = this.filteredItems.findIndex(i => i.id === item.id);
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },

        closeLightbox() {
            this.lightboxOpen = false;
            document.body.style.overflow = '';
        },

        nextImage() {
            if (!this.lightboxOpen) return;
            const list = this.filteredItems;
            this.activeIndex = (this.activeIndex + 1) % list.length;
            this.activeItem = list[this.activeIndex];
        },

        prevImage() {
            if (!this.lightboxOpen) return;
            const list = this.filteredItems;
            this.activeIndex = (this.activeIndex - 1 + list.length) % list.length;
            this.activeItem = list[this.activeIndex];
        },
    }
}
</script>

@endsection