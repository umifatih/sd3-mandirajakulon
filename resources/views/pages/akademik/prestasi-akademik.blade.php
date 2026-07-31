@extends('layouts.app')

@section('title','Prestasi Akademik | SD Negeri 3 Mandiraja Kulon')

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

    @keyframes growBar {
        0% { width: 0%; }
    }
    .animate-grow-bar { animation: growBar 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>

<div
    x-data="prestasiAkademikApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Capaian Akademik <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    Siswa Kami
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Rekam jejak prestasi akademik siswa dalam berbagai kompetisi sains, cerdas cermat, dan bidang studi lainnya.
            </p>

            {{-- Stat Strip --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4 opacity-0 animate-fade-in-up delay-400">
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']" x-text="items.length + '+'"></span>
                    <span class="text-xs text-white/70">Prestasi Akademik</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">100%</span>
                    <span class="text-xs text-white/70">Kelulusan Siswa</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md text-white">
                    <span class="block text-2xl font-black font-['Poppins']">5</span>
                    <span class="text-xs text-white/70">Bidang Studi</span>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== CAPAIAN AKADEMIK (DASHBOARD RINGKAS) ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 p-6 md:p-8">

            <h3 class="text-lg font-black text-gray-800 font-['Poppins'] mb-1">Capaian Asesmen & Kelulusan</h3>
            <p class="text-sm text-gray-400 mb-6">Ringkasan capaian akademik sekolah tahun ajaran berjalan</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-5">
                <template x-for="capaian in capaianAkademik" :key="capaian.label">
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-sm font-semibold text-gray-700" x-text="capaian.label"></span>
                            <span class="text-sm font-bold text-[#18587A]" x-text="capaian.value + '%'"></span>
                        </div>
                        <div class="w-full h-2.5 bg-[#EBF5FA] rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#61B1D0] to-[#18587A] rounded-full animate-grow-bar" :style="'width:' + capaian.value + '%'"></div>
                        </div>
                    </div>
                </template>
            </div>

        </div>
    </section>

    {{-- ===================== FILTER BIDANG STUDI ===================== --}}
    <section class="pt-16 pb-4 px-6 bg-[#EBF5FA]">
        <div class="max-w-6xl mx-auto">

            <div class="flex items-center justify-between mb-6 flex-wrap gap-4">
                <div>
                    <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-2 block">Kompetisi & Lomba</span>
                    <h2 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Prestasi per Bidang Studi</h2>
                </div>

                {{-- Search --}}
                <div class="relative w-full md:w-72">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari prestasi..."
                        class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-white border border-gray-100 focus:border-[#85C2DB] outline-none text-sm text-gray-700 transition shadow-sm">
                </div>
            </div>

            {{-- Bidang Studi Pills --}}
            <div class="flex flex-wrap gap-2">
                <template x-for="subj in subjects" :key="subj.key">
                    <button
                        @click="activeSubject = subj.key"
                        :class="activeSubject === subj.key
                            ? 'bg-[#18587A] text-white shadow-md'
                            : 'bg-white text-gray-600 hover:bg-[#CCE5F0] border border-gray-100'"
                        class="px-4 py-2 rounded-xl text-xs md:text-sm font-semibold transition-all whitespace-nowrap flex items-center gap-1.5">
                        <i :class="subj.icon"></i>
                        <span x-text="subj.label"></span>
                    </button>
                </template>
            </div>

        </div>
    </section>

    {{-- ===================== GRID PRESTASI ===================== --}}
    <section class="py-12 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

            {{-- Empty State --}}
            <div
                x-show="filteredItems.length === 0"
                x-cloak
                class="text-center py-24">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-white flex items-center justify-center text-3xl text-[#18587A] mb-4">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 font-['Poppins']">Belum ada prestasi ditemukan</h3>
                <p class="text-gray-500 text-sm mt-2">Coba ganti kata kunci atau pilih bidang studi lain.</p>
            </div>

            {{-- Grid --}}
            <div
                x-show="filteredItems.length > 0"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <template x-for="(item, index) in visibleItems" :key="item.id">
                    <div
                        class="group flex gap-4 bg-white rounded-2xl p-5 shadow-md border border-gray-100 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 opacity-0 animate-fade-in-up"
                        :style="'animation-delay:' + ((index % 6) * 80) + 'ms'">

                        <div class="w-14 h-14 shrink-0 rounded-2xl flex items-center justify-center text-xl text-white shadow-md"
                             :class="subjectColor(item.subject)">
                            <i :class="subjectIcon(item.subject)"></i>
                        </div>

                        <div class="min-w-0">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="text-[11px] font-bold text-[#18587A] uppercase tracking-wide" x-text="item.subjectLabel"></span>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <span class="text-[11px] text-gray-400" x-text="item.year"></span>
                            </div>

                            <h3 class="font-bold text-gray-800 font-['Poppins'] leading-snug mb-1.5 line-clamp-2" x-text="item.title"></h3>

                            <p class="text-xs text-gray-500 mb-2" x-text="item.student"></p>

                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-50 text-amber-600 text-[11px] font-bold">
                                <i class="fa-solid fa-medal"></i>
                                <span x-text="item.tingkat"></span>
                            </span>
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
function prestasiAkademikApp() {
    return {
        search: '',
        activeSubject: 'semua',
        visibleCount: 6,

        capaianAkademik: [
            { label: 'Kelulusan Siswa Kelas 6', value: 100 },
            { label: 'Ketuntasan Kurikulum', value: 98 },
            { label: 'Rata-rata Literasi ANBK', value: 82 },
            { label: 'Rata-rata Numerasi ANBK', value: 78 },
        ],

        subjects: [
            { key: 'semua', label: 'Semua Bidang', icon: 'fa-solid fa-border-all' },
            { key: 'matematika', label: 'Matematika', icon: 'fa-solid fa-square-root-variable' },
            { key: 'ipa', label: 'IPA', icon: 'fa-solid fa-flask' },
            { key: 'bahasa-indonesia', label: 'Bahasa Indonesia', icon: 'fa-solid fa-language' },
            { key: 'bahasa-inggris', label: 'Bahasa Inggris', icon: 'fa-solid fa-comments' },
            { key: 'cerdas-cermat', label: 'Cerdas Cermat', icon: 'fa-solid fa-lightbulb' },
        ],

        items: [
            { id: 1, subject: 'matematika', subjectLabel: 'Matematika', title: 'Juara 1 OSN Matematika Tingkat Kabupaten', student: 'Budi Santoso &mdash; Kelas 5', year: '2026', tingkat: 'Kabupaten' },
            { id: 2, subject: 'ipa', subjectLabel: 'IPA', title: 'Juara 1 OSN IPA Tingkat Nasional', student: 'Ahmad Fauzi &mdash; Kelas 6', year: '2026', tingkat: 'Nasional' },
            { id: 3, subject: 'cerdas-cermat', subjectLabel: 'Cerdas Cermat', title: 'Juara 2 Lomba Cerdas Cermat Tingkat Kabupaten', student: 'Tim CC SDN 3 Mandiraja Kulon', year: '2024', tingkat: 'Kabupaten' },
            { id: 4, subject: 'bahasa-inggris', subjectLabel: 'Bahasa Inggris', title: 'Juara 3 English Speech Contest Tingkat Kecamatan', student: 'Nayla Putri &mdash; Kelas 6', year: '2025', tingkat: 'Kecamatan' },
            { id: 5, subject: 'bahasa-indonesia', subjectLabel: 'Bahasa Indonesia', title: 'Juara 2 Lomba Mendongeng Tingkat Kabupaten', student: 'Siti Aminah &mdash; Kelas 4', year: '2025', tingkat: 'Kabupaten' },
            { id: 6, subject: 'matematika', subjectLabel: 'Matematika', title: 'Juara Harapan 1 Kompetisi Matematika Nalaria Realistik', student: 'Rizky Pratama &mdash; Kelas 6', year: '2025', tingkat: 'Provinsi' },
            { id: 7, subject: 'ipa', subjectLabel: 'IPA', title: 'Juara 1 Lomba Sains Ceria Tingkat Kecamatan', student: 'Dewi Lestari &mdash; Kelas 5', year: '2024', tingkat: 'Kecamatan' },
            { id: 8, subject: 'cerdas-cermat', subjectLabel: 'Cerdas Cermat', title: 'Juara 1 Cerdas Cermat Keagamaan Tingkat Kecamatan', student: 'Tim CCA SDN 3 Mandiraja Kulon', year: '2026', tingkat: 'Kecamatan' },
            { id: 9, subject: 'bahasa-inggris', subjectLabel: 'Bahasa Inggris', title: 'Juara 2 Spelling Bee Tingkat Kabupaten', student: 'Ahmad Fauzi &mdash; Kelas 6', year: '2024', tingkat: 'Kabupaten' },
        ],

        init() {
            // no-op placeholder untuk future async data loading (mis. fetch dari controller)
        },

        subjectIcon(key) {
            const found = this.subjects.find(s => s.key === key);
            return found ? found.icon : 'fa-solid fa-star';
        },

        subjectColor(key) {
            const map = {
                'matematika': 'bg-gradient-to-br from-[#18587A] to-[#092B3A]',
                'ipa': 'bg-gradient-to-br from-emerald-500 to-[#134A64]',
                'bahasa-indonesia': 'bg-gradient-to-br from-[#3E9FC6] to-[#134A64]',
                'bahasa-inggris': 'bg-gradient-to-br from-[#61B1D0] to-[#18587A]',
                'cerdas-cermat': 'bg-gradient-to-br from-amber-500 to-amber-700',
            };
            return map[key] || 'bg-gradient-to-br from-[#85C2DB] to-[#3E9FC6]';
        },

        get filteredItems() {
            let list = this.items;

            if (this.activeSubject !== 'semua') {
                list = list.filter(i => i.subject === this.activeSubject);
            }

            if (this.search.trim() !== '') {
                const q = this.search.trim().toLowerCase();
                list = list.filter(i =>
                    i.title.toLowerCase().includes(q) ||
                    i.student.toLowerCase().includes(q) ||
                    i.subjectLabel.toLowerCase().includes(q)
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