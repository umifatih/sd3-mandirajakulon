@extends('layouts.admin')

@section('title', 'Sarana & Prasarana')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Sarana & Prasarana</h1>
        <p class="text-gray-500 mt-1">Kelola data fasilitas sekolah.</p>
    </div>
    <a href="{{ route('admin.sarana.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i> Tambah Fasilitas
    </a>
</div>

@if (session('success'))
<div class="mb-6 px-5 py-4 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
    <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($saranas as $item)
    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100">
        <div class="relative h-40 bg-[#EBF5FA]">
            @if ($item->gambar)
                <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-[#85C2DB] text-3xl">
                    <i class="fa-solid fa-building"></i>
                </div>
            @endif
            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-lg text-[11px] font-bold {{ $item->kondisi === 'Baik' ? 'bg-emerald-500' : ($item->kondisi === 'Cukup' ? 'bg-amber-500' : 'bg-red-500') }} text-white">
                {{ $item->kondisi }}
            </span>
        </div>
        <div class="p-4">
            <p class="text-[11px] font-semibold text-[#18587A] uppercase mb-1">{{ $item->kategori }}</p>
            <h3 class="font-bold text-gray-800 leading-snug mb-3 line-clamp-2">{{ $item->nama }}</h3>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.sarana.edit', $item->id) }}" class="flex-1 text-center py-2 rounded-lg bg-[#EBF5FA] text-[#18587A] text-sm font-semibold hover:bg-[#CCE5F0] transition">
                    <i class="fa-regular fa-pen-to-square mr-1"></i> Edit
                </a>
                <form action="{{ route('admin.sarana.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-2 rounded-lg bg-red-50 text-red-600 text-sm font-semibold hover:bg-red-100 transition">
                        <i class="fa-regular fa-trash-can mr-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-20 text-gray-400">
        <i class="fa-solid fa-building text-3xl mb-3 block"></i>
        Belum ada data sarana. Klik "Tambah Fasilitas" untuk mulai mengisi.
    </div>
    @endforelse
</div>

<div class="mt-8">{{ $saranas->links() }}</div>

@endsection