<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Rencana Anggaran Biaya (RAB): ') . $estimation->project_name }}
            </h2>
            <button onclick="window.print()"
                class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded text-sm print:hidden">
                Cetak / Simpan PDF
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-6 border-b border-gray-200 bg-gray-50 text-center print:bg-white print:border-none">
                    <h3 class="text-2xl font-bold uppercase tracking-wide text-gray-800">Detail Estimasi Pembangunan
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">Dihasilkan oleh Sistem Pendukung Keputusan Rule-Based</p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4 mb-8 text-sm">
                        <div>
                            <p><span class="font-semibold w-32 inline-block">Nama Proyek</span>:
                                {{ $estimation->project_name }}</p>
                            <p><span class="font-semibold w-32 inline-block">Dibuat Oleh</span>:
                                {{ $estimation->user->name ?? 'Anonim' }}</p>
                            <p><span class="font-semibold w-32 inline-block">Tanggal Dibuat</span>:
                                {{ $estimation->created_at->format('d F Y') }}</p>
                        </div>
                        <div>
                            <p><span class="font-semibold w-32 inline-block">Tipe Rumah</span>: <span
                                    class="uppercase">{{ $estimation->house_type }}</span></p>
                            <p><span class="font-semibold w-32 inline-block">Luas Bangunan</span>:
                                {{ $estimation->building_area }} m²</p>
                        </div>
                    </div>

                    <h4 class="font-bold text-lg border-b pb-2 mb-4">Rincian Komponen Biaya</h4>
                    <table class="w-full text-left text-sm mb-8 border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b border-t border-gray-300">
                                <th class="py-3 px-4">Deskripsi Pekerjaan</th>
                                <th class="py-3 px-4 text-center">Volume/Satuan</th>
                                <th class="py-3 px-4 text-right">Harga Satuan</th>
                                <th class="py-3 px-4 text-right">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-3 px-4">
                                    <span class="font-semibold">Pekerjaan Struktur Utama & Atap</span><br>
                                    <span class="text-xs text-gray-500">Berdasarkan Luas Bangunan Tipe
                                        {{ ucfirst($estimation->house_type) }}</span>
                                </td>
                                <td class="py-3 px-4 text-center">{{ $estimation->building_area }} m²</td>
                                <td class="py-3 px-4 text-right">Rp
                                    {{ number_format($estimation->price_per_m2_used, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-right font-medium">Rp
                                    {{ number_format($estimation->total_base_cost, 0, ',', '.') }}</td>
                            </tr>

                            <tr class="border-b">
                                <td class="py-3 px-4">
                                    <span class="font-semibold">Pekerjaan Partisi Kamar Tidur</span><br>
                                    <span class="text-xs text-gray-500">Tembok, plester, cat, kusen, pintu, dan stop
                                        kontak</span>
                                </td>
                                <td class="py-3 px-4 text-center">{{ $estimation->bed_count }} Ruang</td>
                                <td class="py-3 px-4 text-right">Rp
                                    {{ number_format($estimation->bed_price_used, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-right font-medium">Rp
                                    {{ number_format($estimation->bed_count * $estimation->bed_price_used, 0, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <td class="py-3 px-4">
                                    <span class="font-semibold">Pekerjaan Kamar Mandi / Toilet</span><br>
                                    <span class="text-xs text-gray-500">Plumbing, sanitasi, pintu tahan air, keramik
                                        lantai & dinding</span>
                                </td>
                                <td class="py-3 px-4 text-center">{{ $estimation->bath_count }} Ruang</td>
                                <td class="py-3 px-4 text-right">Rp
                                    {{ number_format($estimation->bath_price_used, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-right font-medium">Rp
                                    {{ number_format($estimation->bath_count * $estimation->bath_price_used, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50">
                                <td colspan="3" class="py-3 px-4 text-right text-gray-600">Subtotal Biaya Tambahan
                                    (Utilitas & Ruangan):</td>
                                <td class="py-3 px-4 text-right font-medium text-gray-700">Rp
                                    {{ number_format($estimation->total_additional_cost, 0, ',', '.') }}</td>
                            </tr>
                            <tr class="bg-blue-600 text-white">
                                <td colspan="3" class="py-4 px-4 text-right font-bold text-lg">ESTIMASI TOTAL ANGGARAN
                                    BIAYA (RAB):</td>
                                <td class="py-4 px-4 text-right font-bold text-lg">Rp
                                    {{ number_format($estimation->grand_total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="mt-8 text-xs text-gray-500 text-center italic">
                        *Catatan: Harga di atas adalah hasil estimasi menggunakan rule-based system dan dapat berubah
                        sewaktu-waktu tergantung fluktuasi harga material di pasaran. Dokumen ini sah dicetak dari
                        sistem.
                    </div>

                </div>
            </div>

            <div class="mt-4 print:hidden text-center">
                <a href="{{ route('admin.estimations.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke
                    daftar estimasi</a>
            </div>

        </div>
    </div>
</x-admin-layout>