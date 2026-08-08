@extends('layouts.admin')

@section('title', 'Kelola Warga Sekolah')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Kelola Warga Sekolah</h1>
        <p class="text-gray-500 mt-1">Data guru, siswa, dan alumni SD Negeri 3 Mandiraja Kulon.</p>
    </div>

    <a href="{{ route('admin.warga.create', ['jenis' => $jenis]) }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
        <i class="fa-solid fa-plus"></i>
        Tambah Data
    </a>
</div>

@if (session('success'))
<div class="mb-6 px-5 py-4 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
    <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
</div>
@endif

{{-- Tab Jenis --}}
<div class="flex gap-2 mb-6">
    @foreach (['guru' => 'Guru', 'siswa' => 'Siswa', 'alumni' => 'Alumni'] as $key => $label)
        <a href="{{ route('admin.warga.index', ['jenis' => $key]) }}"
           class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all
               {{ $jenis === $key ? 'bg-[#18587A] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-100 hover:bg-[#EBF5FA]' }}">
            {{ $label }}
        </a>
    @endforeach
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

    @forelse ($wargas as $item)
    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100">
        <div class="h-40 bg-[#EBF5FA] flex items-center justify-center">
            @if ($item->foto)
                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
            @else
                <i class="fa-solid fa-user text-4xl text-[#85C2DB]"></i>
            @endif
        </div>
        <div class="p-4">
            <h3 class="font-bold text-gray-800 leading-snug mb-0.5 line-clamp-1">{{ $item->nama }}</h3>
            <p class="text-xs text-gray-400 mb-3">{{ $item->keterangan ?? '-' }}</p>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.warga.edit', $item) }}" class="flex-1 text-center py-2 rounded-lg bg-[#EBF5FA] text-[#18587A] text-sm font-semibold hover:bg-[#CCE5F0] transition">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <form action="{{ route('admin.warga.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 rounded-lg bg-red-50 text-red-600 text-sm font-semibold hover:bg-red-100 transition">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-20 text-gray-400">
        <i class="fa-solid fa-users text-3xl mb-3 block"></i>
        Belum ada data {{ $jenis }}. Klik "Tambah Data" untuk mulai mengisi.
    </div>
    @endforelse

</div>

<div class="mt-8">
    {{ $wargas->links() }}
</div>

@endsection