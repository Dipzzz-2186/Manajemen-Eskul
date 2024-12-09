<body class="bg-gray-100 text-gray-800 font-sans">
    <nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-800 to-gray-700 border-b border-gray-600 shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <img src="{{ asset('/images/logo2.png') }}" alt="Logo" class="h-16 w-auto rounded-lg shadow-md" />
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex space-x-8">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('jadwal.index')" :active="request()->routeIs('jadwal.index')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                            {{ __('Jadwal') }}
                        </x-nav-link>
                        
                        @if(Auth::user()->role == 'admin')
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                                {{ __('Users') }}
                            </x-nav-link>
                        @endif

                        @if(Auth::user()->role == 'pelatih')
                            <x-nav-link :href="route('penilaian.index')" :active="request()->routeIs('penilaian.index')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                                {{ __('Penilaian') }}
                            </x-nav-link>
                        @endif

                        @if(Auth::user()->role == 'admin')
                            <x-nav-link :href="route('ekskul.index')" :active="request()->routeIs('ekskul.index')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                                {{ __('Ekskul') }}
                            </x-nav-link>
                        @endif

                        @if(Auth::user()->role == 'pelatih')
                            <x-nav-link :href="route('pendaftaran.show')" :active="request()->routeIs('pendaftaran.show')" class="text-white hover:text-gray-300 transition duration-300 ease-in-out font-semibold">
                                {{ __('Daftar Peserta Ekskul') }}
                            </x-nav-link>
                        @endif
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-800 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-800 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger Menu -->
                <div class="-mr-2 flex sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-800 hover:text-blue-600 transition duration-300 ease-in-out font-medium">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>
</body>
