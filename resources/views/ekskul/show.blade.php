<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl text-gray-900 leading-tight">
            {{ __('Detail Eskul') }}
        </h2>
    </x-slot>

    <!-- Main Background Gradient (Shades of Gray) -->
    <div class="py-12 bg-gradient-to-b from-gray-800 via-gray-600 to-gray-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Eskul Description Card with Overlay -->
            <div class="p-8 bg-gradient-to-r from-gray-700 via-gray-600 to-gray-500 text-white shadow-xl rounded-lg transition-transform duration-300 hover:scale-105">
                <header>
                    <h2 class="text-3xl font-serif font-semibold">{{ __($ekskul->name) }}</h2>
                    <p class="mt-4 text-lg">{{ __($ekskul->description) }}</p>
                </header>
            </div>

            <!-- Eskul Image and Details Card -->
            <div class="p-8 bg-white shadow-lg rounded-lg transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row gap-12">
                    <!-- Eskul Image -->
                    <div class="w-full md:w-1/3">
                        <img src="{{ Storage::url($ekskul->featured_image) }}" alt="{{ $ekskul->name }}" class="w-full rounded-lg shadow-md">
                    </div>

                    <!-- Eskul Registration and Members Info -->
                    <div class="w-full md:w-2/3">
                        <div class="flex justify-between items-center mb-8">
                            <div>
                                @if (auth()->user()->role == 'user')
                                    <a href="{{ route('pendaftaran.index') }}" class="inline-block bg-gradient-to-r from-gray-700 to-gray-900 text-white font-bold py-3 px-6 rounded-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                                        Daftar
                                    </a>
                                @endif
                            </div>
                            <div>
                                  <a href="{{ route('dashboard') }}" class="inline-block bg-gradient-to-r from-gray-700 to-gray-900 text-white font-bold py-3 px-6 rounded-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                                        Home
                                    </a>
                            </div>
                        </div>

                        <!-- Member List Table -->
                        @if($members->isNotEmpty())
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-serif font-semibold text-gray-800 mb-6">Anggota Eskul</h3>
                            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                                <thead class="bg-gray-200 text-gray-700">
                                    <tr>
                                        <th class="py-3 px-6 text-sm font-medium text-center">No</th>
                                        <th class="py-3 px-6 text-sm font-medium text-center">Nama Anggota</th>
                                        <th class="py-3 px-6 text-sm font-medium text-center">Kelas</th>
                                        <th class="py-3 px-6 text-sm font-medium text-center">Nomor Anggota</th> <!-- Ganti ID dengan Nomor -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-4 px-6 text-sm text-center text-gray-700">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-6 text-sm text-center text-gray-700">{{ $member->nama }}</td>
                                            <td class="py-4 px-6 text-sm text-center text-gray-700">{{ $member->kelas }}</td>
                                            <td class="py-4 px-6 text-sm text-center text-gray-700">{{ $member->nomor_anggota ?? 'N/A' }}</td> <!-- Menampilkan Nomor Anggota -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p class="text-gray-600">Belum ada anggota yang terdaftar di eskul ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Soft Textured Background (Gray Pattern Option) -->
    <div class="absolute inset-0 z-[-1] bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 opacity-15 bg-pattern-circles"></div>
</x-app-layout>
