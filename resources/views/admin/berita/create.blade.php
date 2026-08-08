@extends('layouts.admin')

@section('title', 'Tulis Berita')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.berita.index') }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Berita
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Tulis Berita Baru</h1>
</div>

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-3xl">
    @csrf

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita</label>
        <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Misal: Siswa SDN 3 Raih Juara 1 OSN Matematika"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="kategori" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="">Pilih kategori</option>
                <option value="kegiatan" {{ old('kategori') === 'kegiatan' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                <option value="prestasi" {{ old('kategori') === 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="pengumuman" {{ old('kategori') === 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                <option value="artikel-guru" {{ old('kategori') === 'artikel-guru' ? 'selected' : '' }}>Artikel Guru</option>
            </select>
            @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Terbitkan Sekarang</option>
            </select>
            @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Sampul</label>
        <input type="file" name="gambar" accept="image/*"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
        <p class="text-xs text-gray-400 mt-1">Format JPG/PNG/WEBP, maks 2MB.</p>
        @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Ringkasan Singkat</label>
        <textarea name="ringkasan" rows="2" maxlength="500" placeholder="1-2 kalimat ringkasan untuk kartu berita di halaman depan..."
                  class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('ringkasan') }}</textarea>
        @error('ringkasan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita</label>
        <textarea name="konten" rows="10" placeholder="Tulis isi berita lengkap di sini..."
                  class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('konten') }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Tips: kalau butuh format teks lebih kaya (bold, gambar sisipan, dsb), pertimbangkan integrasi rich text editor seperti TinyMCE/Quill nanti.</p>
        @error('konten') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
            <i class="fa-solid fa-check mr-1"></i> Simpan Berita
        </button>
        <a href="{{ route('admin.berita.index') }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">
            Batal
        </a>
    </div>

</form>

@endsection