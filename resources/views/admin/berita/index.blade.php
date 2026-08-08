@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Kelola Berita</h1>
        <p class="text-gray-500 mt-1">Tulis, ubah, atau hapus berita & pengumuman sekolah.</p>
    </div>

    <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i>
        Tulis Berita
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
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Tanggal</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($beritas as $berita)
                <tr class="hover:bg-[#EBF5FA]/50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-700 max-w-xs truncate">{{ $berita->judul }}</td>
                    <td class="px-6 py-4 text-gray-500 capitalize">{{ $berita->kategori }}</td>
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
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
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

<div class="mt-8">
    {{ $beritas->links() }}
</div>

@endsection