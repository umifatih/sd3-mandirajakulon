@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.galeri.index') }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Galeri
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Tambah Foto Galeri</h1>
</div>

<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-2xl">
    @csrf

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto</label>
        <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Misal: Kegiatan Belajar di Kelas"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
        <select name="kategori" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
            <option value="">Pilih kategori</option>
            <option value="pembelajaran" {{ old('kategori') === 'pembelajaran' ? 'selected' : '' }}>Pembelajaran</option>
            <option value="ekstrakurikuler" {{ old('kategori') === 'ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
            <option value="seni" {{ old('kategori') === 'seni' ? 'selected' : '' }}>Seni & Kreativitas</option>
            <option value="prestasi" {{ old('kategori') === 'prestasi' ? 'selected' : '' }}>Prestasi</option>
            <option value="fasilitas" {{ old('kategori') === 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
        </select>
        @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
        <input type="file" name="gambar" accept="image/*"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
        <p class="text-xs text-gray-400 mt-1">Format JPG/PNG/WEBP, maks 2MB.</p>
        @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (opsional)</label>
        <textarea name="deskripsi" rows="4" placeholder="Deskripsi singkat foto..."
                  class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('deskripsi') }}</textarea>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
            <i class="fa-solid fa-check mr-1"></i> Simpan Foto
        </button>
        <a href="{{ route('admin.galeri.index') }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">
            Batal
        </a>
    </div>

</form>

@endsection