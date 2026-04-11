<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EstimasiApp - Modern Rule-Based System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Plus+Jakarta+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
    /* Menggunakan Plus Jakarta Sans untuk vibe SaaS Awwwards */
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .glass-nav {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    /* Animasi Gradient Mesh Nory Style */
    .mesh-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        z-index: -1;
        background-color: #F8F9FA;
    }

    .blob {
        position: absolute;
        filter: blur(80px);
        opacity: 0.6;
        animation: float 10s infinite ease-in-out alternate;
    }

    .blob-1 {
        top: -10%;
        left: -10%;
        width: 50vw;
        height: 50vw;
        background: #E0E7FF;
    }

    /* Light Indigo */
    .blob-2 {
        bottom: -20%;
        right: -10%;
        width: 60vw;
        height: 60vw;
        background: #D1FAE5;
        animation-delay: -5s;
    }

    /* Light Emerald */
    .blob-3 {
        top: 40%;
        left: 30%;
        width: 40vw;
        height: 40vw;
        background: #F3E8FF;
        animation-delay: -2s;
    }

    /* Light Purple */

    @keyframes float {
        0% {
            transform: translate(0, 0) scale(1);
        }

        100% {
            transform: translate(5%, 5%) scale(1.1);
        }
    }

    /* Hilangkan scrollbar untuk tampilan lebih bersih */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #F8F9FA;
    }

    ::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94A3B8;
    }
    </style>
</head>

<body class="antialiased text-slate-900 bg-[#F8F9FA] overflow-x-hidden selection:bg-blue-600 selection:text-white">

    <div class="mesh-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="fixed top-6 left-0 w-full z-50 px-4 sm:px-6 lg:px-8" x-data="{ mobileMenuOpen: false }">
        <nav class="max-w-6xl mx-auto glass-nav shadow-[0_8px_30px_rgb(0,0,0,0.04)] px-6 py-3 transition-all duration-500"
            :class="{'rounded-3xl': mobileMenuOpen, 'rounded-[2rem]': !mobileMenuOpen}">
            <div class="flex items-center justify-between">

                <a href="/"
                    class="flex items-center gap-1 text-2xl font-black tracking-tighter text-slate-900 transition hover:opacity-70">
                    ESTIMASI<span class="text-blue-600">APP</span><span
                        class="text-blue-600 text-3xl leading-none">.</span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#fitur"
                        class="text-sm font-bold text-slate-600 hover:text-slate-900 transition duration-300">Features</a>
                    <a href="#cara-kerja"
                        class="text-sm font-bold text-slate-600 hover:text-slate-900 transition duration-300">How it
                        Works</a>

                    <div class="h-4 w-px bg-slate-300"></div>

                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-extrabold text-blue-600 hover:text-blue-800 transition flex items-center gap-1 group">
                        Dashboard <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-bold text-slate-600 hover:text-slate-900 transition">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-sm font-bold rounded-full transition transform hover:-translate-y-0.5 shadow-lg shadow-slate-900/20 active:scale-95">
                        Mulai Gratis
                    </a>
                    @endif
                    @endauth
                    @endif
                </div>

                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-900 focus:outline-none p-2">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden pt-6 pb-4">
                <div class="flex flex-col space-y-4 px-2">
                    <a href="#fitur" class="text-base font-bold text-slate-600">Features</a>
                    <a href="#cara-kerja" class="text-base font-bold text-slate-600">How it Works</a>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-base font-extrabold text-blue-600 mt-4 border-t border-slate-200 pt-4">Dashboard
                        Saya &rarr;</a>
                    @else
                    <div class="border-t border-slate-200 pt-6 flex flex-col gap-3">
                        <a href="{{ route('login') }}"
                            class="text-center px-6 py-3.5 border-2 border-slate-200 text-slate-900 text-sm font-bold rounded-2xl">Masuk</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-center px-6 py-3.5 bg-slate-900 text-white text-sm font-bold rounded-2xl shadow-md">Daftar
                            Akun Baru</a>
                        @endif
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </nav>
    </div>

    <section class="relative min-h-[90vh] flex flex-col justify-center items-center pt-32 pb-20 overflow-hidden">
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up"
            data-aos-duration="1000">

            <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 text-xs font-bold tracking-widest text-blue-700 uppercase bg-blue-100/50 backdrop-blur-md border border-blue-200/50 rounded-full"
                data-aos="zoom-in" data-aos-delay="200">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                Rule-Based System Skripsi
            </div>

            <h1
                class="text-[3.5rem] md:text-[5.5rem] lg:text-[6.5rem] font-black text-slate-900 leading-[1] tracking-tighter mb-8">
                Rencanakan RAB.<br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600">Tanpa
                    Overbudget.</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto mb-12 leading-relaxed font-medium"
                data-aos="fade-up" data-aos-delay="300">
                Tinggalkan spreadsheet manual. Kalkulasi anggaran bangunan Anda menggunakan kecerdasan buatan berbasis
                <strong>Rule-Based</strong> dan pantau gap analisis secara real-time.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-4" data-aos="fade-up"
                data-aos-delay="400">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="w-full sm:w-auto px-8 py-4 bg-slate-900 hover:bg-slate-800 text-white text-sm font-extrabold rounded-full shadow-[0_10px_40px_rgba(15,23,42,0.3)] transition transform hover:-translate-y-1 flex items-center justify-center gap-2 group">
                    Buka Ruang Kerja
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
                @else
                <a href="{{ route('register') }}"
                    class="w-full sm:w-auto px-10 py-4 bg-slate-900 hover:bg-slate-800 text-white text-sm font-extrabold rounded-full shadow-[0_10px_40px_rgba(15,23,42,0.3)] transition transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2 group">
                    Mulai Hitung Gratis
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
                <a href="#fitur"
                    class="w-full sm:w-auto px-10 py-4 bg-white/60 backdrop-blur-md text-slate-900 text-sm font-extrabold border border-slate-200 hover:border-slate-300 hover:bg-white rounded-full shadow-sm transition transform hover:-translate-y-1">
                    Lihat Cara Kerja
                </a>
                @endauth
            </div>
        </div>

        <div class="relative w-full max-w-5xl mx-auto mt-20 px-4" data-aos="fade-up" data-aos-delay="600">
            <div
                class="aspect-[21/9] md:aspect-[21/8] bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] shadow-2xl p-4 overflow-hidden relative">
                <div class="flex gap-2 mb-6">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                    <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                </div>
                <div class="flex gap-6 h-full">
                    <div class="w-1/4 h-32 bg-white/60 rounded-2xl border border-white/50 hidden md:block"></div>
                    <div class="flex-1 flex flex-col gap-4">
                        <div class="w-1/3 h-6 bg-slate-800/10 rounded-full"></div>
                        <div class="w-full h-24 bg-blue-600/10 rounded-2xl border border-blue-600/10"></div>
                        <div class="w-full h-24 bg-white/60 rounded-2xl border border-white/50"></div>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-[#F8F9FA] to-transparent"></div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-32 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter mb-4">Sistem Cerdas.<br>Dalam
                    Satu Platform.</h2>
                <p class="text-slate-500 font-medium max-w-xl mx-auto">Dirancang khusus untuk memberikan efisiensi
                    tinggi dalam perencanaan finansial proyek pembangunan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="md:col-span-2 bg-white p-10 sm:p-12 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:border-blue-100 hover:shadow-[0_8px_30px_rgba(37,99,235,0.08)] transition duration-500 group flex flex-col justify-between overflow-hidden relative"
                    data-aos="fade-up">
                    <div
                        class="absolute -right-10 -bottom-10 w-64 h-64 bg-blue-50 rounded-full blur-3xl group-hover:bg-blue-100 transition duration-700">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-600/30 transform group-hover:-rotate-6 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">Kalkulasi Rule-Based</h3>
                        <p class="text-slate-500 font-medium leading-relaxed max-w-md">Sistem otomatis menghitung
                            estimasi dasar harga material & upah tukang berdasarkan parameter kualitas bangunan
                            (Sederhana, Menengah, Mewah) yang diinputkan.</p>
                    </div>
                </div>

                <div class="bg-slate-900 p-10 sm:p-12 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-800 hover:border-indigo-500/50 transition duration-500 group relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-2xl group-hover:bg-indigo-500/40 transition duration-700">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-white/10 text-white border border-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-8 transform group-hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 tracking-tight">Gap Analysis Real-time</h3>
                        <p class="text-slate-400 font-medium leading-relaxed text-sm">Bandingkan langsung anggaran dari
                            sistem dengan pengeluaran belanja aktual. Pantau status Overbudget secara presisi.</p>
                    </div>
                </div>

                <div class="md:col-span-3 bg-white p-10 sm:p-12 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col md:flex-row items-center gap-10 hover:shadow-[0_8px_30px_rgba(37,99,235,0.08)] transition duration-500 group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="flex-1">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 mb-6 text-xs font-bold text-emerald-700 uppercase bg-emerald-50 border border-emerald-100 rounded-lg">
                            Ekspor Sekali Klik
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">Generasi Laporan PDF</h3>
                        <p class="text-slate-500 font-medium leading-relaxed max-w-xl">Cetak dokumen RAB, riwayat
                            belanja, dan laporan analisis perbandingan untuk diserahkan kepada pihak kontraktor atau
                            dosen penguji dengan format yang sangat profesional.</p>
                    </div>
                    <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                        <div
                            class="w-32 h-32 bg-slate-50 rounded-full border-8 border-white shadow-xl flex items-center justify-center text-slate-300 group-hover:text-emerald-500 group-hover:bg-emerald-50 transition duration-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-16">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <div class="text-2xl font-black tracking-tighter text-slate-900 mb-1">
                    ESTIMASI<span class="text-blue-600">APP</span><span class="text-blue-600">.</span>
                </div>
                <p class="text-sm font-medium text-slate-500">Sistem Informasi Estimasi & Manajemen Konstruksi.</p>
            </div>
            <div class="text-sm text-slate-400 font-medium text-center md:text-right">
                &copy; {{ date('Y') }} Muhammad Albar.<br>Dibuat untuk kebutuhan Skripsi.
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        once: true,
        offset: 50,
        duration: 800,
        easing: 'ease-out-cubic',
    });
    </script>
</body>

</html>