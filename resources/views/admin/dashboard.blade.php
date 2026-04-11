<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-end gap-6 border-b border-slate-200 pb-6"
            data-aos="fade-down" data-aos-duration="600">
            <div>
                <nav class="flex text-sm text-slate-500 mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <span class="text-slate-400 font-medium">Admin Panel</span>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2 text-emerald-600 font-semibold">Overview</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Dashboard Administrasi
                </h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">
                    Ringkasan performa sistem, aktivitas pengguna, dan manajemen data Rencana Anggaran Biaya (RAB).
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div
                    class="hidden sm:flex items-center gap-2 bg-white border border-slate-200 text-slate-600 px-4 py-2.5 rounded-lg shadow-sm text-sm font-semibold">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ date('d F Y') }}
                </div>
                <a href="{{ route('admin.reports.index') }}"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Pusat Laporan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold text-slate-500">Total Pengguna</span>
                        <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-800">{{ number_format($stats['total_users']) }}</div>
                    <div class="text-xs text-emerald-600 font-medium mt-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        Akun terdaftar aktif
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold text-slate-500">Proyek Direncanakan</span>
                        <div class="p-2.5 bg-blue-50 text-blue-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-800">{{ number_format($stats['total_estimations']) }}
                    </div>
                    <div class="text-xs text-slate-400 font-medium mt-2">RAB yang dihitung sistem</div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold text-slate-500">Estimasi Anggaran</span>
                        <div class="p-2.5 bg-purple-50 text-purple-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-2xl font-extrabold text-slate-800 truncate"
                        title="Rp {{ number_format($stats['total_budget'], 0, ',', '.') }}">
                        {{ number_format($stats['total_budget'] / 1000000, 1) }}<span
                            class="text-lg text-slate-500 font-bold ml-1">Miliar</span>
                    </div>
                    <div class="text-xs text-slate-400 font-medium mt-2">Total perputaran nilai</div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition duration-300"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold text-slate-500">Rekap Material</span>
                        <div class="p-2.5 bg-amber-50 text-amber-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-800">{{ number_format($stats['total_items']) }}</div>
                    <div class="text-xs text-slate-400 font-medium mt-2">Item belanja dimasukkan</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="500">
                    <div class="px-6 py-5 border-b border-slate-200 flex justify-between items-center bg-white">
                        <h3 class="font-bold text-lg text-slate-900">Aktivitas Terbaru</h3>
                        <a href="{{ route('admin.estimations.index') }}"
                            class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition">Lihat
                            Detail &rarr;</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead
                                class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-200 font-semibold">
                                <tr>
                                    <th class="px-6 py-4">Nama Proyek</th>
                                    <th class="px-6 py-4">Pengguna</th>
                                    <th class="px-6 py-4 text-right">Nilai Estimasi</th>
                                    <th class="px-6 py-4 text-center">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($stats['recent_estimations'] as $est)
                                <tr class="hover:bg-slate-50 transition duration-200">
                                    <td class="px-6 py-4 font-semibold text-slate-800">
                                        {{ $est->project_name }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">
                                        {{ $est->user->name ?? 'Anonim' }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-slate-900">
                                        Rp {{ number_format($est->grand_total, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-xs text-slate-500">
                                        {{ $est->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                                        Belum ada data aktivitas proyek.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="space-y-6" data-aos="fade-up" data-aos-delay="600">

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-slate-100 text-slate-600 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-slate-900 font-bold text-base">Konfigurasi Harga</h3>
                                <p class="text-slate-500 text-sm mt-1 mb-3">Pembaruan parameter dasar <i>Rule-Based
                                        System</i>.</p>
                                <a href="{{ route('admin.pricing.index') }}"
                                    class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition">
                                    Kelola Master Harga &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-slate-100 text-slate-600 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-slate-900 font-bold text-base">Manajemen Akses</h3>
                                <p class="text-slate-500 text-sm mt-1 mb-3">Kelola kredensial akun dan hak akses (Role).
                                </p>
                                <a href="{{ route('admin.users.index') }}"
                                    class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition">
                                    Kelola Pengguna &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>