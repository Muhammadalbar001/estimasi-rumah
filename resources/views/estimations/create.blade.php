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
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Kalkulator Cerdas
                    </div>

                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
                        Buat <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">RAB
                            Baru</span> 🏗️
                    </h2>
                    <p class="text-xs text-slate-400 font-medium max-w-xl leading-relaxed">
                        Lengkapi spesifikasi bangunan di bawah ini. Sistem otomatis mengkalkulasi anggaran berdasarkan
                        standar *Rule-Based*.
                    </p>
                </div>

                <div class="shrink-0">
                    <a href="{{ route('estimations.index') }}"
                        class="inline-flex items-center justify-center w-full sm:w-auto gap-2 bg-white/10 hover:bg-white/20 border border-white/10 text-white px-5 py-2.5 rounded-lg text-xs font-bold transition">
                        &larr; Kembali
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('estimations.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>

                    <div class="flex items-center gap-3 mb-5">
                        <div
                            class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center font-bold text-sm">
                            1</div>
                        <div>
                            <h3 class="text-base font-bold text-slate-800 leading-none">Identitas Proyek</h3>
                            <p class="text-[10px] text-slate-500 mt-1">Penamaan Rencana Bangunan</p>
                        </div>
                    </div>

                    <div>
                        <label for="project_name" class="block text-xs font-bold text-slate-700 mb-1.5">Nama Proyek /
                            Rumah</label>
                        <input type="text" name="project_name" id="project_name"
                            placeholder="Contoh: Rumah Impian Keluarga"
                            class="block w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition text-sm font-semibold text-slate-800 placeholder-slate-400"
                            required>
                    </div>
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>

                    <div class="flex items-center gap-3 mb-5">
                        <div
                            class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center font-bold text-sm">
                            2</div>
                        <div>
                            <h3 class="text-base font-bold text-slate-800 leading-none">Standar Kualitas</h3>
                            <p class="text-[10px] text-slate-500 mt-1">Pilih material dasar bangunan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach(['sederhana', 'menengah', 'mewah'] as $type)
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="house_type" value="{{ $type }}" class="peer hidden" required>
                            <div
                                class="p-4 border border-slate-200 rounded-xl bg-slate-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-sm transition-all duration-200 text-center h-full flex flex-col justify-center">
                                <div
                                    class="text-sm font-bold uppercase tracking-wider text-slate-600 peer-checked:text-blue-700 transition-colors">
                                    {{ $type }}</div>
                                <div class="mt-1 text-[10px] text-slate-400">Material {{ ucfirst($type) }}</div>
                            </div>
                            <div
                                class="absolute top-2 right-2 scale-0 peer-checked:scale-100 transition-transform duration-200">
                                <div class="bg-blue-500 text-white rounded-full p-0.5 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>

                    <div class="flex items-center gap-3 mb-5">
                        <div
                            class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center font-bold text-sm">
                            3</div>
                        <div>
                            <h3 class="text-base font-bold text-slate-800 leading-none">Spesifikasi Dimensi</h3>
                            <p class="text-[10px] text-slate-500 mt-1">Luas bangunan & jumlah ruangan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label for="building_area" class="block text-xs font-bold text-slate-700 mb-1.5">Luas
                                Bangunan (m²)</label>
                            <input type="number" name="building_area" id="building_area" min="10" placeholder="Msl: 45"
                                class="block w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 font-bold text-slate-800 transition"
                                required>
                        </div>
                        <div>
                            <label for="bed_count" class="block text-xs font-bold text-slate-700 mb-1.5">Kamar
                                Tidur</label>
                            <input type="number" name="bed_count" id="bed_count" min="0" placeholder="Msl: 2"
                                class="block w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 font-bold text-slate-800 transition"
                                required>
                        </div>
                        <div>
                            <label for="bath_count" class="block text-xs font-bold text-slate-700 mb-1.5">Kamar
                                Mandi</label>
                            <input type="number" name="bath_count" id="bath_count" min="0" placeholder="Msl: 1"
                                class="block w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 font-bold text-slate-800 transition"
                                required>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 p-6 sm:p-8 rounded-2xl shadow-lg border border-slate-800 transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-2">
                        <div class="flex items-center">
                            <input id="customPriceCheck" name="custom_price" type="checkbox" value="1"
                                class="w-5 h-5 text-blue-500 bg-slate-800 border-slate-600 rounded focus:ring-blue-500 focus:ring-offset-slate-900 transition cursor-pointer">
                            <label for="customPriceCheck"
                                class="ml-3 text-sm font-bold text-white cursor-pointer select-none">
                                Input Harga Manual
                            </label>
                        </div>
                        <span
                            class="text-[9px] bg-indigo-500/20 text-indigo-300 px-2.5 py-1 rounded-md font-bold uppercase tracking-widest border border-indigo-500/30 w-max">Fitur
                            Advanced</span>
                    </div>

                    <p class="text-slate-400 text-xs mb-5 sm:ml-8">Abaikan harga sistem dan gunakan harga survei pasar
                        Anda sendiri.</p>

                    <div id="customPriceFields"
                        class="hidden grid grid-cols-1 md:grid-cols-3 gap-4 pt-5 border-t border-slate-800 sm:ml-8">
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Dasar
                                / m² (Rp)</label>
                            <input type="number" name="custom_price_m2"
                                class="block w-full px-4 py-2.5 bg-slate-800 border-slate-700 rounded-lg text-white focus:ring-blue-500 focus:border-blue-500 text-sm font-semibold placeholder-slate-600"
                                placeholder="Msl: 3500000">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Ekstra
                                Kamar Tidur</label>
                            <input type="number" name="custom_bed_price"
                                class="block w-full px-4 py-2.5 bg-slate-800 border-slate-700 rounded-lg text-white focus:ring-blue-500 focus:border-blue-500 text-sm font-semibold placeholder-slate-600"
                                placeholder="Msl: 5000000">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Ekstra
                                Kamar Mandi</label>
                            <input type="number" name="custom_bath_price"
                                class="block w-full px-4 py-2.5 bg-slate-800 border-slate-700 rounded-lg text-white focus:ring-blue-500 focus:border-blue-500 text-sm font-semibold placeholder-slate-600"
                                placeholder="Msl: 3000000">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center pt-2" data-aos="fade-up" data-aos-delay="500">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-3.5 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-[0_0_15px_rgba(37,99,235,0.4)] transition transform hover:-translate-y-0.5 active:scale-95 text-sm flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Kalkulasi RAB Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.getElementById('customPriceCheck').addEventListener('change', function() {
        const fields = document.getElementById('customPriceFields');
        const inputs = fields.querySelectorAll('input[type="number"]');

        if (this.checked) {
            fields.classList.remove('hidden');
            fields.classList.add('grid');
            inputs.forEach(input => input.setAttribute('required', 'true'));
        } else {
            fields.classList.add('hidden');
            fields.classList.remove('grid');
            inputs.forEach(input => {
                input.removeAttribute('required');
                input.value = '';
            });
        }
    });
    </script>
</x-app-layout>