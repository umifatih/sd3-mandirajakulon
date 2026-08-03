<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal - SD Negeri 3 Mandiraja Kulon')</title>

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Tailwind & Alpine.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">

        {{-- SIDEBAR ADMIN --}}
        @include('partials.admin-sidebar')

        {{-- MAIN CONTENT AREA --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            {{-- NAVBAR TOPBAR ADMIN --}}
            @include('partials.admin-navbar')

            {{-- KONTEN UTAMA --}}
            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">
                
                {{-- Notifikasi Sukses / Error --}}
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500 text-white shadow-lg flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-xl"></i>
                            <span class="font-medium text-sm">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>