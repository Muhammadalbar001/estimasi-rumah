<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EstimasiApp') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    .auth-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased overflow-hidden">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900 relative">

        <div class="absolute top-0 left-0 w-full h-full opacity-30 pointer-events-none">
            <div
                class="absolute top-1/4 left-1/4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob">
            </div>
            <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-emerald-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob"
                style="animation-delay: 2s"></div>
        </div>

        <div data-aos="zoom-in" data-aos-duration="800">
            <a href="/" class="flex flex-col items-center mb-8 group">
                <span
                    class="text-3xl font-black text-blue-400 tracking-tighter transition group-hover:scale-110 duration-300">
                    ESTIMASI<span class="text-white">APP</span>
                </span>
                <div class="h-1 w-12 bg-blue-500 rounded-full mt-1"></div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 auth-card shadow-2xl overflow-hidden sm:rounded-3xl relative z-10"
            data-aos="fade-up" data-aos-delay="200">
            {{ $slot }}
        </div>

        <div class="mt-8 text-slate-500 text-xs text-center relative z-10" data-aos="fade-up" data-aos-delay="400">
            &copy; {{ date('Y') }} Sistem Informasi Estimasi Rumah Terpadu
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>