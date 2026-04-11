<x-guest-layout>
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                </path>
            </svg>
        </div>
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Lupa Password?</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium leading-relaxed">
            Jangan khawatir! Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password
            Anda.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Alamat Email')"
                class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1 mb-2" />
            <x-text-input id="email"
                class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition font-bold text-slate-800 placeholder-slate-300 shadow-sm"
                type="email" name="email" :value="old('email')" required autofocus placeholder="email@contoh.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-bold" />
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center bg-slate-900 hover:bg-slate-800 text-white font-black py-4 rounded-2xl shadow-xl shadow-slate-900/20 transition transform active:scale-95 uppercase tracking-widest text-sm">
                {{ __('Kirim Tautan Reset') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <a href="{{ route('login') }}"
                class="text-sm font-bold text-slate-500 hover:text-slate-900 transition flex items-center justify-center gap-1">
                &larr; Kembali ke halaman Login
            </a>
        </div>
    </form>
</x-guest-layout>