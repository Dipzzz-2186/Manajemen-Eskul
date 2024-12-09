<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit Jadwal') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Edit Jadwal") }}
                    </p>
                </header>

                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Status --</option>
                            <option value="mendatang">Mendatang</option>
                            <option value="berlangsung">Berlangsung</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>


                    <!-- Submit Button -->
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
