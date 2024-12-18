@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-2xl font-semibold mb-4">Unduh Data Absensi</h1>

    <!-- Form untuk memilih ekskul -->
    <form action="{{ route('absensi.export_excel') }}" method="GET">
        @csrf
        <div class="mb-4">
            <label for="ekskul" class="block text-gray-700">Pilih Ekskul:</label>
            <select name="ekskul" id="ekskul" class="form-select mt-1 block w-full">
                <option value="">-- Pilih Ekskul --</option>
                @foreach ($ekskuls as $ekskul)
                    <option value="{{ $ekskul->name }}">{{ $ekskul->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Unduh Excel</button>
    </form>
</div>
@endsection
