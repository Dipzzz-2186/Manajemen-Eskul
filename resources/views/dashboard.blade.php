<x-app-layout>
    <x-slot name="header" class="py-6 bg-gray-300 shadow-xl rounded-lg">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Container -->
            <div class="bg-white shadow-xl sm:rounded-3xl p-6">
                <!-- Tabel daftar event -->
                <div class="overflow-hidden shadow-2xl sm:rounded-3xl p-6 space-y-6 bg-gray-50">
                    <table class="min-w-full table-auto text-left border-separate border-spacing-0">
                        <thead class="bg-blue-700 text-white">
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold text-left">No</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Logo Ekskul</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Nama Ekskul</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($ekskuls as $ekskul)
                                <tr class="hover:bg-gray-200 transition-all duration-300 ease-in-out transform hover:scale-105">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <img src="{{ Storage::url($ekskul->featured_image) }}"
                                             alt="{{ $ekskul->name }}"
                                             class="h-16 w-16 object-cover rounded-lg shadow-lg transform hover:scale-110 transition-all duration-300 ease-in-out">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $ekskul->name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('ekskul.show', $ekskul->id) }}" 
                                               class="bg-gradient-to-r from-blue-700 to-blue-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-600">
                                                Detail Eskul
                                            </a>
                                            @if (Auth::user()->role !== 'user')
                                                <a href="{{ route('penilaian.show', $ekskul->id) }}" 
                                                   class="bg-gradient-to-r from-blue-700 to-blue-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-600">
                                                    Daftar Nilai
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
