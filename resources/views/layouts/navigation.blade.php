<div class="h-24 sm:h-28 w-full bg-transparent pointer-events-none"></div>

<div class="fixed top-4 left-0 w-full z-50 px-4 sm:px-6 lg:px-8" x-data="{ open: false }">
    <nav class="max-w-7xl mx-auto bg-slate-900/95 backdrop-blur-md border border-slate-700 shadow-2xl shadow-slate-900/40 transition-all duration-500 px-6 py-3"
        :class="{'rounded-3xl': open, 'rounded-full': !open}">

        <div class="flex items-center justify-between h-12">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-1 text-xl font-black tracking-tighter text-white transition transform hover:scale-105 duration-300">
                    ESTIMASI<span class="text-blue-500">APP</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                @php
                $activeClass = 'text-white border-b-2 border-blue-500 pb-1';
                $inactiveClass = 'text-slate-400 hover:text-white border-b-2 border-transparent hover:border-slate-600
                pb-1';
                @endphp

                <a href="{{ route('dashboard') }}"
                    class="text-xs font-bold uppercase tracking-widest transition duration-300 {{ request()->routeIs('dashboard') ? $activeClass : $inactiveClass }}">
                    Dashboard
                </a>

                <a href="{{ route('estimations.create') }}"
                    class="text-xs font-bold uppercase tracking-widest transition duration-300 {{ request()->routeIs('estimations.create') ? $activeClass : $inactiveClass }}">
                    Buat RAB
                </a>

                <a href="{{ route('estimations.index') }}"
                    class="text-xs font-bold uppercase tracking-widest transition duration-300 {{ request()->routeIs('estimations.index') ? $activeClass : $inactiveClass }}">
                    Riwayat
                </a>

                @if(Auth::user()->role === 'admin')
                <div class="h-4 w-px bg-slate-700 mx-2"></div> <a href="{{ route('admin.reports.index') }}"
                    class="text-xs font-bold uppercase tracking-widest transition duration-300 {{ request()->routeIs('admin.reports.index') ? 'text-purple-400 border-b-2 border-purple-500 pb-1' : 'text-purple-400/70 hover:text-purple-300 border-b-2 border-transparent hover:border-purple-800 pb-1' }}">
                    Laporan PDF
                </a>
                @endif
            </div>

            <div class="hidden md:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-5 py-2.5 border border-slate-700 text-xs font-black uppercase tracking-widest rounded-full text-slate-300 bg-slate-800 hover:bg-slate-700 hover:text-white focus:outline-none transition duration-300 shadow-inner">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-2 transition-transform duration-300">
                                <svg class="fill-current h-4 w-4 opacity-70" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50">
                            <p class="text-xs font-black text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] font-bold text-slate-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')"
                            class="text-xs font-bold text-slate-700 hover:text-blue-600">
                            {{ __('Pengaturan Profil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-xs font-bold text-red-600 hover:bg-red-50">
                                {{ __('Keluar Sistem') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-full text-slate-400 hover:text-white hover:bg-slate-800 transition duration-300 focus:outline-none">
                    <svg class="h-6 w-6 transform transition-transform duration-300" :class="{'rotate-90': open}"
                        stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" style="display: none;" x-transition:enter="transition ease-out duration-300 origin-top"
            x-transition:enter-start="opacity-0 transform -translate-y-4 scale-y-95"
            x-transition:enter-end="opacity-100 transform translate-y-0 scale-y-100"
            x-transition:leave="transition ease-in duration-200 origin-top"
            x-transition:leave-start="opacity-100 transform translate-y-0 scale-y-100"
            x-transition:leave-end="opacity-0 transform -translate-y-4 scale-y-95"
            class="md:hidden mt-4 pt-4 pb-2 border-t border-slate-700">

            <div class="flex flex-col space-y-4 px-3">
                <a href="{{ route('dashboard') }}"
                    class="text-xs font-bold uppercase tracking-widest transition {{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-slate-400 hover:text-white' }}">Dashboard</a>
                <a href="{{ route('estimations.create') }}"
                    class="text-xs font-bold uppercase tracking-widest transition {{ request()->routeIs('estimations.create') ? 'text-blue-400' : 'text-slate-400 hover:text-white' }}">Buat
                    RAB Baru</a>
                <a href="{{ route('estimations.index') }}"
                    class="text-xs font-bold uppercase tracking-widest transition {{ request()->routeIs('estimations.index') ? 'text-blue-400' : 'text-slate-400 hover:text-white' }}">Riwayat
                    Proyek</a>

                @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.reports.index') }}"
                    class="text-xs font-bold uppercase tracking-widest transition {{ request()->routeIs('admin.reports.index') ? 'text-purple-400' : 'text-purple-400/60 hover:text-purple-400' }}">Laporan
                    PDF</a>
                @endif
            </div>

            <div class="mt-6 pt-4 border-t border-slate-700/60 px-3 flex flex-col space-y-3">
                <div>
                    <div class="font-black text-white text-sm">{{ Auth::user()->name }}</div>
                    <div class="text-[10px] font-bold text-slate-400">{{ Auth::user()->email }}</div>
                </div>

                <a href="{{ route('profile.edit') }}"
                    class="text-xs font-bold text-slate-300 hover:text-white transition mt-2">Pengaturan Profil</a>

                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                    @csrf
                    <button type="submit"
                        class="text-xs font-bold text-red-500 hover:text-red-400 transition w-full text-left">
                        Keluar (Log Out)
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>