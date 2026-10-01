<section>
    <header>
        <h2 class="text-lg font-bold text-zinc-100 flex items-center uppercase tracking-widest">
            <span class="w-2 h-5 bg-red-600 mr-3 skew-x-12"></span> Informações do Perfil
        </h2>
        <p class="mt-2 text-[0.65rem] text-zinc-400 uppercase tracking-widest">
            Atualize as informações da sua conta e o endereço de e-mail.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Nome</label>
            <input id="name" name="name" type="text" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500 text-xs font-bold" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Email</label>
            <input id="email" name="email" type="email" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold transition" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500 text-xs font-bold" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-zinc-400">
                        O seu endereço de e-mail não foi verificado.
                        <button form="send-verification" class="underline text-sm text-zinc-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Clique aqui para reenviar o e-mail de verificação.
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-500">
                            Um novo link de verificação foi enviado para o seu endereço de e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm transition uppercase tracking-widest text-xs border border-red-600">
                Salvar Alterações
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-[0.65rem] text-green-500 uppercase tracking-widest font-bold">Salvo com sucesso.</p>
            @endif
        </div>
    </form>
</section>