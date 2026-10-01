<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $carro->marca }} {{ $carro->modelo }} - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="bg-black text-white font-sans antialiased">

    @include('partials.header')

    <div class="w-full bg-[#050505] pt-24 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative group">
            
            @if($carro->imagens->count() > 0)
                
                <button id="btn-prev" class="absolute left-6 md:left-10 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-red-600 text-white p-3 rounded-full z-10 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex items-center justify-center backdrop-blur-md border border-zinc-700 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div id="galeria-fotos" class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory hide-scrollbar cursor-grab">
                    @foreach($carro->imagens->sortBy('ordem') as $imagem)
                        <div class="flex-none w-[85%] md:w-[45%] lg:w-[32%] aspect-[4/3] snap-center rounded-md overflow-hidden relative border border-zinc-800 slide-foto">
                            <img src="{{ asset('storage/' . $imagem->caminho_imagem) }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>

                <button id="btn-next" class="absolute right-6 md:right-10 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-red-600 text-white p-3 rounded-full z-10 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex items-center justify-center backdrop-blur-md border border-zinc-700 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <p class="text-zinc-500 text-[0.65rem] text-center uppercase tracking-widest mt-2 font-bold"><<< Arraste ou use as setas para ver mais >>></p>
            @else
                <div class="w-full h-64 bg-zinc-900 rounded-md flex items-center justify-center border border-zinc-800">
                    <span class="text-zinc-500 uppercase tracking-widest font-bold text-sm">Veículo sem fotos disponíveis</span>
                </div>
            @endif
        </div>
    </div>

    <div class="pb-24 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-2/3 space-y-6">
                
                <div class="bg-[#0a0a0a] p-6 md:p-8 rounded-md border border-zinc-800/60 shadow-lg">
                    <h1 class="text-3xl md:text-4xl font-black text-white uppercase">{{ $carro->marca }} <span class="text-red-600">{{ $carro->modelo }}</span></h1>
                    <p class="text-zinc-400 text-sm uppercase tracking-widest mt-2 font-bold">{{ $carro->categoria }} • {{ $carro->tipo_veiculo }}</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-6 mt-8 border-t border-zinc-800/60 pt-8">
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Ano</p>
                            <p class="text-white font-bold text-lg">{{ $carro->ano_fabricacao }}/{{ $carro->ano_modelo }}</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Quilometragem</p>
                            <p class="text-white font-bold text-lg">{{ number_format($carro->quilometragem, 0, ',', '.') }} km</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Câmbio</p>
                            <p class="text-white font-bold text-lg">{{ $carro->cambio }}</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Combustível</p>
                            <p class="text-white font-bold text-lg">{{ $carro->combustivel }}</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Cor</p>
                            <p class="text-white font-bold text-lg">{{ $carro->cor ?? 'Não informada' }}</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Final da Placa</p>
                            <p class="text-white font-bold text-lg">{{ $carro->final_placa ?? '-' }}</p>
                        </div>
                        
                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Potência Motor</p>
                            <p class="text-white font-bold text-lg">{{ $carro->potencia_motor ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Tipo de Direção</p>
                            <p class="text-white font-bold text-lg">{{ $carro->tipo_direcao ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Portas</p>
                            <p class="text-white font-bold text-lg">{{ $carro->portas ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-1">Possui Kit GNV</p>
                            <p class="text-white font-bold text-lg">{{ $carro->kit_gnv ?? '-' }}</p>
                        </div>
                        
                    </div>
                </div>

                @if($carro->descricao)
                <div class="bg-[#0a0a0a] p-6 md:p-8 rounded-md border border-zinc-800/60 shadow-lg">
                    <h3 class="text-xl font-bold text-white uppercase tracking-widest mb-6 flex items-center">
                        <span class="w-1.5 h-5 bg-red-600 mr-3 skew-x-12"></span> Sobre este veículo
                    </h3>
                    <p class="text-zinc-400 text-sm leading-relaxed whitespace-pre-line">{{ $carro->descricao }}</p>
                </div>
                @endif

                @if($carro->opcionais)
                <div class="bg-[#0a0a0a] p-6 md:p-8 rounded-md border border-zinc-800/60 shadow-lg">
                    <h3 class="text-xl font-bold text-white uppercase tracking-widest mb-6 flex items-center">
                        <span class="w-1.5 h-5 bg-red-600 mr-3 skew-x-12"></span> Opcionais
                    </h3>
                    <p class="text-zinc-400 text-sm leading-relaxed whitespace-pre-line">{{ $carro->opcionais }}</p>
                </div>
                @endif
            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-red-700 p-8 rounded-md shadow-[0_0_30px_rgba(220,38,38,0.2)] sticky top-28">
                    
                    <p class="text-red-200 text-xs uppercase font-bold tracking-widest mb-2">Preço à vista</p>
                    <h2 class="text-4xl lg:text-5xl font-black text-white mb-8 tracking-tighter">R$ {{ number_format($carro->preco, 2, ',', '.') }}</h2>

                    <div class="bg-black/30 p-5 rounded-sm border border-red-500/30 mb-6 backdrop-blur-sm">
                        <p class="text-white text-base font-bold mb-2">Interessou? Fale conosco!</p>
                        <p class="text-red-100 text-xs leading-relaxed mb-6">Envie uma mensagem pelo WhatsApp para tirar dúvidas, agendar um test drive ou simular um financiamento.</p>
                        
                        @php
                            $msgWhatsApp = "Olá! Vi o anúncio do " . $carro->marca . " " . $carro->modelo . " (R$ " . number_format($carro->preco, 2, ',', '.') . ") no site da ZR Motors e gostaria de mais informações.";
                        @endphp
                        
                        <a href="https://wa.me/556130462305?text={{ urlencode($msgWhatsApp) }}" target="_blank" class="flex items-center justify-center w-full bg-[#25D366] hover:bg-[#1ebd59] text-white text-center font-bold py-4 px-4 rounded-sm transition-all hover:scale-105 uppercase tracking-widest text-xs shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                            </svg>
                            Chamar no WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slider = document.getElementById('galeria-fotos');
            if (!slider) return;

            const btnPrev = document.getElementById('btn-prev');
            const btnNext = document.getElementById('btn-next');

            if (btnPrev && btnNext) {
                const getScrollAmount = () => {
                    const slide = slider.querySelector('.slide-foto');
                    return slide ? slide.offsetWidth + 16 : 300; 
                };

                btnPrev.addEventListener('click', () => {
                    slider.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
                });

                btnNext.addEventListener('click', () => {
                    slider.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
                });
            }

            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.remove('snap-x', 'snap-mandatory', 'cursor-grab');
                slider.classList.add('cursor-grabbing');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
                slider.classList.add('snap-x', 'snap-mandatory', 'cursor-grab');
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
                slider.classList.add('snap-x', 'snap-mandatory', 'cursor-grab');
            });

            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; 
                slider.scrollLeft = scrollLeft - walk;
            });
        });
    </script>

</body>
</html>