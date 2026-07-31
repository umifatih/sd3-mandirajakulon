@extends('layouts.app')

@section('title', 'Struktur Organisasi | SD Negeri 3 Mandiraja Kulon')

@section('content')

@php
$personil = [
    'kepala' => [
        'nama' => 'H. Ahmad Fauzi, S.Pd., M.Pd.',
        'jabatan' => 'Kepala Sekolah',
        'foto' => 'https://i.pravatar.cc/300?img=68',
        'nip' => '19651210 198803 1 008',
        'deskripsi' => 'Memimpin seluruh kegiatan sekolah, bertanggung jawab terhadap mutu pendidikan, administrasi, dan pengembangan SDM.'
    ],
    'wakil' => [
        'nama' => 'Siti Nurhaliza, S.Pd.',
        'jabatan' => 'Wakil Kepala Sekolah',
        'foto' => 'https://i.pravatar.cc/300?img=47',
        'nip' => '19780522 200501 2 006',
        'deskripsi' => 'Membantu kepala sekolah dalam bidang akademik, kurikulum, dan ketenagaan. Mengkoordinir para koordinator bidang.'
    ],
    'tu' => [
        'nama' => 'Joko Susilo, A.Md.',
        'jabatan' => 'Kepala Tata Usaha',
        'foto' => 'https://i.pravatar.cc/300?img=12',
        'nip' => '19820315 201001 1 004',
        'deskripsi' => 'Mengelola administrasi sekolah, kepegawaian, kesiswaan, dan sarana prasarana.'
    ],
    'koordinator' => [
        [
            'nama' => 'Andi Prasetyo, S.Pd.',
            'jabatan' => 'Koord. Kurikulum',
            'foto' => 'https://i.pravatar.cc/300?img=33',
            'nip' => '19900714 201402 1 002',
            'deskripsi' => 'Menyusun dan mengembangkan kurikulum, jadwal pembelajaran, dan program akademik.'
        ],
        [
            'nama' => 'Budi Santoso, S.Pd.',
            'jabatan' => 'Koord. Kesiswaan',
            'foto' => 'https://i.pravatar.cc/300?img=60',
            'nip' => '19881109 201503 1 005',
            'deskripsi' => 'Mengelola kegiatan kesiswaan, pembinaan OSIS, dan pengembangan karakter siswa.'
        ],
        [
            'nama' => 'Citra Dewi, S.Pd.',
            'jabatan' => 'Koord. Sarpras',
            'foto' => 'https://i.pravatar.cc/300?img=19',
            'nip' => '19920520 201803 2 003',
            'deskripsi' => 'Mengelola sarana dan prasarana sekolah, inventaris, serta kebersihan lingkungan.'
        ],
        [
            'nama' => 'Dewi Anggraini, S.Pd.',
            'jabatan' => 'Koord. Humas',
            'foto' => 'https://i.pravatar.cc/300?img=23',
            'nip' => '19931012 202001 2 008',
            'deskripsi' => 'Membangun hubungan dengan masyarakat, mengelola publikasi, dan informasi sekolah.'
        ],
    ],
];
@endphp

{{-- Hero Section dengan gradien gelap agar navbar putih terlihat --}}
<section class="relative bg-gradient-to-b from-[#18587A]/95 to-[#18587A] pt-24 md:pt-32 pb-16 md:pb-24 text-white text-center overflow-hidden">
    {{-- Optional subtle pattern overlay --}}
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/always-grey.png')]"></div>
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <h1 class="text-4xl md:text-6xl font-black font-['Poppins'] mb-4 drop-shadow-lg">Struktur Organisasi</h1>
        <p class="text-lg text-white/80 font-light max-w-2xl mx-auto">SD Negeri 3 Mandiraja Kulon</p>
    </div>
    {{-- Wave divider ke bawah --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-[40px] md:h-[60px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3.38C1132.19,31.61,1055.71,33.85,985.66,92.83Z" fill="#EBF5FA"></path>
        </svg>
    </div>
</section>

{{-- Diagram Struktur --}}
<section class="py-16 md:py-24 bg-[#EBF5FA] relative">
    <div class="max-w-7xl mx-auto px-4"
         x-data="{
            activePerson: null,
            showModal: false,
            personil: {{ Js::from($personil) }},
            openModal(person) { this.activePerson = person; this.showModal = true; },
            closeModal() { this.showModal = false; this.activePerson = null; }
         }">
        <div class="text-center mb-16">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Komando & Koordinasi</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Bagan Organisasi</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- Tree diagram --}}
        <div class="tree-container flex justify-center">
            <ul class="tree">
                {{-- Level 1: Kepala Sekolah --}}
                <li>
                    <div class="node-card" @click="openModal(personil.kepala)">
                        <div class="card-inner bg-white rounded-2xl shadow-lg border border-gray-100 p-5 w-52 md:w-60 text-center cursor-pointer transition hover:shadow-2xl hover:-translate-y-1 hover:border-[#18587A]">
                            <img :src="personil.kepala.foto" class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-[#85C2DB] shadow-md mb-3" alt="foto">
                            <h4 class="font-bold text-gray-800 font-['Poppins'] text-sm md:text-base" x-text="personil.kepala.nama"></h4>
                            <p class="text-xs text-[#18587A] font-semibold mt-1" x-text="personil.kepala.jabatan"></p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="node-card" @click="openModal(personil.wakil)">
                                <div class="card-inner bg-white rounded-2xl shadow-lg border border-gray-100 p-5 w-52 md:w-60 text-center cursor-pointer transition hover:shadow-2xl hover:-translate-y-1 hover:border-[#18587A]">
                                    <img :src="personil.wakil.foto" class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-[#85C2DB] shadow-md mb-3" alt="foto">
                                    <h4 class="font-bold text-gray-800 font-['Poppins'] text-sm md:text-base" x-text="personil.wakil.nama"></h4>
                                    <p class="text-xs text-[#18587A] font-semibold mt-1" x-text="personil.wakil.jabatan"></p>
                                </div>
                            </div>
                            <ul class="flex flex-wrap justify-center gap-4 md:gap-6">
                                <template x-for="koor in personil.koordinator" :key="koor.nama">
                                    <li>
                                        <div class="node-card" @click="openModal(koor)">
                                            <div class="card-inner bg-white rounded-2xl shadow-lg border border-gray-100 p-4 w-44 md:w-52 text-center cursor-pointer transition hover:shadow-2xl hover:-translate-y-1 hover:border-[#18587A]">
                                                <img :src="koor.foto" class="w-16 h-16 rounded-full object-cover mx-auto border-4 border-[#85C2DB] shadow-md mb-2" alt="foto">
                                                <h4 class="font-bold text-gray-800 font-['Poppins'] text-xs md:text-sm" x-text="koor.nama"></h4>
                                                <p class="text-xs text-[#18587A] font-semibold mt-1" x-text="koor.jabatan"></p>
                                            </div>
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </li>
                        <li>
                            <div class="node-card" @click="openModal(personil.tu)">
                                <div class="card-inner bg-white rounded-2xl shadow-lg border border-gray-100 p-5 w-52 md:w-60 text-center cursor-pointer transition hover:shadow-2xl hover:-translate-y-1 hover:border-[#18587A]">
                                    <img :src="personil.tu.foto" class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-[#85C2DB] shadow-md mb-3" alt="foto">
                                    <h4 class="font-bold text-gray-800 font-['Poppins'] text-sm md:text-base" x-text="personil.tu.nama"></h4>
                                    <p class="text-xs text-[#18587A] font-semibold mt-1" x-text="personil.tu.jabatan"></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Modal Detail --}}
        <div x-cloak x-show="showModal" x-transition.opacity.duration.300 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" @click.self="closeModal()">
            <div x-show="showModal" x-transition.scale.90.duration.300 class="bg-white rounded-3xl shadow-2xl max-w-lg w-full p-8 relative border border-[#EBF5FA]">
                <button @click="closeModal()" class="absolute top-5 right-5 text-gray-400 hover:text-gray-800 transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                <template x-if="activePerson">
                    <div class="text-center">
                        <img :src="activePerson.foto" class="w-28 h-28 rounded-full object-cover mx-auto border-4 border-[#85C2DB] shadow-xl mb-5" alt="foto">
                        <h3 class="text-2xl font-black text-gray-800 font-['Poppins']" x-text="activePerson.nama"></h3>
                        <p class="text-[#18587A] font-semibold mt-1" x-text="activePerson.jabatan"></p>
                        <p class="text-sm text-gray-500 mt-1" x-text="'NIP. ' + activePerson.nip"></p>
                        <div class="mt-6 p-5 bg-[#EBF5FA] rounded-2xl text-left">
                            <p class="text-gray-700 font-medium text-sm">Tugas & Tanggung Jawab:</p>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed" x-text="activePerson.deskripsi"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>

{{-- Daftar Dewan Guru --}}
<section class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs block mb-3">Tenaga Pendidik</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Dewan Guru</h2>
            <div class="w-20 h-1.5 bg-[#18587A] mx-auto mt-6 rounded-full"></div>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Para pendidik profesional yang siap membimbing dan menginspirasi siswa.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-10">
            @php
            $guru = [
                ['nama' => 'Rina Marlina, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=31'],
                ['nama' => 'Dedi Kurniawan, S.Pd.I', 'foto' => 'https://i.pravatar.cc/300?img=15'],
                ['nama' => 'Fitriani, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=10'],
                ['nama' => 'Agus Wijaya, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=53'],
                ['nama' => 'Laila Sari, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=27'],
                ['nama' => 'Hendro Prasetyo, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=44'],
                ['nama' => 'Nurhasanah, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=58'],
                ['nama' => 'Yusuf Rahman, S.Pd.', 'foto' => 'https://i.pravatar.cc/300?img=62'],
            ];
            @endphp
            @foreach($guru as $g)
            <div class="bg-[#EBF5FA] rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <img src="{{ $g['foto'] }}" class="w-20 h-20 rounded-full object-cover mx-auto border-4 border-white shadow-md group-hover:border-[#85C2DB] transition-colors mb-3" alt="foto">
                <h4 class="font-semibold text-gray-800 font-['Poppins'] text-sm">{{ $g['nama'] }}</h4>
                <p class="text-xs text-gray-400 mt-1">Guru Kelas</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CSS Tree --}}
<style>
    .tree-container {
        overflow-x: auto;
        padding-bottom: 20px;
    }
    .tree {
        display: flex;
        justify-content: center;
        padding-top: 20px;
    }
    .tree ul {
        display: flex;
        justify-content: center;
        padding-top: 20px;
        position: relative;
        transition: all 0.3s;
    }
    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.3s;
    }
    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 2px solid #CBD5E1;
        width: 50%;
        height: 20px;
    }
    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 2px solid #CBD5E1;
    }
    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }
    .tree li:only-child {
        padding-top: 0;
    }
    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }
    .tree li:last-child::before {
        border-right: 2px solid #CBD5E1;
        border-radius: 0 5px 0 0;
    }
    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
    }
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 2px solid #CBD5E1;
        width: 0;
        height: 20px;
    }
    .node-card {
        display: inline-block;
        transition: 0.3s;
    }
    @media (max-width: 768px) {
        .tree, .tree ul {
            flex-direction: column;
            align-items: center;
        }
        .tree li {
            padding-top: 10px;
        }
        .tree li::before, .tree li::after, .tree ul ul::before {
            display: none;
        }
        .tree ul {
            padding-top: 10px;
        }
        .node-card {
            margin-bottom: 10px;
        }
    }
</style>

@endsection