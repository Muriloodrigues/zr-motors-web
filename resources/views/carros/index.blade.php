<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-100 leading-tight">
            Estoque de Veículos
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-[#111] border border-zinc-800 rounded-md shadow-lg overflow-hidden">
                
                <div class="px-6 py-5 border-b border-zinc-800 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest">
                        <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Veículos Cadastrados
                    </h3>
                    <a href="{{ route('carros.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-sm transition uppercase tracking-widest text-xs flex items-center gap-2 border border-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Novo Veículo
                    </a>
                </div>

                <div class="overflow-x-auto">
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