<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                {{-- <input type="email" id="email" name="email" value="admin@gmail.com" class="block mt-1 w-full rounded border-gray-300" required autofocus/> --}}
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="admin" />
                {{-- <input id="password" class="block mt-1 w-full rounded border-gray-300" type="password" name="password" value="admin"/> --}}
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Me lembrar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                
                    <a class="underline text-sm text-black hover:text-purple-600" href="{{ route('register') }}">
                        {{ __('Não possui uma conta? Clique aqui!') }}
                    </a>
                    {{-- <a class="underline text-sm text-black hover:text-blue-600" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha??') }}
                    </a> --}}
                <x-jet-button class="ml-4">
                    {{ __('Logar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
