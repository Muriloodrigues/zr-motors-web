<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-100 leading-tight">
            Estoque de Veículos
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-[#111] border border-zinc-800 rounded-md shadow-lg overflow-hidden">
                
                <div class="px-6 py-5 border-b border-zinc-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest">
                        <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Veículos Cadastrados
                    </h3>
                    <a href="{{ route('carros.create') }}" class="w-full sm:w-auto flex justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-3 sm:py-2 px-4 rounded-sm transition uppercase tracking-widest text-xs items-center gap-2 border border-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Novo Veículo
                    </a>
                </div>

                <div class="block md:hidden p-4 space-y-4">
                    @foreach($carros as $carro)
                    <div class="bg-[#050505] border border-zinc-800/80 rounded-md p-4 flex flex-col gap-4 shadow-sm">
                        <div class="flex justify-between items-start gap-2">
                            <div class="font-bold text-white uppercase text-base leading-tight">{{ $carro->marca }} <span class="text-red-500">{{ $carro->modelo }}</span></div>
                            <span class="text-[0.6rem] px-2 py-1 rounded-sm uppercase font-bold tracking-widest flex-shrink-0
                                {{ strtolower($carro->status) == 'disponível' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                                {{ strtolower($carro->status) == 'vendido' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                                {{ strtolower($carro->status) == 'inativo' ? 'bg-zinc-800 text-zinc-400 border border-zinc-700' : '' }}">
                                {{ $carro->status }}
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 bg-[#0a0a0a] p-3 rounded border border-zinc-900">
                            <div>
                                <span class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold block mb-1">Ano</span>
                                <span class="text-zinc-300 font-semibold text-sm">{{ $carro->ano_fabricacao }}/{{ $carro->ano_modelo }}</span>
                            </div>
                            <div>
                                <span class="text-zinc-500 text-[0.65rem] uppercase tracking-widest font-bold block mb-1">Preço</span>
                                <span class="font-black text-white tracking-tighter text-sm">R$ {{ number_format($carro->preco, 2, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-4 pt-1">
                            <a href="{{ route('carros.edit', $carro->id) }}" class="text-zinc-400 hover:text-white uppercase tracking-widest text-xs font-bold transition flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                Editar
                            </a>
                            <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja excluir este veículo do sistema?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-400 uppercase tracking-widest text-xs font-bold transition flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-black/50 border-b border-zinc-800 text-[0.65rem] uppercase tracking-widest text-zinc-500">
                                <th class="px-6 py-4 font-bold">Marca/Modelo</th>
                                <th class="px-6 py-4 font-bold">Ano</th>
                                <th class="px-6 py-4 font-bold">Preço</th>
                                <th class="px-6 py-4 font-bold text-center">Status</th>
                                <th class="px-6 py-4 font-bold text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50">
                            @foreach($carros as $carro)
                            <tr class="hover:bg-zinc-900/50 transition duration-150">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white uppercase text-sm">{{ $carro->marca }} {{ $carro->modelo }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-zinc-400 font-semibold tracking-widest">
                                    {{ $carro->ano_fabricacao }}/{{ $carro->ano_modelo }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-black text-red-500 tracking-tighter">R$ {{ number_format($carro->preco, 2, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-[0.65rem] px-3 py-1 rounded-sm uppercase font-bold tracking-widest
                                        {{ strtolower($carro->status) == 'disponível' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                                        {{ strtolower($carro->status) == 'vendido' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                                        {{ strtolower($carro->status) == 'inativo' ? 'bg-zinc-800 text-zinc-400 border border-zinc-700' : '' }}">
                                        {{ $carro->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right text-sm space-x-4">
                                    <a href="{{ route('carros.edit', $carro->id) }}" class="text-zinc-500 hover:text-white uppercase tracking-widest text-[0.65rem] font-bold transition">Editar</a>
                                    
                                    <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja excluir este veículo do sistema?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-400 uppercase tracking-widest text-[0.65rem] font-bold transition">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($carros->isEmpty())
                    <div class="p-8 text-center text-zinc-500 text-sm uppercase tracking-widest">
                        Nenhum veículo cadastrado no momento.
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>