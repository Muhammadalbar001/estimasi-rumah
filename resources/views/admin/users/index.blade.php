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
                                <span class="ml-2 text-emerald-600 font-semibold">Manajemen Akses</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Daftar Pengguna Sistem
                </h2>
                <p class="text-sm text-slate-500 mt-1 font-medium max-w-2xl">
                    Kelola data diri, kredensial login, dan tingkat hak akses (Role) seluruh pengguna aplikasi.
                </p>
            </div>

            <div>
                <a href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg shadow-sm text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Pengguna
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pb-12 pt-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl shadow-sm font-semibold flex items-center gap-3"
                data-aos="zoom-in">
                <div class="p-1.5 bg-emerald-100 rounded-lg">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead
                            class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-200 font-semibold">
                            <tr>
                                <th class="px-6 py-4">Informasi Akun</th>
                                <th class="px-6 py-4">Tingkat Akses</th>
                                <th class="px-6 py-4">Tanggal Bergabung</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($users as $user)
                            <tr class="hover:bg-slate-50 transition duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm {{ $user->role === 'admin' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">{{ $user->name }}</div>
                                            <div class="text-xs text-slate-500 mt-0.5"><span
                                                    class="font-medium">@</span>{{ $user->username ?? 'user' }} &bull;
                                                {{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                    <span
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Administrator
                                    </span>
                                    @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        Pengguna Biasa
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-slate-600">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="p-1.5 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </a>

                                        @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus pengguna ini secara permanen?');"
                                            class="inline-block">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-1.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                                title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>