<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4" data-aos="fade-down">
            <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
                {{ __('Riwayat RAB Saya') }}
            </h2>
            <a href="{{ route('estimations.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-2xl text-sm shadow-xl shadow-blue-200 transition transform active:scale-95">
                + Buat Estimasi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up">
                <div class="p-8 border-b border-slate-50 bg-slate-50/30">
                    <p class="text-sm text-slate-500 font-medium">Kelola dan pantau seluruh perencanaan pembangunan
                        rumah Anda di satu tempat.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-[10px] text-slate-400 uppercase tracking-widest bg-slate-50/50">
                            <tr>
                                <th class="px-6 py-5">Info Proyek</th>
                                <th class="px-6 py-5">Spesifikasi</th>
                                <th class="px-6 py-5 text-center">Status</th>
                                <th class="px-6 py-5 text-right">Estimasi RAB</th>
                                <th class="px-6 py-5 text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($estimations as $est)
                            <tr class="hover:bg-blue-50/30 transition duration-200">
                                <td class="px-6 py-6">
                                    <div class="font-black text-slate-800 text-base">{{ $est->project_name }}</div>
                                    <div class="text-[10px] text-slate-400 mt-1 uppercase font-bold">
                                        {{ $est->created_at->format('d M Y | H:i') }}</div>
                                </td>
                                <td class="px-6 py-6">
                                    <span
                                        class="inline-block px-2 py-1 bg-slate-100 text-slate-600 rounded text-[10px] font-black uppercase mb-1">{{ $est->house_type }}</span>
                                    <div class="text-slate-500 text-xs">{{ $est->building_area }} m² •
                                        {{ $est->bed_count }} KT • {{ $est->bath_count }} KM</div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    @php
                                    $statusClasses = [
                                    'perencanaan' => 'bg-amber-100 text-amber-700 border-amber-200',
                                    'pembangunan' => 'bg-blue-100 text-blue-700 border-blue-200',
                                    'selesai' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                    'dibatalkan' => 'bg-red-100 text-red-700 border-red-200',
                                    ];
                                    @endphp
                                    <span
                                        class="px-3 py-1 rounded-full text-[10px] font-black uppercase border {{ $statusClasses[$est->status] ?? 'bg-slate-100' }}">
                                        {{ $est->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-right font-black text-slate-800 text-base">
                                    Rp {{ number_format($est->grand_total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('estimations.show', $est->id) }}"
                                            class="p-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a target="_blank" href="{{ route('estimations.print', $est->id) }}"
                                            class="p-2 bg-slate-800 text-white rounded-xl hover:bg-blue-600 transition duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="text-slate-400 font-medium italic">Belum ada riwayat estimasi.</p>
                                        <a href="{{ route('estimations.create') }}"
                                            class="mt-4 text-blue-600 font-bold hover:underline">Mulai hitung sekarang
                                            &rarr;</a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>