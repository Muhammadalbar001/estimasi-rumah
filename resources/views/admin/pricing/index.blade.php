<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" data-aos="fade-down">
            <h2 class="font-black text-2xl text-slate-800 leading-tight">Master Aturan Harga</h2>
            <span
                class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">Rule-Based
                Engine</span>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl shadow-lg border-b-4 border-emerald-700 font-bold"
                data-aos="zoom-in">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800 text-lg">Daftar Standar Harga Pembangunan</h3>
                    <p class="text-slate-500 text-sm mt-1">Harga di bawah ini menjadi acuan otomatis sistem saat
                        pengguna membuat estimasi baru.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-400 text-[10px] uppercase tracking-widest border-b">
                            <tr>
                                <th class="px-8 py-5">Tipe Rumah</th>
                                <th class="px-8 py-5 text-right">Harga Dasar (/m²)</th>
                                <th class="px-8 py-5 text-right">Biaya Tambah KT</th>
                                <th class="px-8 py-5 text-right">Biaya Tambah KM</th>
                                <th class="px-8 py-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($pricings as $item)
                            <tr class="hover:bg-blue-50/50 transition duration-200">
                                <td class="px-8 py-6">
                                    <div
                                        class="bg-slate-800 text-white text-xs font-black px-3 py-1 rounded-lg inline-block uppercase tracking-wider shadow-sm">
                                        {{ $item->house_type }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <span class="text-base font-black text-slate-800">Rp
                                        {{ number_format($item->base_price_per_m2, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <span class="text-slate-600 font-bold">Rp
                                        {{ number_format($item->bed_additional_cost, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <span class="text-slate-600 font-bold">Rp
                                        {{ number_format($item->bath_additional_cost, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <a href="{{ route('admin.pricing.edit', $item->id) }}"
                                        class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white w-10 h-10 rounded-xl shadow-lg transition transform active:scale-90">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>