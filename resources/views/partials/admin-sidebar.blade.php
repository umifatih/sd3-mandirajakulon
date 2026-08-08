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
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all font-semibold
               {{ request()->routeIs('admin.dashboard') ? 'text-white bg-[#18587A]' : 'text-slate-300 hover:text-white hover:bg-[#18587A]' }}">
                <i class="fa-solid fa-chart-pie w-5 text-center text-[#85C2DB]"></i>
                <span>Dashboard</span>
            </a>

            <p class="px-3 pt-4 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Kelola Konten</p>

            {{-- Berita & Informasi --}}
            <a href="{{ route('admin.berita.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
               {{ request()->routeIs('admin.berita.*') ? 'text-white bg-[#18587A]' : 'text-slate-300 hover:text-white hover:bg-[#18587A]' }}">
                <i class="fa-solid fa-newspaper w-5 text-center text-[#85C2DB]"></i>
                <span>Berita & Pengumuman</span>
            </a>

            {{-- Profil Sekolah (accordion) --}}
            <div
                x-data="{ open: {{ request()->routeIs('admin.profil.*', 'admin.sarana.*', 'admin.kalender.*') ? 'true' : 'false' }} }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl transition-all
                    {{ request()->routeIs('admin.profil.*', 'admin.sarana.*', 'admin.kalender.*') ? 'text-white bg-[#18587A]' : 'text-slate-300 hover:text-white hover:bg-[#18587A]' }}">
                    <span class="flex items-center gap-3">
                        <i class="fa-solid fa-school w-5 text-center text-[#85C2DB]"></i>
                        <span>Profil Sekolah</span>
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform" :class="open && 'rotate-180'"></i>
                </button>

                <div x-show="open" x-cloak x-transition class="pl-11 py-1 space-y-1">
                    <a href="{{ route('admin.profil.edit') }}"
                       class="block py-2 text-sm transition-colors {{ request()->routeIs('admin.profil.edit') ? 'text-white font-semibold' : 'text-slate-400 hover:text-white' }}">
                        Nama Sekolah & Sejarah
                    </a>
                    <a href="{{ route('admin.profil.edit') }}"
                       class="block py-2 text-sm transition-colors {{ request()->routeIs('admin.profil.edit') ? 'text-white font-semibold' : 'text-slate-400 hover:text-white' }}">
                        Visi & Misi
                    </a>
                    <a href="{{ route('admin.sarana.index') }}"
                       class="block py-2 text-sm transition-colors {{ request()->routeIs('admin.sarana.*') ? 'text-white font-semibold' : 'text-slate-400 hover:text-white' }}">
                        Sarana & Prasarana
                    </a>
                    <a href="{{ route('admin.profil.edit') }}"
                       class="block py-2 text-sm transition-colors {{ request()->routeIs('admin.profil.edit') ? 'text-white font-semibold' : 'text-slate-400 hover:text-white' }}">
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('admin.kalender.index') }}"
                       class="block py-2 text-sm transition-colors {{ request()->routeIs('admin.kalender.*') ? 'text-white font-semibold' : 'text-slate-400 hover:text-white' }}">
                        Kalender Akademik
                    </a>
                </div>
            </div>

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
        
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-bold text-rose-300 hover:bg-rose-500/20 hover:text-rose-200 transition-all">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
            </button>
        </form>
    </div>

</aside>