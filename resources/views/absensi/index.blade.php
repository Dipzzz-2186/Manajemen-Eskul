<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Absensi Ekskul') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Absensi Ekskul") }}
                    </p>
                </header>

                <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('post')
                    <!-- Name Input -->
                    <div>
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" name="nama" type="text" :value="old('nama')"
                            class="mt-1 block w-full" autofocus autocomplete="nama" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
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

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" id="status" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
            <option value="">-- Status Kehadiran --</option>
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
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

                    <div>
                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 
                             focus:ring-indigo-500 rounded-md shadow-sm">{{ old('keterangan') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
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