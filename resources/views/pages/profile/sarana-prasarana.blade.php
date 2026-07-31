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
</style>

<div
    x-data="saranaPrasarana()"
    x-init="init()">

    {{-- ===================== HERO ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#051A24]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Sarana & Prasarana <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    SD Negeri 3 Mandiraja Kulon
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Fasilitas penunjang belajar yang lengkap, aman, dan nyaman &mdash; dirancang untuk mendukung tumbuh kembang peserta didik.
            </p>
        </div>
    </section>

    {{-- ===================== STAT COUNTER ===================== --}}
    <section class="bg-white relative -mt-1">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 -translate-y-10">

                <template x-for="stat in stats" :key="stat.label">
                    <div class="bg-white rounded-2xl p-5 md:p-6 shadow-[0_10px_40px_rgb(0,0,0,0.08)] border border-gray-100 text-center hover:-translate-y-1.5 transition-transform duration-300">
                        <div class="w-11 h-11 mx-auto mb-3 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-lg">
                            <i :class="stat.icon"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']" x-text="stat.display + stat.suffix"></h3>
                        <p class="text-xs md:text-sm text-gray-500 mt-1" x-text="stat.label"></p>
                    </div>
                </template>

            </div>
        </div>
    </section>

    {{-- ===================== FILTER + GRID FASILITAS ===================== --}}
    <section class="pt-4 pb-24 bg-white relative overflow-hidden">

        <div class="absolute top-40 right-0 w-72 h-72 bg-[#EBF5FA] rounded-full mix-blend-multiply filter blur-3xl opacity-70 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            {{-- HEADER --}}
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-3 block">Fasilitas Sekolah</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 font-['Poppins']">Jelajahi Ruang & Fasilitas Kami</h2>
                <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- FILTER TABS --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <template x-for="cat in categories" :key="cat.key">
                    <button
                        @click="activeCategory = cat.key"
                        class="px-5 py-2.5 rounded-full text-sm font-semibold border transition-all duration-300"
                        :class="activeCategory === cat.key
                            ? 'bg-[#18587A] text-white border-[#18587A] shadow-lg shadow-[#18587A]/30 scale-105'
                            : 'bg-white text-gray-600 border-gray-200 hover:border-[#85C2DB] hover:text-[#18587A]'">
                        <i :class="cat.icon" class="mr-2"></i>
                        <span x-text="cat.label"></span>
                    </button>
                </template>
            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <template x-for="item in filteredFacilities" :key="item.id">
                    <div
                        @click="openDetail(item)"
                        class="group relative bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-md shadow-gray-200/50 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="relative h-48 overflow-hidden">
                            <img :src="item.image" :alt="item.name"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-950/70 via-transparent to-transparent"></div>

                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/90 backdrop-blur text-[#18587A] text-xs font-bold">
                                <i :class="item.icon" class="mr-1"></i>
                                <span x-text="item.categoryLabel"></span>
                            </span>

                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold"
                                  :class="item.condition === 'Baik' ? 'bg-green-500 text-white' : 'bg-amber-500 text-white'"
                                  x-text="item.condition"></span>
                        </div>

                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-800 font-['Poppins'] mb-1" x-text="item.name"></h3>
                            <p class="text-sm text-gray-500 leading-relaxed line-clamp-2" x-text="item.short"></p>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-xs text-gray-400 font-medium">
                                    <i class="fa-solid fa-layer-group mr-1"></i>
                                    <span x-text="item.qty"></span>
                                </span>
                                <span class="text-[#18587A] text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>

            </div>

            {{-- EMPTY STATE --}}
            <div x-show="filteredFacilities.length === 0" class="text-center py-20">
                <i class="fa-regular fa-folder-open text-5xl text-gray-300 mb-4"></i>
                <p class="text-gray-400">Belum ada data fasilitas untuk kategori ini.</p>
            </div>

        </div>
    </section>

    {{-- ===================== MODAL DETAIL FASILITAS ===================== --}}
    <div
        x-show="selected"
        x-cloak
        class="fixed inset-0 z-[100] flex items-center justify-center p-4"
        style="display:none;">

        {{-- Backdrop --}}
        <div
            x-show="selected"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="selected = null"
            class="absolute inset-0 bg-gray-950/70 backdrop-blur-sm"></div>

        {{-- Card --}}
        <div
            x-show="selected"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative bg-white rounded-3xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl"
            @click.outside="selected = null"
            x-ref="modalCard">

            <template x-if="selected">
                <div>
                    <div class="relative h-56 md:h-64">
                        <img :src="selected.image" :alt="selected.name" class="w-full h-full object-cover rounded-t-3xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-950/70 to-transparent rounded-t-3xl"></div>

                        <button
                            @click="selected = null"
                            class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-gray-700 flex items-center justify-center transition">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                        <div class="absolute bottom-5 left-6 right-6">
                            <span class="inline-block px-3 py-1 rounded-full bg-[#18587A] text-white text-xs font-bold mb-2">
                                <i :class="selected.icon" class="mr-1"></i>
                                <span x-text="selected.categoryLabel"></span>
                            </span>
                            <h3 class="text-2xl font-black text-white font-['Poppins']" x-text="selected.name"></h3>
                        </div>
                    </div>

                    <div class="p-6 md:p-8">

                        <p class="text-gray-600 leading-relaxed font-light mb-6" x-text="selected.description"></p>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-[#EBF5FA] rounded-2xl p-4">
                                <p class="text-xs text-gray-500 mb-1">Jumlah</p>
                                <p class="font-bold text-gray-800" x-text="selected.qty"></p>
                            </div>
                            <div class="bg-[#EBF5FA] rounded-2xl p-4">
                                <p class="text-xs text-gray-500 mb-1">Kondisi</p>
                                <p class="font-bold" :class="selected.condition === 'Baik' ? 'text-green-600' : 'text-amber-600'" x-text="selected.condition"></p>
                            </div>
                        </div>

                        <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide mb-3">Kelengkapan</h4>
                        <ul class="space-y-2">
                            <template x-for="feature in selected.features" :key="feature">
                                <li class="flex items-start gap-3 text-gray-600 text-sm">
                                    <i class="fa-solid fa-circle-check text-[#18587A] mt-0.5"></i>
                                    <span x-text="feature"></span>
                                </li>
                            </template>
                        </ul>

                    </div>
                </div>
            </template>

        </div>
    </div>

</div>

{{-- ===================== ALPINE DATA & COUNTER LOGIC ===================== --}}
<script>
    function saranaPrasarana() {
        return {
            activeCategory: 'semua',

            categories: [
                { key: 'semua', label: 'Semua', icon: 'fa-solid fa-border-all' },
                { key: 'akademik', label: 'Akademik', icon: 'fa-solid fa-graduation-cap' },
                { key: 'olahraga', label: 'Olahraga', icon: 'fa-solid fa-futbol' },
                { key: 'ibadah', label: 'Ibadah', icon: 'fa-solid fa-mosque' },
                { key: 'kesehatan', label: 'Kesehatan', icon: 'fa-solid fa-kit-medical' },
                { key: 'penunjang', label: 'Penunjang', icon: 'fa-solid fa-shapes' },
            ],

            stats: [
                { label: 'Ruang Kelas', icon: 'fa-solid fa-chalkboard', value: 6, display: 0, suffix: '' },
                { label: 'Luas Lahan (m²)', icon: 'fa-solid fa-ruler-combined', value: 1200, display: 0, suffix: '' },
                { label: 'Unit Komputer', icon: 'fa-solid fa-computer', value: 20, display: 0, suffix: '' },
                { label: 'Koleksi Buku', icon: 'fa-solid fa-book', value: 850, display: 0, suffix: '+' },
            ],

            facilities: [
                {
                    id: 1,
                    name: 'Ruang Kelas',
                    category: 'akademik',
                    categoryLabel: 'Akademik',
                    icon: 'fa-solid fa-chalkboard',
                    image: 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&q=80&w=800',
                    short: 'Ruang belajar yang nyaman dengan pencahayaan alami dan sirkulasi udara baik.',
                    description: 'Setiap ruang kelas dirancang untuk mendukung suasana belajar yang aktif dan menyenangkan, dilengkapi meja-kursi ergonomis serta media pembelajaran visual.',
                    qty: '6 Ruang',
                    condition: 'Baik',
                    features: ['Kipas angin di setiap ruang', 'Papan tulis & proyektor', 'Rak buku & pojok baca', 'Kapasitas 28-32 siswa']
                },
                {
                    id: 2,
                    name: 'Perpustakaan',
                    category: 'akademik',
                    categoryLabel: 'Akademik',
                    icon: 'fa-solid fa-book-open',
                    image: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800',
                    short: 'Ratusan koleksi buku pengetahuan dan cerita untuk menumbuhkan minat baca siswa.',
                    description: 'Perpustakaan sekolah menjadi ruang literasi utama, menyediakan koleksi buku pelajaran, ensiklopedia, dan buku cerita anak yang diperbarui setiap tahun.',
                    qty: '1 Ruang · 850+ Judul',
                    condition: 'Baik',
                    features: ['Area baca lesehan', 'Katalog buku bertema', 'Program wajib kunjung', 'Sudut baca digital']
                },
                {
                    id: 3,
                    name: 'Laboratorium Komputer',
                    category: 'akademik',
                    categoryLabel: 'Akademik',
                    icon: 'fa-solid fa-computer',
                    image: 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&q=80&w=800',
                    short: 'Fasilitas TIK untuk membekali siswa keterampilan digital sejak dini.',
                    description: 'Laboratorium komputer digunakan untuk mata pelajaran TIK dan pengenalan teknologi, mendukung program Merdeka Belajar berbasis digital.',
                    qty: '20 Unit',
                    condition: 'Baik',
                    features: ['Koneksi internet stabil', 'Software edukasi', 'Meja komputer per siswa', 'Pendingin ruangan']
                },
                {
                    id: 4,
                    name: 'Musholla',
                    category: 'ibadah',
                    categoryLabel: 'Ibadah',
                    icon: 'fa-solid fa-mosque',
                    image: 'https://images.unsplash.com/photo-1564769625392-651b2b665073?auto=format&fit=crop&q=80&w=800',
                    short: 'Tempat ibadah dan praktik keagamaan bagi seluruh warga sekolah.',
                    description: 'Musholla digunakan untuk sholat berjamaah, praktik ibadah, dan kegiatan keagamaan rutin sebagai bagian dari penguatan karakter religius siswa.',
                    qty: '1 Bangunan',
                    condition: 'Baik',
                    features: ['Tempat wudhu terpisah', 'Perlengkapan sholat', 'Kapasitas 60 orang', 'Jadwal kultum rutin']
                },
                {
                    id: 5,
                    name: 'Ruang UKS',
                    category: 'kesehatan',
                    categoryLabel: 'Kesehatan',
                    icon: 'fa-solid fa-kit-medical',
                    image: 'https://images.unsplash.com/photo-1584982751601-97dcc096659c?auto=format&fit=crop&q=80&w=800',
                    short: 'Ruang kesehatan sekolah untuk penanganan pertama dan edukasi PHBS.',
                    description: 'UKS menyediakan pertolongan pertama bagi siswa yang sakit atau cedera ringan, serta menjadi pusat edukasi Pola Hidup Bersih dan Sehat (PHBS).',
                    qty: '1 Ruang',
                    condition: 'Baik',
                    features: ['Tempat tidur pasien', 'Kotak P3K lengkap', 'Alat ukur tinggi & berat badan', 'Kader kesehatan siswa']
                },
                {
                    id: 6,
                    name: 'Lapangan Olahraga & Upacara',
                    category: 'olahraga',
                    categoryLabel: 'Olahraga',
                    icon: 'fa-solid fa-futbol',
                    image: 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&q=80&w=800',
                    short: 'Area multifungsi untuk olahraga, upacara bendera, dan kegiatan luar ruang.',
                    description: 'Lapangan sekolah digunakan untuk kegiatan PJOK, upacara bendera setiap Senin, senam pagi, serta perlombaan dan pentas seni outdoor.',
                    qty: '1 Lapangan Multifungsi',
                    condition: 'Baik',
                    features: ['Garis lapangan voli & basket', 'Tiang bendera', 'Area teduh di tepi lapangan', 'Digunakan untuk senam pagi']
                },
                {
                    id: 7,
                    name: 'Kantin Sekolah',
                    category: 'penunjang',
                    categoryLabel: 'Penunjang',
                    icon: 'fa-solid fa-utensils',
                    image: 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?auto=format&fit=crop&q=80&w=800',
                    short: 'Menyediakan jajanan sehat yang diawasi langsung oleh pihak sekolah.',
                    description: 'Kantin sekolah menjual makanan dan minuman sehat dengan pengawasan rutin untuk memastikan kebersihan dan kandungan gizi yang sesuai untuk anak-anak.',
                    qty: '2 Kios',
                    condition: 'Baik',
                    features: ['Menu bergizi seimbang', 'Pengawasan kebersihan rutin', 'Bebas pewarna berbahaya', 'Area makan bersama']
                },
                {
                    id: 8,
                    name: 'Toilet Siswa & Guru',
                    category: 'penunjang',
                    categoryLabel: 'Penunjang',
                    icon: 'fa-solid fa-restroom',
                    image: 'https://images.unsplash.com/photo-1631889993959-41b4e9c6e3c5?auto=format&fit=crop&q=80&w=800',
                    short: 'Fasilitas sanitasi terpisah yang bersih dan terawat setiap hari.',
                    description: 'Toilet siswa dan guru dipisah serta dibersihkan secara berkala untuk menjaga kenyamanan dan kesehatan seluruh warga sekolah.',
                    qty: '6 Bilik',
                    condition: 'Baik',
                    features: ['Terpisah putra & putri', 'Ketersediaan air bersih', 'Jadwal kebersihan harian', 'Ramah anak']
                },
                {
                    id: 9,
                    name: 'Taman & Kebun Sekolah',
                    category: 'penunjang',
                    categoryLabel: 'Penunjang',
                    icon: 'fa-solid fa-seedling',
                    image: 'https://images.unsplash.com/photo-1591857177580-dc82b9ac4e1e?auto=format&fit=crop&q=80&w=800',
                    short: 'Ruang hijau sekolah sebagai wujud program Sekolah Adiwiyata.',
                    description: 'Taman dan kebun sekolah dikelola bersama siswa sebagai bagian dari pendidikan lingkungan hidup dan mendukung predikat Sekolah Adiwiyata Tingkat Provinsi.',
                    qty: '3 Titik Taman',
                    condition: 'Baik',
                    features: ['Kebun sayur sederhana', 'Piket taman siswa', 'Tempat sampah terpilah', 'Pohon peneduh']
                },
            ],

            selected: null,

            init() {
                this.animateCounters();
            },

            get filteredFacilities() {
                if (this.activeCategory === 'semua') return this.facilities;
                return this.facilities.filter(f => f.category === this.activeCategory);
            },

            openDetail(item) {
                this.selected = item;
                document.body.style.overflow = 'hidden';
                this.$watch('selected', (val) => {
                    if (!val) document.body.style.overflow = '';
                });
            },

            animateCounters() {
                this.stats.forEach((stat) => {
                    const duration = 1500;
                    const start = performance.now();
                    const step = (now) => {
                        const progress = Math.min((now - start) / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        stat.display = Math.floor(eased * stat.value);
                        if (progress < 1) requestAnimationFrame(step);
                        else stat.display = stat.value;
                    };
                    requestAnimationFrame(step);
                });
            }
        }
    }
</script>

@endsection