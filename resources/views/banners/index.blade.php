<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-100 leading-tight">
            Gestão de Banners
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111] border border-zinc-800 rounded-md shadow-lg overflow-hidden p-6 sm:p-8">

                <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest mb-6">
                    <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Banner de Novidades
                </h3>

                @if(session('status'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-500 text-xs font-bold uppercase tracking-widest rounded-sm">
                    {{ session('status') }}
                </div>
                @endif

                <form action="{{ route('configuracoes.banner') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    @if(isset($configuracao) && $configuracao->banner_novidades)
                    <div class="mb-4">
                        <p class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-2">Banner Atual:</p>
                        <img src="{{ asset('storage/' . $configuracao->banner_novidades) }}" class="w-full max-w-sm rounded-md border border-zinc-800 shadow-lg">
                    </div>
                    @endif

                    <div>
                        <label class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-2">Selecione a Nova Arte (JPG, PNG)</label>
                        <input type="file" name="banner_novidades" class="block w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-widest file:bg-red-600 file:text-white hover:file:bg-red-700 cursor-pointer border border-zinc-800 bg-black rounded-sm p-2" required>
                        @error('banner_novidades')
                        <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-widest">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4 border-t border-zinc-800">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm uppercase tracking-widest text-xs transition border border-red-600">
                            Fazer Upload
                        </button>
                    </div>
                </form>
                <hr class="my-10 border-zinc-800">

                <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest mb-6">
                    <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Adicionar Novo Depoimento
                </h3>

                <form action="{{ route('depoimentos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-2">Fotos das Entregas (Pode selecionar várias ao mesmo tempo)</label>
                        <input type="file" name="fotos[]" multiple required class="block w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-widest file:bg-red-600 file:text-white hover:file:bg-red-700 cursor-pointer border border-zinc-800 bg-black rounded-sm p-2">
                    </div>

                    <div class="pt-4 border-t border-zinc-800">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm uppercase tracking-widest text-xs transition border border-red-600">
                            Salvar Fotos
                        </button>
                    </div>
                </form>
                <hr class="my-10 border-zinc-800">

                <h3 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest mb-6">
                    <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Fotos em Exibição na Home
                </h3>

                @if(isset($depoimentos) && $depoimentos->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach($depoimentos as $depoimento)
                            @if($depoimento->imagens && count($depoimento->imagens) > 0)
                                @foreach($depoimento->imagens as $index => $imagem)
                                    <div class="relative bg-black rounded-md overflow-hidden border border-zinc-800 h-32 group">
                                        <img src="{{ asset('storage/' . $imagem) }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-30 transition duration-300">
                                        
                                        <form action="{{ route('depoimentos.foto.destroy', ['id' => $depoimento->id, 'index' => $index]) }}" method="POST" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem a certeza que deseja apagar esta foto do site?')" class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-full shadow-lg transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="p-6 bg-black border border-zinc-800 rounded-md text-center">
                        <p class="text-zinc-500 text-sm uppercase tracking-widest">Ainda não há fotos de entregas cadastradas.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>