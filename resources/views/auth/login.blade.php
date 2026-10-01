<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso Restrito - ZR Motors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a0a0a] text-white font-sans antialiased overflow-hidden">
    <div class="h-screen flex flex-col justify-center items-center px-4 py-8">
        
        <div class="mb-2 text-center">
            <a href="{{ route('home') }}" class="hover:opacity-80 transition flex flex-col items-center justify-center">
                <img src="{{ asset('images/logo-zr.png') }}" alt="Logotipo ZR Motors" class="w-24 h-24 rounded-full shadow-lg shadow-red-900/40 object-cover">
                <span class="text-[0.7rem] text-zinc-500 uppercase tracking-widest mt-4 block font-bold">Acesso Restrito Administrativo</span>
            </a>
        </div>

        <div class="w-full max-w-md px-8 py-8 bg-[#111] border border-red-600/30 shadow-2xl shadow-red-900/10 rounded-md shrink-0">
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Email</label>
                    <input id="email" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs font-bold" />
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-[0.65rem] text-zinc-400 font-bold uppercase tracking-widest mb-1">Palavra-passe</label>
                    <input id="password" class="block mt-1 w-full bg-black border border-zinc-800 text-white focus:border-red-600 focus:ring-red-600 rounded-sm p-3 font-bold" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs font-bold" />
                </div>

                <div class="block mt-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded-sm bg-black border-zinc-800 text-red-600 shadow-sm focus:ring-red-600 cursor-pointer" name="remember">
                        <span class="ms-2 text-[0.7rem] text-zinc-400 uppercase tracking-widest font-bold">Lembrar-me</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-zinc-900">
                    @if (Route::has('password.request'))
                        <a class="text-[0.65rem] text-zinc-500 hover:text-white transition uppercase tracking-widest font-bold" href="{{ route('password.request') }}">
                            Esqueceu a senha?
                        </a>
                    @endif

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-sm transition uppercase tracking-widest text-xs border border-red-600">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-6 text-[0.6rem] text-zinc-600 uppercase tracking-widest text-center">
            &copy; {{ date('Y') }} ZR Motors. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>