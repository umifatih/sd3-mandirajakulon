<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Admin - SD Negeri 3 Mandiraja Kulon</title>
    
    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-[#092B3A] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    {{-- Background Blur Decorative Circles --}}
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-[#18587A]/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-[#3E9FC6]/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl relative z-10 border border-white/20">
        
        {{-- Header Form --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block mb-3 hover:scale-105 transition-transform">
                <img src="{{ asset('logo_SD3.png') }}" alt="Logo SD 3 Mandiraja Kulon" class="w-20 h-20 mx-auto object-cover">
            </a>
            <h1 class="text-2xl font-black text-[#092B3A]">Portal Administrator</h1>
            <p class="text-xs text-gray-500 mt-1">SD Negeri 3 Mandiraja Kulon</p>
        </div>

        {{-- Alert Notifikasi Error --}}
        @if(session('error'))
            <div class="mb-5 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-xs font-medium flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-sm"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
            @csrf

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Email Admin</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                        <i class="fa-solid fa-envelope text-sm"></i>
                    </span>
                    <input type="email" name="email" id="email" required placeholder="admin@sdn3mandiraja.sch.id"
                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#18587A] focus:bg-white transition-all">
                </div>
                @error('email')
                    <span class="text-rose-500 text-[11px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Input Password --}}
            <div x-data="{ show: false }">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </span>
                    <input :type="show ? 'text' : 'password'" name="password" id="password" required placeholder="••••••••"
                           class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#18587A] focus:bg-white transition-all">
                    
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-gray-400 hover:text-gray-600">
                        <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-rose-500 text-[11px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Remember Me & Tombol Login --}}
            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#18587A] focus:ring-[#18587A]">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-[#18587A] hover:bg-[#092B3A] text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2 text-sm active:scale-98">
                <span>Masuk Portal</span>
                <i class="fa-solid fa-arrow-right-to-bracket text-xs"></i>
            </button>
        </form>

        {{-- Footer Login --}}
        <div class="mt-8 text-center border-t border-gray-100 pt-5">
            <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-[#18587A] font-medium transition-colors flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-arrow-left text-[10px]"></i> Kembali ke Website Utama
            </a>
        </div>

    </div>

</body>
</html>