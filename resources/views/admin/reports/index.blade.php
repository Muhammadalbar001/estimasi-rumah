<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Pusat Laporan (Report Center)') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <p class="text-gray-600">Pilih jenis laporan yang ingin Anda cetak format PDF.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-sm rounded-lg border-t-4 border-blue-500">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-blue-800 mb-4">Kategori A: Operasional Proyek</h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Laporan Rekapitulasi Proyek</span>
                                <a target="_blank" href="{{ route('admin.reports.print.recap') }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Laporan Status Pemantauan</span>
                                <a target="_blank" href="{{ route('admin.reports.print.status') }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center pb-2">
                                <span class="text-sm font-medium">Laporan Detail RAB (Kontekstual)</span>
                                <a href="{{ route('admin.estimations.index') }}"
                                    class="text-blue-600 text-xs hover:underline">Ke Data Estimasi</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border-t-4 border-green-500">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-green-800 mb-4">Kategori B: Analisis Keuangan</h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Analisis Komparasi (Gap Analysis)</span>
                                <a target="_blank" href="{{ route('admin.reports.print.gap_analysis') }}"
                                    class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center pb-2">
                                <span class="text-sm font-medium">Anggaran Tertinggi & Terendah</span>
                                <a target="_blank" href="{{ route('admin.reports.print.extremes') }}"
                                    class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border-t-4 border-purple-500">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-purple-800 mb-4">Kategori C: Statistik & Analitik</h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Tren Tipe Rumah</span>
                                <a target="_blank" href="{{ route('admin.reports.print.house_trend') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Popularitas Material</span>
                                <a target="_blank" href="{{ route('admin.reports.print.material_popularity') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center border-b pb-2">
                                <span class="text-sm font-medium">Fluktuasi Harga Material</span>
                                <a target="_blank" href="{{ route('admin.reports.print.price_fluctuation') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                            <li class="flex justify-between items-center pb-2">
                                <span class="text-sm font-medium">Aktivitas Pengguna</span>
                                <a target="_blank" href="{{ route('admin.reports.print.user_activity') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white text-xs px-3 py-1 rounded shadow">Cetak
                                    PDF</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>