<x-admin-layout>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <x-slot name="header">
        <div class="flex justify-between items-center" data-aos="fade-down">
            <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
                {{ __('System Overview') }}
            </h2>
            <div class="text-sm font-medium text-slate-500 bg-slate-200 px-4 py-1.5 rounded-full">
                {{ date('d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-blue-100 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Users</span>
                    </div>
                    <div class="text-2xl font-black text-slate-800">{{ number_format($stats['total_users']) }}</div>
                    <div class="text-xs text-slate-500 mt-1">Pengguna Terdaftar</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-emerald-100 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">RAB</span>
                    </div>
                    <div class="text-2xl font-black text-slate-800">{{ number_format($stats['total_estimations']) }}
                    </div>
                    <div class="text-xs text-slate-500 mt-1">Proyek Dihitung</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-purple-100 text-purple-600 rounded-2xl group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Budget</span>
                    </div>
                    <div class="text-xl font-black text-slate-800">Rp
                        {{ number_format($stats['total_budget'] / 1000000, 1) }}M</div>
                    <div class="text-xs text-slate-500 mt-1">Total Nilai Proyek</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-amber-100 text-amber-600 rounded-2xl group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Actual</span>
                    </div>
                    <div class="text-2xl font-black text-slate-800">{{ number_format($stats['total_items']) }}</div>
                    <div class="text-xs text-slate-500 mt-1">Item Belanja Input</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden"
                    data-aos="fade-right">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <h3 class="font-bold text-slate-800">Riwayat Estimasi Terbaru</h3>
                        <a href="{{ route('admin.estimations.index') }}"
                            class="text-xs font-bold text-blue-600 hover:text-blue-800 transition">Lihat Semua
                            &rarr;</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-slate-400 uppercase bg-slate-50/50">
                                <tr>
                                    <th class="px-6 py-4 font-bold">Proyek</th>
                                    <th class="px-6 py-4 font-bold">User</th>
                                    <th class="px-6 py-4 font-bold text-right">Nilai RAB</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($stats['recent_estimations'] as $est)
                                <tr class="hover:bg-slate-50 transition duration-200">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-800">{{ $est->project_name }}</div>
                                        <div class="text-xs text-slate-400">{{ $est->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">{{ $est->user->name ?? 'Anonim' }}</td>
                                    <td class="px-6 py-4 text-right font-black text-blue-600">Rp
                                        {{ number_format($est->grand_total, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-slate-400 italic">Belum ada
                                        aktivitas.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="space-y-6" data-aos="fade-left">
                    <div class="bg-slate-900 rounded-3xl p-8 shadow-2xl relative overflow-hidden group">
                        <div class="relative z-10">
                            <h3 class="text-white font-black text-xl mb-6 tracking-tight">Pusat Laporan</h3>
                            <p class="text-slate-400 text-sm mb-8 leading-relaxed">Generate 8+ jenis laporan skripsi
                                secara instan dalam format PDF yang profesional.</p>
                            <a href="{{ route('admin.reports.index') }}"
                                class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-500/30 transition duration-300 transform active:scale-95">
                                Buka Menu Laporan
                            </a>
                        </div>
                        <div
                            class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-600/10 rounded-full group-hover:scale-150 transition duration-700">
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200">
                        <h3 class="text-slate-800 font-bold mb-4">Pengaturan Harga</h3>
                        <p class="text-slate-500 text-xs mb-6 leading-relaxed">Perbarui aturan harga dasar m2 atau
                            tambahan ruang (Rule-Based) sesuai kondisi pasar terbaru.</p>
                        <a href="{{ route('admin.pricing.index') }}"
                            class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800">
                            Kelola Aturan Harga &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        once: true
    });
    </script>
</x-admin-layout>