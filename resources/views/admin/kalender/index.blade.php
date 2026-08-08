@extends('layouts.admin')

@section('title', 'Kalender Akademik')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Kalender Akademik</h1>
        <p class="text-gray-500 mt-1">Kelola jadwal kegiatan dan agenda sekolah.</p>
    </div>
    <a href="{{ route('admin.kalender.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i> Tambah Kegiatan
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
                    <th class="px-6 py-3 font-semibold">Kegiatan</th>
                    <th class="px-6 py-3 font-semibold">Tanggal Mulai</th>
                    <th class="px-6 py-3 font-semibold">Tanggal Selesai</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($kalenders as $item)
                <tr class="hover:bg-[#EBF5FA]/50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-700">{{ $item->kegiatan }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->tanggal_mulai->translatedFormat('d M Y') }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->tanggal_selesai?->translatedFormat('d M Y') ?? '-' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.kalender.edit', $item->id) }}" class="text-[#18587A] hover:text-[#092B3A] mr-3">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.kalender.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                        <i class="fa-regular fa-calendar text-2xl mb-2 block"></i>
                        Belum ada kegiatan. Klik "Tambah Kegiatan" untuk mulai mengisi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">{{ $kalenders->links() }}</div>

@endsection