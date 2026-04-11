<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-end gap-6 border-b border-slate-200 pb-6"
            data-aos="fade-down" data-aos-duration="600">
            <div>
                <nav class="flex text-sm text-slate-500 mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-slate-400 hover:text-slate-600 font-medium transition">Admin Panel</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('admin.users.index') }}"
                                    class="ml-2 text-slate-400 hover:text-slate-600 font-medium transition">Pengguna</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2 text-emerald-600 font-semibold">Tambah Baru</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Registrasi Akun</h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">Lengkapi formulir di bawah ini untuk
                    menambahkan akses pengguna baru ke dalam sistem.</p>
            </div>

            <div>
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center gap-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 px-5 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition">
                    &larr; Batal & Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">

                <form method="POST" action="{{ route('admin.users.store') }}" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <x-text-input id="name" name="name" type="text"
                                class="block w-full px-4 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                :value="old('name')" required autofocus placeholder="Masukkan nama" />
                            <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <x-text-input id="username" name="username" type="text"
                                class="block w-full px-4 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                :value="old('username')" required placeholder="Tanpa spasi" />
                            <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('username')" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="email" :value="__('Alamat Email')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <x-text-input id="email" name="email" type="email"
                                class="block w-full px-4 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                :value="old('email')" required placeholder="email@instansi.com" />
                            <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="role" :value="__('Tingkat Akses (Role)')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <select id="role" name="role"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm shadow-sm"
                                required>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pengguna Biasa (User)
                                </option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator
                                </option>
                            </select>
                            <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('role')" />
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-5 rounded-xl border border-slate-200 mt-2">
                        <div>
                            <x-input-label for="password" :value="__('Password')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <x-text-input id="password" name="password" type="password"
                                class="block w-full px-4 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                required placeholder="Minimal 8 karakter" />
                            <x-input-error class="mt-2 text-xs font-bold" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')"
                                class="text-sm font-semibold text-slate-700 mb-1.5" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="block w-full px-4 py-2.5 bg-white border-slate-300 text-slate-900 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                required placeholder="Ketik ulang password" />
                            <x-input-error class="mt-2 text-xs font-bold"
                                :messages="$errors->get('password_confirmation')" />
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-200 flex justify-end">
                        <button type="submit"
                            class="bg-slate-900 hover:bg-slate-800 text-white px-6 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan Pengguna Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>