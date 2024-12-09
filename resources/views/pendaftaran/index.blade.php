<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Pendaftaran Ekskul') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Pendaftaran Ekskul") }}
                    </p>
                </header>   

                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('post')
                    <!-- Name Input -->
                    <div>
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" name="nama" type="text" :value="old('nama')"
                            class="mt-1 block w-full" autofocus autocomplete="nama" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>

                    <div>
                        <x-input-label for="nis" :value="__('NIS')" />
                        <x-text-input id="nis" name="nis" type="number" :value="old('nis')"
                        class="mt-1 block w-full" autofocus autocomplete="nis" />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>

                   <!-- Kolom 'kelas' -->
    <div>
        <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
        <select name="kelas" id="kelas" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Kelas --</option>  <!-- Pilihan kosong sebagai fallback -->
            <option value="X - AKL 1">X - AKL 1</option>
            <option value="X - AKL 2">X - AKL 2</option>
            <option value="X - AKL 3">X - AKL 3</option>
            <option value="X - MP 1">X - MP 1</option>
            <option value="X - MP 2">X - MP 2</option>
            <option value="X - RPL">X - RPL</option>
            <!-- Tambahkan opsi kelas lainnya -->
        </select>
    </div>

                    <!-- Kolom 'ekskul' dengan looping foreach -->
                    <div>
                        <label for="ekskul" class="block text-sm font-medium text-gray-700">Ekskul</label>
                        <select name="ekskul" id="ekskul" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih Ekskul --</option>
                            @foreach ($ekskuls as $ekskul)
                                <option value="{{ $ekskul->name }}">{{ $ekskul->name }}</option>
                            @endforeach
                        </select>
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