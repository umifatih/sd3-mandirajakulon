@extends('layouts.app')

@section('title','Kontak Kami | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- ===================== CUSTOM ANIMATIONS ===================== --}}
<style>
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }

    @keyframes popIn {
        0% { opacity: 0; transform: scale(0.9); }
        100% { opacity: 1; transform: scale(1); }
    }
    .animate-pop-in { animation: popIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>

<div
    x-data="kontakApp()"
    x-init="init()"
>

    {{-- ===================== HERO / PAGE HEADER (GRADASI, NO PHOTO) ===================== --}}
    <section class="relative pt-44 pb-28 flex items-center justify-center overflow-hidden bg-[#092B3A]">

        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Kami Siap <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    Membantu Anda
                </span>
            </h1>

            <p class="mt-6 text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Ada pertanyaan seputar PPDB, kegiatan sekolah, atau ingin memberikan masukan? Silakan hubungi kami melalui kontak di bawah ini.
            </p>

        </div>
    </section>

    {{-- ===================== KARTU INFO KONTAK ===================== --}}
    <section class="relative z-20 -mt-10 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="bg-white rounded-2xl p-6 shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 hover:-translate-y-1.5 transition-transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h3 class="font-bold text-gray-800 font-['Poppins'] mb-1">Alamat</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Jl. Raya Mandiraja Kulon, Kec. Mandiraja, Kab. Banjarnegara, Jawa Tengah 53474</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 hover:-translate-y-1.5 transition-transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <h3 class="font-bold text-gray-800 font-['Poppins'] mb-1">Telepon</h3>
                <p class="text-sm text-gray-500 leading-relaxed">(0286) 123-4567<br>0812-3456-7890 (WhatsApp)</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 hover:-translate-y-1.5 transition-transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <h3 class="font-bold text-gray-800 font-['Poppins'] mb-1">Email</h3>
                <p class="text-sm text-gray-500 leading-relaxed break-all">sdn3mandirajakulon@gmail.com</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-[0_15px_50px_rgb(0,0,0,0.08)] border border-gray-100 hover:-translate-y-1.5 transition-transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xl mb-4">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <h3 class="font-bold text-gray-800 font-['Poppins'] mb-1">Jam Operasional</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Senin&ndash;Sabtu<br>07.00 &ndash; 14.00 WIB</p>
            </div>

        </div>
    </section>

    {{-- ===================== FORM + PETA ===================== --}}
    <section class="py-20 bg-[#EBF5FA] relative overflow-hidden">

        <div class="absolute top-40 right-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-60 h-60 bg-white/60 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                {{-- ================= FORM (KIRI) ================= --}}
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-3xl shadow-[0_15px_50px_rgb(0,0,0,0.06)] border border-gray-100 p-8 md:p-10 h-full">

                        <span class="text-[#18587A] font-bold tracking-widest uppercase text-xs mb-3 block">Kirim Pesan</span>
                        <h2 class="text-2xl md:text-3xl font-black text-gray-800 font-['Poppins'] mb-2">Punya Pertanyaan?</h2>
                        <p class="text-gray-500 mb-8">Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda kembali.</p>

                        {{-- Sukses State --}}
                        <div x-show="submitted" x-cloak class="animate-pop-in text-center py-12">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-3xl mb-5">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-800 font-['Poppins'] mb-2">Pesan Terkirim!</h3>
                            <p class="text-gray-500 mb-6">Terima kasih, pesan Anda sudah kami terima. Kami akan menghubungi Anda secepatnya.</p>
                            <button @click="resetForm()" class="text-[#18587A] font-semibold text-sm hover:underline">
                                Kirim pesan lain
                            </button>
                        </div>

                        {{-- Form --}}
                        <form
                            x-show="!submitted"
                            @submit.prevent="submitForm()"
                            method="POST"
                            action="{{ route('kontak.store') ?? '#' }}"
                            class="space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Nama Lengkap</label>
                                    <input
                                        type="text"
                                        name="nama"
                                        x-model="form.nama"
                                        required
                                        placeholder="Nama Anda"
                                        class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition">
                                </div>
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-1.5 block">No. HP / WhatsApp</label>
                                    <input
                                        type="text"
                                        name="telepon"
                                        x-model="form.telepon"
                                        required
                                        placeholder="08xx-xxxx-xxxx"
                                        class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition">
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    x-model="form.email"
                                    required
                                    placeholder="nama@email.com"
                                    class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition">
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Subjek</label>
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="subj in subjects" :key="subj">
                                        <button
                                            type="button"
                                            @click="form.subjek = subj"
                                            :class="form.subjek === subj
                                                ? 'bg-[#18587A] text-white shadow-md'
                                                : 'bg-[#EBF5FA] text-gray-600 hover:bg-[#CCE5F0]'"
                                            class="px-3.5 py-2 rounded-lg text-xs font-semibold transition-all"
                                            x-text="subj"></button>
                                    </template>
                                </div>
                                <input type="hidden" name="subjek" x-model="form.subjek">
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <label class="text-sm font-semibold text-gray-700 block">Pesan</label>
                                    <span class="text-xs text-gray-400" x-text="form.pesan.length + '/500'"></span>
                                </div>
                                <textarea
                                    name="pesan"
                                    x-model="form.pesan"
                                    maxlength="500"
                                    required
                                    rows="5"
                                    placeholder="Tulis pesan atau pertanyaan Anda di sini..."
                                    class="w-full px-4 py-3 rounded-xl bg-[#EBF5FA] border border-transparent focus:border-[#85C2DB] focus:bg-white outline-none text-sm text-gray-700 transition resize-none"></textarea>
                            </div>

                            <button
                                type="submit"
                                :disabled="sending"
                                class="w-full inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#18587A] text-white rounded-xl font-semibold hover:bg-[#134A64] transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 disabled:opacity-60 disabled:cursor-not-allowed disabled:translate-y-0">
                                <template x-if="!sending">
                                    <span class="inline-flex items-center gap-2">
                                        Kirim Pesan
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </span>
                                </template>
                                <template x-if="sending">
                                    <span class="inline-flex items-center gap-2">
                                        <i class="fa-solid fa-circle-notch fa-spin"></i>
                                        Mengirim...
                                    </span>
                                </template>
                            </button>

                        </form>

                    </div>
                </div>

                {{-- ================= PETA + SOSMED (KANAN) ================= --}}
                <div class="lg:col-span-5 space-y-6">

                    {{-- Peta Lokasi --}}
                    <div class="bg-white rounded-3xl shadow-[0_15px_50px_rgb(0,0,0,0.06)] border border-gray-100 overflow-hidden">
                        <div class="aspect-[4/3]">
                            <iframe
                                src="https://maps.google.com/maps?q=Mandiraja%20Kulon%2C%20Banjarnegara%2C%20Jawa%20Tengah&t=&z=14&ie=UTF8&iwloc=&output=embed"
                                class="w-full h-full border-0"
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Lokasi SD Negeri 3 Mandiraja Kulon">
                            </iframe>
                        </div>
                        <div class="p-5">
                            <a
                                href="https://maps.google.com/?q=SD+Negeri+3+Mandiraja+Kulon"
                                target="_blank"
                                rel="noopener"
                                class="inline-flex items-center gap-2 text-[#18587A] font-semibold text-sm hover:underline">
                                Buka di Google Maps
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Sosial Media --}}
                    <div class="bg-white rounded-3xl shadow-[0_15px_50px_rgb(0,0,0,0.06)] border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 font-['Poppins'] mb-4">Ikuti Kami</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#EBF5FA] hover:bg-[#CCE5F0] transition-colors">
                                <div class="w-9 h-9 rounded-full bg-[#1877F2] text-white flex items-center justify-center text-sm shrink-0">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Facebook</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#EBF5FA] hover:bg-[#CCE5F0] transition-colors">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#F58529] via-[#DD2A7B] to-[#8134AF] text-white flex items-center justify-center text-sm shrink-0">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Instagram</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#EBF5FA] hover:bg-[#CCE5F0] transition-colors">
                                <div class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center text-sm shrink-0">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">WhatsApp</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#EBF5FA] hover:bg-[#CCE5F0] transition-colors">
                                <div class="w-9 h-9 rounded-full bg-red-600 text-white flex items-center justify-center text-sm shrink-0">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">YouTube</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

{{-- ===================== ALPINE DATA ===================== --}}
<script>
function kontakApp() {
    return {
        sending: false,
        submitted: false,

        subjects: ['Informasi PPDB', 'Pengaduan', 'Kerja Sama', 'Lainnya'],

        form: {
            nama: '',
            telepon: '',
            email: '',
            subjek: 'Informasi PPDB',
            pesan: '',
        },

        init() {
            // no-op placeholder untuk future integrasi backend
        },

        submitForm() {
            this.sending = true;

            // TODO: ganti dengan request sungguhan ke backend, misalnya:
            // fetch(this.$el.action, { method: 'POST', body: new FormData(this.$el), headers: {'X-Requested-With':'XMLHttpRequest'} })
            //     .then(res => res.json())
            //     .then(() => { this.sending = false; this.submitted = true; });

            setTimeout(() => {
                this.sending = false;
                this.submitted = true;
            }, 1200);
        },

        resetForm() {
            this.submitted = false;
            this.form = { nama: '', telepon: '', email: '', subjek: 'Informasi PPDB', pesan: '' };
        },
    }
}
</script>

@endsection