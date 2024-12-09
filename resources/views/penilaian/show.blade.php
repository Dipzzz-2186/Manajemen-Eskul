<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-gray-900 leading-tight">
            {{ $ekskul->name }}
        </h2>
    </x-slot>

    <!-- Main Section with full background -->
    <div class="min-h-screen bg-gray-700 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <!-- Eskul Image and Details -->
            <div class="p-8 bg-white shadow-xl rounded-2xl transform hover:scale-105 transition-transform duration-300">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Eskul Image -->
                    <div class="w-full md:w-1/3">
                        <img src="{{ Storage::url($ekskul->featured_image) }}" 
                             alt="{{ $ekskul->name }}" 
                             class="w-full rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    </div>

                    <!-- Eskul Description -->
                    <div class="w-full md:w-2/3">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $ekskul->name }}</h3>
                        <p class="mt-4 text-gray-600 leading-relaxed text-lg">
                            {{ $ekskul->description ?? 'Deskripsi tidak tersedia untuk ekskul ini.' }}
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('dashboard') }}" 
                               class="inline-block bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                Kembali ke Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grades Table -->
            <div class="p-8 bg-gradient-to-r from-gray-50 to-gray-100 shadow-xl rounded-2xl transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Nilai</h3>
                
                @if($grades->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white">
                            <tr>
                                <th class="py-4 px-6 text-center text-sm font-medium">No</th>
                                <th class="py-4 px-6 text-center text-sm font-medium">Nama Anggota</th>
                                <th class="py-4 px-6 text-center text-sm font-medium">Nilai</th>
                                <th class="py-4 px-6 text-center text-sm font-medium">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $grade)
                            <tr class="border-t bg-white hover:bg-gray-50 transition duration-200">
                                <td class="py-4 px-6 text-center text-sm text-gray-800">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6 text-center text-sm text-gray-800">{{ $grade->nama }}</td>
                                <td class="py-4 px-6 text-center text-sm text-gray-800">{{ $grade->nilai }}</td>
                                <td class="py-4 px-6 text-center text-sm text-gray-800">{{ $grade->deskripsi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-gray-600 italic text-lg">Belum ada data nilai yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
