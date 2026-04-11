<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-slate-900 rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-800 mt-2"
            data-aos="fade-down" data-aos-duration="600">
            <div
                class="absolute -right-10 -top-10 w-60 h-60 bg-blue-500/20 rounded-full blur-[3rem] pointer-events-none">
            </div>
            <div
                class="absolute -left-10 -bottom-10 w-60 h-60 bg-indigo-500/20 rounded-full blur-[3rem] pointer-events-none">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-widest mb-3 backdrop-blur-sm">
                        <svg class="w-3 h-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        Detail Proyek & Gap Analysis
                    </div>

                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
                        {{ $estimation->project_name }}
                    </h2>
                    <p class="text-xs text-slate-400 font-medium max-w-xl leading-relaxed flex items-center gap-2">
                        <span
                            class="px-2 py-0.5 bg-slate-800 rounded text-[10px] uppercase font-bold text-slate-300 border border-slate-700">TIPE
                            {{ $estimation->house_type }}</span>
                        {{ $estimation->building_area }} m² &bull; {{ $estimation->bed_count }} Kamar Tidur &bull;
                        {{ $estimation->bath_count }} Kamar Mandi
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                    <a href="{{ route('estimations.index') }}"
                        class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/10 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition">
                        &larr; Kembali
                    </a>
                    <a target="_blank" href="{{ route('estimations.print', $estimation->id) }}"
                        class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-5 py-2.5 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] text-xs font-black uppercase tracking-widest transition border border-blue-500/50 transform active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>
                        Cetak Laporan
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500 text-white rounded-xl shadow-lg border border-emerald-600 font-bold flex items-center gap-3"
                data-aos="zoom-in">
                <div class="p-1.5 bg-white/20 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                {{ session('success') }}
            </div>
            @endif

            @php
            $totalActual = $estimation->actualMaterials->sum('subtotal');
            $selisih = $estimation->grand_total - $totalActual;
            $isUnderbudget = $selisih >= 0;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-center"
                    data-aos="fade-up">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">RAB Sistem
                        (Rule-Based)</p>
                    <p class="text-2xl font-black text-slate-800 tracking-tight">Rp
                        {{ number_format($estimation->grand_total, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-center"
                    data-aos="fade-up" data-aos-delay="100">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Pengeluaran
                        Aktual</p>
                    <p class="text-2xl font-black text-blue-600 tracking-tight">Rp
                        {{ number_format($totalActual, 0, ',', '.') }}</p>
                </div>
                <div class="{{ $isUnderbudget ? 'bg-emerald-50 border-emerald-200' : 'bg-red-50 border-red-200' }} p-6 rounded-2xl shadow-sm border flex flex-col justify-center transition-colors duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <p
                        class="text-[10px] font-black {{ $isUnderbudget ? 'text-emerald-600' : 'text-red-600' }} uppercase tracking-widest mb-1">
                        Status Keuangan Proyek</p>
                    <p
                        class="text-2xl font-black {{ $isUnderbudget ? 'text-emerald-700' : 'text-red-700' }} tracking-tight">
                        {{ $isUnderbudget ? 'UNDERBUDGET' : 'OVERBUDGET' }}</p>
                    <p class="text-xs mt-1 font-bold {{ $isUnderbudget ? 'text-emerald-500' : 'text-red-500' }}">
                        {{ $isUnderbudget ? 'Sisa Dana:' : 'Kekurangan:' }} Rp
                        {{ number_format(abs($selisih), 0, ',', '.') }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
                        data-aos="fade-right">
                        <div
                            class="px-6 py-4 bg-slate-50/80 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="font-black text-slate-800 text-sm tracking-tight">1. Rincian Estimasi Sistem</h4>
                            <span
                                class="text-[9px] bg-slate-200 text-slate-600 px-2 py-1 rounded font-bold uppercase tracking-widest">Base
                                Cost</span>
                        </div>
                        <div class="p-2">
                            <table class="w-full text-sm">
                                <tr class="border-b border-slate-50">
                                    <td class="py-3 px-4 text-slate-600 font-medium">Struktur Utama & Atap <span
                                            class="text-xs text-slate-400">({{ $estimation->building_area }} m²)</span>
                                    </td>
                                    <td class="py-3 px-4 text-right font-bold text-slate-800">Rp
                                        {{ number_format($estimation->total_base_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b border-slate-50">
                                    <td class="py-3 px-4 text-slate-600 font-medium">Fasilitas Tambahan <span
                                            class="text-xs text-slate-400">({{ $estimation->bed_count }} KT,
                                            {{ $estimation->bath_count }} KM)</span></td>
                                    <td class="py-3 px-4 text-right font-bold text-slate-800">Rp
                                        {{ number_format($estimation->total_additional_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-blue-50/50">
                                    <td class="py-3 px-4 text-blue-700 font-black text-xs uppercase tracking-widest">
                                        Total Anggaran Dasar</td>
                                    <td class="py-3 px-4 text-right text-blue-700 font-black text-base">Rp
                                        {{ number_format($estimation->grand_total, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
                        data-aos="fade-right">
                        <div class="px-6 py-4 bg-slate-50/80 border-b border-slate-100">
                            <h4 class="font-black text-slate-800 text-sm tracking-tight">2. Riwayat Belanja Material
                                Lapangan</h4>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead
                                    class="text-[10px] text-slate-400 uppercase font-black bg-white border-b border-slate-100">
                                    <tr>
                                        <th class="px-6 py-3">Item Material</th>
                                        <th class="px-4 py-3 text-center">Qty</th>
                                        <th class="px-6 py-3 text-right">Subtotal</th>
                                        <th class="px-4 py-3 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 text-sm">
                                    @forelse($estimation->actualMaterials as $item)
                                    <tr class="hover:bg-slate-50 transition group">
                                        <td class="px-6 py-3">
                                            <div class="font-bold text-slate-800">{{ $item->masterMaterial->name }}
                                            </div>
                                            <div class="text-[10px] text-slate-400 font-medium mt-0.5">
                                                @ Rp {{ number_format($item->price, 0, ',', '.') }}
                                                @if($item->discount > 0)
                                                <span class="text-red-500 ml-1">(Diskon: -Rp
                                                    {{ number_format($item->discount, 0, ',', '.') }})</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-center text-slate-600 font-bold bg-slate-50/50">
                                            {{ $item->qty }} <span
                                                class="text-xs text-slate-400 font-normal">{{ $item->masterMaterial->unit }}</span>
                                        </td>
                                        <td class="px-6 py-3 text-right font-black text-slate-800">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <form action="{{ route('actual-materials.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Hapus riwayat belanja ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="p-1.5 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition"
                                                    title="Hapus Item">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 text-center">
                                            <p class="text-slate-400 font-medium text-sm mb-1">Belum ada riwayat
                                                belanja.</p>
                                            <p class="text-slate-400 text-xs">Tambahkan material yang baru dibeli
                                                melalui form di sebelah kanan.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-50/30 border-t border-slate-100">
                                        <td colspan="2"
                                            class="px-6 py-4 text-blue-800 font-black text-xs uppercase tracking-widest text-right">
                                            Total Pengeluaran</td>
                                        <td class="px-6 py-4 text-right text-blue-700 font-black text-base">Rp
                                            {{ number_format($totalActual, 0, ',', '.') }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-800 sticky top-28"
                        data-aos="fade-left">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <h4 class="font-black text-lg text-white tracking-tight">Input Belanja Baru</h4>
                        </div>
                        <p class="text-slate-400 text-xs mb-6 font-medium leading-relaxed">Catat setiap material yang
                            dibeli untuk memantau sisa anggaran secara presisi.</p>

                        <form action="{{ route('actual-materials.store', $estimation->id) }}" method="POST"
                            class="space-y-4">
                            @csrf

                            <div>
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1.5">Katalog
                                    Material</label>
                                <select name="master_material_id"
                                    class="w-full bg-slate-800 border-slate-700 rounded-xl text-sm text-slate-200 focus:ring-blue-500 focus:border-blue-500 py-3 shadow-inner"
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
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1.5">Jumlah</label>
                                    <input type="number" name="qty" id="qty" min="1"
                                        class="w-full bg-slate-800 border-slate-700 rounded-xl text-sm text-slate-200 focus:ring-blue-500 focus:border-blue-500 py-3 text-center font-bold"
                                        placeholder="0" required oninput="calculateSubtotal()">
                                </div>
                                <div>
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1.5">Harga
                                        / Satuan</label>
                                    <input type="number" name="price" id="price" min="0"
                                        class="w-full bg-slate-800 border-slate-700 rounded-xl text-sm text-slate-200 focus:ring-blue-500 focus:border-blue-500 py-3 font-bold"
                                        placeholder="Rp 0" required oninput="calculateSubtotal()">
                                </div>
                            </div>

                            <div>
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1.5">Potongan
                                    Harga / Diskon</label>
                                <input type="number" name="discount" id="discount" value="0"
                                    class="w-full bg-slate-800 border-slate-700 rounded-xl text-sm text-slate-200 focus:ring-blue-500 focus:border-blue-500 py-3 font-bold"
                                    oninput="calculateSubtotal()">
                            </div>

                            <div class="pt-4 mt-2 border-t border-slate-800">
                                <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest">Kalkulasi
                                    Subtotal</p>
                                <p id="live_subtotal" class="text-2xl font-black text-blue-400 mt-1 tracking-tight">Rp 0
                                </p>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-black py-3.5 rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] transition transform active:scale-95 text-xs uppercase tracking-widest mt-2 border border-blue-500/50">
                                + Simpan Riwayat
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