<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="{{ route('home') }}" class="text-2xl font-bold text-[var(--primary)]">
            Website Sekolah
        </a>

        <ul class="hidden md:flex items-center gap-8">
            <li><a href="{{ route('home') }}" class="hover:text-[var(--primary)]">Home</a></li>
            <li><a href="{{ route('profil') }}" class="hover:text-[var(--primary)]">Profil</a></li>
            <li><a href="{{ route('berita') }}" class="hover:text-[var(--primary)]">Berita</a></li>
            <li><a href="{{ route('galeri') }}" class="hover:text-[var(--primary)]">Galeri</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:text-[var(--primary)]">Kontak</a></li>
        </ul>

    </div>
</nav>