<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-4xl text-gray-900 leading-tight">
            {{ __('Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-10">

            <!-- Button for Admin to Add Ekskul -->
            @if(Auth::user()->role == 'admin')
            <div class="text-right">
                <a href="{{ route('ekskul.create') }}" 
                   class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    Tambah Ekskul
                </a>
            </div>
            @endif

            <!-- Success/Error Notifications -->
            @if (session('success') || session('error'))
            <div class="w-full p-4 rounded-lg text-white 
                        {{ session('success') ? 'bg-green-600' : 'bg-red-600' }} shadow-lg animate-fade-in">
                {{ session('success') }}
                {{ session('error') }}
            </div>
            @endif

            <!-- Ekskul Table -->
            <div class="bg-white rounded-xl shadow-2xl p-6">
                <table class="min-w-full table-auto border-collapse rounded-lg overflow-hidden">
                    <thead class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white">
                        <tr>
                            <th class="px-6 py-4 text-sm font-medium text-center">#</th>
                            <th class="px-6 py-4 text-sm font-medium text-center">Image</th>
                            <th class="px-6 py-4 text-sm font-medium text-center">Nama Ekskul</th>
                            <th class="px-6 py-4 text-sm font-medium text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($ekskuls as $ekskul)
                        <tr class="border-t border-gray-300 hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-center">
                                <img src="{{ Storage::url($ekskul->featured_image) }}" 
                                     alt="{{ $ekskul->name }}" 
                                     class="h-20 w-auto object-cover rounded-lg shadow-md">
                            </td>
                            <td class="px-6 py-4 text-center text-sm font-medium">{{ $ekskul->name }}</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('ekskul.show', $ekskul->id) }}" 
                                   class="bg-indigo-600 hover:bg-indigo-800 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                                    View
                                </a>
                                @if(Auth::user()->role == 'admin')
                                <a href="{{ route('ekskul.edit', $ekskul->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                                    Edit
                                </a>
                                <form class="inline" action="{{ route('ekskul.destroy', $ekskul->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                                        Delete
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
