<x-app-layout>
    <!-- Header with animated gradient and smooth fade-in -->
    <x-slot name="header" class="py-8 bg-gradient-to-r from-indigo-700 to-indigo-900 text-white shadow-xl rounded-lg animate__animated animate__fadeIn animate__delay-1s">
        <h2 class="font-semibold text-5xl text-center leading-tight">
            {{ __('Jadwal Ekskul') }}
        </h2>
    </x-slot>

    <!-- Main Content Section with fade-in animation -->
    <div class="py-12 bg-gray-50 animate__animated animate__fadeIn animate__delay-2s">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <!-- Display Success/Error Messages with slide-in and fade animation -->
            @if (session('success') || session('error'))
            <div class="w-full p-5 {{ session('success') ? 'bg-green-600' : 'bg-red-600' }} text-white rounded-xl shadow-xl mb-6 animate__animated animate__slideInUp">
                <strong>{{ session('success') ?? session('error') }}</strong>
            </div>
            @endif

            <!-- Add Schedule Button (only for pelatih) with hover scale animation -->
            @if(Auth::user()->role == 'pembina')
            <div class="mb-8 text-center animate__animated animate__fadeInUp">
                <a href="{{ route('jadwal.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 ease-in-out hover:scale-110">
                    Tambah Jadwal
                </a>
            </div>
            @endif

            <!-- Table to Display Schedules with smooth fade-in -->
            <div class="bg-white shadow-xl sm:rounded-xl p-6 animate__animated animate__fadeIn animate__delay-3s">
                <table class="min-w-full table-auto text-gray-800 text-left">
                    <thead class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-sm font-medium">No</th>
                            <th class="px-6 py-4 text-sm font-medium">Status</th>
                            <th class="px-6 py-4 text-sm font-medium">Ekskul</th>
                            <th class="px-6 py-4 text-sm font-medium">Hari</th>
                            <th class="px-6 py-4 text-sm font-medium">Mulai</th>
                            <th class="px-6 py-4 text-sm font-medium">Selesai</th>
                            @if(Auth::user()->role !== 'user')
                            <th class="px-6 py-4 text-sm font-medium">Status Validasi</th>
                            @endif
                            @if(Auth::user()->role == 'pelatih' || Auth::user()->role == 'pembina')
                            <th class="px-6 py-4 text-sm font-medium">Actions</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                        <tr class="hover:bg-indigo-100 transition-all duration-300 ease-in-out animate__animated animate__fadeIn animate__delay-{{ $loop->iteration }}s">
                            <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm capitalize">
                                <span class="inline-flex items-center rounded-full bg-indigo-200 px-3 py-1 text-xs font-medium text-indigo-800 ring-1 ring-inset ring-indigo-800/10">
                                    {{ $jadwal->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $jadwal->ekskul }}</td>
                            <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($jadwal->hari)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($jadwal->mulai)->format('h:i A') }}</td>
                            <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($jadwal->selesai)->format('h:i A') }}</td>

                            @if(Auth::user()->role !== 'user')
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex items-center rounded-full bg-indigo-200 px-3 py-1 text-xs font-medium text-indigo-800 ring-1 ring-inset ring-indigo-800/10">
                                    {{ $jadwal->status_validasi }}
                                </span> 
                            </td>
                            @endif

                            <!-- Validasi untuk pelatih -->
        @if(Auth::user()->role == 'pelatih')
        <td class="px-6 py-4 flex space-x-4">
            @if($jadwal->status_validasi !== 'sudah divalidasi')
                <a href="{{ route('jadwal.validasi', $jadwal->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition-all duration-300 transform hover:scale-110">
                    Validasi
                </a>
            @else
                <span class="text-green-600 font-semibold">
                    Sudah Divalidasi
                </span>
            @endif
        </td>
        @endif

                            @if (Auth::user()->role == 'pembina')
                            <td class="px-6 py-4 flex space-x-4">
                                <!-- Edit Button with smooth hover animation -->
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition-all duration-300 transform hover:scale-110">
                                    Edit
                                </a>
                                <!-- Delete Button with hover effect -->
                                <form class="inline" action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition-all duration-300 transform hover:scale-110">
                                        Delete
                                    </button>
                                </form>
                                @endif
                                @if(Auth::user()->role == 'user')
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('absensi.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition-all duration-300 transform hover:scale-110">
                                    Absensi 
                                </a>
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
