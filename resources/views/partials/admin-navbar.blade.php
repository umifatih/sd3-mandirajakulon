<header class="h-20 bg-white border-b border-slate-200 px-4 md:px-6 flex items-center justify-between shrink-0">
    
    {{-- Tombol Hamburger Mobile --}}
    <div class="flex items-center gap-3">
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-all">
            <i class="fa-solid fa-bars text-lg"></i>
        </button>
        <span class="text-xs font-semibold text-slate-400 hidden sm:inline">Portal Administrasi SD Negeri 3 Mandiraja Kulon</span>
    </div>

    {{-- Info Admin Login --}}
    <div class="flex items-center gap-3">
        <div class="text-right hidden sm:block">
            <div class="text-sm font-bold text-slate-800">Admin Sekolah</div>
            <div class="text-[10px] font-semibold text-slate-400">admin@sdn3mandiraja.sch.id</div>
        </div>
        <div class="w-10 h-10 rounded-full bg-[#18587A] text-white flex items-center justify-center font-bold text-sm shadow-sm">
            A
        </div>
    </div>

</header>