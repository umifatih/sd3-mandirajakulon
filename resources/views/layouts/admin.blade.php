<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | SD Negeri 3 Mandiraja Kulon</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        html, body { height: 100%; margin: 0; }
    </style>
</head>
<body class="h-full font-['Poppins'] antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex h-full overflow-hidden bg-[#EBF5FA]">

        {{-- ===================== SIDEBAR ===================== --}}
        {{-- Partial ini sudah punya <aside> sendiri lengkap dengan positioning
             (fixed di mobile, static di desktop) — jangan dibungkus <aside> lagi di sini,
             nanti malah jadi dua elemen aside bertumpuk. --}}
        @include('partials.admin-sidebar')

        {{-- ===================== KOLOM KANAN: NAVBAR + KONTEN ===================== --}}
        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">

            <div class="shrink-0">
                @include('partials.admin-navbar')
            </div>

            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>