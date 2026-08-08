@extends('layouts.admin')

@section('title', 'Kelola Prestasi')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Kelola Prestasi</h1>
        <p class="text-gray-500 mt-1">Catat prestasi siswa dan sekolah di berbagai bidang.</p>
    </div>

    <a href="{{ route('admin.prestasi.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i>
        Tambah Prestasi
    </a>
</div>

@if (session('success'))
<div class="mb-6 px-5 py-4 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
    <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-400 uppercase text-[11px] tracking-wide bg-[#EBF5FA]">
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Siswa/Tim</th>
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Tingkat</th>
                    <th class="px-6 py-3 font-semibold">Tahun</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($prestasis as $item)
                <tr class="hover:bg-[#EBF5FA]/50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-700 max-w-xs truncate">{{ $item->judul }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->siswa }}</td>
                    <td class="px-6 py-4 text-gray-500 capitalize">{{ $item->kategori }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-amber-50 text-amber-600">{{ $item->tingkat }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->tahun }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="text-[#18587A] hover:text-[#092B3A] mr-3">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus prestasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        <i class="fa-solid fa-trophy text-2xl mb-2 block"></i>
                        Belum ada prestasi tercatat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">
    {{ $prestasis->links() }}
</div>

@endsection