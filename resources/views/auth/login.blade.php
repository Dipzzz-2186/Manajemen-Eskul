<x-guest-layout class="bg-gradient-to-r from-teal-500 via-orange-400 to-pink-500 min-h-screen">
    <link rel="icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Logo Section -->
    <div class="text-center mb-6">
        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-40 w-auto mx-auto" />
    </div>
    
    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-800 font-medium" />
            <x-text-input id="email" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-800 font-medium" />
            <x-text-input id="password" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 mb-4">
            <label for="remember_me" class="inline-flex items-center text-gray-700">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500" name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-teal-600 hover:text-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 bg-teal-600 hover:bg-teal-700 text-white py-2 px-6 rounded-lg shadow-md focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('Log in') }}
            </x-primary-button> 
        </div>

        <!-- Register Button -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Don't have an account?</p>
            <a href="{{ route('register') }}" class="text-teal-600 hover:text-teal-800 text-lg font-semibold focus:outline-none focus:ring-2 focus:ring-teal-500">
                {{ __('Register here') }}
            </a>
        </div>
    </form>
</x-guest-layout>
