<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050505] text-white font-sans antialiased">

    @include('partials.header')

    <div class="bg-[#0a0a0a] border-b border-zinc-900 pt-10 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-black text-white uppercase tracking-widest flex items-center">
                <span class="w-2 h-8 bg-red-600 mr-4 skew-x-12"></span>
                Fale Connosco
            </h1>
            <p class="mt-4 text-zinc-400 max-w-2xl">Estamos prontos para o ajudar a encontrar o seu próximo carro. Envie-nos uma mensagem ou visite o nosso stand.</p>
        </div>
    </div>

    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">

            <div class="w-full lg:w-1/3 space-y-8">

                <div class="bg-[#0a0a0a] p-8 rounded-md border border-zinc-800/60 shadow-lg">
                    <h3 class="text-xl font-bold text-white uppercase tracking-widest mb-6 flex items-center">
                        <span class="w-1.5 h-5 bg-red-600 mr-3 skew-x-12"></span> Detalhes
                    </h3>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-red-900/20 p-3 rounded-sm text-red-500 mr-4 border border-red-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest">WhatsApp / Telefone</p>
                                <p class="text-white font-bold mt-1 text-lg">(61) 3046-2305</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-zinc-900 p-3 rounded-sm text-zinc-400 mr-4 border border-zinc-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest">E-mail</p>
                                <p class="text-white font-bold mt-1">contato@zrmotors.com.br</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-zinc-900 p-3 rounded-sm text-zinc-400 mr-4 border border-zinc-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest">Localização</p>
                                <p class="text-zinc-300 text-sm mt-1 leading-relaxed">Cidade do Automóvel<br>SCIA Quadra 15, Conjunto X<br>Brasília - DF</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full h-48 bg-zinc-900 rounded-md border border-zinc-800/60 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-30 group-hover:opacity-50 transition-opacity" alt="Mapa">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="https://maps.google.com" target="_blank" class="bg-black/80 hover:bg-red-600 text-white text-xs font-bold uppercase tracking-widest py-2 px-4 rounded-sm border border-zinc-700 backdrop-blur-sm transition-colors">
                            Ver no Google Maps
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/3">
                <div class="bg-[#0a0a0a] p-8 md:p-10 rounded-md border border-zinc-800/60 shadow-lg">
                    <h3 class="text-2xl font-bold text-white uppercase tracking-widest mb-2">Envie uma mensagem</h3>
                    <p class="text-zinc-500 text-sm mb-8">Tem alguma dúvida ou procura um carro específico? Preencha o formulário abaixo e entraremos em contacto o mais breve possível.</p>

                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Nome Completo</label>
                                <input type="text" id="nome" name="nome" placeholder="Seu nome" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                            </div>
                            <div>
                                <label for="telefone" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Telefone / WhatsApp</label>
                                <input type="text" id="telefone" name="telefone" placeholder="(61) 90000-0000" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="seu@email.com" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                        </div>

                        <div>
                            <label for="assunto" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Assunto</label>
                            <select id="assunto" name="assunto" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors cursor-pointer">
                                <option value="interesse">Interesse num veículo</option>
                                <option value="vender">Quero vender o meu carro</option>
                                <option value="duvida">Dúvida geral</option>
                                <option value="outro">Outro assunto</option>
                            </select>
                        </div>

                        <div>
                            <label for="mensagem" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Mensagem</label>
                            <textarea id="mensagem" name="mensagem" rows="5" placeholder="Como podemos ajudar?" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors resize-none"></textarea>
                        </div>

                        <button type="button" class="bg-red-700 hover:bg-red-600 text-white font-bold py-4 px-8 rounded-sm transition-colors uppercase tracking-widest text-sm shadow-lg shadow-red-900/20">
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    @include('partials.footer')

</body>
</html>