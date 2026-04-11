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
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Arsip Dokumen
                    </div>

                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
                        Riwayat <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">RAB
                            Saya</span> 📂
                    </h2>
                    <p class="text-xs text-slate-400 font-medium max-w-xl leading-relaxed">
                        Kelola dan pantau seluruh dokumen perencanaan pembangunan rumah Anda yang telah tersimpan di
                        dalam sistem.
                    </p>
                </div>

                <div class="shrink-0">
                    <a href="{{ route('estimations.create') }}"
                        class="inline-flex items-center justify-center w-full sm:w-auto gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] text-xs font-black uppercase tracking-widest transition transform hover:-translate-y-0.5 active:scale-95 border border-blue-500/50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Buat Estimasi Baru
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="pb-10 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($estimations->isEmpty())
            <div class="bg-white rounded-2xl border-2 border-dashed border-slate-200 p-10 text-center flex flex-col items-center justify-center transition hover:border-blue-300 hover:bg-blue-50/30 group"
                data-aos="zoom-in" data-aos-delay="100">
                <div
                    class="w-20 h-20 bg-slate-50 text-slate-400 group-hover:bg-blue-100 group-hover:text-blue-600 rounded-full flex items-center justify-center mb-5 shadow-inner transition transform group-hover:scale-110">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-1">Belum Ada Riwayat Proyek</h3>
                <p class="text-slate-500 text-xs font-medium max-w-sm mx-auto mb-6 leading-relaxed">
                    Anda belum memiliki data estimasi anggaran yang tersimpan. Ayo mulai buat perencanaan pertama Anda.
                </p>
                <a href="{{ route('estimations.create') }}"
                    class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-6 rounded-lg shadow-sm transition transform active:scale-95 text-xs uppercase tracking-widest">
                    Mulai Hitung RAB Sekarang
                </a>
            </div>
            @else
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead
                            class="text-[10px] text-slate-500 uppercase tracking-widest font-black bg-slate-50/80 border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4">Info Proyek</th>
                                <th class="px-6 py-4">Spesifikasi</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-right">Estimasi RAB</th>
                                <th class="px-6 py-4 text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($estimations as $est)
                            <tr class="hover:bg-blue-50/40 transition duration-200 group">

                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800 text-sm group-hover:text-blue-700 transition">
                                        {{ $est->project_name }}</div>
                                    <div class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">
                                        {{ $est->created_at->format('d M Y') }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1.5 items-start">
                                        <span class="px-2.5 py-0.5 text-[9px] font-black uppercase tracking-widest rounded border 
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
                                            {{ $est->building_area }} m² &bull; {{ $est->bed_count }} KT &bull;
                                            {{ $est->bath_count }} KM
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @php
                                    $statusClasses = [
                                    'perencanaan' => 'bg-amber-50 text-amber-600 border-amber-200',
                                    'pembangunan' => 'bg-blue-50 text-blue-600 border-blue-200',
                                    'selesai' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                                    'dibatalkan' => 'bg-red-50 text-red-600 border-red-200',
                                    ];
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-md text-[9px] font-black uppercase tracking-widest border {{ $statusClasses[$est->status] ?? 'bg-slate-100 text-slate-600 border-slate-200' }}">
                                        {{ $est->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <span class="text-base font-bold text-slate-800">
                                        Rp {{ number_format($est->grand_total, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('estimations.show', $est->id) }}"
                                            class="p-2 bg-slate-100 text-slate-500 hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 border border-transparent rounded-lg transition duration-200 shadow-sm"
                                            title="Lihat Detail & Input Material">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a target="_blank" href="{{ route('estimations.print', $est->id) }}"
                                            class="p-2 bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white border border-transparent rounded-lg transition duration-200 shadow-sm"
                                            title="Cetak PDF">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
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