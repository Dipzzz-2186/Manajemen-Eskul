<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing user ' . $user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit ') . $user->name}}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Edit user management application.") }}
                    </p>
                </header>

                <form action="{{route('users.update', $user->id)}}" class="mt-6 space-y-6" method="POST">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div>
                        <x-input-label for="role" :value="__('Role')" />
                        <select name="role" id="role" class="mt-1 block w-full border-gray-300 focus:border-indigo-500  focus:ring-indigo-500 rounded-md shadow-sm">
                            @if(old('role', $user->role))
                                <option value="{{ old('role', $user->role) }}" disabled selected>{{ ucfirst(old('role', $user->role)) }}</option>
                            @else
                                <option value="" disabled selected>Select Role</option>
                            @endif
                            <option value="user">User</option>
                            <option value="pelatih">Pelatih</option>
                            <option value="admin">Admin</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('Role')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>