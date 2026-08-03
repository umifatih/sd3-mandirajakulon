<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SD Negeri 3 Mandiraja Kulon</title>
    
    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Alpine.js (Untuk Interaksi Buka-Tutup Sidebar) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>

<!-- Alpine JS wrapper untuk state sidebar -->
<body x-data="{ sidebarOpen: false }" class="bg-gray-50 flex h-screen overflow-hidden">

    {{-- Overlay untuk versi Mobile --}}
    <div x-show="sidebarOpen" x-transition.opacity 
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black/50 lg:hidden"></div>

    {{-- ================= SIDEBAR ================= --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
           class="fixed inset-y-0 left-0 z-30 w-64 bg-[#092B3A] text-white transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col shadow-2xl">
        
        {{-- Header Sidebar --}}
        <div class="flex items-center justify-center h-20 border-b border-white/10 px-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo_SD3.png') }}" alt="Logo" class="w-10 h-10 object-contain bg-white rounded-full p-1">
                <div>
                    <h2 class="text-sm font-bold uppercase tracking-wider">Portal Admin</h2>
                    <p class="text-[10px] text-gray-400">SDN 3 Mandiraja Kulon</p>
                </div>
            </div>
        </div>

        {{-- Menu Navigasi --}}
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <!-- Menu Aktif (Dashboard) -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-[#18587A] text-white rounded-xl transition-colors">
                <i class="fa-solid fa-house w-5 text-center"></i>
                <span class="text-sm font-medium">Dashboard</span>
            </a>

            <!-- Contoh Menu Lainnya -->
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 rounded-xl transition-colors">
                <i class="fa-solid fa-newspaper w-5 text-center"></i>
                <span class="text-sm font-medium">Kelola Berita</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 rounded-xl transition-colors">
                <i class="fa-solid fa-images w-5 text-center"></i>
                <span class="text-sm font-medium">Galeri Sekolah</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 rounded-xl transition-colors">
                <i class="fa-solid fa-users w-5 text-center"></i>
                <span class="text-sm font-medium">Data Warga</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 rounded-xl transition-colors">
                <i class="fa-solid fa-graduation-cap w-5 text-center"></i>
                <span class="text-sm font-medium">Info PPDB</span>
            </a>
        </nav>

        {{-- Footer Sidebar (Tombol Logout) --}}
        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-sm font-medium transition-colors">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Keluar / Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- ================= KONTEN UTAMA ================= --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        
        {{-- Navbar Atas --}}
        <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
            <div class="flex items-center gap-4">
                {{-- Tombol Hamburger (Mobile) --}}
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden hover:text-[#18587A]">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl font-bold text-gray-800 hidden sm:block">Dashboard Overview</h1>
            </div>

            {{-- Profil Admin --}}
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium text-gray-700 hidden md:block">Halo, Administrator</span>
                <div class="w-10 h-10 rounded-full bg-[#18587A] text-white flex items-center justify-center font-bold">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
            </div>
        </header>

        {{-- Area Konten (Scrollable) --}}
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50/50 p-6">
            
            {{-- Ucapan Selamat Datang --}}
            <div class="mb-8 bg-gradient-to-r from-[#092B3A] to-[#18587A] rounded-2xl p-6 md:p-8 text-white shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang di Portal Admin! 👋</h2>
                    <p class="text-white/80 text-sm md:text-base max-w-2xl">
                        Ini adalah pusat kendali website SD Negeri 3 Mandiraja Kulon. Anda dapat mengelola berita, galeri, informasi PPDB, dan data sekolah dari halaman ini.
                    </p>
                </div>
                {{-- Dekorasi Abstrak --}}
                <i class="fa-solid fa-shapes absolute -right-4 -bottom-4 text-[120px] text-white/10 transform rotate-12"></i>
            </div>

            {{-- Widget Statistik (Cards) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                {{-- Card 1 --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Berita</p>
                        <h3 class="text-2xl font-bold text-gray-800">24</h3>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Galeri Foto</p>
                        <h3 class="text-2xl font-bold text-gray-800">45</h3>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Siswa</p>
                        <h3 class="text-2xl font-bold text-gray-800">186</h3>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Guru</p>
                        <h3 class="text-2xl font-bold text-gray-800">12</h3>
                    </div>
                </div>

            </div>

            {{-- Area Tabel / Aktivitas Terakhir (Placeholder) --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terakhir</h3>
                <div class="text-center py-10 text-gray-400 text-sm">
                    <i class="fa-solid fa-box-open text-4xl mb-3"></i>
                    <p>Belum ada aktivitas terbaru.</p>
                </div>
            </div>

        </main>
    </div>

</body>
</html>