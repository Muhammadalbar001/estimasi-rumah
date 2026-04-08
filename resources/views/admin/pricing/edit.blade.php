<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3" data-aos="fade-down">
            <a href="{{ route('admin.pricing.index') }}"
                class="p-2 bg-white rounded-xl shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="font-black text-2xl text-slate-800 leading-tight">
                Update Standar Harga: <span class="text-blue-600 uppercase">{{ $pricing->house_type }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-200 overflow-hidden" data-aos="zoom-in">
                <div class="bg-slate-800 p-8 text-white">
                    <h3 class="text-lg font-bold">Konfigurasi Rule-Based</h3>
                    <p class="text-slate-400 text-sm mt-1">Pastikan harga yang diinput sesuai dengan harga pasar terbaru
                        di wilayah Anda.</p>
                </div>

                <form method="POST" action="{{ route('admin.pricing.update', $pricing->id) }}" class="p-10 space-y-8">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-6">
                        <div>
                            <x-input-label for="base_price_per_m2" :value="__('Harga Dasar per Meter Persegi')"
                                class="font-bold text-slate-700 ml-1 mb-2" />
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold group-focus-within:text-blue-600 transition">
                                    Rp</div>
                                <input id="base_price_per_m2" name="base_price_per_m2" type="number"
                                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-black text-slate-800 text-lg"
                                    value="{{ old('base_price_per_m2', $pricing->base_price_per_m2) }}" required />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('base_price_per_m2')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="bed_additional_cost" :value="__('Biaya + Kamar Tidur')"
                                    class="font-bold text-slate-700 ml-1 mb-2" />
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold group-focus-within:text-blue-600">
                                        Rp</div>
                                    <input id="bed_additional_cost" name="bed_additional_cost" type="number"
                                        class="block w-full pl-12 pr-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-bold"
                                        value="{{ old('bed_additional_cost', $pricing->bed_additional_cost) }}"
                                        required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('bed_additional_cost')" />
                            </div>

                            <div>
                                <x-input-label for="bath_additional_cost" :value="__('Biaya + Kamar Mandi')"
                                    class="font-bold text-slate-700 ml-1 mb-2" />
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold group-focus-within:text-blue-600">
                                        Rp</div>
                                    <input id="bath_additional_cost" name="bath_additional_cost" type="number"
                                        class="block w-full pl-12 pr-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-bold"
                                        value="{{ old('bath_additional_cost', $pricing->bath_additional_cost) }}"
                                        required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('bath_additional_cost')" />
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs text-slate-400 max-w-[200px]">Terakhir diupdate: <br>
                            {{ $pricing->updated_at->format('d M Y - H:i') }}</span>
                        <x-primary-button
                            class="bg-blue-600 hover:bg-blue-700 px-10 py-4 rounded-2xl shadow-xl shadow-blue-500/20 transform active:scale-95 transition">
                            {{ __('Simpan Perubahan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>