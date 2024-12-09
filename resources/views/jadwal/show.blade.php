<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Ekskul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __($ekskul->name) }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __($ekskul->description) }}
                    </p>
                </header>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex gap-4">
                    <div class="w-1/3">
                        <img src="{{ Storage::url($ekskul->featured_image) }}" alt="{{ ($ekskul->name) }}" class="w-full rounded-lg">
                    </div>
                    <div class="w-3/4">
                        <div class="flex justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-800">{{ $ekskul->name }}</h1>

                                <div class="mt-2">
                                    <p class="text-gray-700 text-sm leading-relaxed mb-5">
                                        {{ $ekskul->description }}
                                    </p>
                                </div>

                                @if (auth()->user()->role == 'user')
                                    <a href="{{ route('pendaftaran.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Daftar
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if($grades->isNotEmpty())
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Nilai</h2>
                            <table class="min-w-full bg-white shadow-md rounded-lg">
                                <thead>
                                    <tr class="text-left border-b">
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">No</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Nama Anggota</th>
                                        <th class="py-2 px-4 text-sm font-medium text-gray-700">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                        <tr class="border-b">
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$member->id}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$member->nama}}</td>
                                            <td class="py-2 px-4 text-sm text-gray-700">{{$member->kelas}}</td>
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
</x-app-layout>
