<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Buat Akun Baru</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Lengkapi data untuk mulai menghitung RAB</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')"
                class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-1" />
            <x-text-input id="name"
                class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="Nama Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Alamat Email')"
                class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-1" />
            <x-text-input id="email"
                class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3"
                type="email" name="email" :value="old('email')" required autocomplete="username"
                placeholder="email@contoh.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" :value="__('Password')"
                    class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-1" />
                <x-text-input id="password"
                    class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3 text-sm"
                    type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 char" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi')"
                    class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-1" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl bg-slate-50/50 py-3 text-sm"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Ulangi" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs" />
            </div>
        </div>

        <div class="pt-6">
            <x-primary-button
                class="w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-xl transition-all duration-300 transform active:scale-95 uppercase tracking-widest text-xs">
                {{ __('Daftar Akun Sekarang') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-6 border-t border-slate-100 mt-4">
            <p class="text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                    class="text-blue-600 hover:text-blue-800 font-bold ml-1 transition underline decoration-2 underline-offset-4">Masuk</a>
            </p>
        </div>
    </form>
</x-guest-layout>