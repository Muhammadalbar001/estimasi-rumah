<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6 flex justify-end">
                <a href="{{ route('estimations.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition transform hover:-translate-y-1">
                    + Buat Estimasi Pembangunan Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Riwayat Estimasi Terbaru Anda</h3>

                    @if($recentEstimations->isEmpty())
                    <div class="text-center py-8 text-gray-500">
                        Anda belum pernah membuat estimasi. Klik tombol di atas untuk memulai.
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 border">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th class="px-4 py-3 border-r">Tanggal</th>
                                    <th class="px-4 py-3 border-r">Nama Proyek</th>
                                    <th class="px-4 py-3 border-r">Tipe & Luas</th>
                                    <th class="px-4 py-3 border-r text-right">Total Anggaran</th>
                                    <th class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentEstimations as $est)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 border-r">{{ $est->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-3 border-r font-medium text-gray-900">{{ $est->project_name }}
                                    </td>
                                    <td class="px-4 py-3 border-r uppercase">{{ $est->house_type }}
                                        ({{ $est->building_area }}m²)</td>
                                    <td class="px-4 py-3 border-r text-right font-bold text-blue-600">Rp
                                        {{ number_format($est->grand_total, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <a href="{{ route('estimations.show', $est->id) }}"
                                            class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-xs">Lihat
                                            RAB</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-right">
                        <a href="{{ route('estimations.index') }}" class="text-blue-600 text-sm hover:underline">Lihat
                            Semua Riwayat &rarr;</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>