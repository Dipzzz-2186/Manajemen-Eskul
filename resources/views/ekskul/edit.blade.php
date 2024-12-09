<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit ekskul') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Editing " . $ekskul->name ) }}
                    </p>
                </header>

                <form action="{{ route('ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')


                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" :value="old('name', $ekskul)"
                            class="mt-1 block w-full" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- Description --}}
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 
                             focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $ekskul) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    {{-- Featured Image --}}
                    <div>
                        <x-input-label for="featured_image" :value="__('Featured Image')" />
                        <img src="{{ $ekskul->featured_image ? Storage::url($ekskul->featured_image) : 'https://static.vecteezy.com/system/resources/previews/005/129/844/non_2x/profile-event-icon-isolated-on-white-background-eps10-free-vector.jpg' }}"
                                         alt="{{ $ekskul->name }}"
                                         class="rounded-full h-24 w-24 object-cover my-2">
                        <x-text-input id="featured_image" name="featured_image" type="file" class="mt-1 p-4 block w-full" :value="old('featured_image', $ekskul->featured_image)" />
                        <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
