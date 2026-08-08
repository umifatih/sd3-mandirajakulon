@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Kelola Galeri</h1>
        <p class="text-gray-500 mt-1">Tambah, ubah, atau hapus foto dokumentasi sekolah.</p>
    </div>

    <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i>
        Tambah Foto
    </a>
</div>

@if (session('success'))
<div class="mb-6 px-5 py-4 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
    <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse ($galeris as $item)
    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100">
        <div class="relative h-44">
            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-lg bg-white/90 backdrop-blur text-[#18587A] text-[11px] font-semibold uppercase">{{ $item->kategori }}</span>
        </div>
        <div class="p-4">
            <h3 class="font-bold text-gray-800 leading-snug mb-3 line-clamp-2">{{ $item->judul }}</h3>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.galeri.edit', $item->id) }}" class="flex-1 text-center py-2 rounded-lg bg-[#EBF5FA] text-[#18587A] text-sm font-semibold hover:bg-[#CCE5F0] transition">
                    <i class="fa-regular fa-pen-to-square mr-1"></i> Edit
                </a>
                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 rounded-lg bg-red-50 text-red-600 text-sm font-semibold hover:bg-red-100 transition">
                        <i class="fa-regular fa-trash-can mr-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-20 text-gray-400">
        <i class="fa-regular fa-images text-3xl mb-3 block"></i>
        Belum ada foto. Klik "Tambah Foto" untuk mulai mengisi galeri.
    </div>
    @endforelse

</div>

<div class="mt-8">
    {{ $galeris->links() }}
</div>

@endsection