<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Data Estimasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <p class="mb-4 text-sm text-gray-600">Seluruh riwayat perhitungan estimasi rencana pembangunan yang
                        dilakukan oleh pengguna terdaftar di sini.</p>

                    <table class="w-full text-sm text-left text-gray-500 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 border-r">Tanggal</th>
                                <th class="px-4 py-3 border-r">Nama Proyek</th>
                                <th class="px-4 py-3 border-r">Dibuat Oleh</th>
                                <th class="px-4 py-3 border-r">Tipe & Luas</th>
                                <th class="px-4 py-3 border-r text-center">Status</th>
                                <th class="px-4 py-3 border-r text-right">Grand Total Biaya</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($estimations as $est)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-3 border-r text-xs">{{ $est->created_at->format('d M Y - H:i') }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 border-r">{{ $est->project_name }}</td>
                                <td class="px-4 py-3 border-r">{{ $est->user->name ?? 'Anonim' }}</td>
                                <td class="px-4 py-3 border-r">
                                    <span class="uppercase text-xs font-bold">{{ $est->house_type }}</span><br>
                                    {{ $est->building_area }} m²
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
                                    <a href="{{ route('admin.estimations.show', $est->id) }}"
                                        class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-xs">RAB</a>

                                    <a target="_blank" href="{{ route('admin.reports.print.detail', $est->id) }}"
                                        class="text-white bg-gray-800 hover:bg-gray-900 px-3 py-1 rounded text-xs">Cetak</a>

                                    <form action="{{ route('admin.estimations.destroy', $est->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Hapus data estimasi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada data estimasi yang
                                    dibuat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>