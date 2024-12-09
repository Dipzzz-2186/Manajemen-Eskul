<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $ekskul->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex gap-4">
                    <div class="w-1/4">
                        <img src="{{ Storage::url($ekskul->featured_image) }}" alt="{{ ($ekskul->name) }}" class="w-full rounded-lg">
                    </div>
                    <div class="w-3/4">
                        <div class="flex justify-between">
                            <div>

                                <div class="mt-4">
                                </div>

                                @if (auth()->user()->role == 'user')
                                    <a href="{{ route('absensi.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Absensi
                                    </a>
                                @endif
                            </div>
                        </div>


                        @if($hadirs->isNotEmpty())
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Hadir</h2>
                            <table class="min-w-full bg-white shadow-md rounded-lg">
                                <thead>
                                    <tr class="text-left border-b">
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">No</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Nama</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Kelas</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Status Kehadiran</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Keterangan</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hadirs as $hadir)
                                        <tr class="border-b">
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$loop->iteration}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$hadir->nama}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$hadir->kelas}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$hadir->status}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$hadir->keterangan}}</td>
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
        </div>
    </div>
</x-app-layout>
