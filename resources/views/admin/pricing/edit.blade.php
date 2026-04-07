<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Aturan Harga: Tipe ' . ucfirst($pricing->house_type)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.pricing.update', $pricing->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Rumah</label>
                            <input type="text" value="{{ ucfirst($pricing->house_type) }}" disabled
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 cursor-not-allowed">
                            <p class="text-xs text-gray-500 mt-1">Tipe rumah tidak dapat diubah.</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga Dasar per m² (Rp)</label>
                            <input type="number" name="base_price_per_m2"
                                value="{{ old('base_price_per_m2', $pricing->base_price_per_m2) }}"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('base_price_per_m2') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Biaya Tambahan per Kamar Tidur
                                (Rp)</label>
                            <input type="number" name="bed_additional_cost"
                                value="{{ old('bed_additional_cost', $pricing->bed_additional_cost) }}"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('bed_additional_cost') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Biaya Tambahan per Kamar Mandi
                                (Rp)</label>
                            <input type="number" name="bath_additional_cost"
                                value="{{ old('bath_additional_cost', $pricing->bath_additional_cost) }}"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('bath_additional_cost') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('admin.pricing.index') }}"
                                class="text-sm text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 transition ease-in-out duration-150">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>