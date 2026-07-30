@extends('layouts.app') {{-- Sesuaikan dengan layout utama kamu --}}

@section('content')
{{-- Spacer untuk Navbar Fixed --}}
<div class="pt-28 md:pt-36 pb-10 bg-[#F8F5F2]">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-[#8B5E3C] font-bold tracking-widest uppercase text-xs mb-3 block">Update Terkini</span>
            <h1 class="text-4xl md:text-5xl font-black text-gray-800 font-['Poppins']">Portal Berita</h1>
            <p class="mt-4 text-gray-600">Informasi terbaru seputar kegiatan, prestasi, dan pengumuman SD Negeri 3 Mandiraja Kulon.</p>
        </div>
    </div>
</div>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">
            
            {{-- ================= KIRI: KONTEN UTAMA (KOLOM 2/3) ================= --}}
            <div class="lg:col-span-2 space-y-10">
                
                {{-- Berita Sorotan (Highlight) --}}
                <article class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="aspect-[16/9] w-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&q=80&w=1000" 
                             alt="Berita Utama" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                        <span class="bg-[#8B5E3C] text-white text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">Prestasi</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-white font-['Poppins'] leading-tight mb-3">
                            <a href="#" class="hover:underline decoration-2 underline-offset-4">Siswa SDN 3 Mandiraja Kulon Raih Juara 1 OSN Matematika Tingkat Kabupaten</a>
                        </h2>
                        <ul class="flex items-center gap-4 text-sm text-gray-300">
                            <li><i class="fa-regular fa-calendar-days mr-2"></i> 25 Juni 2026</li>
                            <li><i class="fa-regular fa-user mr-2"></i> Admin</li>
                        </ul>
                    </div>
                </article>

                {{-- Grid Berita Terbaru (2 Kolom) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    {{-- Item Berita 1 --}}
                    <article class="flex flex-col group">
                        <div class="aspect-[16/10] overflow-hidden rounded-2xl mb-4">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&q=80&w=600" alt="Berita" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <span class="text-[#8B5E3C] text-xs font-bold uppercase tracking-wider mb-2">Kegiatan</span>
                        <h3 class="font-bold text-xl text-gray-800 leading-snug mb-2 group-hover:text-[#8B5E3C] transition-colors">
                            <a href="#">Pelepasan & Pentas Seni Kelas VI Tahun Ajaran 2025/2026</a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">Suasana haru dan penuh gembira menyelimuti acara pelepasan siswa kelas VI yang dimeriahkan dengan berbagai penampilan seni.</p>
                        <div class="mt-auto flex items-center text-xs text-gray-500">
                            <i class="fa-regular fa-clock mr-1.5"></i> 18 Juni 2026
                        </div>
                    </article>

                    {{-- Item Berita 2 --}}
                    <article class="flex flex-col group">
                        <div class="aspect-[16/10] overflow-hidden rounded-2xl mb-4">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=600" alt="Berita" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <span class="text-[#8B5E3C] text-xs font-bold uppercase tracking-wider mb-2">Pengumuman</span>
                        <h3 class="font-bold text-xl text-gray-800 leading-snug mb-2 group-hover:text-[#8B5E3C] transition-colors">
                            <a href="#">Jadwal Lengkap PPDB Tahun Ajaran 2026/2027</a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">Informasi penting bagi para orang tua wali murid mengenai persyaratan, alur pendaftaran, dan jadwal seleksi penerimaan.</p>
                        <div class="mt-auto flex items-center text-xs text-gray-500">
                            <i class="fa-regular fa-clock mr-1.5"></i> 10 Juni 2026
                        </div>
                    </article>

                    {{-- Item Berita 3 --}}
                    <article class="flex flex-col group">
                        <div class="aspect-[16/10] overflow-hidden rounded-2xl mb-4">
                            <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&q=80&w=600" alt="Berita" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <span class="text-[#8B5E3C] text-xs font-bold uppercase tracking-wider mb-2">Informasi</span>
                        <h3 class="font-bold text-xl text-gray-800 leading-snug mb-2 group-hover:text-[#8B5E3C] transition-colors">
                            <a href="#">Rapat Komite Sekolah Membahas Program Baru</a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">Hasil keputusan rapat komite sekolah bersama wali murid mengenai penambahan fasilitas ekstrakurikuler di tahun ajaran baru.</p>
                        <div class="mt-auto flex items-center text-xs text-gray-500">
                            <i class="fa-regular fa-clock mr-1.5"></i> 5 Juni 2026
                        </div>
                    </article>

                    {{-- Item Berita 4 --}}
                    <article class="flex flex-col group">
                        <div class="aspect-[16/10] overflow-hidden rounded-2xl mb-4">
                            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=600" alt="Berita" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <span class="text-[#8B5E3C] text-xs font-bold uppercase tracking-wider mb-2">Kegiatan</span>
                        <h3 class="font-bold text-xl text-gray-800 leading-snug mb-2 group-hover:text-[#8B5E3C] transition-colors">
                            <a href="#">Kegiatan Jumat Bersih dan Tanam Pohon</a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">Membangun karakter peduli lingkungan sejak dini, siswa-siswi melakukan gotong royong membersihkan halaman sekolah.</p>
                        <div class="mt-auto flex items-center text-xs text-gray-500">
                            <i class="fa-regular fa-clock mr-1.5"></i> 1 Juni 2026
                        </div>
                    </article>

                </div>

                {{-- Pagination (Navigasi Halaman) --}}
                <div class="flex justify-center items-center gap-2 pt-8 border-t border-gray-200">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 text-gray-500 hover:bg-[#8B5E3C] hover:text-white transition"><i class="fa-solid fa-angle-left"></i></button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#8B5E3C] text-white font-bold shadow-md">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 text-gray-700 hover:bg-[#8B5E3C] hover:text-white transition font-semibold">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 text-gray-700 hover:bg-[#8B5E3C] hover:text-white transition font-semibold">3</button>
                    <span class="text-gray-400 px-2">...</span>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 text-gray-500 hover:bg-[#8B5E3C] hover:text-white transition"><i class="fa-solid fa-angle-right"></i></button>
                </div>

            </div>

            {{-- ================= KANAN: SIDEBAR (KOLOM 1/3) ================= --}}
            <aside class="space-y-10">
                
                {{-- Widget Pencarian --}}
                <div class="bg-[#F8F5F2] p-6 rounded-3xl border border-gray-100">
                    <h4 class="font-bold text-gray-800 text-lg mb-4 font-['Poppins']">Cari Berita</h4>
                    <form action="#" class="relative">
                        <input type="text" placeholder="Masukkan kata kunci..." class="w-full bg-white px-5 py-3 pr-12 rounded-xl text-sm border-gray-200 focus:border-[#8B5E3C] focus:ring focus:ring-[#8B5E3C]/20 transition outline-none">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 bg-[#8B5E3C] text-white rounded-lg hover:bg-[#6F4A2D] transition flex items-center justify-center">
                            <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        </button>
                    </form>
                </div>

                {{-- Widget Kategori --}}
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                    <h4 class="font-bold text-gray-800 text-lg mb-5 font-['Poppins'] relative inline-block">
                        Kategori
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#8B5E3C] rounded-full"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center justify-between group text-sm text-gray-600 hover:text-[#8B5E3C] transition">
                                <span><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-gray-400 group-hover:text-[#8B5E3C] transition"></i> Kegiatan Sekolah</span>
                                <span class="bg-[#F8F5F2] px-2 py-0.5 rounded text-xs text-gray-500 group-hover:bg-[#8B5E3C] group-hover:text-white transition">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group text-sm text-gray-600 hover:text-[#8B5E3C] transition">
                                <span><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-gray-400 group-hover:text-[#8B5E3C] transition"></i> Prestasi</span>
                                <span class="bg-[#F8F5F2] px-2 py-0.5 rounded text-xs text-gray-500 group-hover:bg-[#8B5E3C] group-hover:text-white transition">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group text-sm text-gray-600 hover:text-[#8B5E3C] transition">
                                <span><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-gray-400 group-hover:text-[#8B5E3C] transition"></i> Pengumuman</span>
                                <span class="bg-[#F8F5F2] px-2 py-0.5 rounded text-xs text-gray-500 group-hover:bg-[#8B5E3C] group-hover:text-white transition">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group text-sm text-gray-600 hover:text-[#8B5E3C] transition">
                                <span><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-gray-400 group-hover:text-[#8B5E3C] transition"></i> Artikel Guru</span>
                                <span class="bg-[#F8F5F2] px-2 py-0.5 rounded text-xs text-gray-500 group-hover:bg-[#8B5E3C] group-hover:text-white transition">14</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Widget Berita Populer --}}
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                    <h4 class="font-bold text-gray-800 text-lg mb-5 font-['Poppins'] relative inline-block">
                        Berita Populer
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#8B5E3C] rounded-full"></span>
                    </h4>
                    <div class="space-y-5">
                        
                        {{-- Populer 1 --}}
                        <a href="#" class="flex gap-4 group items-center">
                            <span class="text-3xl font-black text-gray-200 group-hover:text-[#8B5E3C] transition font-['Poppins']">1</span>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800 line-clamp-2 group-hover:text-[#8B5E3C] transition">Hasil Seleksi PPDB Gelombang Pertama 2026</h5>
                                <span class="text-[11px] text-gray-500 mt-1 block">15 Juni 2026</span>
                            </div>
                        </a>
                        
                        {{-- Populer 2 --}}
                        <a href="#" class="flex gap-4 group items-center">
                            <span class="text-3xl font-black text-gray-200 group-hover:text-[#8B5E3C] transition font-['Poppins']">2</span>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800 line-clamp-2 group-hover:text-[#8B5E3C] transition">Juara Umum Lomba Pramuka Tingkat Kecamatan</h5>
                                <span class="text-[11px] text-gray-500 mt-1 block">20 Mei 2026</span>
                            </div>
                        </a>

                        {{-- Populer 3 --}}
                        <a href="#" class="flex gap-4 group items-center">
                            <span class="text-3xl font-black text-gray-200 group-hover:text-[#8B5E3C] transition font-['Poppins']">3</span>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800 line-clamp-2 group-hover:text-[#8B5E3C] transition">Panduan Lengkap Pendaftaran Ulang Siswa Baru</h5>
                                <span class="text-[11px] text-gray-500 mt-1 block">10 Juni 2026</span>
                            </div>
                        </a>

                    </div>
                </div>

            </aside>
            
        </div>
    </div>
</section>
@endsection