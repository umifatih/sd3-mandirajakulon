@extends('layouts.admin')

@section('title', 'Tambah Sarana')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.sarana.index') }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Tambah Sarana</h1>
</div>

<form action="{{ route('admin.sarana.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-2xl">
    @csrf

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Fasilitas</label>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Misal: Ruang Kelas"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="kategori" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="">Pilih</option>
                <option value="belajar" {{ old('kategori') === 'belajar' ? 'selected' : '' }}>Ruang Belajar</option>
                <option value="olahraga" {{ old('kategori') === 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                <option value="penunjang" {{ old('kategori') === 'penunjang' ? 'selected' : '' }}>Penunjang</option>
                <option value="ibadah" {{ old('kategori') === 'ibadah' ? 'selected' : '' }}>Ibadah & Kesehatan</option>
            </select>
            @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kondisi</label>
            <select name="kondisi" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="Baik" {{ old('kondisi') === 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Cukup" {{ old('kondisi') === 'Cukup' ? 'selected' : '' }}>Cukup</option>
                <option value="Rusak" {{ old('kondisi') === 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
            @error('kondisi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Luas/Ukuran</label>
            <input type="text" name="ukuran" value="{{ old('ukuran') }}" placeholder="Misal: 7 x 8 m"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah</label>
            <input type="text" name="jumlah" value="{{ old('jumlah') }}" placeholder="Misal: 6 Ruang"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
        </div>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto (opsional)</label>
        <input type="file" name="gambar" accept="image/*"
               class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
        @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (opsional)</label>
        <textarea name="deskripsi" rows="4" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('deskripsi') }}</textarea>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
            <i class="fa-solid fa-check mr-1"></i> Simpan
        </button>
        <a href="{{ route('admin.sarana.index') }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</a>
    </div>

</form>

@endsection