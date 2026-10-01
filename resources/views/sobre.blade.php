<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050505] text-white font-sans antialiased">

    @include('partials.header')

    <div class="bg-[#0a0a0a] border-b border-zinc-900 pt-10 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-black text-white uppercase tracking-widest flex items-center">
                <span class="w-2 h-8 bg-red-600 mr-4 skew-x-12"></span>
                Sobre a ZR Motors
            </h1>
            <p class="mt-4 text-zinc-400 max-w-2xl">Seu sonho, nosso compromisso. Conheça a história e os valores que nos tornam referência no mercado automóvel.</p>
        </div>
    </div>

    <section class="py-16 md:py-24 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-12 items-center mb-24">
                
                <div class="w-full lg:w-1/2 relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-red-900 opacity-20 blur rounded-md transition-opacity group-hover:opacity-40"></div>
                    <div class="relative aspect-video bg-zinc-900 rounded-md border border-zinc-800/60 overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 transition-transform duration-700 group-hover:scale-105" alt="Fachada ZR Motors">
                    </div>
                </div>

                <div class="w-full lg:w-1/2 space-y-6">
                    <h2 class="text-2xl font-bold text-white uppercase tracking-widest flex items-center mb-6">
                        <span class="w-1.5 h-5 bg-red-600 mr-3 skew-x-12"></span> Quem Somos
                    </h2>
                    
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        A <strong class="text-white">ZR Motors</strong> nasceu com um propósito muito claro: transformar a experiência de comprar um carro num processo transparente, seguro e empolgante. 
                    </p>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Sabemos que adquirir um veículo é, muitas vezes, a realização de um sonho. Por isso, assumimos o lema <strong class="text-red-500">"Seu sonho, nosso compromisso"</strong> não apenas como um slogan, mas como a nossa filosofia diária de trabalho.
                    </p>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Localizados em Brasília, contamos com uma equipa de especialistas apaixonados por automóveis e dedicados a encontrar a opção perfeita para o seu perfil e orçamento, garantindo que sai daqui com as chaves na mão e total tranquilidade.
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-[#0a0a0a] p-8 rounded-md border border-zinc-800/60 shadow-lg hover:border-red-600/50 transition-colors duration-300">
                    <div class="w-12 h-12 bg-red-900/20 text-red-500 rounded-sm flex items-center justify-center mb-6 border border-red-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-3">Garantia & Procedência</h3>
                    <p class="text-zinc-500 text-xs leading-relaxed">
                        Todos os veículos do nosso stock passam por uma rigorosa inspeção mecânica e avaliação de histórico. Vendemos apenas carros nos quais nós próprios confiaríamos.
                    </p>
                </div>

                <div class="bg-[#0a0a0a] p-8 rounded-md border border-zinc-800/60 shadow-lg hover:border-red-600/50 transition-colors duration-300">
                    <div class="w-12 h-12 bg-red-900/20 text-red-500 rounded-sm flex items-center justify-center mb-6 border border-red-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-3">Transparência Total</h3>
                    <p class="text-zinc-500 text-xs leading-relaxed">
                        Acreditamos em negócios claros. Desde as condições de financiamento até ao estado real do veículo, terá sempre acesso a toda a informação sem letras pequenas.
                    </p>
                </div>

                <div class="bg-[#0a0a0a] p-8 rounded-md border border-zinc-800/60 shadow-lg hover:border-red-600/50 transition-colors duration-300">
                    <div class="w-12 h-12 bg-red-900/20 text-red-500 rounded-sm flex items-center justify-center mb-6 border border-red-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-3">Atendimento de Excelência</h3>
                    <p class="text-zinc-500 text-xs leading-relaxed">
                        O nosso relacionamento não termina na entrega da chave. Oferecemos um acompanhamento premium e um processo ágil de financiamento e burocracia.
                    </p>
                </div>

            </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>