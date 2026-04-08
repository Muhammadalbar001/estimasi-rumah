<nav x-data="{ open: false }" class="bg-slate-100 pt-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm border border-slate-200 rounded-[2rem] px-6">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="font-black text-xl tracking-tighter text-blue-600 flex items-center">
                            ESTIMASI<span class="text-slate-800">APP</span>
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="text-[10px] font-black uppercase tracking-widest border-b-2 transition duration-300">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('estimations.create')"
                            :active="request()->routeIs('estimations.create')"
                            class="text-[10px] font-black uppercase tracking-widest border-b-2 transition duration-300">
                            {{ __('Buat RAB') }}
                        </x-nav-link>

                        <x-nav-link :href="route('estimations.index')" :active="request()->routeIs('estimations.index')"
                            class="text-[10px] font-black uppercase tracking-widest border-b-2 transition duration-300">
                            {{ __('Riwayat') }}
                        </x-nav-link>

                        @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.reports.index')"
                            :active="request()->routeIs('admin.reports.index')"
                            class="text-[10px] font-black uppercase tracking-widest border-b-2 text-purple-600 border-purple-600">
                            {{ __('Laporan') }}
                        </x-nav-link>
                        @endif
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-slate-100 text-xs leading-4 font-black uppercase tracking-widest rounded-xl text-slate-500 bg-slate-50 hover:bg-slate-100 hover:text-slate-800 focus:outline-none transition duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-2">
                                    <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil Saya') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-600 font-bold">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-500 hover:bg-slate-100 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden mt-2 mx-4 bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('estimations.create')"
                :active="request()->routeIs('estimations.create')">Buat RAB</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('estimations.index')" :active="request()->routeIs('estimations.index')">
                Riwayat</x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-slate-100">
            <div class="px-4">
                <div class="font-bold text-slate-800">{{ Auth::user()->name }}</div>
                <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600">Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>