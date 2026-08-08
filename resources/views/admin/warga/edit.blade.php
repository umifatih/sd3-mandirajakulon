@extends('layouts.admin')

@section('title', 'Edit Data Warga')

@section('content')

<div x-data="{ jenis: '{{ old('jenis', $warga->jenis) }}' }">

    <div class="mb-8">
        <a href="{{ route('admin.warga.index', ['jenis' => $warga->jenis]) }}" class="text-sm text-[#18587A] font-semibold hover:underline flex items-center gap-1 mb-3">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Edit Data Warga Sekolah</h1>
    </div>

    <form action="{{ route('admin.warga.update', $warga) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-2xl">
        @csrf
        @method('PUT')

        @if ($warga->foto)
        <div class="mb-5">
            <img src="{{ Storage::url($warga->foto) }}" alt="{{ $warga->nama }}" class="w-32 h-32 object-cover rounded-xl mb-2">
            <p class="text-xs text-gray-400">Foto saat ini &mdash; unggah file baru di bawah kalau ingin mengganti.</p>
        </div>
        @endif

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis</label>
            <select name="jenis" x-model="jenis" class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                <option value="guru" {{ $warga->jenis === 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="siswa" {{ $warga->jenis === 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="alumni" {{ $warga->jenis === 'alumni' ? 'selected' : '' }}>Alumni</option>
            </select>
            @error('jenis') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $warga->nama) }}"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
            @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <span x-show="jenis === 'guru'">Jabatan / Mengajar Kelas</span>
                    <span x-show="jenis === 'siswa'" x-cloak>Kelas</span>
                    <span x-show="jenis === 'alumni'" x-cloak>Profesi Sekarang</span>
                </label>
                <input type="text" name="keterangan" value="{{ old('keterangan', $warga->keterangan) }}"
                       class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                @error('keterangan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <span x-show="jenis === 'guru'">NIP (opsional)</span>
                    <span x-show="jenis === 'siswa'" x-cloak>NISN (opsional)</span>
                    <span x-show="jenis === 'alumni'" x-cloak>Tahun Lulus</span>
                </label>
                <input type="text" name="info_tambahan" value="{{ old('info_tambahan', $warga->info_tambahan) }}"
                       class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                @error('info_tambahan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto (opsional)</label>
            <input type="file" name="foto" accept="image/*"
                   class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
            @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (opsional)</label>
            <textarea name="deskripsi" rows="3"
                      class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('deskripsi', $warga->deskripsi) }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
                <i class="fa-solid fa-check mr-1"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.warga.index', ['jenis' => $warga->jenis]) }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition-all">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection