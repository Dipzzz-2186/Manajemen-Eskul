<x-app-layout>
    <x-slot name="header" class="py-6 bg-gradient-to-r from-blue-800 to-blue-500 shadow-xl rounded-lg">
        <h2 class="font-semibold text-4xl text-white leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-800">
        <div class="max-w-7xl mx-auto mt-5 sm:px-6 lg:px-8 mt-3">
            <!-- Main Container -->
            <div class="bg-white shadow-xl sm:rounded-3xl p-6 space-y-6 bg-gradient-to-r from-white to-gray-100">

                <!-- Tabel daftar event -->
                <div class="overflow-hidden shadow-2xl sm:rounded-3xl p-6 space-y-6 bg-gradient-to-tl from-gray-50 via-gray-100 to-gray-200">
                    <table class="min-w-full table-auto text-left border-separate border-spacing-0">
                        <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold text-left">No</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Logo Ekskul</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Nama Ekskul</th>
                                <th class="px-6 py-4 text-sm font-semibold text-left">Action</th>
                            </tr>   
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($ekskuls as $ekskul)
                                <tr class="hover:bg-blue-100 transition-all duration-300 ease-in-out transform hover:scale-105">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <img src="{{ Storage::url($ekskul->featured_image) }}"
                                             alt="{{ $ekskul->name }}"
                                             class="h-16 w-16 object-cover rounded-lg shadow-xl transform hover:scale-110 transition-all duration-300 ease-in-out">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $ekskul->name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('ekskul.show', $ekskul->id) }}" 
                                                class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500">
                                                 Detail Eskul
                                             </a>
                                            @if (Auth::user()->role !== 'user')
                                                <a href="{{ route('penilaian.show', $ekskul->id) }}" 
                                                   class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-indigo-500">
                                                    Daftar Nilai
                                                </a>
                                                <a href="{{ route('absensi.show', $ekskul->id) }}" 
                                                    class="bg-gradient-to-r from-teal-600 to-teal-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-teal-500">
                                                     Daftar Absensi
                                                </a>
                                            @endif
                                            @if(Auth::user()->role == 'pembina' || Auth::user()->role == 'admin')
                                            <a href="{{ route('absensi.export', $ekskul->id) }}" class="bg-gradient-to-r from-green-600 to-green-800 text-white text-xs font-semibold py-2 px-4 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110 hover:bg-green-500">
                                                Rekap Absen
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
