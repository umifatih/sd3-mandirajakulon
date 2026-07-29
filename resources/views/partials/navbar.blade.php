<nav
    x-data="{
        mobileMenu: false,
        scrolled: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 60
        })
    "
    class="fixed inset-x-0 top-5 z-50 transition-all duration-500">

    <div
        class="max-w-7xl mx-auto px-4 lg:px-8">

        <div
            :class="scrolled
                ? 'bg-white/95 shadow-2xl border border-gray-200 backdrop-blur-xl'
                : 'bg-white/15 border border-white/20 backdrop-blur-lg'"
            class="transition-all duration-500 rounded-2xl">

            <div class="h-20 px-6 flex items-center justify-between">

                {{-- ===================== LOGO ===================== --}}
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-4 group shrink-0">

                    <div class="relative">

                        <img
                            src="https://placehold.co/60x60?text=Logo"
                            alt="Logo Sekolah"
                            class="w-14 h-14 rounded-full object-cover ring-4 ring-white shadow-lg transition duration-300 group-hover:scale-105">

                    </div>

                    <div>

                        <h1
                            :class="scrolled ? 'text-gray-800' : 'text-white'"
                            class="font-bold text-lg leading-tight transition">

                            SD Negeri 3

                        </h1>

                        <p
                            :class="scrolled ? 'text-gray-500' : 'text-white/80'"
                            class="text-sm transition">

                            Mandiraja Kulon

                        </p>

                        <span class="text-xs font-medium text-[#D9B99B]">

                            Website Resmi

                        </span>

                    </div>

                </a>

                {{-- ===================== DESKTOP ===================== --}}
                @include('partials.nav-desktop')

                {{-- ===================== MOBILE BUTTON ===================== --}}
                <button
                    @click="mobileMenu = !mobileMenu"
                    class="lg:hidden flex items-center justify-center w-11 h-11 rounded-xl transition"

                    :class="scrolled
                        ? 'bg-[#F8F5F2] text-[#8B5E3C]'
                        : 'bg-white/20 text-white backdrop-blur'">

                    <i class="fa-solid fa-bars text-xl"></i>

                </button>

            </div>

        </div>

    </div>

    {{-- ===================== MOBILE MENU ===================== --}}

    @include('partials.nav-mobile')

</nav>

<script>
document.addEventListener("alpine:init", () => {

    window.addEventListener("scroll", () => {

        const navbar = document.querySelector("nav");

        if (window.scrollY > 60) {

            navbar.classList.remove("top-5");

            navbar.classList.add("top-0");

        } else {

            navbar.classList.remove("top-0");

            navbar.classList.add("top-5");

        }

    });

});
</script>