<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-100 leading-tight">
            {{ __('Dashboard') }} <span class="text-xs text-zinc-500 ml-2 font-normal">Visão geral do seu estoque e movimentações</span>
        </h2>
    </x-slot>

    
    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-[#111] border border-zinc-800 rounded-md p-6 flex items-center justify-between shadow-lg">
                    <div>
                        <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest mb-1">Total de Veículos</p>
                        <p class="text-4xl font-black text-white">{{ $total }}</p>
                    </div>
                    <div class="bg-red-600/10 p-4 rounded-full">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-[#111] border border-zinc-800 rounded-md p-6 flex items-center justify-between shadow-lg">
                    <div>
                        <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest mb-1">Disponíveis</p>
                        <p class="text-4xl font-black text-green-500">{{ $disponiveis }}</p>
                    </div>
                    <div class="bg-green-500/10 p-4 rounded-full">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-[#111] border border-zinc-800 rounded-md p-6 flex items-center justify-between shadow-lg">
                    <div>
                        <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest mb-1">Vendidos</p>
                        <p class="text-4xl font-black text-blue-500">{{ $vendidos }}</p>
                    </div>
                    <div class="bg-blue-500/10 p-4 rounded-full">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-[#111] border border-zinc-800 rounded-md p-6 flex items-center justify-between shadow-lg">
                    <div>
                        <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest mb-1">Inativos</p>
                        <p class="text-4xl font-black text-zinc-600">{{ $inativos }}</p>
                    </div>
                    <div class="bg-zinc-800/50 p-4 rounded-full">
                        <svg class="w-8 h-8 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                    </div>
                </div>

            </div>

            <div class="bg-[#111] border border-zinc-800 rounded-md shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-zinc-800 flex justify-between items-center">
                    <h3 class="text-sm font-bold text-zinc-300 uppercase tracking-widest flex items-center">
                        <span class="w-2 h-4 bg-red-600 mr-2 skew-x-12"></span> Últimos Veículos Adicionados
                    </h3>
                    <a href="{{ route('carros.index') }}" class="text-xs text-red-500 hover:text-red-400 font-bold uppercase tracking-widest">Ver Estoque Completo &rarr;</a>
                </div>

                <div class="p-6">
                    @if($ultimosCarros->isEmpty())
                    <p class="text-zinc-500 text-sm py-4 text-center">Nenhum veículo cadastrado recentemente.</p>
                    @else
                    <div class="space-y-4">
                        @foreach($ultimosCarros as $carro)
                        <div class="flex items-center justify-between p-4 bg-[#0a0a0a] border border-zinc-800/50 rounded hover:border-red-600/30 transition">
                            <div class="flex items-center gap-4">

                                @if($carro->imagens->count() > 0)
                                <img src="{{ asset('storage/' . $carro->imagens->first()->caminho_imagem) }}" alt="{{ $carro->marca }}" class="w-16 h-12 object-cover rounded-sm border border-zinc-800">
                                @else
                                <div class="w-16 h-12 bg-zinc-900 flex items-center justify-center rounded-sm border border-zinc-800">
                                    <svg class="w-5 h-5 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @endif

                                <div>
                                    <p class="font-bold text-white uppercase text-sm">{{ $carro->marca }} {{ $carro->modelo }}</p>
                                    <p class="text-xs text-zinc-500 font-semibold tracking-widest">{{ $carro->ano_fabricacao }} • {{ $carro->cambio }}</p>
                                </div>

                            </div>

                            <div class="text-right">
                                <p class="font-black text-red-500 tracking-tighter">R$ {{ number_format($carro->preco, 0, ',', '.') }}</p>
                                <span class="text-[0.65rem] px-2 py-0.5 rounded-sm uppercase font-bold tracking-widest
                                            {{ $carro->status == 'disponível' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                                            {{ $carro->status == 'vendido' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                                            {{ $carro->status == 'inativo' ? 'bg-zinc-800 text-zinc-400 border border-zinc-700' : '' }}">
                                    {{ $carro->status }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>