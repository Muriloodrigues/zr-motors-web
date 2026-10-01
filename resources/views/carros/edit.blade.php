<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-100 leading-tight">
            Editar Veículo: <span class="text-red-600">{{ $carro->marca }} {{$carro->modelo }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-[#111] border border-zinc-800 rounded-md shadow-lg overflow-hidden">

                <div class="px-6 py-5 border-b border-zinc-800 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest">
                        <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Atualização de Dados
                    </h3>

                    <span class="text-[0.65rem] px-3 py-1 rounded-sm uppercase font-bold tracking-widest
                        {{ strtolower($carro->status) == 'disponível' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                        {{ strtolower($carro->status) == 'vendido' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                        {{ strtolower($carro->status) == 'inativo' ? 'bg-zinc-800 text-zinc-400 border border-zinc-700' : '' }}">
                        Status: {{ $carro->status }}
                    </span>
                </div>

                <form action="{{ route('carros.update', $carro->id) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="bg-red-900/50 border border-red-600 text-red-200 p-4 rounded-sm mb-6">
                        <ul class="list-disc pl-5 text-sm uppercase tracking-wider font-bold">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div>
                        <h4 class="text-xs font-bold text-red-500 uppercase tracking-widest mb-4 border-b border-zinc-800 pb-2">Informações Principais</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                            <div>
                                <label for="marca" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Marca</label>
                                <input id="marca" name="marca" type="text" value="{{ old('marca', $carro->marca) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="modelo" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Modelo</label>
                                <input id="modelo" name="modelo" type="text" value="{{ old('modelo', $carro->modelo) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="ano_fabricacao" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Ano Fabricação</label>
                                <input id="ano_fabricacao" name="ano_fabricacao" type="text" value="{{ old('ano_fabricacao', $carro->ano_fabricacao) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="ano_modelo" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Ano Modelo</label>
                                <input id="ano_modelo" name="ano_modelo" type="text" value="{{ old('ano_modelo', $carro->ano_modelo) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="preco" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Preço (R$)</label>
                                <input id="preco" name="preco" type="text" step="0.01" value="{{ old('preco', $carro->preco) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="quilometragem" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Quilometragem</label>
                                <input id="quilometragem" name="quilometragem" type="number" value="{{ old('quilometragem', $carro->quilometragem) }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" required />
                            </div>

                            <div>
                                <label for="categoria" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Categoria</label>
                                <input id="categoria" name="categoria" type="text" value="{{ old('categoria', $carro->categoria ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>

                            <div>
                                <label for="tipo_veiculo" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Tipo de Veículo</label>
                                <input id="tipo_veiculo" name="tipo_veiculo" type="text" value="{{ old('tipo_veiculo', $carro->tipo_veiculo ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-red-500 uppercase tracking-widest mb-4 border-b border-zinc-800 pb-2">Especificações e Situação Comercial</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                            <div>
                                <label for="status" class="block text-[0.65rem] text-blue-400 font-bold uppercase tracking-widest mb-1">Status do Veículo</label>
                                <select id="status" name="status" class="w-full bg-[#1a2332] border border-blue-900/50 text-blue-400 focus:border-blue-500 focus:ring-blue-500 rounded-sm p-3 font-bold transition">
                                    <option value="Disponível" {{ old('status', $carro->status) == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                                    <option value="Vendido" {{ old('status', $carro->status) == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                                    <option value="Inativo" {{ old('status', $carro->status) == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                            <div>
                                <label for="destaque" class="block text-[0.65rem] text-yellow-500 font-bold uppercase tracking-widest mb-1">Destaque na Vitrine?</label>
                                <div class="flex items-center h-[46px] bg-black border border-zinc-800 rounded-sm px-4">
                                    <input type="checkbox" id="destaque" name="destaque" value="1" {{ old('destaque', $carro->destaque ?? false) ? 'checked' : '' }} class="w-5 h-5 bg-[#111] border-zinc-700 text-red-600 focus:ring-red-600 rounded-sm cursor-pointer">
                                    <label for="destaque" class="ml-3 text-xs text-white font-bold uppercase tracking-widest cursor-pointer mt-1">Aparecer em Destaque</label>
                                </div>
                            </div>

                            <div>
                                <label for="potencia_motor" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Potência do Motor</label>
                                <input id="potencia_motor" name="potencia_motor" type="text" value="{{ old('potencia_motor', $carro->potencia_motor ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>

                            <div>
                                <label for="combustivel" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Combustível</label>
                                <select id="combustivel" name="combustivel" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">
                                    <option value="Flex" {{ old('combustivel', $carro->combustivel ?? '') == 'Flex' ? 'selected' : '' }}>Flex</option>
                                    <option value="Gasolina" {{ old('combustivel', $carro->combustivel ?? '') == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
                                    <option value="Álcool" {{ old('combustivel', $carro->combustivel ?? '') == 'Álcool' ? 'selected' : '' }}>Álcool</option>
                                    <option value="Diesel" {{ old('combustivel', $carro->combustivel ?? '') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                    <option value="Híbrido" {{ old('combustivel', $carro->combustivel ?? '') == 'Híbrido' ? 'selected' : '' }}>Híbrido</option>
                                    <option value="Elétrico" {{ old('combustivel', $carro->combustivel ?? '') == 'Elétrico' ? 'selected' : '' }}>Elétrico</option>
                                </select>
                            </div>

                            <div>
                                <label for="cambio" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Câmbio</label>
                                <select id="cambio" name="cambio" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">
                                    <option value="Manual" {{ old('cambio', $carro->cambio ?? '') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="Automático" {{ old('cambio', $carro->cambio ?? '') == 'Automático' ? 'selected' : '' }}>Automático</option>
                                    <option value="Automatizado" {{ old('cambio', $carro->cambio ?? '') == 'Automatizado' ? 'selected' : '' }}>Automatizado</option>
                                    <option value="CVT" {{ old('cambio', $carro->cambio ?? '') == 'CVT' ? 'selected' : '' }}>CVT</option>
                                </select>
                            </div>

                            <div>
                                <label for="tipo_direcao" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Tipo de Direção</label>
                                <select id="tipo_direcao" name="tipo_direcao" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">
                                    <option value="Hidráulica" {{ old('tipo_direcao', $carro->tipo_direcao ?? '') == 'Hidráulica' ? 'selected' : '' }}>Hidráulica</option>
                                    <option value="Elétrica" {{ old('tipo_direcao', $carro->tipo_direcao ?? '') == 'Elétrica' ? 'selected' : '' }}>Elétrica</option>
                                    <option value="Eletro-hidráulica" {{ old('tipo_direcao', $carro->tipo_direcao ?? '') == 'Eletro-hidráulica' ? 'selected' : '' }}>Eletro-hidráulica</option>
                                    <option value="Mecânica" {{ old('tipo_direcao', $carro->tipo_direcao ?? '') == 'Mecânica' ? 'selected' : '' }}>Mecânica</option>
                                </select>
                            </div>

                            <div>
                                <label for="cor" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Cor</label>
                                <input id="cor" name="cor" type="text" value="{{ old('cor', $carro->cor ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>

                            <div>
                                <label for="portas" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Portas</label>
                                <input id="portas" name="portas" type="number" value="{{ old('portas', $carro->portas ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>

                            <div>
                                <label for="final_placa" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Final de Placa</label>
                                <input id="final_placa" name="final_placa" type="number" min="0" max="9" value="{{ old('final_placa', $carro->final_placa ?? '') }}" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" />
                            </div>

                            <div>
                                <label for="kit_gnv" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Possui Kit GNV?</label>
                                <select id="kit_gnv" name="kit_gnv" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">
                                    <option value="Não" {{ old('kit_gnv', $carro->kit_gnv ?? '') == 'Não' ? 'selected' : '' }}>Não</option>
                                    <option value="Sim" {{ old('kit_gnv', $carro->kit_gnv ?? '') == 'Sim' ? 'selected' : '' }}>Sim</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-red-500 uppercase tracking-widest mb-4 border-b border-zinc-800 pb-2">Detalhes Adicionais e Mídia</h4>
                        <div class="grid grid-cols-1 gap-6">

                            <div>
                                <label for="descricao" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Descrição do Veículo</label>
                                <textarea id="descricao" name="descricao" rows="4" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">{{ old('descricao', $carro->descricao) }}</textarea>
                            </div>

                            <div>
                                <label for="opcionais" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Opcionais deste veículo</label>
                                <textarea id="opcionais" name="opcionais" rows="3" class="w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition">{{ old('opcionais', $carro->opcionais) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-2">Ordem e Fotos Atuais <span class="text-red-500 lowercase">(Arraste para reordenar)</span></label>

                                @if ($carro->imagens->count() > 0)
                                <div id="sortable-fotos" class="flex flex-wrap gap-4 mb-6 p-4 bg-black border border-zinc-800 rounded-sm">

                                    @foreach ($carro->imagens->sortBy('ordem') as $imagem)
                                    <div class="relative group w-32 h-24 cursor-move foto-item" id="foto-container-{{ $imagem->id }}">

                                        <img src="{{ asset('storage/' . $imagem->caminho_imagem) }}" class="foto-img w-full h-full object-cover rounded-sm border {{ $imagem->is_capa || $loop->first ? 'border-red-600 border-2' : 'border-zinc-700' }}">

                                        <span class="badge-ordem absolute top-1 left-1 text-[0.55rem] uppercase font-bold px-1.5 py-0.5 rounded-sm shadow-md {{ $imagem->is_capa || $loop->first ? 'bg-red-600 text-white' : 'bg-zinc-800 text-zinc-300 border border-zinc-600' }}">
                                            {{ $imagem->is_capa || $loop->first ? '1º (Capa)' : $imagem->ordem . 'º' }}
                                        </span>

                                        <input type="hidden" name="ordem_fotos[{{ $imagem->id }}]" class="input-ordem" value="{{ $imagem->ordem == 99 ? $loop->iteration : $imagem->ordem }}">

                                        <div class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-center items-center gap-2 rounded-sm border border-transparent group-hover:border-zinc-500">

                                            <span class="text-white text-[0.6rem] font-bold uppercase tracking-widest pointer-events-none flex flex-col items-center">
                                                <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                                </svg>
                                                Arraste-me
                                            </span>

                                            <button type="button" onclick="removerFoto('{{ $imagem->id }}')" class="bg-red-900/50 hover:bg-red-600 border border-red-700 text-white text-[0.6rem] px-3 py-1 rounded-sm uppercase tracking-widest font-bold transition w-11/12 text-center">
                                                Apagar
                                            </button>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>

                                <input type="hidden" name="imagens_remover" id="imagens_remover" value="">
                                @else
                                <p class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold mb-6">Nenhuma foto cadastrada.</p>
                                @endif

                                <label class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-2">Adicionar Novas Fotos</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-zinc-800 border-dashed rounded-sm cursor-pointer bg-black hover:border-red-600 hover:bg-zinc-900 transition relative overflow-hidden group">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-zinc-500 group-hover:scale-105 transition-transform">
                                            <svg class="w-8 h-8 mb-3 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                            </svg>

                                            <p id="texto-fotos" class="mb-1 text-sm font-bold"><span class="text-white">Clique para fazer upload</span> ou arraste as imagens</p>
                                            <p class="text-[0.65rem] uppercase tracking-widest">Selecione múltiplas fotos de uma vez (MAX. 5MB cada)</p>
                                        </div>

                                        <input id="dropzone-file" name="imagens[]" type="file" multiple accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="atualizarTextoFotos(this)" />
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-zinc-800">
                        <a href="{{ route('carros.index') }}" class="text-zinc-500 hover:text-white font-bold py-3 px-6 uppercase tracking-widest text-xs transition mr-4">Cancelar</a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-10 rounded-sm transition uppercase tracking-widest text-xs border border-red-600 shadow-lg shadow-red-900/20">
                            Atualizar Veículo
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        function atualizarTextoFotos(input) {
            const texto = document.getElementById('texto-fotos');
            if (input.files && input.files.length > 0) {
                texto.innerHTML = `<span class="text-red-500 text-lg font-black">${input.files.length} foto(s) selecionada(s)!</span>`;
            } else {
                texto.innerHTML = `<span class="text-white">Clique para fazer upload</span> ou arraste as imagens`;
            }
        }

        let fotosParaRemover = [];

        function removerFoto(id) {
            document.getElementById('foto-container-' + id).style.display = 'none';
            if (!fotosParaRemover.includes(id)) {
                fotosParaRemover.push(id);
            }
            document.getElementById('imagens_remover').value = fotosParaRemover.join(',');

            atualizarOrdemVisual();
        }

        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById('sortable-fotos');
            if (el) {
                Sortable.create(el, {
                    animation: 200, 
                    ghostClass: 'opacity-50', 
                    onEnd: function() {
                        atualizarOrdemVisual();
                    }
                });

                atualizarOrdemVisual();
            }
        });

        function atualizarOrdemVisual() {
            const fotos = document.querySelectorAll('#sortable-fotos .foto-item');
            let ordemAtual = 1;

            fotos.forEach(function(foto) {
                if (foto.style.display !== 'none') {

                    foto.querySelector('.input-ordem').value = ordemAtual;

                    const badge = foto.querySelector('.badge-ordem');
                    const img = foto.querySelector('.foto-img');

                    if (ordemAtual === 1) {
                        badge.textContent = '1º (Capa)';
                        badge.className = 'badge-ordem absolute top-1 left-1 bg-red-600 text-white text-[0.55rem] uppercase font-bold px-1.5 py-0.5 rounded-sm shadow-md';
                        img.className = 'foto-img w-full h-full object-cover rounded-sm border border-red-600 border-2';
                    } else {
                        badge.textContent = ordemAtual + 'º';
                        badge.className = 'badge-ordem absolute top-1 left-1 bg-zinc-800 text-zinc-300 border border-zinc-600 text-[0.55rem] uppercase font-bold px-1.5 py-0.5 rounded-sm shadow-md';
                        img.className = 'foto-img w-full h-full object-cover rounded-sm border border-zinc-700';
                    }

                    ordemAtual++;
                }
            });
        }
    </script>
</x-app-layout>