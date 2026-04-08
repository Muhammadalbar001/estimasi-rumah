<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Selamat Datang</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Masuk untuk melanjutkan analisis proyek Anda</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="username" :value="__('Username / Email')"
                class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-1" />
            <x-text-input id="username"
                class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3"
                type="text" name="username" :value="old('username')" required autofocus autocomplete="username"
                placeholder="Masukkan ID Anda" />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1">
                <x-input-label for="password" :value="__('Password')"
                    class="text-xs font-bold text-slate-700 uppercase tracking-wider" />
                @if (Route::has('password.request'))
                <a class="text-xs text-blue-600 hover:text-blue-800 font-semibold transition"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa?') }}
                </a>
                @endif
            </div>

            <x-text-input id="password"
                class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox"
                    class="rounded-lg border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 h-5 w-5 transition"
                    name="remember">
                <span class="ms-3 text-sm text-slate-600 group-hover:text-slate-800 transition">Ingat saya di perangkat
                    ini</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center bg-slate-900 hover:bg-blue-600 text-white font-bold py-4 rounded-xl shadow-xl transition-all duration-300 transform active:scale-95 uppercase tracking-widest text-xs">
                {{ __('Masuk Ke Sistem') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-6">
            <p class="text-sm text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}"
                    class="text-blue-600 hover:text-blue-800 font-bold ml-1 transition underline decoration-2 underline-offset-4">Daftar
                    Sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>