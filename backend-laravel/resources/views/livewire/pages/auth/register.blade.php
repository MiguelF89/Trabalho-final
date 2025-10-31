<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-200 dark:from-gray-900 dark:to-gray-800">
    <div class="w-full max-w-md bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800 dark:text-gray-100">
            Crie sua conta
        </h2>

        <form wire:submit.prevent="register">
            @csrf

            <!-- Nome -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                <input type="text" wire:model="name"
                    class="w-full border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required autofocus>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">E-mail</label>
                <input type="email" wire:model="email"
                    class="w-full border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Senha</label>
                <input type="password" wire:model="password"
                    class="w-full border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirmação -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirmar senha</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none"
                    required>
            </div>

            <!-- Botão -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 rounded-lg transition">
                Registrar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
            Já tem uma conta?
            <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                Entrar
            </a>
        </p>
    </div>
</