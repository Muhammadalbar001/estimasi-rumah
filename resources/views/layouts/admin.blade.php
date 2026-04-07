<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - Estimasi Pembangunan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl text-blue-600">
                            EstimasiApp Admin
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-blue-500 text-gray-900 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Dashboard
                        </a>

                        <div
                            class="relative inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group cursor-pointer">
                            <span>Master Data</span>
                            <div
                                class="absolute left-0 top-full mt-1 hidden w-48 bg-white border border-gray-200 shadow-lg rounded-md group-hover:block z-50">
                                <a href="{{ route('admin.pricing.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Harga & Aturan</a>
                                <a href="{{ route('admin.users.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelola Pengguna</a>
                            </div>
                        </div>

                        <a href="{{ route('admin.estimations.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.estimations.*') ? 'border-blue-500 text-gray-900 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Data Estimasi
                        </a>

                        <a href="{{ route('admin.reports.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.reports.*') ? 'border-blue-500 text-gray-900 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Laporan
                        </a>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            Logout ({{ Auth::user()->name }})
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif

    <main>
        {{ $slot }}
    </main>

</body>

</html>