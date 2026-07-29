<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Website Sekolah')</title>

    <meta name="description"
        content="Website Resmi Sekolah">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

</head>

<body class="bg-[#F8F5F2] text-gray-800 font-['Inter']">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Running Text --}}
    @include('partials.topbar')

    {{-- Content --}}
    <main>

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')

</body>

</html>