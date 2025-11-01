<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetManager - Home</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">

    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                    SweetManager
                </a>
            </div>

            <nav class="-mx-3 flex flex-1 justify-end items-center space-x-2">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="inline-flex items-center px-3 py-2 rounded-md text-black dark:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                            {{ auth()->user()->name }}
                            <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg z-50">
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Perfil
                            </a>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Sair
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black dark:text-white hover:text-black/70 dark:hover:text-white/80">
                        Entrar
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black dark:text-white hover:text-black/70 dark:hover:text-white/80">
                            Registrar
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    <main class="flex flex-col items-center justify-center text-center py-20">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">
            Bem-vindo ao SweetManager
        </h1>
        <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-xl">
            Organize suas instituições e produtos de forma simples e eficiente.
        </p>

        @guest
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Entrar
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Registrar
                </a>
            </div>
        @endguest
    </main>

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
