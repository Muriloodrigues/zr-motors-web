<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Veículos - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#050505] text-white font-sans antialiased">

    @include('partials.header')

    <div class="bg-[#0a0a0a] border-b border-zinc-900 pt-10 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-black text-white uppercase tracking-widest flex items-center">
                <span class="w-2 h-8 bg-red-600 mr-4 skew-x-12"></span>
                Nosso Estoque
            </h1>
            <p class="mt-4 text-zinc-400 max-w-2xl">Encontre o veículo ideal para você. Todos os nossos carros são rigorosamente revisados e com garantia de procedência.</p>
        </div>
    </div>

    <section class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-8">

                @forelse($carros as $carro)
                    
                    <a href="{{ route('vitrine.show', $carro->id) }}" class="flex flex-col bg-[#111] border border-zinc-800 rounded-md overflow-hidden transition-all duration-300 hover:border-red-600 hover:shadow-[0_0_15px_rgba(220,38,38,0.15)] group">

                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-zinc-900 flex items-center justify-center">
                            @php
                            $capa = $carro->imagens->sortBy('ordem')->first();
                            @endphp

                            @if($capa)
                            <img src="{{ asset('storage/' . $capa->caminho_imagem) }}"
                                alt="{{ $carro->marca }} {{ $carro->modelo }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                            <div class="flex flex-col items-center justify-center w-full h-full">
                                <svg class="w-10 h-10 text-zinc-700 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-zinc-600 text-[0.65rem] uppercase font-bold tracking-widest">Sem Foto</span>
                            </div>
                            @endif

                            <div class="absolute top-3 right-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-sm shadow-md z-10">
                                {{ $carro->ano_fabricacao }}/{{ $carro->ano_modelo }}
                            </div>
                        </div>

                        <div class="p-5 flex flex-col flex-grow relative z-10 bg-[#111]">
                            <h3 class="text-white font-bold text-lg uppercase tracking-wider mb-1 line-clamp-1">
                                {{ $carro->marca }} <span class="text-red-600">{{ $carro->modelo }}</span>
                            </h3>
                            <p class="text-zinc-400 text-[0.70rem] uppercase tracking-widest mb-4">
                                {{ $carro->tipo_veiculo ?? 'Passeio' }} • {{ $carro->combustivel }}
                            </p>

                            <div class="flex items-center justify-between text-[0.70rem] text-zinc-400 font-bold tracking-widest mb-6">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ number_format($carro->quilometragem, 0, ',', '.') }} KM
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                    {{ $carro->cambio }}
                                </span>
                            </div>

                            <div class="mt-auto pt-4 border-t border-zinc-800 flex items-center justify-between">
                                <div class="text-xl font-black text-white">
                                    R$ {{ number_format($carro->preco, 2, ',', '.') }}
                                </div>

                                <div class="bg-zinc-800 text-zinc-400 group-hover:bg-red-600 group-hover:text-white p-2 rounded-sm transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </a>

                @empty
                    <div class="col-span-full text-center py-20 bg-[#111] border border-zinc-800 border-dashed rounded-xl">
                        <svg class="w-16 h-16 text-zinc-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p class="text-zinc-400 text-lg uppercase tracking-widest font-bold">Nenhum veículo disponível no estoque no momento.</p>
                    </div>
                @endforelse

            </div>

            <div class="mt-12">
                {{ $carros->links() }}
            </div>

        </div>
    </section>

    @include('partials.footer')

</body>

</html>