<x-guest-layout>

    <body class="min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">

        <header class="max-w-lg mx-auto">
            <a href="#">
            <img style="width: 35%; margin: auto" src="img/logo.jpg" alt="logo bp">
            <h1 class="text-3xl text-gray-700 text-center">Bintang Pelajar</h1>
            </a>
        </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3s" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center block text-gray-700 text-sm font-bold mb-2 ml-3">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </main>

    </body>

</x-guest-layout>
