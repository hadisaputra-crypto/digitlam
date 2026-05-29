<nav x-data="{ open: false }" class="relative z-50 bg-royal-emerald bg-batik border-b-4 border-royal-gold shadow-xl text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="logo-link flex items-center hover:opacity-80 transition">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-10 h-10 object-contain bg-white rounded-full p-1 shadow-md">
                        <div class="flex flex-col ms-3">
                            <span class="text-white text-lg font-bold">Serambi Baco</span>
                            <span class="text-white/80 text-xs font-semibold">LAM Kota Jambi</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-4">
                    <!-- Public Links -->
                    <a href="{{ route('home') }}" class="text-white/80 hover:text-white transition px-2 py-2" title="Beranda">
                        <i class="fas fa-home text-lg"></i>
                    </a>
                    <a href="{{ route('categories') }}" class="text-white/80 hover:text-white transition px-2 py-2" title="Koleksi Kategori">
                        <i class="fas fa-folder text-lg"></i>
                    </a>
                    <a href="{{ route('about') }}" class="text-white/80 hover:text-white transition px-2 py-2" title="Tentang Kami">
                        <i class="fas fa-info-circle text-lg"></i>
                    </a>

                    @auth
                        <div class="h-6 w-px bg-white/20 mx-2"></div>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200" title="Dashboard Admin">
                                <i class="fas fa-tachometer-alt"></i>
                            </a>
                            <a href="{{ route('admin.journals.index') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('admin.journals.*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200">{{ __('Serambi Baco') }}</a>
                            <a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('admin.users.*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200">{{ __('User') }}</a>
                            <a href="{{ route('admin.categories.index') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200">{{ __('Kategori') }}</a>
                            <a href="{{ route('admin.logs') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('admin.logs') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200">{{ __('Logs') }}</a>
                        @endif
                        <a href="{{ route('journal.create') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('journal.create') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200">{{ __('Upload') }}</a>
                        <a href="{{ route('profile.edit') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('profile.edit') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }} transition-all duration-200" title="Pengaturan Profil">
                            <i class="fas fa-user-cog"></i>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Settings / Auth links -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-3">
                    <div class="h-8 w-px bg-white/20"></div>
                    <span class="text-sm text-white font-medium">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-white text-lam-green rounded-lg text-sm font-semibold hover:bg-lam-yellow transition-all duration-200">Logout</button>
                    </form>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" :aria-expanded="open" aria-controls="mobile-menu" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="mobile-menu" :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white shadow-md rounded-lg p-4 mx-4 mb-4">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('home') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Home') }}</a>
            @auth
            @if(auth()->user()->isAdmin())
                <div class="border-l-4 border-lam-green pl-2 ml-1 mt-2 mb-2 space-y-1">
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider ml-2 mb-1">Menu Admin</div>
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('admin.dashboard') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Dashboard') }}</a>
                    <a href="{{ route('admin.journals.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('admin.journals.*') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Kelola Serambi Baco') }}</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('admin.users.*') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Kelola User') }}</a>
                    <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('admin.categories.*') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Kelola Kategori') }}</a>
                    <a href="{{ route('admin.logs') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('admin.logs') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Activity Logs') }}</a>
                </div>
            @endif
            <a href="{{ route('journal.create') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green transition-colors duration-150 {{ request()->routeIs('journal.create') ? 'font-bold text-lam-green bg-green-50' : '' }}">{{ __('Upload Dokumen Adat') }}</a>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-100 mt-3">
                <div class="px-4 py-2 rounded-md bg-gray-50">
                    <div class="font-medium text-base text-gray-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
                    <div class="text-xs text-lam-green mt-1 font-semibold">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-lam-green">{{ __('Pengaturan Profil') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf 
                        <button type="submit" class="w-full text-left mt-2 px-3 py-2 rounded-md text-green-600 hover:bg-green-50 font-medium">Log Out</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
