<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penilaian Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow-lg rounded-lg border border-gray-200">
                <header class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900">{{ __('Penilaian Ekskul') }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ __("Silakan masukkan nilai ekskul yang diberikan untuk masing-masing anggota.") }}</p>
                </header>

                <form action="{{ route('penilaian.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('post')

                    <!-- Nama Input -->
                    <div class="space-y-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <select name="nama" id="nama" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                            <option value="">-- Pilih Nama Anggota --</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->nama }}" @selected(old('nama') == $member->nama)>{{ $member->nama }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>

                    <!-- Ekskul Dropdown -->
                    <div class="space-y-2">
                        <label for="ekskul" class="block text-sm font-medium text-gray-700">Ekskul</label>
                        <select name="ekskul" id="ekskul" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                            <option value="">-- Pilih Ekskul --</option>
                            @foreach ($ekskuls as $ekskul)
                                <option value="{{ $ekskul->name }}" @selected(old('ekskul') == $ekskul->name)>{{ $ekskul->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('ekskul')" />
                    </div>

                    <!-- Nilai Input -->
                    <div class="space-y-2">
                        <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                        <input type="number" name="nilai" id="nilai" value="{{ old('nilai') }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                        <x-input-error class="mt-2" :messages="$errors->get('nilai')" />
                    </div>

                    <!-- Deskripsi Textarea -->
                    <div class="space-y-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">{{ old('deskripsi') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button class="w-full sm:w-auto px-6 py-3 text-lg font-semibold rounded-md transition-all duration-300 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                            {{ __('Simpan Penilaian') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
    