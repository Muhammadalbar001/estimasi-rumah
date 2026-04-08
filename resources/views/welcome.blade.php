<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Estimasi Pembangunan Rumah</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    </style>
</head>

<body class="font-sans antialiased text-slate-900 bg-slate-100 overflow-x-hidden">

    <nav id="navbar" class="fixed w-full z-50 top-0 transition-all duration-500 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-extrabold text-2xl text-blue-400 tracking-wider drop-shadow-sm">ESTIMASI<span
                            class="text-white">APP</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-slate-200 hover:text-blue-400 font-medium transition duration-300">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-slate-200 hover:text-blue-400 font-medium transition duration-300">Masuk</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2.5 px-6 rounded-full shadow-lg transition duration-300 transform hover:scale-105 active:scale-95">Daftar
                        Sekarang</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center pt-20 bg-slate-900 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob">
            </div>
            <div
                class="absolute top-1/2 -right-24 w-96 h-96 bg-emerald-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up"
            data-aos-duration="1000">
            <div
                class="inline-flex items-center px-4 py-2 mb-8 text-sm font-medium text-blue-300 bg-blue-900/40 rounded-full border border-blue-500/30">
                <span class="relative flex h-3 w-3 mr-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                </span>
                Sistem Pendukung Keputusan Skripsi
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-8">
                Ciptakan Anggaran Proyek <br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-blue-200 to-emerald-400">Secara
                    Profesional</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto mb-12 leading-relaxed">
                Platform cerdas berbasis <strong>Rule-Based</strong> untuk transparansi biaya pembangunan rumah impian
                Anda.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('register') }}"
                    class="px-10 py-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-xl shadow-2xl transition duration-300 transform hover:-translate-y-1">Mulai
                    Sekarang</a>
                <a href="#fitur"
                    class="px-10 py-4 glass-effect text-white font-bold rounded-xl hover:bg-white/10 transition duration-300">Pelajari
                    Fitur</a>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto -mt-16 px-4 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="zoom-in" data-aos-delay="200">
            <div
                class="bg-white/80 backdrop-blur-md p-10 rounded-2xl shadow-xl text-center border border-white hover-lift">
                <div class="text-4xl font-black text-slate-800 mb-2">100%</div>
                <div class="text-xs font-bold text-blue-600 uppercase tracking-widest">Akurasi Perhitungan</div>
            </div>
            <div
                class="bg-white/80 backdrop-blur-md p-10 rounded-2xl shadow-xl text-center border border-white hover-lift">
                <div class="text-4xl font-black text-slate-800 mb-2">Analitik</div>
                <div class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Gap Comparison</div>
            </div>
            <div
                class="bg-white/80 backdrop-blur-md p-10 rounded-2xl shadow-xl text-center border border-white hover-lift">
                <div class="text-4xl font-black text-slate-800 mb-2">PDF</div>
                <div class="text-xs font-bold text-purple-600 uppercase tracking-widest">Cetak Laporan</div>
            </div>
        </div>
    </div>

    <section id="fitur" class="py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Teknologi Di Balik Aplikasi</h2>
                <p class="text-slate-500 max-w-xl mx-auto">Kami mengintegrasikan aturan teknis ke dalam algoritma yang
                    mudah digunakan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="relative group p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover-lift"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-200 text-white transform group-hover:rotate-6 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Rule-Based Management</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">Logika sistem yang mengikuti standar harga dan
                        spesifikasi material terbaru sesuai aturan yang ditetapkan Admin.</p>
                </div>

                <div class="relative group p-8 rounded-3xl bg-slate-900 shadow-2xl hover-lift" data-aos="fade-up"
                    data-aos-delay="200">
                    <div
                        class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-emerald-900/50 text-white transform group-hover:rotate-6 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Gap Analysis Tool</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Fitur unggulan untuk membandingkan biaya teoritis
                        dengan realita belanja material di toko bangunan pilihan Anda.</p>
                </div>

                <div class="relative group p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover-lift"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-purple-200 text-white transform group-hover:rotate-6 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Export Multi-Report</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">Dapatkan 8+ jenis laporan analisis dalam format
                        PDF yang siap dicetak untuk presentasi atau monitoring proyek.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="text-2xl font-black mb-8 tracking-tighter">ESTIMASI<span class="text-blue-500">APP</span></div>
            <p class="text-slate-500 text-sm max-w-md mx-auto mb-10">Dikembangkan untuk menyederhanakan proses estimasi
                biaya konstruksi secara digital dan akurat.</p>
            <div class="pt-10 border-t border-slate-900 text-slate-600 text-xs">
                &copy; {{ date('Y') }} Muhammad Albar - Tugas Akhir Sistem Informasi.
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    // Inisialisasi AOS
    AOS.init({
        once: true,
        duration: 800
    });

    // Efek Scroll Navbar
    window.onscroll = function() {
        const nav = document.getElementById('navbar');
        if (window.pageYOffset > 50) {
            nav.classList.add('bg-slate-900', 'shadow-2xl', 'py-3');
            nav.classList.remove('py-4');
        } else {
            nav.classList.remove('bg-slate-900', 'shadow-2xl', 'py-3');
            nav.classList.add('py-4');
        }
    };
    </script>
</body>

</html>