<x-guest-layout class="bg-gradient-to-r from-teal-500 via-orange-400 to-pink-500 min-h-screen">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Logo Section -->
    <div class="text-center mb-6">
        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-40 w-auto mx-auto" />
    </div>

    <!-- Register Form -->
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-800 font-medium" />
            <x-text-input id="name" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-800 font-medium" />
            <x-text-input id="email" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-800 font-medium" />
            <x-text-input id="password" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-800 font-medium" />
            <x-text-input id="password_confirmation" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-teal-600 hover:text-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-3 bg-teal-600 hover:bg-teal-700 text-white py-2 px-6 rounded-lg shadow-md focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
