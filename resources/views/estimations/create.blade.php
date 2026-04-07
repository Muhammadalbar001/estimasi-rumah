<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulir Estimasi Pembangunan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('estimations.store') }}" method="POST">
                        @csrf

                        <h3 class="font-bold text-lg mb-4 border-b pb-2 text-blue-600">1. Informasi Proyek</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek / Rumah</label>
                                <input type="text" name="project_name" placeholder="Misal: Rumah Impian Budi"
                                    class="border border-gray-300 rounded-lg w-full p-2.5 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Rumah</label>
                                <select name="house_type"
                                    class="border border-gray-300 rounded-lg w-full p-2.5 focus:ring-blue-500" required>
                                    <option value="">-- Pilih Tipe --</option>
                                    <option value="sederhana">Sederhana</option>
                                    <option value="menengah">Menengah</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                        </div>

                        <h3 class="font-bold text-lg mb-4 border-b pb-2 text-blue-600">2. Spesifikasi Bangunan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Luas Bangunan (m²)</label>
                                <input type="number" name="building_area" min="10" placeholder="Misal: 45"
                                    class="border border-gray-300 rounded-lg w-full p-2.5 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Tidur</label>
                                <input type="number" name="bed_count" min="0" placeholder="Misal: 2"
                                    class="border border-gray-300 rounded-lg w-full p-2.5 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Mandi</label>
                                <input type="number" name="bath_count" min="0" placeholder="Misal: 1"
                                    class="border border-gray-300 rounded-lg w-full p-2.5 focus:ring-blue-500" required>
                            </div>
                        </div>

                        <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <div class="flex items-center mb-4">
                                <input id="customPriceCheck" name="custom_price" type="checkbox" value="1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="customPriceCheck" class="ml-2 text-sm font-medium text-gray-900">Saya ingin
                                    menggunakan harga satuan sendiri (Kustomisasi Harga)</label>
                            </div>

                            <div id="customPriceFields"
                                class="hidden grid grid-cols-1 md:grid-cols-3 gap-4 border-t pt-4 mt-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga Dasar / m²
                                        (Rp)</label>
                                    <input type="number" name="custom_price_m2"
                                        class="border border-gray-300 rounded-lg w-full p-2.5"
                                        placeholder="Misal: 3000000">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Ekstra / Kamar Tidur
                                        (Rp)</label>
                                    <input type="number" name="custom_bed_price"
                                        class="border border-gray-300 rounded-lg w-full p-2.5"
                                        placeholder="Misal: 5000000">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Ekstra / Kamar Mandi
                                        (Rp)</label>
                                    <input type="number" name="custom_bath_price"
                                        class="border border-gray-300 rounded-lg w-full p-2.5"
                                        placeholder="Misal: 8000000">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold text-sm uppercase tracking-wider hover:bg-blue-700 shadow-lg">
                                Hitung Estimasi Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('customPriceCheck').addEventListener('change', function() {
        const fields = document.getElementById('customPriceFields');
        const inputs = fields.querySelectorAll('input[type="number"]');

        if (this.checked) {
            fields.classList.remove('hidden');
            inputs.forEach(input => input.setAttribute('required', 'true'));
        } else {
            fields.classList.add('hidden');
            inputs.forEach(input => {
                input.removeAttribute('required');
                input.value = ''; // Kosongkan saat di-uncheck
            });
        }
    });
    </script>
</x-app-layout>