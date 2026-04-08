<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('estimations.index') }}"
                    class="p-2 bg-white rounded-xl shadow-sm hover:bg-slate-50 transition">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <h2 class="font-black text-2xl text-slate-800 leading-tight">
                    {{ $estimation->project_name }}
                </h2>
            </div>
            <a target="_blank" href="{{ route('estimations.print', $estimation->id) }}"
                class="bg-slate-900 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-2xl text-sm shadow-xl transition transform active:scale-95 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                    </path>
                </svg>
                Cetak Laporan (PDF)
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div
                class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl shadow-lg border-b-4 border-emerald-700 font-bold animate-fade-in">
                {{ session('success') }}
            </div>
            @endif

            @php
            $totalActual = $estimation->actualMaterials->sum('subtotal');
            $selisih = $estimation->grand_total - $totalActual;
            $isUnderbudget = $selisih >= 0;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200" data-aos="fade-up">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">RAB Sistem</p>
                    <p class="text-2xl font-black text-slate-800">Rp
                        {{ number_format($estimation->grand_total, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200" data-aos="fade-up"
                    data-aos-delay="100">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Belanja Aktual</p>
                    <p class="text-2xl font-black text-emerald-600">Rp {{ number_format($totalActual, 0, ',', '.') }}
                    </p>
                </div>
                <div class="{{ $isUnderbudget ? 'bg-emerald-600' : 'bg-red-600' }} p-8 rounded-[2rem] shadow-xl text-white"
                    data-aos="fade-up" data-aos-delay="200">
                    <p class="text-[10px] font-black opacity-60 uppercase tracking-widest mb-1">Status Keuangan</p>
                    <p class="text-2xl font-black">{{ $isUnderbudget ? 'Underbudget' : 'Overbudget' }}</p>
                    <p class="text-xs mt-1 opacity-80">{{ $isUnderbudget ? 'Sisa: ' : 'Kurang: ' }} Rp
                        {{ number_format(abs($selisih), 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden"
                        data-aos="fade-right">
                        <div class="p-6 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="font-black text-slate-800 uppercase text-xs tracking-widest">1. Estimasi RAB
                                (Rule-Based)</h4>
                            <span
                                class="text-[10px] bg-slate-800 text-white px-2 py-0.5 rounded font-bold">{{ strtoupper($estimation->house_type) }}</span>
                        </div>
                        <div class="p-6">
                            <table class="w-full text-sm">
                                <tr class="border-b border-slate-50">
                                    <td class="py-4 text-slate-500 font-medium">Struktur Utama & Atap
                                        ({{ $estimation->building_area }} m²)</td>
                                    <td class="py-4 text-right font-bold text-slate-800">Rp
                                        {{ number_format($estimation->total_base_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b border-slate-50">
                                    <td class="py-4 text-slate-500 font-medium">Fasilitas Tambahan
                                        ({{ $estimation->bed_count }} KT, {{ $estimation->bath_count }} KM)</td>
                                    <td class="py-4 text-right font-bold text-slate-800">Rp
                                        {{ number_format($estimation->total_additional_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-blue-50/50">
                                    <td class="py-4 px-4 text-blue-700 font-black">TOTAL ESTIMASI SISTEM</td>
                                    <td class="py-4 px-4 text-right text-blue-700 font-black text-lg">Rp
                                        {{ number_format($estimation->grand_total, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden"
                        data-aos="fade-right">
                        <div class="p-6 bg-slate-50/50 border-b border-slate-100">
                            <h4 class="font-black text-slate-800 uppercase text-xs tracking-widest">2. Daftar Belanja
                                Material Aktual</h4>
                        </div>
                        <div class="p-6">
                            <table class="w-full text-sm text-left">
                                <thead class="text-[10px] text-slate-400 uppercase font-black">
                                    <tr>
                                        <th class="pb-4">Material</th>
                                        <th class="pb-4 text-center">Qty</th>
                                        <th class="pb-4 text-right">Subtotal</th>
                                        <th class="pb-4 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @forelse($estimation->actualMaterials as $item)
                                    <tr class="group">
                                        <td class="py-4">
                                            <div class="font-bold text-slate-800">{{ $item->masterMaterial->name }}
                                            </div>
                                            <div class="text-[10px] text-slate-400">@ Rp
                                                {{ number_format($item->price, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="py-4 text-center text-slate-600">{{ $item->qty }}
                                            {{ $item->masterMaterial->unit }}</td>
                                        <td class="py-4 text-right font-bold text-slate-800">Rp
                                            {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        <td class="py-4 text-center">
                                            <form action="{{ route('actual-materials.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Hapus barang ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="text-slate-300 hover:text-red-500 transition"><svg
                                                        class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-8 text-center text-slate-400 italic">Belum ada data
                                            belanja.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr class="bg-emerald-50/50 font-black">
                                        <td colspan="2" class="py-4 px-4 text-emerald-700">TOTAL BELANJA</td>
                                        <td class="py-4 px-4 text-right text-emerald-700 text-lg">Rp
                                            {{ number_format($totalActual, 0, ',', '.') }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl text-white sticky top-24"
                        data-aos="fade-left">
                        <h4 class="font-black text-lg mb-2 tracking-tight">Input Belanja</h4>
                        <p class="text-slate-400 text-xs mb-6">Tambahkan material yang baru saja Anda beli ke daftar
                            proyek.</p>

                        <form action="{{ route('actual-materials.store', $estimation->id) }}" method="POST"
                            class="space-y-4">
                            @csrf
                            <div>
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2">Pilih
                                    Material</label>
                                <select name="master_material_id"
                                    class="w-full bg-slate-800 border-none rounded-2xl text-sm text-slate-200 focus:ring-blue-500 py-3"
                                    required>
                                    <option value="">-- Cari Material --</option>
                                    @foreach($masterMaterials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }} ({{ $material->unit }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2">Jumlah</label>
                                    <input type="number" name="qty" id="qty" min="1"
                                        class="w-full bg-slate-800 border-none rounded-2xl text-sm text-slate-200 py-3"
                                        required oninput="calculateSubtotal()">
                                </div>
                                <div>
                                    <label
                                        class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2">Harga
                                        Satuan</label>
                                    <input type="number" name="price" id="price" min="0"
                                        class="w-full bg-slate-800 border-none rounded-2xl text-sm text-slate-200 py-3"
                                        required oninput="calculateSubtotal()">
                                </div>
                            </div>
                            <div>
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2">Diskon
                                    (Opsional)</label>
                                <input type="number" name="discount" id="discount" value="0"
                                    class="w-full bg-slate-800 border-none rounded-2xl text-sm text-slate-200 py-3"
                                    oninput="calculateSubtotal()">
                            </div>

                            <div class="pt-4 mt-4 border-t border-slate-800">
                                <p class="text-[10px] text-slate-500 uppercase font-black">Estimasi Subtotal</p>
                                <p id="live_subtotal" class="text-2xl font-black text-emerald-400 mt-1">Rp 0</p>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-500/20 transition transform active:scale-95 text-xs uppercase tracking-widest">
                                + Tambahkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function calculateSubtotal() {
        let qty = parseFloat(document.getElementById('qty').value) || 0;
        let price = parseFloat(document.getElementById('price').value) || 0;
        let discount = parseFloat(document.getElementById('discount').value) || 0;
        let subtotal = (qty * price) - discount;
        if (subtotal < 0) subtotal = 0;
        document.getElementById('live_subtotal').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
    }
    </script>
</x-app-layout>