@extends('layouts.app')

@section('title','Sarana & Prasarana | SD Negeri 3 Mandiraja Kulon')

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
    x-data="saranaApp(@js($sarana))"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Fasilitas Penunjang <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    Belajar & Kegiatan Siswa
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Sarana dan prasarana yang tersedia untuk mendukung kenyamanan, keamanan, dan kualitas proses belajar mengajar di SD Negeri 3 Mandiraja Kulon.
            </p>

            {{-- Stat Strip --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4 opacity-0 animate-fade-in-up delay-400">
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="items.length"></span>
                    <span class="text-xs text-white/70">Total Fasilitas</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">6</span>
                    <span class="text-xs text-white/70">Ruang Kelas</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">2.400 m²</span>
                    <span class="text-xs text-white/70">Luas Lahan</span>
                </div>
            </div>

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
                        placeholder="Cari fasilitas, misal: lab, perpustakaan, lapangan..."
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

    {{-- ===================== FACILITIES GRID ===================== --}}
    <section class="py-20 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            {{-- Empty State --}}
            <div
                x-show="filteredItems.length === 0"
                x-cloak
                class="text-center py-24">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-white flex items-center justify-center text-3xl text-[#18587A] mb-4">
                    <i class="fa-solid fa-building-circle-xmark"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 font-['Poppins']" x-text="items.length === 0 ? 'Belum ada data sarana & prasarana' : 'Belum ada fasilitas ditemukan'"></h3>
                <p class="text-gray-500 text-sm mt-2" x-text="items.length === 0 ? 'Admin dapat menambahkannya lewat menu Sarana & Prasarana di dashboard.' : 'Coba ganti kata kunci atau pilih kategori lain.'"></p>
            </div>

            {{-- Grid --}}
            <div
                x-show="filteredItems.length > 0"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <template x-for="(item, index) in filteredItems" :key="item.id">
                    <div
                        @click="openDetail(item)"
                        class="group relative overflow-hidden rounded-3xl shadow-md aspect-[4/3] bg-white border border-gray-100 cursor-pointer opacity-0 animate-fade-in-up"
                        :style="'animation-delay:' + ((index % 6) * 80) + 'ms'">

                        <img :src="item.img" :alt="item.name" loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#051A24]/85 via-[#051A24]/20 to-transparent"></div>

                        {{-- Kondisi Badge --}}
                        <div class="absolute top-4 left-4 flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold shadow-sm"
                             :class="item.condition === 'Baik' ? 'bg-green-500/90 text-white' : (item.condition === 'Cukup' ? 'bg-amber-500/90 text-white' : 'bg-red-500/90 text-white')">
                            <i class="fa-solid fa-circle-check text-[10px]"></i>
                            <span x-text="item.condition"></span>
                        </div>

                        <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#18587A] opacity-0 group-hover:opacity-100 scale-90 group-hover:scale-100 transition-all duration-300 shadow-md">
                            <i class="fa-solid fa-expand text-sm"></i>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-6">
                            <span class="text-xs font-semibold text-[#85C2DB] uppercase tracking-wider mb-1 block" x-text="item.categoryLabel"></span>
                            <h3 class="text-white font-bold text-lg font-['Poppins'] leading-snug" x-text="item.name"></h3>
                            <p class="text-white/70 text-xs mt-1" x-text="item.qty"></p>
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
            class="relative z-10 max-w-2xl w-full">

            <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl animate-pop-in" x-show="activeItem">
                <div class="relative h-64 md:h-80">
                    <img :src="activeItem?.img" :alt="activeItem?.name" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#051A24]/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-5 left-6">
                        <span class="text-xs font-semibold text-[#85C2DB] uppercase tracking-wider mb-1 block" x-text="activeItem?.categoryLabel"></span>
                        <h3 class="text-2xl font-black text-white font-['Poppins']" x-text="activeItem?.name"></h3>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    <p class="text-gray-600 leading-relaxed mb-6" x-text="activeItem?.desc"></p>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#EBF5FA] rounded-xl p-4 text-center">
                            <i class="fa-solid fa-ruler-combined text-[#18587A] mb-1.5"></i>
                            <p class="text-xs text-gray-400">Luas/Ukuran</p>
                            <p class="text-sm font-bold text-gray-800" x-text="activeItem?.size"></p>
                        </div>
                        <div class="bg-[#EBF5FA] rounded-xl p-4 text-center">
                            <i class="fa-solid fa-layer-group text-[#18587A] mb-1.5"></i>
                            <p class="text-xs text-gray-400">Jumlah</p>
                            <p class="text-sm font-bold text-gray-800" x-text="activeItem?.qty"></p>
                        </div>
                        <div class="bg-[#EBF5FA] rounded-xl p-4 text-center">
                            <i class="fa-solid fa-circle-check text-[#18587A] mb-1.5"></i>
                            <p class="text-xs text-gray-400">Kondisi</p>
                            <p class="text-sm font-bold text-gray-800" x-text="activeItem?.condition"></p>
                        </div>
                    </div>
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
function saranaApp(initialItems) {
    return {
        search: '',
        activeCategory: 'semua',
        detailOpen: false,
        activeItem: null,

        categories: [
            { key: 'semua', label: 'Semua', icon: 'fa-solid fa-border-all' },
            { key: 'belajar', label: 'Ruang Belajar', icon: 'fa-solid fa-chalkboard' },
            { key: 'olahraga', label: 'Olahraga', icon: 'fa-solid fa-futbol' },
            { key: 'penunjang', label: 'Penunjang', icon: 'fa-solid fa-toolbox' },
            { key: 'ibadah', label: 'Ibadah & Kesehatan', icon: 'fa-solid fa-hand-holding-heart' },
        ],

        // Data sarana & prasarana dikirim dari controller (tabel `saranas`),
        // sudah dibentuk sesuai shape yang dipakai kartu & modal di sini:
        // { id, category, categoryLabel, name, desc, size, qty, condition, img }
        items: initialItems || [],

        init() {
            // no-op placeholder, data sudah masuk lewat parameter saranaApp()
        },

        get filteredItems() {
            let list = this.items;

            if (this.activeCategory !== 'semua') {
                list = list.filter(i => i.category === this.activeCategory);
            }

            if (this.search.trim() !== '') {
                const q = this.search.trim().toLowerCase();
                list = list.filter(i =>
                    i.name.toLowerCase().includes(q) ||
                    i.desc.toLowerCase().includes(q) ||
                    i.categoryLabel.toLowerCase().includes(q)
                );
            }

            return list;
        },

        openDetail(item) {
            this.activeItem = item;
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