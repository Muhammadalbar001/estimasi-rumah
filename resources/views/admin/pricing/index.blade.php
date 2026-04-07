<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Data: Harga & Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <p class="mb-4 text-sm text-gray-600">Daftar harga ini menjadi acuan dasar (rule) dalam perhitungan
                        estimasi otomatis oleh sistem.</p>

                    <table class="w-full text-sm text-left text-gray-500 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-r">Tipe Rumah</th>
                                <th scope="col" class="px-6 py-3 border-r">Harga Dasar / m²</th>
                                <th scope="col" class="px-6 py-3 border-r">Ekstra / Kamar Tidur</th>
                                <th scope="col" class="px-6 py-3 border-r">Ekstra / Kamar Mandi</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pricings as $pricing)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 border-r uppercase">
                                    {{ $pricing->house_type }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    Rp {{ number_format($pricing->base_price_per_m2, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    Rp {{ number_format($pricing->bed_additional_cost, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    Rp {{ number_format($pricing->bath_additional_cost, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.pricing.edit', $pricing->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs font-semibold tracking-widest transition">
                                        Edit Harga
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