<x-app-layout>
    <x-slot name="header" class="py-6 bg-gradient-to-r from-indigo-800 to-indigo-500 shadow-xl rounded-lg">
        <h2 class="font-semibold text-4xl text-white leading-tight">
            {{ $ekskul->name }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-r from-gray-100 via-blue-50 to-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="p-6 sm:p-12 bg-white shadow-xl sm:rounded-2xl transform hover:scale-105 transition-all duration-300 ease-in-out">
                <div class="flex gap-6 items-center">
                    <div class="w-1/3">
                        <img src="{{ Storage::url($ekskul->featured_image) }}" alt="{{ $ekskul->name }}" class="w-full rounded-xl shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out">
                    </div>
                    <div class="w-2/3">
                        <div class="flex justify-between items-center">
                            <div class="text-lg font-medium text-gray-800">
                                <h3 class="text-2xl font-semibold">{{ $ekskul->name }}</h3>
                                <p class="mt-2 text-gray-600 text-sm">{{ $ekskul->description ?? 'Deskripsi tidak tersedia' }}</p>
                            </div>
                            <div>
                                <a href="{{ route('dashboard') }}" class="inline-block bg-gradient-to-r from-gray-700 to-gray-900 text-white font-bold py-3 px-6 rounded-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                                      Home
                                  </a>
                          </div>

                            @if (auth()->user()->role == 'user')
                                <a href="{{ route('absensi.index') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-6 rounded-md shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-110">
                                    Absensi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Daftar Hadir -->
                @if($hadirs->isNotEmpty())
                    <div class="mt-8 bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 p-6 rounded-xl shadow-lg">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Hadir</h2>
                        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                            <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-sm font-medium text-left">No</th>
                                    <th class="py-3 px-4 text-sm font-medium text-left">Nama</th>
                                    <th class="py-3 px-4 text-sm font-medium text-left">Kelas</th>
                                    <th class="py-3 px-4 text-sm font-medium text-left">Status Kehadiran</th>
                                    <th class="py-3 px-4 text-sm font-medium text-left">Keterangan</th>
                                    <th class="py-3 px-4 text-sm font-medium text-left"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                @foreach($hadirs as $hadir)
                                    <tr class="hover:bg-gray-50 transition-all duration-300 ease-in-out">
                                        <td class="py-3 px-4 text-sm text-gray-700">{{$loop->iteration}}</td>
                                        <td class="py-3 px-4 text-sm text-gray-700">{{$hadir->nama}}</td>
                                        <td class="py-3 px-4 text-sm text-gray-700">{{$hadir->kelas}}</td>
                                        <td class="py-3 px-4 text-sm text-gray-700">{{$hadir->status}}</td>
                                        <td class="py-3 px-4 text-sm text-gray-700">{{$hadir->keterangan}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600 mt-3">Belum ada daftar kehadiran.</p>
                @endif
            </div>
            
        </div>
    </div>
</x-app-layout>
