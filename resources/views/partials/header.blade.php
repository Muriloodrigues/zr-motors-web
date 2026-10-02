<!-- Classe para o JS: -translate-y-full -->
<header id="main-header" class="border-b border-red-600/30 bg-black sticky top-0 z-50 transition-transform duration-500">
    
    <div id="mobile-menu-overlay" class="hidden md:hidden fixed inset-0 bg-black/60 backdrop-blur-md z-40 transition-opacity"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 flex justify-between items-center relative z-50 bg-black">

        <a href="{{ url('/') }}" class="flex flex-col hover:opacity-80 transition">
            <img src="{{ asset('images/logo-zr-motors.png') }}" alt="ZR Motors" class="h-8 md:h-12 w-auto object-contain pl-2">
        </a>

        <nav class="hidden md:flex space-x-8 text-xs font-bold tracking-widest text-zinc-400">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                INÍCIO
            </a>
            <a href="{{ route('veiculos') }}" class="{{ request()->routeIs('veiculos') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                VEÍCULOS
            </a>
            <a href="{{ route('financiamento') }}" class="{{ request()->routeIs('financiamento') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                FINANCIAMENTO
            </a>
            <a href="{{ route('contato') }}" class="{{ request()->routeIs('contato') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                CONTATO
            </a>
            <a href="{{ route('sobre') }}" class="{{ request()->routeIs('sobre') || request()->routeIs('vitrine.show') ? 'text-white border-b-2 border-red-600 pb-1' : 'text-zinc-400 hover:text-white transition' }}">
                SOBRE NÓS
            </a>
        </nav>

        <div class="flex items-center gap-4">
            
            <div class="hidden sm:flex items-center relative z-50">
                <a href="https://wa.me/556130462305" target="_blank" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold text-sm px-5 py-2 rounded-full transition-all duration-300 shadow-[0_0_15px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.7)]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.031 0C5.394 0 0 5.392 0 12.029c0 2.12.553 4.184 1.603 6.009L.43 24l6.115-1.597A11.96 11.96 0 0012.031 24c6.634 0 12.026-5.392 12.026-12.029C24.057 5.392 18.665 0 12.031 0zm3.897 17.15c-.171.482-.992.935-1.371.97-.379.034-.848.196-2.737-.582-2.274-.937-3.714-3.238-3.829-3.393-.114-.154-.913-1.218-.913-2.325 0-1.107.574-1.65.782-1.874.208-.224.455-.28.607-.28.152 0 .304 0 .436.007.139.006.326-.051.498.368.176.425.597 1.463.652 1.577.054.115.09.248.014.4-.076.152-.114.247-.228.38-.114.133-.243.284-.343.394-.112.122-.232.256-.102.483.129.227.575.955 1.236 1.547.857.768 1.564.996 1.792 1.11.228.114.364.095.498-.057.133-.153.576-.667.728-.897.153-.229.305-.19.513-.114.208.076 1.312.619 1.54.733.228.114.38.172.436.267.057.095.057.552-.114 1.034z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>

            <button id="btn-mobile-menu" class="md:hidden text-zinc-300 hover:text-white focus:outline-none ml-2 relative z-50">
                <svg id="icon-bars" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="icon-close" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>
    </div>

    <div class="w-full h-[2px] bg-gradient-to-r from-transparent via-red-600 to-transparent shadow-[0_0_20px_rgba(220,38,38,0.8)] relative z-50"></div>

    <div id="mobile-menu-panel" class="hidden md:hidden absolute left-0 w-full bg-[#050505] border-b border-red-600/30 shadow-2xl z-50 transition-all">
        <div class="flex flex-col px-6 py-4 space-y-1">
            <a href="{{ url('/') }}" class="block py-3 text-sm font-bold tracking-widest border-b border-zinc-900 {{ request()->is('/') ? 'text-red-500' : 'text-zinc-400' }}">INÍCIO</a>
            <a href="{{ route('veiculos') }}" class="block py-3 text-sm font-bold tracking-widest border-b border-zinc-900 {{ request()->routeIs('veiculos') || request()->routeIs('vitrine.show') ? 'text-red-500' : 'text-zinc-400' }}">VEÍCULOS</a>
            <a href="{{ route('financiamento') }}" class="block py-3 text-sm font-bold tracking-widest border-b border-zinc-900 {{ request()->routeIs('financiamento') || request()->routeIs('vitrine.show') ? 'text-red-500' : 'text-zinc-400' }}">FINANCIAMENTO</a>
            <a href="{{ route('contato') }}" class="block py-3 text-sm font-bold tracking-widest border-b border-zinc-900 {{ request()->routeIs('contato') || request()->routeIs('vitrine.show') ? 'text-red-500' : 'text-zinc-400' }}">CONTATO</a>
            <a href="{{ route('sobre') }}" class="block py-3 text-sm font-bold tracking-widest border-b border-zinc-900 {{ request()->routeIs('sobre') || request()->routeIs('vitrine.show') ? 'text-red-500' : 'text-zinc-400' }}">SOBRE NÓS</a>
            
            <div class="pt-8 pb-4 flex justify-center">
                <a href="https://wa.me/556130462305" target="_blank" class="inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold text-sm px-8 py-3 rounded-full transition-all duration-300 shadow-[0_0_15px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.7)] w-full max-w-[250px]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.031 0C5.394 0 0 5.392 0 12.029c0 2.12.553 4.184 1.603 6.009L.43 24l6.115-1.597A11.96 11.96 0 0012.031 24c6.634 0 12.026-5.392 12.026-12.029C24.057 5.392 18.665 0 12.031 0zm3.897 17.15c-.171.482-.992.935-1.371.97-.379.034-.848.196-2.737-.582-2.274-.937-3.714-3.238-3.829-3.393-.114-.154-.913-1.218-.913-2.325 0-1.107.574-1.65.782-1.874.208-.224.455-.28.607-.28.152 0 .304 0 .436.007.139.006.326-.051.498.368.176.425.597 1.463.652 1.577.054.115.09.248.014.4-.076.152-.114.247-.228.38-.114.133-.243.284-.343.394-.112.122-.232.256-.102.483.129.227.575.955 1.236 1.547.857.768 1.564.996 1.792 1.11.228.114.364.095.498-.057.133-.153.576-.667.728-.897.153-.229.305-.19.513-.114.208.076 1.312.619 1.54.733.228.114.38.172.436.267.057.095.057.552-.114 1.034z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnMenu = document.getElementById('btn-mobile-menu');
        const panel = document.getElementById('mobile-menu-panel');
        const overlay = document.getElementById('mobile-menu-overlay');
        const iconBars = document.getElementById('icon-bars');
        const iconClose = document.getElementById('icon-close');

        function toggleMenu() {
            panel.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
            
            iconBars.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
            
            document.body.classList.toggle('overflow-hidden');
        }

        btnMenu.addEventListener('click', toggleMenu);
        
        overlay.addEventListener('click', toggleMenu);
    });
</script>