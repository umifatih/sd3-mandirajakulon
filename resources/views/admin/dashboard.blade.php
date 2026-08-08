@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div x-data="{ init() {} }" x-init="init()">

    {{-- ===================== HEADER ===================== --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">
                Selamat Datang, {{ auth()->user()->name ?? 'Admin' }} 👋
            </h1>
            <p class="text-gray-500 mt-1">Berikut ringkasan aktivitas website sekolah hari ini.</p>
        </div>

        <div class="flex items-center gap-2 px-4 py-2.5 bg-white rounded-xl shadow-sm border border-gray-100 text-sm text-gray-500">
            <i class="fa-regular fa-calendar text-[#18587A]"></i>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    {{-- ===================== STAT CARDS ===================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        {{-- Total Berita --}}
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 flex items-center gap-4 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#18587A] to-[#092B3A] flex items-center justify-center text-2xl text-white shadow-md shrink-0">
                <i class="fa-regular fa-newspaper"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-800 font-['Poppins']">{{ $totalBerita ?? 0 }}</p>
                <p class="text-sm text-gray-400">Total Berita</p>
            </div>
        </div>

        {{-- Total Galeri --}}
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 flex items-center gap-4 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#61B1D0] to-[#18587A] flex items-center justify-center text-2xl text-white shadow-md shrink-0">
                <i class="fa-regular fa-images"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-800 font-['Poppins']">{{ $totalGaleri ?? 0 }}</p>
                <p class="text-sm text-gray-400">Foto Galeri</p>
            </div>
        </div>

        {{-- Total Prestasi --}}
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 flex items-center gap-4 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-2xl text-white shadow-md shrink-0">
                <i class="fa-solid fa-trophy"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-800 font-['Poppins']">{{ $totalPrestasi ?? 0 }}</p>
                <p class="text-sm text-gray-400">Prestasi Tercatat</p>
            </div>
        </div>

        {{-- Total Warga --}}
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 flex items-center gap-4 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-700 flex items-center justify-center text-2xl text-white shadow-md shrink-0">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-800 font-['Poppins']">{{ $totalWarga ?? 0 }}</p>
                <p class="text-sm text-gray-400">Data Warga Sekolah</p>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ===================== BERITA TERBARU (TABEL) ===================== --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                <h2 class="font-black text-gray-800 font-['Poppins'] text-lg">Berita Terbaru</h2>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-semibold text-[#18587A] hover:underline flex items-center gap-1">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-400 uppercase text-[11px] tracking-wide bg-[#EBF5FA]">
                            <th class="px-6 py-3 font-semibold">Judul</th>
                            <th class="px-6 py-3 font-semibold">Kategori</th>
                            <th class="px-6 py-3 font-semibold">Tanggal</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                            <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse (($beritaTerbaru ?? []) as $berita)
                        <tr class="hover:bg-[#EBF5FA]/50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-700 max-w-xs truncate">{{ $berita->judul }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $berita->kategori }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $berita->created_at->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold
                                    {{ $berita->status === 'published' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                                    {{ $berita->status === 'published' ? 'Terbit' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.berita.edit', $berita) }}" class="text-[#18587A] hover:text-[#092B3A] mr-3">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <button
                                    type="button"
                                    onclick="document.getElementById('hapus-{{ $berita->slug }}').submit()"
                                    class="text-red-500 hover:text-red-700">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                                <form id="hapus-{{ $berita->slug }}" action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <i class="fa-regular fa-newspaper text-2xl mb-2 block"></i>
                                Belum ada berita. Yuk mulai tulis berita pertama!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        {{-- ===================== QUICK ACTIONS + AKTIVITAS ===================== --}}
        <div class="space-y-6">

            {{-- Quick Actions --}}
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="font-black text-gray-800 font-['Poppins'] text-lg mb-4">Aksi Cepat</h2>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.berita.create') }}" class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-[#EBF5FA] hover:bg-[#18587A] hover:text-white text-[#18587A] transition-all group">
                        <i class="fa-regular fa-square-plus text-xl"></i>
                        <span class="text-xs font-semibold text-center">Tulis Berita</span>
                    </a>
                    <a href="{{ route('admin.galeri.create') }}" class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-[#EBF5FA] hover:bg-[#18587A] hover:text-white text-[#18587A] transition-all group">
                        <i class="fa-regular fa-image text-xl"></i>
                        <span class="text-xs font-semibold text-center">Unggah Foto</span>
                    </a>
                    <a href="{{ route('admin.prestasi.create') }}" class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-[#EBF5FA] hover:bg-[#18587A] hover:text-white text-[#18587A] transition-all group">
                        <i class="fa-solid fa-trophy text-xl"></i>
                        <span class="text-xs font-semibold text-center">Tambah Prestasi</span>
                    </a>
                    <a href="{{ route('admin.warga.create') }}" class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-[#EBF5FA] hover:bg-[#18587A] hover:text-white text-[#18587A] transition-all group">
                        <i class="fa-solid fa-user-plus text-xl"></i>
                        <span class="text-xs font-semibold text-center">Data Warga</span>
                    </a>
                </div>
            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="font-black text-gray-800 font-['Poppins'] text-lg mb-4">Aktivitas Terbaru</h2>

                <ul class="space-y-4">
                    @forelse (($aktivitas ?? []) as $log)
                    <li class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xs shrink-0 mt-0.5">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </span>
                        <div>
                            <p class="text-sm text-gray-700">{{ $log->description }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $log->created_at->diffForHumans() }}</p>
                        </div>
                    </li>
                    @empty
                    <li class="text-sm text-gray-400 text-center py-6">Belum ada aktivitas tercatat.</li>
                    @endforelse
                </ul>
            </div>

        </div>

    </div>

</div>

@endsection