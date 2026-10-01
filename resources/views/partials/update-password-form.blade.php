<section>
    <header>
        <h2 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest">
            <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Atualizar Senha
        </h2>
        <p class="mt-2 text-[0.65rem] text-zinc-400 uppercase tracking-widest">
            Certifique-se de que a sua conta utiliza uma senha longa e aleatória para se manter segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Senha Atual</label>
            <input id="current_password" name="current_password" type="password" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500 text-xs font-bold" />
        </div>

        <div>
            <label for="password" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Nova Senha</label>
            <input id="password" name="password" type="password" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500 text-xs font-bold" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Confirmar Senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500 text-xs font-bold" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm transition uppercase tracking-widest text-xs border border-red-600">
                Salvar Alterações
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-[0.65rem] text-green-500 uppercase tracking-widest font-bold">Salvo com sucesso.</p>
            @endif
        </div>
    </form>
</section>