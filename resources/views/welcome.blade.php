<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZR Motors - Seu Sonho, Nosso Compromisso</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-sans antialiased">
    @include('partials.header')

    <section class="bg-[#050505] py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-4">
                        Venha conquistar o seu carro!
                    </h2>

                    <p class="text-xl text-zinc-300 mb-6 font-light">
                        Seu sonho, nosso compromisso!
                    </p>

                    <div class="h-[2px] w-48 bg-gradient-to-r from-red-600 via-red-500 to-transparent shadow-[0_0_15px_rgba(220,38,38,0.8)] mb-10 rounded-full"></div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-8 rounded-full text-center transition shadow-lg shadow-red-900/30 uppercase tracking-widest text-sm">
                            Ver Estoque
                        </a>

                        <a href="#" class="bg-transparent border border-zinc-600 hover:border-zinc-400 hover:bg-zinc-800 text-white font-bold py-4 px-8 rounded-full text-center transition uppercase tracking-widest text-sm">
                            Fazer Minha Simulação
                        </a>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-black rounded-xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>

                    <img src="{{ isset($configuracoes->banner_novidades) && $configuracoes->banner_novidades ? asset('storage/' . $configuracoes->banner_novidades) : asset('images/banner-placeholder.png') }}"
                        alt="Novidades do Estoque"
                        class="relative rounded-xl w-full object-cover shadow-2xl border border-zinc-800/50">
                </div>

            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-12">
            <h3 class="text-zinc-300 font-bold uppercase tracking-widest mb-4 flex items-center text-sm">
                <span class="w-2 h-4 bg-red-600 mr-2 skew-x-12"></span> Encontre seu veículo ideal
            </h3>

            <div class="bg-[#111] border border-zinc-800 p-3 rounded flex flex-col md:flex-row gap-3">
                <select class="bg-black border border-zinc-800 text-zinc-400 text-sm focus:ring-red-600 focus:border-red-600 flex-1 px-4 py-3 rounded-sm">
                    <option>Todas as marcas</option>
                </select>
                <select class="bg-black border border-zinc-800 text-zinc-400 text-sm focus:ring-red-600 focus:border-red-600 flex-1 px-4 py-3 rounded-sm">
                    <option>Preço máximo</option>
                </select>
                <select class="bg-black border border-zinc-800 text-zinc-400 text-sm focus:ring-red-600 focus:border-red-600 flex-1 px-4 py-3 rounded-sm">
                    <option>Ano de fabricação</option>
                </select>
                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm transition flex items-center justify-center gap-2 uppercase tracking-widest text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Buscar
                </button>
            </div>
        </div>

        <div class="flex justify-between items-end mb-6 border-b border-zinc-900 pb-3">
            <h3 class="text-zinc-300 font-bold uppercase tracking-widest flex items-center text-sm">
                <span class="w-2 h-4 bg-red-600 mr-2 skew-x-12"></span> Veículos em Destaque
            </h3>
            <a href="{{ route('veiculos') }}" class="text-xs text-zinc-500 hover:text-white uppercase tracking-widest transition">Ver Todos &rarr;</a>
        </div>

        @if($carros->isEmpty())
        <div class="text-center py-16 bg-[#111] rounded border border-zinc-800">
            <p class="text-zinc-500 text-sm uppercase tracking-widest">Estoque sendo atualizado. Volte em breve!</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($carros as $carro)
            <a href="{{ route('vitrine.show', $carro->id) }}" class="block group">
                <div class="bg-[#0a0a0a] border border-red-600/30 rounded-md overflow-hidden hover:border-red-500 transition duration-300 flex flex-col relative h-full">

                    <div class="absolute top-3 right-3 z-10 text-zinc-400 hover:text-red-600 cursor-pointer transition" onclick="event.preventDefault();">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>

                    @php
                    // Procura a foto que tem a ordem 1, se não encontrar, pega a primeira que houver
                    $capa = $carro->imagens->sortBy('ordem')->first();
                    @endphp

                    <div class="w-full aspect-[4/3] overflow-hidden bg-zinc-900 relative">
                        @if($capa)
                        <img src="{{ asset('storage/' . $capa->caminho_imagem) }}" alt="{{ $carro->marca }} {{ $carro->modelo }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-zinc-900">
                            <svg class="w-10 h-10 text-zinc-700 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-zinc-600 text-xs uppercase font-bold tracking-widest">Sem Foto</span>
                        </div>
                        @endif
                    </div>

                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="text-red-600 text-xs font-black uppercase tracking-widest">{{ $carro->marca }}</p>
                            <h4 class="text-xl font-bold text-white uppercase tracking-wider truncate mt-1">{{ $carro->modelo }}</h4>

                            <div class="mt-4 grid grid-cols-2 gap-y-3 text-[0.65rem] text-zinc-400 font-semibold uppercase tracking-widest">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $carro->ano_fabricacao }}
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $carro->cambio }}
                                </div>
                                <div class="flex items-center gap-1.5 col-span-2">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    {{ number_format($carro->quilometragem, 0, '', '.') }} KM
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-1 flex flex-col">
                            <p class="text-2xl font-black text-red-600 tracking-tighter">R$ {{ number_format($carro->preco, 0, ',', '.') }}</p>

                            <span class="mt-3 text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest group-hover:text-red-500 transition-colors flex items-center">
                                Ver Detalhes &rarr;
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        @endif
    </main>

    <style>
        .hide-scroll::-webkit-scrollbar {
            display: none;
        }

        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <section class="py-20 bg-[#050505] border-t border-zinc-900 overflow-hidden relative" id="seccao-entregas">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-black text-white uppercase tracking-widest flex items-center">
                        <span class="w-2 h-8 bg-red-600 mr-4 skew-x-12"></span>
                        Entregas Realizadas
                    </h2>
                    <p class="mt-4 text-zinc-400 max-w-2xl">Veja quem já realizou o sonho do carro novo connosco.</p>
                </div>
            </div>

            <div class="relative w-full">

                <button id="seta-esquerda" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 md:-translate-x-6 z-10 bg-black/80 hover:bg-red-600 text-white p-3 rounded-full border border-zinc-800 hover:border-red-600 transition-all duration-300 opacity-0 pointer-events-none hidden sm:flex items-center justify-center focus:outline-none shadow-xl cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div id="carrossel-fotos" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory hide-scroll cursor-grab active:cursor-grabbing scroll-smooth">

                    @foreach($depoimentos as $depoimento)
                    @if($depoimento->imagens && count($depoimento->imagens) > 0)
                    @foreach($depoimento->imagens as $imagem)
                    <div class="bg-[#111] border border-zinc-800 rounded-xl overflow-hidden hover:border-red-600/50 transition duration-500 relative group snap-center shrink-0 w-[80vw] sm:w-[350px] h-[450px]">

                        <img src="{{ asset('storage/' . $imagem) }}" alt="Entrega ZR Motors" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-110 transition duration-700">

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-black/80 to-transparent p-6 opacity-0 group-hover:opacity-100 transition duration-500">
                            <div class="flex items-center gap-2">
                                <span class="w-1.5 h-4 bg-red-600 skew-x-12"></span>
                                <span class="text-white font-bold tracking-widest uppercase text-xs">ZR Motors</span>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    @endif
                    @endforeach

                </div>

                <button id="seta-direita" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 md:translate-x-6 z-10 bg-black/80 hover:bg-red-600 text-white p-3 rounded-full border border-zinc-800 hover:border-red-600 transition-all duration-300 hidden sm:flex items-center justify-center focus:outline-none shadow-xl cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carrossel = document.getElementById('carrossel-fotos');
            const setaEsq = document.getElementById('seta-esquerda');
            const setaDir = document.getElementById('seta-direita');
            const seccao = document.getElementById('seccao-entregas');

            const rolagem = 374;
            let temporizador;

            function atualizarSetas() {
                const scrollMaximo = carrossel.scrollWidth - carrossel.clientWidth;

                if (carrossel.scrollLeft <= 5) {
                    setaEsq.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    setaEsq.classList.remove('opacity-0', 'pointer-events-none');
                }

                if (carrossel.scrollLeft >= scrollMaximo - 5) {
                    setaDir.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    setaDir.classList.remove('opacity-0', 'pointer-events-none');
                }
            }

            function rolarAutomatico() {
                if (carrossel.scrollLeft + carrossel.clientWidth >= carrossel.scrollWidth - 10) {
                    carrossel.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                } else {
                    carrossel.scrollBy({
                        left: rolagem,
                        behavior: 'smooth'
                    });
                }
            }

            setaDir.addEventListener('click', () => {
                carrossel.scrollBy({
                    left: rolagem,
                    behavior: 'smooth'
                });
                reiniciarTemporizador();
            });

            setaEsq.addEventListener('click', () => {
                carrossel.scrollBy({
                    left: -rolagem,
                    behavior: 'smooth'
                });
                reiniciarTemporizador();
            });

            carrossel.addEventListener('scroll', atualizarSetas);
            window.addEventListener('resize', atualizarSetas);

            function iniciarAutomatico() {
                temporizador = setInterval(rolarAutomatico, 3000);
            }

            function reiniciarTemporizador() {
                clearInterval(temporizador);
                iniciarAutomatico();
            }

            seccao.addEventListener('mouseenter', () => clearInterval(temporizador));
            seccao.addEventListener('mouseleave', iniciarAutomatico);

            setTimeout(atualizarSetas, 150); 
            iniciarAutomatico();
        });
    </script>


    @include('partials.footer')
</body>

</html>