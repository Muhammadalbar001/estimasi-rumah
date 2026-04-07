<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('RAB & Analisis: ') . $estimation->project_name }}
            </h2>
            <a target="_blank" href="{{ route('estimations.print', $estimation->id) }}"
                class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded text-sm print:hidden shadow inline-block">
                Cetak Dokumen (PDF)
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 print:hidden">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-6 border-b border-gray-200 bg-blue-50 text-center print:bg-white print:border-none">
                    <h3 class="text-2xl font-bold uppercase tracking-wide text-gray-800">Laporan Komparasi & Estimasi
                        Pembangunan</h3>
                    <p class="text-sm text-gray-500 mt-1">Rule-Based System vs Realita Lapangan</p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4 mb-8 text-sm bg-gray-50 p-4 rounded border">
                        <div>
                            <p><span class="font-semibold w-32 inline-block">Nama Proyek</span>:
                                {{ $estimation->project_name }}</p>
                            <p><span class="font-semibold w-32 inline-block">Pemilik Proyek</span>:
                                {{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p><span class="font-semibold w-32 inline-block">Tipe Rumah</span>: <span
                                    class="uppercase">{{ $estimation->house_type }}</span>
                                ({{ $estimation->building_area }} m²)</p>
                            <p><span class="font-semibold w-32 inline-block">Tanggal Dibuat</span>:
                                {{ $estimation->created_at->format('d F Y') }}</p>
                        </div>
                    </div>

                    <h4 class="font-bold text-lg border-b pb-2 mb-4 text-blue-700 uppercase">1. Estimasi Anggaran Sistem
                        (Rule-Based)</h4>
                    <table class="w-full text-left text-sm mb-8 border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b border-t border-gray-300">
                                <th class="py-2 px-4">Komponen Biaya</th>
                                <th class="py-2 px-4 text-center">Volume</th>
                                <th class="py-2 px-4 text-right">Total Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 px-4">Struktur Utama & Atap (Dasar m²)</td>
                                <td class="py-2 px-4 text-center">{{ $estimation->building_area }} m²</td>
                                <td class="py-2 px-4 text-right">Rp
                                    {{ number_format($estimation->total_base_cost, 0, ',', '.') }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4">Penambahan Kamar Tidur & Mandi</td>
                                <td class="py-2 px-4 text-center">{{ $estimation->bed_count }} KT,
                                    {{ $estimation->bath_count }} KM</td>
                                <td class="py-2 px-4 text-right">Rp
                                    {{ number_format($estimation->total_additional_cost, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-blue-100 text-blue-900 font-bold text-base">
                                <td colspan="2" class="py-3 px-4 text-right">TOTAL RAB SISTEM:</td>
                                <td class="py-3 px-4 text-right">Rp
                                    {{ number_format($estimation->grand_total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <h4 class="font-bold text-lg border-b pb-2 mb-4 text-green-700 uppercase mt-10">2. Realisasi Belanja
                        Material Aktual</h4>

                    <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg print:hidden">
                        <form action="{{ route('actual-materials.store', $estimation->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                                <div class="col-span-2">
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Pilih Material /
                                        Barang</label>
                                    <select name="master_material_id" class="border-gray-300 rounded text-sm w-full"
                                        required>
                                        <option value="">-- Pilih Material dari Database --</option>
                                        @foreach($masterMaterials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}
                                            ({{ $material->unit }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Jumlah (Qty)</label>
                                    <input type="number" name="qty" id="qty" min="1"
                                        class="border-gray-300 rounded text-sm w-full" required
                                        oninput="calculateSubtotal()">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Harga Satuan
                                        (Rp)</label>
                                    <input type="number" name="price" id="price" min="0"
                                        class="border-gray-300 rounded text-sm w-full" required
                                        oninput="calculateSubtotal()">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Diskon Total (Rp) -
                                        Opsional</label>
                                    <input type="number" name="discount" id="discount" min="0" value="0"
                                        class="border-gray-300 rounded text-sm w-full" oninput="calculateSubtotal()">
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700">
                                    Estimasi Subtotal: <span id="live_subtotal" class="text-green-600">Rp 0</span>
                                </div>
                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-2 rounded text-sm font-bold hover:bg-green-700">
                                    + Tambahkan ke Daftar
                                </button>
                            </div>
                        </form>
                    </div>

                    <table class="w-full text-left text-sm mb-8 border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b border-t border-gray-300 text-xs uppercase">
                                <th class="py-2 px-3">Nama Barang</th>
                                <th class="py-2 px-3 text-center">Qty</th>
                                <th class="py-2 px-3 text-right">Harga Satuan</th>
                                <th class="py-2 px-3 text-right">Diskon</th>
                                <th class="py-2 px-3 text-right">Subtotal</th>
                                <th class="py-2 px-3 text-center print:hidden">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalActual = 0; @endphp
                            @forelse($estimation->actualMaterials as $item)
                            @php $totalActual += $item->subtotal; @endphp
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-3 font-medium">{{ $item->masterMaterial->name }} <span
                                        class="text-xs text-gray-500">({{ $item->masterMaterial->unit }})</span></td>
                                <td class="py-2 px-3 text-center">{{ $item->qty }}</td>
                                <td class="py-2 px-3 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-2 px-3 text-right text-red-500">- Rp
                                    {{ number_format($item->discount, 0, ',', '.') }}</td>
                                <td class="py-2 px-3 text-right font-semibold">Rp
                                    {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                <td class="py-2 px-3 text-center print:hidden">
                                    <form action="{{ route('actual-materials.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus barang ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 text-xs font-bold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500 italic">Belum ada data belanja
                                    material aktual yang dimasukkan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="bg-green-100 text-green-900 font-bold text-base">
                                <td colspan="4" class="py-3 px-4 text-right">TOTAL BELANJA AKTUAL:</td>
                                <td class="py-3 px-3 text-right">Rp {{ number_format($totalActual, 0, ',', '.') }}</td>
                                <td class="print:hidden"></td>
                            </tr>
                        </tfoot>
                    </table>

                    @php
                    $selisih = $estimation->grand_total - $totalActual;
                    $isUnderbudget = $selisih >= 0;
                    @endphp
                    <div
                        class="mt-10 p-6 border-2 {{ $isUnderbudget ? 'border-green-400 bg-green-50' : 'border-red-400 bg-red-50' }} rounded-lg">
                        <h4
                            class="font-bold text-xl mb-2 text-center uppercase {{ $isUnderbudget ? 'text-green-800' : 'text-red-800' }}">
                            Kesimpulan Gap Analysis</h4>

                        <div class="flex justify-between items-center text-lg mt-4 px-10">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Anggaran RAB Sistem</p>
                                <p class="font-bold">Rp {{ number_format($estimation->grand_total, 0, ',', '.') }}</p>
                            </div>
                            <div class="text-2xl font-bold text-gray-400">VS</div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Pengeluaran Aktual</p>
                                <p class="font-bold">Rp {{ number_format($totalActual, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            @if($isUnderbudget)
                            <span
                                class="inline-block px-4 py-2 bg-green-600 text-white font-bold rounded-full text-lg shadow">
                                UNDERBUDGET (Sisa Dana: Rp {{ number_format($selisih, 0, ',', '.') }})
                            </span>
                            <p class="text-sm mt-2 text-green-700">Pengeluaran lapangan lebih rendah atau sesuai dengan
                                estimasi sistem. Sangat efisien!</p>
                            @else
                            <span
                                class="inline-block px-4 py-2 bg-red-600 text-white font-bold rounded-full text-lg shadow">
                                OVERBUDGET (Kekurangan: Rp {{ number_format(abs($selisih), 0, ',', '.') }})
                            </span>
                            <p class="text-sm mt-2 text-red-700">Peringatan: Pengeluaran lapangan melebihi estimasi
                                anggaran sistem.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 text-xs text-gray-500 text-center italic print:block hidden">
                        Dokumen ini dicetak otomatis melalui sistem. Gap Analysis digunakan sebagai alat monitoring
                        keuangan proyek.
                    </div>

                </div>
            </div>

            <div class="mt-6 print:hidden text-center">
                <a href="{{ route('estimations.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke
                    Riwayat RAB</a>
            </div>
        </div>
    </div>

    <script>
    function calculateSubtotal() {
        let qty = parseFloat(document.getElementById('qty').value) || 0;
        let price = parseFloat(document.getElementById('price').value) || 0;
        let discount = parseFloat(document.getElementById('discount').value) || 0;

        let subtotal = (qty * price) - discount;
        if (subtotal < 0) subtotal = 0; // Cegah nilai minus

        // Format ke Rupiah
        document.getElementById('live_subtotal').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
    }
    </script>
</x-app-layout>