<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter">Buat Akun Baru</h2>
        <p class="text-sm font-medium text-slate-500 mt-2">Daftar sekarang dan rencanakan RAB pertama Anda.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')"
                    class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" placeholder="John Doe"
                    class="block w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm text-sm" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs font-bold text-red-500" />
            </div>

            <div>
                <x-input-label for="username" :value="__('Username')"
                    class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
                <x-text-input id="username" type="text" name="username" :value="old('username')" required
                    autocomplete="username" placeholder="Tanpa spasi"
                    class="block w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm text-sm" />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs font-bold text-red-500" />
            </div>
        </div>

        <div>
            <x-input-label for="email" :value="__('Alamat Email')"
                class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email"
                placeholder="email@contoh.com"
                class="block w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm text-sm" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-bold text-red-500" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label for="password" :value="__('Password')"
                    class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Min. 8 Karakter"
                    class="block w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm text-sm" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold text-red-500" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi')"
                    class="text-xs font-bold text-slate-600 mb-1.5 ml-1" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Ketik ulang"
                    class="block w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition font-semibold text-slate-900 placeholder-slate-400 shadow-sm text-sm" />
                <x-input-error :messages="$errors->get('password_confirmation')"
                    class="mt-2 text-xs font-bold text-red-500" />
            </div>
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-extrabold py-4 px-6 rounded-full shadow-[0_8px_20px_rgba(37,99,235,0.3)] transition transform hover:-translate-y-0.5 active:scale-95 text-sm">
                Daftar Akun Gratis
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </button>
        </div>

        <div class="text-center pt-6 mt-2 border-t border-slate-200/50">
            <p class="text-sm font-medium text-slate-500">
                Sudah memiliki akun?
                <a href="{{ route('login') }}"
                    class="text-slate-900 hover:text-blue-600 font-extrabold ml-1 transition decoration-2 hover:underline underline-offset-4">Masuk
                    di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>