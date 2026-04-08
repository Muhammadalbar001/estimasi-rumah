<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" data-aos="fade-down">
            <h2 class="font-black text-2xl text-slate-800 leading-tight">Manajemen Pengguna</h2>
            <a href="{{ route('admin.users.create') }}"
                class="bg-slate-900 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-2xl shadow-xl transition active:scale-95 text-sm">
                + Tambah Admin Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-400 text-xs uppercase tracking-widest border-b">
                        <tr>
                            <th class="px-8 py-5">Informasi Pengguna</th>
                            <th class="px-8 py-5">Role</th>
                            <th class="px-8 py-5">Tanggal Bergabung</th>
                            <th class="px-8 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-slate-50 transition duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center font-bold text-slate-500 mr-4">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800">{{ $user->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700 border border-purple-200' : 'bg-blue-100 text-blue-700 border border-blue-200' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-slate-500 text-sm">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-8 py-6 text-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-bold text-xs">Edit</a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus pengguna ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 font-bold text-xs">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>