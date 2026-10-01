<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiamento - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050505] text-white font-sans antialiased">

    @include('partials.header')

    <div class="bg-[#0a0a0a] border-b border-zinc-900 pt-10 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-black text-white uppercase tracking-widest flex items-center">
                <span class="w-2 h-8 bg-red-600 mr-4 skew-x-12"></span>
                Financiamento
            </h1>
            <p class="mt-4 text-zinc-400 max-w-2xl">Trabalhamos com as melhores taxas do mercado e os principais bancos para garantir que o seu sonho cabe no seu bolso.</p>
        </div>
    </div>

    <section class="py-16 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-[#0a0a0a] p-8 md:p-10 rounded-md border border-zinc-800/60 shadow-lg">
                <h3 class="text-2xl font-bold text-white uppercase tracking-widest mb-8 text-center">
                    Simulador Rápido
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label for="valor_carro" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Valor do Veículo (R$)</label>
                        <input type="number" id="valor_carro" placeholder="Ex: 78990" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                    </div>

                    <div>
                        <label for="valor_entrada" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Valor da Entrada (R$)</label>
                        <input type="number" id="valor_entrada" placeholder="Ex: 20000" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                    </div>

                    <div class="md:col-span-2">
                        <label for="qtd_parcelas" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Número de Parcelas</label>
                        <select id="qtd_parcelas" class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors cursor-pointer">
                            <option value="12">12x</option>
                            <option value="24">24x</option>
                            <option value="36">36x</option>
                            <option value="48" selected>48x</option>
                            <option value="60">60x</option>
                        </select>
                    </div>
                </div>

                <button onclick="calcularFinanciamentoGeral()" class="w-full bg-red-700 hover:bg-red-600 text-white font-bold py-4 px-4 rounded-sm transition-colors uppercase tracking-widest text-sm mt-8 shadow-lg shadow-red-900/20">
                    Ver Estimativa de Parcelas
                </button>

                <div id="resultado_simulacao" class="hidden mt-8 p-8 bg-black border border-red-500/30 rounded-sm text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-red-600"></div>
                    <p class="text-zinc-400 text-xs uppercase tracking-widest mb-2">Estimativa de Parcela</p>
                    <p class="text-4xl font-black text-red-500 mb-2" id="valor_parcela_resultado">R$ 0,00</p>
                    <p class="text-[0.65rem] text-zinc-500 mb-8">*Cálculo aproximado com taxa média referencial. Sujeito a análise de crédito da instituição financeira.</p>
                    
                    <a href="#" id="btn_whatsapp_financiamento" target="_blank" class="inline-flex items-center justify-center w-full md:w-auto bg-[#25D366] hover:bg-[#1ebd59] text-white font-bold py-4 px-8 rounded-sm transition-transform hover:scale-105 uppercase tracking-widest text-xs shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                        Enviar Proposta para Aprovação
                    </a>
                </div>
            </div>

            <div class="mt-16 text-center">
                <p class="text-zinc-500 text-xs uppercase tracking-widest font-bold mb-6">Trabalhamos com os principais bancos</p>
                <div class="flex flex-wrap justify-center gap-8 opacity-50 grayscale">
                    <span class="text-xl font-black">SANTANDER</span>
                    <span class="text-xl font-black">ITAÚ</span>
                    <span class="text-xl font-black">BRADESCO</span>
                    <span class="text-xl font-black">PAN</span>
                    <span class="text-xl font-black">BV FINANCEIRA</span>
                </div>
            </div>

        </div>
    </section>

    @include('partials.footer')

    <script>
        window.calcularFinanciamentoGeral = function() {
            const precoVeiculo = parseFloat(document.getElementById('valor_carro').value);
            const entrada = parseFloat(document.getElementById('valor_entrada').value) || 0;
            const parcelas = parseInt(document.getElementById('qtd_parcelas').value);
            
            if (isNaN(precoVeiculo) || precoVeiculo <= 0) {
                alert('Por favor, informe o valor do veículo.');
                return;
            }

            if (entrada >= precoVeiculo) {
                alert('A entrada tem de ser menor que o valor total do veículo!');
                return;
            }

            const valorFinanciado = precoVeiculo - entrada;
            const taxaMensal = 0.015;
            
            const prestacao = valorFinanciado * (taxaMensal * Math.pow(1 + taxaMensal, parcelas)) / (Math.pow(1 + taxaMensal, parcelas) - 1);

            const valorFormatado = prestacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            const entradaFormatada = entrada.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            const precoFormatado = precoVeiculo.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            
            document.getElementById('valor_parcela_resultado').innerText = parcelas + 'x de ' + valorFormatado;
            document.getElementById('resultado_simulacao').classList.remove('hidden');

            const numeroZap = '556130462305';
            const msg = `Olá! Fiz uma simulação no site da ZR Motors e gostaria de aprovar um crédito.\n\n*Valor do carro:* ${precoFormatado}\n*Entrada:* ${entradaFormatada}\n*Desejo:* ${parcelas}x de ${valorFormatado}\n\nPodemos fazer a análise?`;
            
            document.getElementById('btn_whatsapp_financiamento').href = `https://wa.me/${numeroZap}?text=${encodeURIComponent(msg)}`;
        };
    </script>
</body>
</html>