<nav x-data="{ open: false }" class="bg-black border-b border-red-600/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo-zr.png') }}" alt="ZR Motors" class="block h-10 w-10 object-cover rounded-full">
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-zinc-300 hover:text-red-500 focus:text-red-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('carros.index')" :active="request()->routeIs('carros.*')" class="text-zinc-300 hover:text-red-500 focus:text-red-500">
                        Gestão de Veículos
                    </x-nav-link>
                    <x-nav-link :href="route('banners.index')" :active="request()->routeIs('banners.*')" class="text-zinc-300 hover:text-red-500 focus:text-red-500">
                        Banners
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 gap-6">
                
                <a href="{{ route('funcionarios.create') }}" class="inline-flex items-center justify-center px-5 py-2 text-xs font-bold tracking-widest text-red-500 uppercase transition-all duration-300 border rounded-md border-red-600/40 bg-red-900/10 hover:bg-red-600 hover:text-white hover:border-red-600 shadow-[0_0_15px_rgba(220,38,38,0.1)] hover:shadow-[0_0_20px_rgba(220,38,38,0.4)]">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Novo Funcionário
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-zinc-800 text-sm leading-4 font-bold tracking-widest uppercase rounded-md text-zinc-400 bg-[#111] hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#111] border border-zinc-800">
                            <x-dropdown-link :href="route('profile.edit')" class="text-zinc-300 hover:bg-zinc-800 hover:text-white">
                                {{ __('Editar Perfil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-500 hover:bg-zinc-800 hover:text-red-400">
                                    Sair do Sistema
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-zinc-500 hover:text-white hover:bg-zinc-900 focus:outline-none focus:bg-zinc-900 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" @click="open = false" style="display: none;" class="fixed inset-0 top-16 z-40 bg-black/70 backdrop-blur-md sm:hidden"></div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden absolute left-0 w-full z-50 bg-[#050505] border-b border-zinc-800 shadow-2xl">
        
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-red-600 text-red-500 bg-zinc-900/50' : 'border-transparent text-zinc-400 hover:text-white hover:bg-zinc-800 hover:border-zinc-700' }}">
                {{ __('Dashboard') }}
            </a>
            <a href="{{ route('carros.index') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('carros.*') ? 'border-red-600 text-red-500 bg-zinc-900/50' : 'border-transparent text-zinc-400 hover:text-white hover:bg-zinc-800 hover:border-zinc-700' }}">
                Gestão de Veículos
            </a>
            <a href="{{ route('banners.index') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('banners.*') ? 'border-red-600 text-red-500 bg-zinc-900/50' : 'border-transparent text-zinc-400 hover:text-white hover:bg-zinc-800 hover:border-zinc-700' }}">
                Banners
            </a>
        </div>

        <div class="px-4 py-3 border-t border-zinc-800">
            <a href="{{ route('funcionarios.create') }}" class="flex items-center justify-center w-full px-4 py-3 text-sm font-bold tracking-widest text-red-500 uppercase transition-all duration-300 border rounded-md border-red-600/40 bg-red-900/10 hover:bg-red-600 hover:text-white">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Novo Funcionário
            </a>
        </div>

        <div class="pt-4 pb-1 border-t border-zinc-800">
            <div class="px-4">
                <div class="font-medium text-base text-zinc-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-zinc-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 transition duration-150 ease-in-out">
                    {{ __('Perfil') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-red-500 hover:text-red-400 hover:bg-zinc-800 transition duration-150 ease-in-out">
                        Sair do Sistema
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>