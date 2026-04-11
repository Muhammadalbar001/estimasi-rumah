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
                                <span class="ml-2 text-emerald-600 font-semibold">Master Harga</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Konfigurasi Rule-Based
                </h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">
                    Kelola parameter dasar estimasi harga berdasarkan tipe rumah. Perubahan akan berlaku pada pembuatan
                    RAB baru.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl shadow-sm font-semibold flex items-center gap-3"
                data-aos="zoom-in">
                <div class="p-1.5 bg-emerald-100 rounded-lg">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">
                <div class="px-6 py-5 border-b border-slate-200 flex justify-between items-center bg-white">
                    <h3 class="font-bold text-lg text-slate-900">Daftar Standar Harga</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead
                            class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-200 font-semibold">
                            <tr>
                                <th class="px-6 py-4">Tipe Rumah</th>
                                <th class="px-6 py-4 text-right">Harga Dasar (/m²)</th>
                                <th class="px-6 py-4 text-right">Biaya Tambah KT</th>
                                <th class="px-6 py-4 text-right">Biaya Tambah KM</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($pricings as $item)
                            <tr class="hover:bg-slate-50 transition duration-200">
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider {{ $item->house_type === 'mewah' ? 'bg-purple-100 text-purple-700 border border-purple-200' : ($item->house_type === 'menengah' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 'bg-slate-100 text-slate-700 border border-slate-200') }}">
                                        {{ $item->house_type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-base font-bold text-slate-900">Rp
                                        {{ number_format($item->base_price_per_m2, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-sm font-medium text-slate-600">Rp
                                        {{ number_format($item->bed_additional_cost, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-sm font-medium text-slate-600">Rp
                                        {{ number_format($item->bath_additional_cost, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.pricing.edit', $item->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-300 text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 rounded-lg text-xs font-semibold transition shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                        </svg>
                                        Edit
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