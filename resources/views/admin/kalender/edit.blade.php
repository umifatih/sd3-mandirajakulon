@extends('layouts.admin')

@section('title', 'Edit Kegiatan')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.kalender.index') }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Edit Kegiatan</h1>
</div>

<form action="{{ route('admin.kalender.update', $kalender->id) }}" method="POST" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kegiatan</label>
        <input type="text" name="kegiatan" value="{{ old('kegiatan', $kalender->kegiatan) }}"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        @error('kegiatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $kalender->tanggal_mulai?->format('Y-m-d')) }}"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
            @error('tanggal_mulai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai (opsional)</label>
            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $kalender->tanggal_selesai?->format('Y-m-d')) }}"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
            @error('tanggal_selesai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan (opsional)</label>
        <textarea name="keterangan" rows="3" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('keterangan', $kalender->keterangan) }}</textarea>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
            <i class="fa-solid fa-check mr-1"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.kalender.index') }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</a>
    </div>

</form>

@endsection