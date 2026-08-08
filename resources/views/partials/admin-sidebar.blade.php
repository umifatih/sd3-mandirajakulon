{{-- Overlay Mobile --}}
<div x-show="sidebarOpen" 
     @click="sidebarOpen = false" 
     class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden transition-opacity"></div>

{{-- Sidebar Container --}}
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-64 h-full bg-[#092B3A] text-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 flex flex-col justify-between shrink-0">
    
    <div class="flex-1 min-h-0 overflow-y-auto">
        {{-- Header / Logo Sekolah --}}
        <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-700/50 bg-[#061e29]">
            <img src="{{ asset('logo_SD3.png') }}" alt="Logo" class="w-10 h-10 object-cover">
            <div class="min-w-0">
                <h1 class="text-sm font-bold text-white tracking-wide truncate">SDN 3 MANDIRAJA</h1>
                <p class="text-[10px] text-[#85C2DB] font-semibold tracking-wider uppercase">Portal Administrator</p>
            </div>
        </div>

        {{-- Navigation Links --}}
        <nav class="p-4 space-y-1 text-sm font-medium">
            
            <p class="px-3 pt-3 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Utama</p>
            
            {{-- Dashboard --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-[#18587A] font-semibold">
                <i class="fa-solid fa-chart-pie w-5 text-center text-[#85C2DB]"></i>
                <span>Dashboard</span>
            </a>

            <p class="px-3 pt-4 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Kelola Konten</p>

            {{-- Kalender Akademik --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-[#18587A]">
                <i class="fa-solid fa-calendar-days w-5 text-center text-[#85C2DB]"></i>
                <span>Kalender Akademik</span>
            </a>

            {{-- Berita & Informasi --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-[#18587A]">
                <i class="fa-solid fa-newspaper w-5 text-center text-[#85C2DB]"></i>
                <span>Berita & Pengumuman</span>
            </a>

            {{-- Galeri Foto --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-[#18587A]">
                <i class="fa-solid fa-images w-5 text-center text-[#85C2DB]"></i>
                <span>Galeri Media</span>
            </a>

            <p class="px-3 pt-4 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Sistem</p>

            {{-- Profil & Pengaturan Website --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all text-slate-300 hover:text-white hover:bg-[#18587A]">
                <i class="fa-solid fa-sliders w-5 text-center text-[#85C2DB]"></i>
                <span>Pengaturan Web</span>
            </a>

        </nav>
    </div>

    {{-- Footer Sidebar / Logout --}}
    <div class="shrink-0 p-4 border-t border-slate-700/50 bg-[#061e29]">
        <a href="/" target="_blank" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 mb-2 transition-all">
            <i class="fa-solid fa-arrow-up-right-from-square text-[#85C2DB]"></i> Lihat Website Utama
        </a>
        
        <form method="POST" action="#">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-bold text-rose-300 hover:bg-rose-500/20 hover:text-rose-200 transition-all">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
            </button>
        </form>
    </div>

</aside>