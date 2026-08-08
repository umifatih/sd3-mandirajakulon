@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.berita.index') }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Berita
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Edit Berita</h1>
</div>

<form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-3xl">
    @csrf
    @method('PUT')

    @if ($berita->gambar)
    <div class="mb-5">
        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover rounded-xl mb-2">
        <p class="text-xs text-gray-400">Gambar saat ini &mdash; unggah file baru di bawah kalau ingin mengganti.</p>
    </div>
    @endif

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita</label>
        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="kategori" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                @foreach (['kegiatan' => 'Kegiatan Sekolah', 'prestasi' => 'Prestasi', 'pengumuman' => 'Pengumuman', 'artikel-guru' => 'Artikel Guru'] as $key => $label)
                    <option value="{{ $key }}" {{ old('kategori', $berita->kategori) === $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="draft" {{ old('status', $berita->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $berita->status) === 'published' ? 'selected' : '' }}>Terbit</option>
            </select>
            @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar Sampul (opsional)</label>
        <input type="file" name="gambar" accept="image/*"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
        @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Ringkasan Singkat</label>
        <textarea name="ringkasan" rows="2" maxlength="500"
                  class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
        @error('ringkasan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita</label>
        <textarea name="konten" rows="10"
                  class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('konten', $berita->konten) }}</textarea>
        @error('konten') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
            <i class="fa-solid fa-check mr-1"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.berita.index') }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">
            Batal
        </a>
    </div>

</form>

@endsection