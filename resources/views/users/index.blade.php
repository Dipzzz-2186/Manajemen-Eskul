<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-gray-900 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <!-- Tombol untuk menambahkan user baru -->
            <div class="text-right mb-6">
                <a href="{{ route('users.create') }}" class="bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    Add User
                </a>
            </div>

            <!-- Tabel daftar user -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <table class="min-w-full table-auto text-sm text-gray-700">
                    <thead class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">#</th>
                            <th class="px-6 py-4 text-left">Profile</th>
                            <th class="px-6 py-4 text-left">Name</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Role</th>
                            <th class="px-6 py-4 text-left">Joined At</th>
                            <th class="px-6 py-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition duration-300">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : 'https://static.vecteezy.com/system/resources/previews/005/129/844/non_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg' }}"
                                     alt="{{ $user->name }}"
                                     class="rounded-full h-10 w-10 object-cover shadow-md">
                            </td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->role }}</td>
                            <td class="px-6 py-4">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:scale-105 transition duration-300">
                                    Edit
                                </a>

                                <!-- Tombol Delete -->
                                <form class="inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:scale-105 transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
