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
                                <a href="{{ route('admin.pricing.index') }}"
                                    class="ml-2 text-slate-400 hover:text-slate-600 font-medium transition">Master
                                    Harga</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2 text-emerald-600 font-semibold">Ubah Data</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Update Harga Tipe: <span class="uppercase text-emerald-600">{{ $pricing->house_type }}</span>
                </h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">
                    Pastikan angka yang dimasukkan valid tanpa titik/koma pemisah ribuan.
                </p>
            </div>

            <div>
                <a href="{{ route('admin.pricing.index') }}"
                    class="inline-flex items-center gap-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 px-5 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition">
                    &larr; Batal & Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">

                <form method="POST" action="{{ route('admin.pricing.update', $pricing->id) }}"
                    class="p-6 sm:p-8 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                        <x-input-label for="base_price_per_m2" :value="__('Harga Dasar per Meter Persegi')"
                            class="text-sm font-bold text-slate-700 mb-2" />
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-500 font-semibold sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="base_price_per_m2" id="base_price_per_m2" min="0"
                                class="block w-full pl-12 pr-4 py-3 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-lg font-bold"
                                value="{{ old('base_price_per_m2', $pricing->base_price_per_m2) }}" required>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Biaya konstruksi utama per meter persegi (Struktur, Atap,
                            Lantai).</p>
                        <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('base_price_per_m2')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="bed_additional_cost" :value="__('Ekstra Biaya Kamar Tidur')"
                                class="text-sm font-semibold text-slate-700 mb-2" />
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 sm:text-sm">Rp</span>
                                </div>
                                <input type="number" name="bed_additional_cost" id="bed_additional_cost" min="0"
                                    class="block w-full pl-10 pr-3 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm font-semibold"
                                    value="{{ old('bed_additional_cost', $pricing->bed_additional_cost) }}" required>
                            </div>
                            <x-input-error class="mt-2 text-xs font-bold"
                                :messages="$errors->get('bed_additional_cost')" />
                        </div>

                        <div>
                            <x-input-label for="bath_additional_cost" :value="__('Ekstra Biaya Kamar Mandi')"
                                class="text-sm font-semibold text-slate-700 mb-2" />
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 sm:text-sm">Rp</span>
                                </div>
                                <input type="number" name="bath_additional_cost" id="bath_additional_cost" min="0"
                                    class="block w-full pl-10 pr-3 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm font-semibold"
                                    value="{{ old('bath_additional_cost', $pricing->bath_additional_cost) }}" required>
                            </div>
                            <x-input-error class="mt-2 text-xs font-bold"
                                :messages="$errors->get('bath_additional_cost')" />
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-200 flex items-center justify-between">
                        <div class="text-xs text-slate-500">
                            Terakhir diubah: <span
                                class="font-semibold text-slate-700">{{ $pricing->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                        <button type="submit"
                            class="bg-slate-900 hover:bg-slate-800 text-white px-6 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan Pembaruan Harga
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>