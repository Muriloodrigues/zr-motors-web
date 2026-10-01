<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-red-500 flex items-center uppercase tracking-widest">
            <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Excluir Conta
        </h2>
        <p class="mt-2 text-[0.65rem] text-zinc-400 uppercase tracking-widest">
            Uma vez que a sua conta seja excluída, todos os recursos e dados serão permanentemente apagados. Por favor, descarregue qualquer informação que deseje guardar antes de prosseguir.
        </p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="bg-red-900/30 hover:bg-red-900/50 text-red-500 font-bold py-3 px-8 rounded-sm transition uppercase tracking-widest text-xs border border-red-900/50">
        Excluir Conta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-[#111] border-t-4 border-red-600">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-zinc-100 uppercase tracking-widest">
                Tem a certeza de que deseja excluir a sua conta?
            </h2>

            <p class="mt-1 text-[0.65rem] text-zinc-400 uppercase tracking-widest">
                Uma vez excluída, todos os dados serão permanentemente apagados. Introduza a sua senha para confirmar.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Senha</label>
                <input id="password" name="password" type="password" class="block w-3/4 bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" placeholder="Sua Senha" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500 text-xs font-bold" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-3 px-6 rounded-sm transition uppercase tracking-widest text-xs border border-zinc-700 mr-3">
                    Cancelar
                </button>

                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-sm transition uppercase tracking-widest text-xs border border-red-600">
                    Excluir Conta
                </button>
            </div>
        </form>
    </x-modal>
</section>