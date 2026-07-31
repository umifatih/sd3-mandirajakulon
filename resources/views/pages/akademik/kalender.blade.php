@extends('layouts.app')

@section('title','Kalender Akademik | SD Negeri 3 Mandiraja Kulon')

@section('content')

{{-- ===================== CUSTOM ANIMATIONS & STYLES ===================== --}}
<style>
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }

    .hide-scroll::-webkit-scrollbar { display: none; }
    .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<div x-data="calendarApp()" x-init="initCalendar()">

    {{-- ===================== HERO / PAGE HEADER ===================== --}}
    <section class="relative pt-40 pb-20 flex items-center justify-center overflow-hidden bg-[#092B3A]">
        <div class="absolute inset-0 bg-gradient-to-b from-[#18587A]/70 via-[#18587A]/60 to-[#EBF5FA]"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

            <span class="text-[#85C2DB] font-bold tracking-widest uppercase text-xs mb-3 block opacity-0 animate-fade-in-up delay-100">
                <i class="fa-solid fa-calendar-days mr-1"></i> Informasi Akademik
            </span>

            <h1 class="text-4xl md:text-5xl font-black text-white leading-tight font-['Poppins'] drop-shadow-lg opacity-0 animate-fade-in-up delay-200">
                Kalender <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#85C2DB] to-[#3E9FC6]">
                    Pendidikan
                </span>
            </h1>

            <p class="mt-4 text-base text-gray-200 max-w-2xl mx-auto leading-relaxed font-light opacity-0 animate-fade-in-up delay-300">
                Jadwal kegiatan belajar mengajar, ujian, hari libur nasional, dan agenda penting lainnya di SD Negeri 3 Mandiraja Kulon.
            </p>

        </div>
    </section>

    {{-- ===================== MAIN CALENDAR SECTION ===================== --}}
    <section class="py-12 bg-[#EBF5FA] relative overflow-hidden">
        {{-- Efek Blur Background --}}
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#A8D4E5]/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#85C2DB]/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 lg:px-6 relative z-10 space-y-6">

            {{-- WIDGET ATAS: DETAIL TANGGAL DIPILIH (Dinamis & Nyambung) --}}
            <div class="bg-white rounded-2xl p-4 md:p-5 shadow-sm border border-white flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-[#EBF5FA] text-[#18587A] flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status Tanggal:</span>
                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-md"
                                  :class="isSelectedToday ? 'bg-[#18587A] text-white' : 'bg-gray-100 text-gray-600'" 
                                  x-text="isSelectedToday ? 'Hari Ini' : 'Tanggal Dipilih'"></span>
                        </div>
                        
                        <div class="text-base font-bold text-[#092B3A] flex flex-wrap items-center gap-2 mt-0.5">
                            <span class="text-[#3E9FC6]" x-text="selectedDateFormatted"></span>
                            <span class="hidden md:inline text-gray-300">•</span>
                            <span x-text="selectedDateStatus.title"></span>
                            <span class="text-xs px-2.5 py-0.5 rounded-full font-bold" :class="selectedDateStatus.badgeClass" x-text="selectedDateStatus.category"></span>
                        </div>
                    </div>
                </div>
                
                {{-- Filter Kategori --}}
                <div class="flex items-center gap-1.5 bg-[#F8FAFC] p-1 rounded-xl border border-gray-200 text-xs self-stretch md:self-auto overflow-x-auto">
                    <button @click="selectedCategory = 'All'" :class="selectedCategory === 'All' ? 'bg-[#18587A] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900'" class="px-3 py-1.5 rounded-lg font-semibold transition-all shrink-0">Semua</button>
                    <button @click="selectedCategory = 'KBM'" :class="selectedCategory === 'KBM' ? 'bg-[#10B981] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900'" class="px-3 py-1.5 rounded-lg font-semibold transition-all shrink-0">KBM</button>
                    <button @click="selectedCategory = 'Ujian'" :class="selectedCategory === 'Ujian' ? 'bg-[#F59E0B] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900'" class="px-3 py-1.5 rounded-lg font-semibold transition-all shrink-0">Ujian</button>
                    <button @click="selectedCategory = 'Kegiatan'" :class="selectedCategory === 'Kegiatan' ? 'bg-[#3E9FC6] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900'" class="px-3 py-1.5 rounded-lg font-semibold transition-all shrink-0">Kegiatan</button>
                    <button @click="selectedCategory = 'Libur'" :class="selectedCategory === 'Libur' ? 'bg-[#F43F5E] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900'" class="px-3 py-1.5 rounded-lg font-semibold transition-all shrink-0">Libur</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                {{-- BAGIAN KIRI: GRID KALENDER --}}
                <div class="lg:col-span-7 xl:col-span-8 bg-white rounded-2xl p-5 md:p-6 shadow-[0_10px_35px_rgb(0,0,0,0.04)] border border-white relative">
                    
                    {{-- Indicator Loading API --}}
                    <div x-show="loading" class="absolute top-4 right-4 flex items-center gap-2 text-xs text-[#3E9FC6] bg-[#EBF5FA] px-3 py-1 rounded-full font-medium shadow-sm">
                        <i class="fa-solid fa-circle-notch fa-spin"></i> Memuat libur nasional...
                    </div>

                    {{-- Header Navigasi Bulan --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
                        <h2 class="text-2xl font-black text-[#092B3A] font-['Poppins'] flex items-center gap-2">
                            <span x-text="monthNames[month]"></span> 
                            <span class="text-[#3E9FC6]" x-text="year"></span>
                        </h2>
                        
                        <div class="flex items-center bg-[#EBF5FA] p-1 rounded-xl w-fit border border-[#CCE5F0]">
                            <button @click="prevMonth()" class="p-1.5 px-2.5 hover:bg-white rounded-lg transition-all text-[#18587A] hover:text-[#092B3A] hover:shadow-sm text-xs" title="Bulan Sebelumnya">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>

                            {{-- Tombol Reset ke Hari Ini --}}
                            <button @click="goToToday()" class="px-3 py-1 font-bold text-xs text-[#18587A] hover:bg-white rounded-lg transition-all flex items-center gap-1.5" title="Kembali ke Tanggal Hari Ini">
                                <span class="w-2 h-2 rounded-full bg-[#18587A]"></span> Hari Ini
                            </button>

                            <button @click="nextMonth()" class="p-1.5 px-2.5 hover:bg-white rounded-lg transition-all text-[#18587A] hover:text-[#092B3A] hover:shadow-sm text-xs" title="Bulan Selanjutnya">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Calendar Grid Bodi --}}
                    <div class="rounded-xl overflow-hidden border border-gray-100">
                        
                        {{-- Nama Hari --}}
                        <div class="grid bg-[#F8FAFC] border-b border-gray-100" style="grid-template-columns: repeat(7, minmax(0, 1fr));">
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-rose-500">Min</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Sen</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Sel</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Rab</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Kam</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Jum</div>
                            <div class="text-center py-2.5 text-[11px] font-bold uppercase tracking-wider text-[#18587A]">Sab</div>
                        </div>

                        {{-- Kotak-Kotak Tanggal --}}
                        <div class="grid bg-gray-100 gap-[1px]" style="grid-template-columns: repeat(7, minmax(0, 1fr));">
                            
                            {{-- Space kosong awal --}}
                            <template x-for="blank in blankDays" :key="'blank-start-'+blank">
                                <div class="bg-gray-50/50 min-h-[65px] md:min-h-[80px]"></div>
                            </template>
                            
                            {{-- Tanggal Aktual --}}
                            <template x-for="day in daysInMonth" :key="'day-'+day">
                                <div @click="selectDate(day)" 
                                     class="bg-white min-h-[65px] md:min-h-[80px] p-1.5 transition-all hover:bg-[#EBF5FA] flex flex-col items-center group relative cursor-pointer"
                                     :class="{
                                        'bg-[#EBF5FA]/90 ring-2 ring-inset ring-[#18587A]': isSelectedDate(day),
                                        'bg-[#F0F9FF]': isToday(day) && !isSelectedDate(day)
                                     }">
                                    
                                    {{-- Angka Tanggal --}}
                                    <div class="flex justify-center mb-1">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-xs font-semibold transition-all group-hover:scale-110"
                                              :class="{
                                                'bg-[#18587A] text-white shadow-sm': isToday(day),
                                                'text-rose-600': (isSunday(day) || hasHoliday(day)) && !isToday(day),
                                                'text-gray-700': !isSunday(day) && !hasHoliday(day) && !isToday(day)
                                              }" x-text="day"></span>
                                    </div>

                                    {{-- Titik Warna Agenda --}}
                                    <div class="flex flex-wrap justify-center gap-1 mt-auto pb-0.5">
                                        <template x-for="(event, idx) in getEventsForDay(day)" :key="'dot-'+day+'-'+idx">
                                            <span class="w-2 h-2 rounded-full shadow-sm transition-transform group-hover:scale-125"
                                                  :class="event.dotColor" :title="event.title"></span>
                                        </template>
                                    </div>

                                </div>
                            </template>

                            {{-- Space kosong akhir --}}
                            <template x-for="blank in trailingBlankDays" :key="'blank-end-'+blank">
                                <div class="bg-gray-50/50 min-h-[65px] md:min-h-[80px]"></div>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- BAGIAN KANAN: LEGEND & AGENDA --}}
                <div class="lg:col-span-5 xl:col-span-4 space-y-5">
                    
                    {{-- Keterangan Titik (Legend) --}}
                    <div class="bg-white rounded-2xl p-4 md:p-5 shadow-[0_10px_35px_rgb(0,0,0,0.04)] border border-white">
                        <h3 class="font-bold text-[#092B3A] mb-3 text-xs uppercase tracking-widest font-['Poppins']">
                            Keterangan Warna
                        </h3>
                        <div class="grid grid-cols-2 gap-2.5 text-xs font-medium text-gray-600">
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-[#10B981]"></span> KBM</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-[#F59E0B]"></span> Ujian</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-[#3E9FC6]"></span> Kegiatan</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-[#F43F5E]"></span> Libur / Cuti</div>
                        </div>
                    </div>

                    {{-- Daftar Agenda Bulan Ini --}}
                    <div class="bg-white rounded-2xl p-4 md:p-5 shadow-[0_10px_35px_rgb(0,0,0,0.04)] border border-white sticky top-28">
                        <h3 class="font-bold text-[#092B3A] text-base mb-4 font-['Poppins'] flex items-center justify-between pb-3 border-b border-gray-100">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-list-check text-[#3E9FC6] text-sm"></i> Agenda Bulan Ini
                            </span>
                            <span class="bg-[#EBF5FA] text-[#18587A] text-[11px] font-semibold py-0.5 px-2 rounded-md" x-text="monthNames[month]"></span>
                        </h3>
                        
                        <div class="space-y-3 overflow-y-auto max-h-[360px] hide-scroll pr-1">
                            
                            <template x-if="filteredMonthEvents.length === 0">
                                <div class="text-xs font-medium text-gray-400 italic py-8 text-center bg-[#F8FAFC] rounded-xl border border-dashed border-gray-200">
                                    Tidak ada agenda ditemukan.
                                </div>
                            </template>

                            <template x-for="(event, idx) in filteredMonthEvents" :key="'list-'+idx">
                                <div @click="selectDateByString(event.date)" 
                                     class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-[#F8FAFC] transition-colors cursor-pointer group border border-transparent hover:border-gray-100">
                                    <div class="flex flex-col items-center justify-center w-10 h-10 rounded-lg shrink-0 group-hover:bg-[#18587A] group-hover:text-white transition-colors"
                                         :class="event.category === 'Libur' || event.category === 'Cuti Bersama' ? 'bg-rose-50 text-rose-600' : 'bg-[#EBF5FA] text-[#18587A]'">
                                        <span class="text-[9px] font-bold uppercase leading-none mb-0.5" x-text="monthNames[month].substring(0,3)"></span>
                                        <span class="text-base font-black leading-none" x-text="event.date.split('-')[2]"></span>
                                    </div>
                                    
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-1.5 mb-0.5">
                                            <span class="w-1.5 h-1.5 rounded-full shrink-0" :class="event.dotColor"></span>
                                            <span class="text-[9px] font-bold uppercase tracking-wider text-gray-400 truncate" x-text="event.category"></span>
                                        </div>
                                        <div class="text-xs font-bold text-gray-800 leading-tight truncate" x-text="event.title"></div>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</div>

{{-- ===================== ALPINE JS LOGIC ===================== --}}
<script>
    function calendarApp() {
        const today = new Date();

        return {
            month: today.getMonth(),
            year: today.getFullYear(),
            monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            loading: false,
            nationalHolidays: [],
            selectedCategory: 'All',
            
            // Tanggal Aktif yang Sedang Dipilih User (Default: Hari Ini)
            selectedDay: today.getDate(),
            selectedMonth: today.getMonth(),
            selectedYear: today.getFullYear(),

            // AGENDA INTERNAL SEKOLAH
            schoolEvents: [
                { date: '2026-07-13', title: 'Hari Pertama Masuk & MPLS', category: 'KBM', dotColor: 'bg-[#10B981]' },
                { date: '2026-07-14', title: 'Masa Pengenalan Lingkungan Sekolah', category: 'Kegiatan', dotColor: 'bg-[#3E9FC6]' },
                { date: '2026-07-15', title: 'Masa Pengenalan Lingkungan Sekolah', category: 'Kegiatan', dotColor: 'bg-[#3E9FC6]' },
                { date: '2026-09-21', title: 'Penilaian Tengah Semester (PTS)', category: 'Ujian', dotColor: 'bg-[#F59E0B]' },
                { date: '2026-09-22', title: 'Penilaian Tengah Semester (PTS)', category: 'Ujian', dotColor: 'bg-[#F59E0B]' },
                { date: '2026-09-23', title: 'Penilaian Tengah Semester (PTS)', category: 'Ujian', dotColor: 'bg-[#F59E0B]' },
                { date: '2026-12-01', title: 'Penilaian Akhir Semester (PAS)', category: 'Ujian', dotColor: 'bg-[#F59E0B]' },
                { date: '2027-01-04', title: 'Awal Masuk Semester Genap', category: 'KBM', dotColor: 'bg-[#10B981]' },
            ],

            async initCalendar() {
                await this.fetchNationalHolidays(this.year);
            },

            async fetchNationalHolidays(targetYear) {
                this.loading = true;
                try {
                    const response = await fetch(`https://dayoffapi.vercel.app/api?year=${targetYear}`);
                    if (!response.ok) throw new Error('Network error');
                    const data = await response.json();
                    
                    this.nationalHolidays = data.map(item => ({
                        date: item.tanggal,
                        title: item.keterangan,
                        category: item.is_cuti ? 'Cuti Bersama' : 'Libur',
                        dotColor: 'bg-[#F43F5E]'
                    }));
                } catch (error) {
                    console.warn('Gagal ambil data libur nasional.', error);
                } finally {
                    this.loading = false;
                }
            },

            get allEvents() {
                return [...this.schoolEvents, ...this.nationalHolidays];
            },

            // Format tanggal yang dipilih untuk ditampilkan di widget atas
            get selectedDateFormatted() {
                return `${this.selectedDay} ${this.monthNames[this.selectedMonth]} ${this.selectedYear}`;
            },

            // Cek apakah tanggal yang dipilih persis hari ini
            get isSelectedToday() {
                const now = new Date();
                return this.selectedDay === now.getDate() && 
                       this.selectedMonth === now.getMonth() && 
                       this.selectedYear === now.getFullYear();
            },

            // Hitung Status Keterangan Tanggal Dipilih
            get selectedDateStatus() {
                const yearStr = this.selectedYear;
                const monthStr = String(this.selectedMonth + 1).padStart(2, '0');
                const dayStr = String(this.selectedDay).padStart(2, '0');
                const dateStr = `${yearStr}-${monthStr}-${dayStr}`;

                const eventsOnDate = this.allEvents.filter(e => e.date === dateStr);

                if (eventsOnDate.length > 0) {
                    return {
                        title: eventsOnDate[0].title,
                        category: eventsOnDate[0].category,
                        badgeClass: eventsOnDate[0].category === 'Libur' || eventsOnDate[0].category === 'Cuti Bersama' ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700'
                    };
                }

                const checkDate = new Date(this.selectedYear, this.selectedMonth, this.selectedDay);
                if (checkDate.getDay() === 0) {
                    return {
                        title: 'Hari Minggu (Libur Akhir Pekan)',
                        category: 'Libur',
                        badgeClass: 'bg-rose-100 text-rose-700'
                    };
                }

                return {
                    title: 'Kegiatan Belajar Mengajar Normal',
                    category: 'KBM',
                    badgeClass: 'bg-emerald-100 text-emerald-700'
                };
            },

            // Fungsi Pilih Tanggal saat Diklik
            selectDate(day) {
                this.selectedDay = day;
                this.selectedMonth = this.month;
                this.selectedYear = this.year;
            },

            selectDateByString(dateStr) {
                const parts = dateStr.split('-');
                this.selectedYear = parseInt(parts[0]);
                this.selectedMonth = parseInt(parts[1]) - 1;
                this.selectedDay = parseInt(parts[2]);
            },

            isSelectedDate(day) {
                return this.selectedDay === day && this.selectedMonth === this.month && this.selectedYear === this.year;
            },

            get blankDays() {
                let dayOfWeek = new Date(this.year, this.month, 1).getDay();
                return Array.from({length: dayOfWeek}, (_, i) => i + 1);
            },

            get daysInMonth() {
                let days = new Date(this.year, this.month + 1, 0).getDate();
                return Array.from({length: days}, (_, i) => i + 1);
            },

            get trailingBlankDays() {
                let totalCells = this.blankDays.length + this.daysInMonth.length;
                let remainder = totalCells % 7;
                let trailing = remainder === 0 ? 0 : 7 - remainder;
                return Array.from({length: trailing}, (_, i) => i + 1);
            },

            formatDate(day) {
                return this.year + '-' + String(this.month + 1).padStart(2, '0') + '-' + String(day).padStart(2, '0');
            },

            getEventsForDay(day) {
                let dateStr = this.formatDate(day);
                return this.allEvents.filter(e => {
                    if (this.selectedCategory !== 'All') {
                        return e.date === dateStr && (e.category === this.selectedCategory || (this.selectedCategory === 'Libur' && e.category === 'Cuti Bersama'));
                    }
                    return e.date === dateStr;
                });
            },

            hasHoliday(day) {
                let dateStr = this.formatDate(day);
                return this.nationalHolidays.some(e => e.date === dateStr);
            },

            get filteredMonthEvents() {
                let prefix = this.year + '-' + String(this.month + 1).padStart(2, '0');
                return this.allEvents
                        .filter(e => {
                            const isThisMonth = e.date.startsWith(prefix);
                            if (this.selectedCategory !== 'All') {
                                return isThisMonth && (e.category === this.selectedCategory || (this.selectedCategory === 'Libur' && e.category === 'Cuti Bersama'));
                            }
                            return isThisMonth;
                        })
                        .sort((a, b) => a.date.localeCompare(b.date));
            },

            isToday(day) {
                const now = new Date();
                return now.getDate() === day && now.getMonth() === this.month && now.getFullYear() === this.year;
            },

            isSunday(day) {
                return new Date(this.year, this.month, day).getDay() === 0;
            },

            async nextMonth() {
                const oldYear = this.year;
                if (this.month === 11) { this.month = 0; this.year++; } else { this.month++; }
                if (this.year !== oldYear) { await this.fetchNationalHolidays(this.year); }
                this.selectDate(1); // Set default tanggal 1 saat geser bulan
            },

            async prevMonth() {
                const oldYear = this.year;
                if (this.month === 0) { this.month = 11; this.year--; } else { this.month--; }
                if (this.year !== oldYear) { await this.fetchNationalHolidays(this.year); }
                this.selectDate(1); // Set default tanggal 1 saat geser bulan
            },

            async goToToday() {
                let now = new Date();
                const oldYear = this.year;
                this.month = now.getMonth();
                this.year = now.getFullYear();
                if (this.year !== oldYear) { await this.fetchNationalHolidays(this.year); }
                
                // Kembalikan pilihan ke hari ini
                this.selectDate(now.getDate());
            }
        }
    }
</script>
@endsection