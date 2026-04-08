<x-app-layout>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 leading-tight" data-aos="fade-right">
            {{ __('Buat Estimasi RAB Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('estimations.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200" data-aos="fade-up">
                    <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center">
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 text-sm shadow-lg shadow-blue-200">1</span>
                        Identitas Proyek
                    </h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="project_name" :value="__('Nama Proyek / Rumah')"
                                class="font-bold text-slate-600 mb-2 ml-1" />
                            <input type="text" name="project_name" id="project_name"
                                placeholder="Misal: Rumah Impian Keluarga Albar"
                                class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition text-lg font-bold text-slate-800"
                                required>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center">
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 text-sm shadow-lg shadow-blue-200">2</span>
                        Pilih Kualitas Bangunan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach(['sederhana', 'menengah', 'mewah'] as $type)
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="house_type" value="{{ $type }}" class="peer hidden" required>
                            <div
                                class="p-6 border-2 border-slate-100 rounded-3xl bg-slate-50 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all duration-300 group-hover:shadow-md text-center">
                                <div
                                    class="text-xs font-black uppercase tracking-widest text-slate-400 peer-checked:text-blue-600 transition-colors">
                                    {{ $type }}</div>
                                <div class="mt-1 text-[10px] text-slate-400 italic">Standar Material
                                    {{ ucfirst($type) }}</div>
                            </div>
                            <div class="absolute top-3 right-3 opacity-0 peer-checked:opacity-100 transition-opacity">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200" data-aos="fade-up"
                    data-aos-delay="200">
                    <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center">
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 text-sm shadow-lg shadow-blue-200">3</span>
                        Spesifikasi Ruangan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <x-input-label for="building_area" :value="__('Luas Bangunan (m²)')"
                                class="font-bold text-slate-600 mb-2 ml-1" />
                            <input type="number" name="building_area" id="building_area" min="10" placeholder="0"
                                class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 font-black text-xl text-slate-800"
                                required>
                        </div>
                        <div>
                            <x-input-label for="bed_count" :value="__('Jumlah Kamar Tidur')"
                                class="font-bold text-slate-600 mb-2 ml-1" />
                            <input type="number" name="bed_count" id="bed_count" min="0" placeholder="0"
                                class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 font-black text-xl text-slate-800"
                                required>
                        </div>
                        <div>
                            <x-input-label for="bath_count" :value="__('Jumlah Kamar Mandi')"
                                class="font-bold text-slate-600 mb-2 ml-1" />
                            <input type="number" name="bath_count" id="bath_count" min="0" placeholder="0"
                                class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 font-black text-xl text-slate-800"
                                required>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800 p-8 rounded-[2rem] shadow-xl border border-slate-700 transition-all duration-500"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <input id="customPriceCheck" name="custom_price" type="checkbox" value="1"
                                class="w-6 h-6 text-blue-500 bg-slate-700 border-slate-600 rounded-lg focus:ring-blue-500 focus:ring-offset-slate-800 transition cursor-pointer">
                            <label for="customPriceCheck" class="ml-3 text-lg font-bold text-white cursor-pointer">
                                Gunakan Harga Satuan Kustom
                            </label>
                        </div>
                        <span
                            class="text-[10px] bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full font-bold uppercase tracking-widest">Advanced</span>
                    </div>

                    <p class="text-slate-400 text-sm mb-6 ml-9">Aktifkan jika Anda ingin mengabaikan harga standar
                        sistem dan memasukkan harga sendiri.</p>

                    <div id="customPriceFields"
                        class="hidden grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-slate-700 ml-0 md:ml-9 animate-fade-in">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Harga
                                Dasar / m² (Rp)</label>
                            <input type="number" name="custom_price_m2"
                                class="block w-full px-4 py-3 bg-slate-700 border-slate-600 rounded-xl text-white focus:ring-blue-500 focus:border-blue-500 font-bold"
                                placeholder="Contoh: 3500000">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ekstra /
                                Kamar Tidur (Rp)</label>
                            <input type="number" name="custom_bed_price"
                                class="block w-full px-4 py-3 bg-slate-700 border-slate-600 rounded-xl text-white focus:ring-blue-500 focus:border-blue-500 font-bold"
                                placeholder="Contoh: 5000000">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ekstra /
                                Kamar Mandi (Rp)</label>
                            <input type="number" name="custom_bath_price"
                                class="block w-full px-4 py-3 bg-slate-700 border-slate-600 rounded-xl text-white focus:ring-blue-500 focus:border-blue-500 font-bold"
                                placeholder="Contoh: 3000000">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center pt-4" data-aos="fade-up" data-aos-delay="400">
                    <button type="submit"
                        class="w-full md:w-auto px-16 py-5 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-2xl shadow-2xl shadow-blue-500/30 transition duration-300 transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm">
                        Proses Estimasi Anggaran &rarr;
                    </button>
                    <p class="mt-4 text-[10px] text-slate-400 font-medium uppercase tracking-widest italic">Data akan
                        diproses secara real-time oleh sistem</p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        once: true
    });

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