<nav
    id="navbar"
    x-data="{ mobileMenu:false, scrolled:false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    "
    class="fixed inset-x-0 top-5 z-50 transition-all duration-500">

    <div
        :class="scrolled
            ? 'bg-white/95 shadow-2xl border border-gray-200 backdrop-blur-xl'
            : 'bg-white/20 backdrop-blur-md border border-white/20'"
        class="max-w-7xl mx-auto rounded-2xl transition-all duration-500 px-6 lg:px-8">

        <div class="h-20 flex items-center justify-between">

            {{-- ================= LOGO ================= --}}

            <a
                href="{{ route('home') }}"
                class="flex items-center gap-4 group">

                <div
                    class="relative">

                    <img
                        src="https://placehold.co/60x60?text=Logo"
                        class="w-14 h-14 rounded-full ring-4 ring-white shadow-lg object-cover transition duration-300 group-hover:scale-105"
                        alt="Logo">

                </div>

                <div>

                    <h1
                        :class="scrolled ? 'text-gray-800' : 'text-white'"
                        class="font-bold text-lg leading-none transition">

                        SD Negeri 3

                    </h1>

                    <p
                        :class="scrolled ? 'text-gray-500' : 'text-gray-200'"
                        class="text-sm transition">

                        Mandiraja Kulon

                    </p>

                    <span
                        class="text-xs text-[#D9B99B] font-medium">

                        Website Resmi

                    </span>

                </div>

            </a>

            {{-- ================= MENU DESKTOP ================= --}}

            @include('partials.nav-desktop')

            {{-- ================= MOBILE BUTTON ================= --}}

            <button
                @click="mobileMenu=!mobileMenu"
                class="lg:hidden w-11 h-11 rounded-xl flex items-center justify-center transition"

                :class="scrolled
                    ? 'bg-[#F5F2ED] text-[#8B5E3C]'
                    : 'bg-white/20 text-white backdrop-blur'">

                <i
                    class="fa-solid fa-bars text-xl"></i>

            </button>

        </div>

    </div>

    {{-- ================= MOBILE ================= --}}

    @include('partials.nav-mobile')

</nav>