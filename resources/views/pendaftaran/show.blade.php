<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-200 leading-tight">
            {{ __('Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Session Messages -->
            @if (session('success') || session('error'))
                <div class="w-full p-5 rounded-lg mb-5 shadow-lg 
                    {{ session('success') ? 'bg-gradient-to-r from-green-400 to-green-500 text-white' : 'bg-gradient-to-r from-red-400 to-red-500 text-white' }}">
                    <p class="text-center font-semibold">{{ session('success') ?? session('error') }}</p>
                </div>
            @endif

            <!-- Table Container -->
            <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-200 mb-4">Daftar Ekskul</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-600 rounded-xl shadow-md">
                        <thead class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">NIS</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Ekskul</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-600">
                            @foreach ($daftars as $daftar)
                                <tr class="hover:bg-gray-700 hover:scale-[1.02] transition-transform duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-200 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200 font-medium">{{ $daftar->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $daftar->nis }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $daftar->kelas }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $daftar->ekskul }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
