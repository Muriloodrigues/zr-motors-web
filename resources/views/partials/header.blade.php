<header class="border-b border-red-600/30 bg-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 flex justify-between items-center">

        <a href="{{ url('/') }}" class="flex flex-col hover:opacity-80 transition">
            <img src="{{ asset('images/logo-zr-motors.png') }}" alt="ZR Motors" class="h-16 md:h-8 w-auto object-contain pl-2">
        </a>

        <nav class="hidden md:flex space-x-8 text-xs font-bold tracking-widest text-zinc-400">
            <a href="{{ url('/') }}"
                class="{{ request()->is('/') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                INÍCIO
            </a>

            <a href="{{ route('veiculos') }}"
                class="{{ request()->routeIs('veiculos') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                VEÍCULOS
            </a>
            <a href="{{ route('financiamento') }}"
                class="{{ request()->routeIs('financiamento') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                FINANCIAMENTO
            </a>
            <a href="{{ route('contato') }}"
                class="{{ request()->routeIs('contato') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                CONTATO
            </a>
            <a href="{{ route('sobre') }}"
                class="{{ request()->routeIs('sobre') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                SOBRE NÓS
            </a>
        </nav>

        <div class="flex items-center text-white font-bold text-sm">
            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <span class="hidden sm:inline">(61) 3046-2305</span>
        </div>
    </div>
    <div
        class="w-full h-[2px] bg-gradient-to-r from-transparent via-red-600 to-transparent shadow-[0_0_20px_rgba(220,38,38,0.8)] relative z-10">
    </div>
</header>