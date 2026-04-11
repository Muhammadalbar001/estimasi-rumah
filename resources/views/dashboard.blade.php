<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-slate-900 rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-800 mt-2"
            data-aos="fade-down" data-aos-duration="600">
            <div
                class="absolute -right-10 -top-10 w-60 h-60 bg-blue-500/20 rounded-full blur-[3rem] pointer-events-none">
            </div>
            <div
                class="absolute -left-10 -bottom-10 w-60 h-60 bg-indigo-500/20 rounded-full blur-[3rem] pointer-events-none">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-widest mb-3 backdrop-blur-sm">
                        <svg class="w-3 h-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                        Ruang Kerja
                    </div>

                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
                        Halo, <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">{{ explode(' ', Auth::user()->name)[0] }}!</span>
                        👋
                    </h2>
                    <p class="text-xs text-slate-400 font-medium max-w-xl leading-relaxed">
                        Pantau rencana anggaran proyek Anda dan kendalikan pengeluaran material lapangan agar terhindar
                        dari *overbudget*.
                    </p>
                </div>

                <div class="shrink-0">
                    <a href="{{ route('estimations.create') }}"
                        class="inline-flex items-center justify-center w-full sm:w-auto gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] text-xs font-black uppercase tracking-widest transition transform hover:-translate-y-0.5 active:scale-95 border border-blue-500/50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Buat RAB Baru
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="pb-10 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-4" data-aos="fade-up" data-aos-delay="100">
                <h3 class="font-bold text-lg text-slate-800">Riwayat Proyek Terbaru</h3>
                @if(!$recentEstimations->isEmpty())
                <a href="{{ route('estimations.index') }}"
                    class="text-[10px] font-black uppercase tracking-widest text-blue-600 hover:text-blue-800 transition flex items-center gap-1 bg-blue-50 px-3 py-1.5 rounded-full">
                    Lihat Semua &rarr;
                </a>
                @endif
            </div>

            @if($recentEstimations->isEmpty())
            <div class="bg-white rounded-2xl border-2 border-dashed border-slate-200 p-8 text-center flex flex-col items-center justify-center transition hover:border-blue-300 hover:bg-blue-50/30 group"
                data-aos="zoom-in" data-aos-delay="200">
                <div
                    class="w-16 h-16 bg-slate-50 text-slate-400 group-hover:bg-blue-100 group-hover:text-blue-600 rounded-full flex items-center justify-center mb-4 shadow-inner transition transform group-hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-1">Belum Ada Data Proyek</h3>
                <p class="text-slate-500 text-xs font-medium max-w-sm mx-auto mb-6 leading-relaxed">
                    Anda belum pernah membuat Rencana Anggaran Biaya. Mulai rencanakan proyek Anda sekarang.
                </p>
                <a href="{{ route('estimations.create') }}"
                    class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-6 rounded-lg shadow-sm transition transform active:scale-95 text-xs uppercase tracking-widest">
                    Hitung RAB Pertama
                </a>
            </div>
            @else
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead
                            class="text-[10px] text-slate-500 uppercase tracking-widest font-black bg-slate-50/80 border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4">Identitas Proyek</th>
                                <th class="px-6 py-4">Spesifikasi</th>
                                <th class="px-6 py-4 text-right">Total Anggaran</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recentEstimations as $est)
                            <tr class="hover:bg-blue-50/40 transition duration-200 group">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800 text-sm group-hover:text-blue-700 transition">
                                        {{ $est->project_name }}</div>
                                    <div class="text-[10px] text-slate-400 mt-0.5">
                                        Dibuat: {{ $est->created_at->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1 items-start">
                                        <span class="px-2 py-0.5 text-[9px] font-black uppercase tracking-widest rounded border 
                                                {{ $est->house_type === 'mewah' ? 'bg-purple-50 text-purple-600 border-purple-200' : 
                                                ($est->house_type === 'menengah' ? 'bg-emerald-50 text-emerald-600 border-emerald-200' : 
                                                'bg-slate-100 text-slate-600 border-slate-200') }}">
                                            Tipe {{ $est->house_type }}
                                        </span>
                                        <span
                                            class="text-[11px] font-semibold text-slate-500 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                                                </path>
                                            </svg>
                                            Luas: {{ $est->building_area }} m²
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-base font-bold text-slate-800">
                                        Rp {{ number_format($est->grand_total, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('estimations.show', $est->id) }}"
                                        class="inline-flex items-center gap-1 px-4 py-2 bg-white border border-slate-200 text-slate-700 hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200 rounded-lg text-xs font-semibold transition shadow-sm transform active:scale-95">
                                        Buka RAB &rarr;
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>