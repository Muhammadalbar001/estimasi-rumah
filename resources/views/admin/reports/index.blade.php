<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-end gap-6 border-b border-slate-200 pb-6"
            data-aos="fade-down" data-aos-duration="600">
            <div>
                <nav class="flex text-sm text-slate-500 mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-slate-400 hover:text-slate-600 font-medium transition">Admin Panel</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2 text-emerald-600 font-semibold">Pusat Laporan</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Pusat Ekspor & Pelaporan
                </h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">
                    Cetak dokumen resmi untuk keperluan analisis operasional, tinjauan anggaran, dan statistik sistem.
                </p>
            </div>

            <div class="hidden md:block">
                <span
                    class="inline-flex items-center gap-2 bg-slate-100 text-slate-600 px-4 py-2 rounded-lg text-sm font-semibold border border-slate-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                        </path>
                    </svg>
                    Format Cetak: PDF
                </span>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5 mb-8 flex items-start gap-4 shadow-sm"
                data-aos="fade-up" data-aos-delay="100">
                <div class="p-2 bg-blue-100 text-blue-600 rounded-lg shrink-0 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-blue-900">Petunjuk Cetak Dokumen</h3>
                    <p class="text-sm text-blue-700 mt-1 leading-relaxed">
                        Pilih jenis laporan dari modul di bawah ini. Dokumen akan langsung dibuat (*generated*) oleh
                        sistem dan dibuka pada tab browser baru. Harap pastikan fitur pemblokir *pop-up* (*pop-up
                        blocker*) pada browser Anda sudah dinonaktifkan.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="p-6 border-b border-slate-100 flex items-center gap-3">
                        <div class="p-2.5 bg-slate-100 text-slate-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-900 leading-tight">Operasional Proyek</h3>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Kategori A</p>
                        </div>
                    </div>
                    <div class="p-2 flex-1">
                        <ul class="divide-y divide-slate-100">
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Laporan Rekapitulasi Proyek</span>
                                <a target="_blank" href="{{ route('admin.reports.print.recap') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Laporan Status Pemantauan</span>
                                <a target="_blank" href="{{ route('admin.reports.print.status') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Detail RAB (Kontekstual)</span>
                                <a href="{{ route('admin.estimations.index') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Pilih Proyek &rarr;
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="p-6 border-b border-slate-100 flex items-center gap-3">
                        <div class="p-2.5 bg-slate-100 text-slate-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-900 leading-tight">Analisis Keuangan</h3>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Kategori B</p>
                        </div>
                    </div>
                    <div class="p-2 flex-1">
                        <ul class="divide-y divide-slate-100">
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Komparasi (Gap Analysis)</span>
                                <a target="_blank" href="{{ route('admin.reports.print.gap_analysis') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Anggaran Tertinggi & Terendah</span>
                                <a target="_blank" href="{{ route('admin.reports.print.extremes') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="p-6 border-b border-slate-100 flex items-center gap-3">
                        <div class="p-2.5 bg-slate-100 text-slate-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-900 leading-tight">Statistik & Analitik</h3>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Kategori C</p>
                        </div>
                    </div>
                    <div class="p-2 flex-1">
                        <ul class="divide-y divide-slate-100">
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Tren Pemilihan Tipe Rumah</span>
                                <a target="_blank" href="{{ route('admin.reports.print.house_trend') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Tingkat Popularitas Material</span>
                                <a target="_blank" href="{{ route('admin.reports.print.material_popularity') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Riwayat Fluktuasi Harga</span>
                                <a target="_blank" href="{{ route('admin.reports.print.price_fluctuation') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                            <li
                                class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 rounded-xl transition">
                                <span class="text-sm font-semibold text-slate-700">Data Aktivitas Pengguna</span>
                                <a target="_blank" href="{{ route('admin.reports.print.user_activity') }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition shadow-sm shrink-0">
                                    Cetak PDF
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>