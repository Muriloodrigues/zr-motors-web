<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white uppercase tracking-widest flex items-center">
            <span class="w-1.5 h-5 bg-red-600 mr-3 skew-x-12"></span> 
            Adicionar Novo Funcionário
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a0a] border border-zinc-800/60 shadow-lg sm:rounded-md p-8">
                
                <p class="text-zinc-500 text-sm mb-8">Crie um acesso para um novo vendedor ou administrador da ZR Motors. Eles usarão este e-mail e senha para entrar no painel.</p>

                <form method="POST" action="{{ route('funcionarios.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Nome Completo</label>
                        <input id="name" type="text" name="name" required class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">E-mail de Acesso</label>
                        <input id="email" type="email" name="email" required class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                    </div>

                    <div>
                        <label for="password" class="block text-zinc-400 text-xs font-bold uppercase tracking-widest mb-2">Senha Inicial</label>
                        <input id="password" type="password" name="password" required class="w-full bg-black border border-zinc-800 rounded-sm px-4 py-3 text-white focus:outline-none focus:border-red-600 transition-colors">
                    </div>

                    <div class="flex items-center gap-6 pt-4">
                        <button type="submit" class="bg-red-700 hover:bg-red-600 text-white font-bold py-3 px-8 rounded-sm transition-colors uppercase tracking-widest text-xs shadow-lg shadow-red-900/20">
                            Criar Conta
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-zinc-500 hover:text-white text-xs uppercase tracking-widest transition-colors">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>