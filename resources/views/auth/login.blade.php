<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Selamat Datang</h2>
        <p class="text-sm text-slate-500 mt-2">Silakan masuk ke ruang kerja Anda.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="username" :value="__('Username / Email')"
                class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1 mb-2" />
            <x-text-input id="username"
                class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-bold text-slate-800 placeholder-slate-300 shadow-sm"
                type="text" name="username" :value="old('username')" required autofocus autocomplete="username"
                placeholder="Masukkan ID Anda" />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs font-bold" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-2 ml-1 mr-1">
                <x-input-label for="password" :value="__('Password')"
                    class="text-xs font-black text-slate-500 uppercase tracking-widest" />
                @if (Route::has('password.request'))
                <a class="text-xs font-bold text-blue-600 hover:text-blue-800 transition"
                    href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
                @endif
            </div>
            <x-text-input id="password"
                class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-bold text-slate-800 placeholder-slate-300 shadow-sm"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold" />
        </div>

        <div class="flex items-center ml-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox"
                    class="w-5 h-5 rounded-lg border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 transition cursor-pointer"
                    name="remember">
                <span class="ms-3 text-sm font-medium text-slate-600 group-hover:text-slate-900 transition">Ingat
                    saya</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center bg-slate-900 hover:bg-slate-800 text-white font-black py-4 rounded-2xl shadow-xl shadow-slate-900/20 transition transform active:scale-95 uppercase tracking-widest text-sm">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-6 border-t border-slate-200/60">
            <p class="text-sm font-medium text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}"
                    class="text-blue-600 hover:text-blue-800 font-black ml-1 transition hover:underline underline-offset-4 decoration-2">Daftar
                    Gratis</a>
            </p>
        </div>
    </form>
</x-guest-layout>
<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter">Selamat Datang</h2>
        <p class="text-sm font-medium text-slate-500 mt-2">Masuk untuk melanjutkan ke ruang kerja Anda.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="username" :value="__('Username / Email')"
                class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
            <x-text-input id="username" type="text" name="username" :value="old('username')" required autofocus
                autocomplete="username" placeholder="Masukkan ID Anda"
                class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm" />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs font-bold text-red-500" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1.5 mx-1">
                <x-input-label for="password" :value="__('Password')" class="text-xs font-bold text-slate-600" />
                @if (Route::has('password.request'))
                <a class="text-xs font-bold text-blue-600 hover:text-blue-800 transition"
                    href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
                @endif
            </div>
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="••••••••"
                class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold text-red-500" />
        </div>

        <div class="flex items-center ml-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-5 h-5 rounded-md border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 transition cursor-pointer">
                <span class="ms-3 text-sm font-semibold text-slate-600 group-hover:text-slate-900 transition">Ingat sesi
                    saya</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-extrabold py-4 px-6 rounded-full shadow-[0_8px_20px_rgba(15,23,42,0.2)] transition transform hover:-translate-y-0.5 active:scale-95 text-sm">
                Masuk ke Dashboard
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </button>
        </div>

        <div class="text-center pt-6 mt-2 border-t border-slate-200/50">
            <p class="text-sm font-medium text-slate-500">
                Belum memiliki akun?
                <a href="{{ route('register') }}"
                    class="text-slate-900 hover:text-blue-600 font-extrabold ml-1 transition decoration-2 hover:underline underline-offset-4">Daftar
                    sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>