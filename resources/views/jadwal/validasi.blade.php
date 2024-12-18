<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Validasi Jadwal Ekskul</h1>
        
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Detail Jadwal</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-700"><strong>Ekskul:</strong> {{ $jadwal->ekskul }}</p>
                    <p class="text-gray-700"><strong>Hari:</strong> {{ $jadwal->hari }}</p>
                    <p class="text-gray-700"><strong>Jam:</strong> {{ \Carbon\Carbon::parse($jadwal->mulai)->format('h:i A') }} - {{ \Carbon\Carbon::parse($jadwal->selesai)->format('h:i A') }}</p>
                </div>
                <div>
                    <p class="text-gray-700"><strong>Status Validasi:</strong> 
                        {{$jadwal->status_validasi}}
                    </p>
                </div>
            </div>
    
            <!-- Form for Validating and Adding Materi -->
            <form action="{{ route('jadwal.approve', $jadwal->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="materi" class="block text-gray-700 font-semibold mb-2">Isi Materi</label>
                    <textarea id="materi" name="materi" rows="4" 
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                              placeholder="Tulis materi ekskul di sini..." required>{{ old('materi', $jadwal->materi) }}</textarea>
                    @error('materi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <button type="submit" 
                        class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded shadow mb-2">
                    Validasi dan Simpan Materi
                </button>
            </form>
    
            <!-- Form for Rejecting the Schedule -->
            <form action="{{ route('jadwal.reject', $jadwal->id) }}" method="POST">
                @csrf
                @method('PATCH')  <!-- Pastikan menggunakan @method('PATCH') -->
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded shadow">
                    Tolak
                </button>
            </form>
        </div>
    </div>
    </x-app-layout>
    