@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div x-data="{ tab: 'umum' }">

    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins']">Profil Sekolah</h1>
        <p class="text-gray-500 mt-1">Kelola identitas, sejarah, visi misi, dan struktur organisasi sekolah.</p>
    </div>

    @if (session('success'))
    <div class="mb-6 px-5 py-4 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
        <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-6 px-5 py-4 rounded-xl bg-red-50 text-red-700 text-sm font-medium border border-red-100">
        <i class="fa-solid fa-circle-exclamation mr-2"></i>Ada isian yang belum sesuai, cek kembali form di bawah.
    </div>
    @endif

    {{-- Tab Selector --}}
    <div class="flex flex-wrap gap-2 mb-6">
        <button @click="tab='umum'" :class="tab==='umum' ? 'bg-[#18587A] text-white' : 'bg-white text-gray-600 border border-gray-100'" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
            <i class="fa-solid fa-school mr-1.5"></i> Nama & Sejarah
        </button>
        <button @click="tab='visimisi'" :class="tab==='visimisi' ? 'bg-[#18587A] text-white' : 'bg-white text-gray-600 border border-gray-100'" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
            <i class="fa-solid fa-bullseye mr-1.5"></i> Visi & Misi
        </button>
        <button @click="tab='struktur'" :class="tab==='struktur' ? 'bg-[#18587A] text-white' : 'bg-white text-gray-600 border border-gray-100'" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
            <i class="fa-solid fa-sitemap mr-1.5"></i> Struktur Organisasi
        </button>
    </div>

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 max-w-3xl">
        @csrf
        @method('PUT')

        {{-- ================= TAB: NAMA & SEJARAH ================= --}}
        <div x-show="tab==='umum'" x-cloak>
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                       class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">
                @error('nama_sekolah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sejarah Sekolah</label>
                <textarea name="sejarah" rows="8" placeholder="Ceritakan sejarah berdirinya sekolah..."
                          class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('sejarah', $profil->sejarah) }}</textarea>
                @error('sejarah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- ================= TAB: VISI & MISI ================= --}}
        <div x-show="tab==='visimisi'" x-cloak>
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Visi</label>
                <textarea name="visi" rows="3" placeholder="Tuliskan visi sekolah..."
                          class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('visi', $profil->visi) }}</textarea>
                @error('visi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Misi</label>
                <p class="text-xs text-gray-400 mb-2">Tulis satu poin misi per baris (tekan Enter untuk poin baru).</p>
                <textarea name="misi" rows="6" placeholder="Menanamkan keyakinan dan ketaqwaan...&#10;Mengoptimalkan proses pembelajaran..."
                          class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition">{{ old('misi', $profil->misi) }}</textarea>
                @error('misi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- ================= TAB: STRUKTUR ORGANISASI ================= --}}
        <div x-show="tab==='struktur'" x-cloak>
            @if ($profil->gambar_struktur)
            <div class="mb-5">
                <img src="{{ Storage::url($profil->gambar_struktur) }}" alt="Struktur Organisasi" class="w-full rounded-xl border border-gray-100">
                <p class="text-xs text-gray-400 mt-1">Gambar struktur organisasi saat ini.</p>
            </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ $profil->gambar_struktur ? 'Ganti Gambar Struktur Organisasi' : 'Unggah Gambar Struktur Organisasi' }}
                </label>
                <input type="file" name="gambar_struktur" accept="image/*"
                       class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#18587A] file:text-white file:text-xs file:font-semibold">
                <p class="text-xs text-gray-400 mt-1">Format JPG/PNG/WEBP, maks 2MB. Biasanya berupa bagan/foto struktur organisasi.</p>
                @error('gambar_struktur') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#092B3A] transition-all shadow-md">
                <i class="fa-solid fa-check mr-1"></i> Simpan Semua Perubahan
            </button>
        </div>

    </form>

</div>

@endsection