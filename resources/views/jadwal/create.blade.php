<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Tambah Jadwal') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Tambah Jadwal") }}
                    </p>
                </header>

                <form action="{{ route('jadwal.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="ekskul" :value="__('Ekskul')" />
                        <select name="ekskul" id="ekskul" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Ekskul --</option>
                            @foreach($ekskuls as $ekskul)
                            <option value="{{ $ekskul->name }}">{{ $ekskul->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="hari" :value="__('Hari')" />
                        <x-text-input id="hari" name="hari" type="date" :value="old('hari')"
                            class="mt-1 block w-full" autofocus autocomplete="hari" />
                        <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                    </div>

                    <div>
                        <x-input-label for="mulai" :value="__('Mulai')" />
                        <x-text-input id="mulai" name="mulai" type="time" :value="old('mulai')"
                            class="mt-1 block w-full" autofocus autocomplete="mulai" />
                        <x-input-error class="mt-2" :messages="$errors->get('mulai')" />
                    </div>

                    <div>
                        <x-input-label for="selesai" :value="__('Selesai')" />
                        <x-text-input id="selesai" name="selesai" type="time" :value="old('selesai')"
                            class="mt-1 block w-full" autofocus autocomplete="selesai" />
                        <x-input-error class="mt-2" :messages="$errors->get('selesai')" />
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Status --</option>
                            <option value="mendatang">Mendatang</option>
                            <option value="berlangsung">Berlangsung</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <!-- Checkbox untuk Panggil Pelatih -->
                    <div class="mt-4">
                        <label for="panggil_pelatih" class="inline-flex items-center">
                            <input type="checkbox" name="panggil_pelatih" id="panggil_pelatih" value="1" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Panggil Pelatih</span>
                        </label>
                        <p class="mt-1 text-sm text-gray-600">
                            Centang jika memerlukan materi dari pelatih.
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
