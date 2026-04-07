<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Riwayat RAB Saya') }}
            </h2>
            <a href="{{ route('estimations.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm shadow">
                + Buat Estimasi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <p class="mb-4 text-sm text-gray-600">Daftar di bawah ini adalah seluruh riwayat perhitungan rencana
                        pembangunan yang pernah Anda buat.</p>

                    <table class="w-full text-sm text-left text-gray-500 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 border-r">Tanggal</th>
                                <th class="px-4 py-3 border-r">Nama Proyek</th>
                                <th class="px-4 py-3 border-r">Tipe Rumah</th>
                                <th class="px-4 py-3 border-r">Luas & Fasilitas</th>
                                <th class="px-4 py-3 border-r text-center">Status</th>
                                <th class="px-4 py-3 border-r text-right">Grand Total (RAB)</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($estimations as $est)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-3 border-r text-xs">{{ $est->created_at->format('d M Y - H:i') }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 border-r">{{ $est->project_name }}</td>
                                <td class="px-4 py-3 border-r uppercase font-semibold">{{ $est->house_type }}</td>
                                <td class="px-4 py-3 border-r text-xs">
                                    Luas: {{ $est->building_area }} m² <br>
                                    {{ $est->bed_count }} KT, {{ $est->bath_count }} KM
                                </td>
                                <td class="px-4 py-3 border-r text-center">
                                    @if($est->status === 'perencanaan')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-yellow-300">Perencanaan</span>
                                    @elseif($est->status === 'pembangunan')
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-blue-300">Pembangunan</span>
                                    @elseif($est->status === 'selesai')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-green-300">Selesai</span>
                                    @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-red-300">Dibatalkan</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 border-r font-bold text-blue-600 text-right">
                                    Rp {{ number_format($est->grand_total, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-center space-x-1">
                                    <a href="{{ route('estimations.show', $est->id) }}"
                                        class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-xs inline-flex items-center">
                                        Detail
                                    </a>
                                    <a target="_blank" href="{{ route('estimations.print', $est->id) }}"
                                        class="text-white bg-gray-800 hover:bg-gray-900 px-3 py-1 rounded text-xs inline-flex items-center">
                                        Cetak PDF
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    Anda belum memiliki riwayat estimasi.<br>
                                    <a href="{{ route('estimations.create') }}"
                                        class="text-blue-600 hover:underline mt-2 inline-block">Buat perhitungan pertama
                                        Anda sekarang.</a>
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