<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EstimasiApp') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    .auth-glass {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
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

<body class="font-sans text-slate-900 antialiased overflow-x-hidden bg-slate-100 selection:bg-blue-200">
    <div class="min-h-screen flex flex-col justify-center items-center py-10 px-4 sm:px-6 relative">

        <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none z-0">
            <div
                class="absolute top-1/4 left-1/4 w-72 h-72 bg-blue-300/40 rounded-full mix-blend-multiply filter blur-3xl animate-blob">
            </div>
            <div
                class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-emerald-300/30 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="relative z-10 mb-6" data-aos="fade-down" data-aos-duration="1000">
            <a href="/" class="flex flex-col items-center group">
                <span
                    class="text-3xl font-black text-blue-600 tracking-tighter transition group-hover:scale-105 duration-300">
                    ESTIMASI<span class="text-slate-900">APP</span>
                </span>
                <div class="h-1 w-12 bg-blue-600 rounded-full mt-1.5 transition-all duration-300 group-hover:w-full">
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md md:max-w-lg auth-glass shadow-2xl shadow-slate-200/50 rounded-[2rem] p-6 sm:p-8 relative z-10"
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            {{ $slot }}
        </div>

        <div class="mt-8 text-slate-400 text-xs font-medium text-center relative z-10" data-aos="fade-up"
            data-aos-delay="300">
            &copy; {{ date('Y') }} Sistem Informasi Estimasi Terpadu
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        once: true
    });
    </script>
</body>

</html>