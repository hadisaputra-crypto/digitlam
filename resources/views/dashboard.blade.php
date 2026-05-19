<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-lam-green leading-tight">{{ __('Dashboard') }}</h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-red-50 via-white to-yellow-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Welcome Card -->
            <div class="card-surface p-6 sm:p-8 mb-8 rounded-2xl border-2 border-green-100 bg-gradient-to-r from-red-50 to-yellow-50">
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <div class="w-16 h-16 bg-lam-green rounded-lg flex items-center justify-center text-white shadow-lg">
                        <i class="fas fa-user-astronaut text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-lam-green">Selamat Datang, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600 mt-1">{{ __("You're logged in!") }} Akses semua fitur Library Digital Lembaga Adat Kota Jambi dari sini.</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in-up-delay-1">
                <!-- Upload Journal -->
                <a href="{{ route('journal.create') }}" class="card-surface p-6 sm:p-8 block rounded-xl hover:shadow-xl hover:border-2 hover:border-red-300 group">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-lam-green mr-4 sm:mr-4 mb-0 sm:mb-0 group-hover:bg-lam-green group-hover:text-white transition-all duration-300 shadow-md"><i class="fas fa-upload text-lg"></i></div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Upload Dokumen Adat</h4>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">Unggah jurnal baru Anda untuk dipublikasikan ke repository dengan mudah.</p>
                </a>

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}" class="card-surface p-6 sm:p-8 block rounded-xl hover:shadow-xl hover:border-2 hover:border-gray-300 group">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600 mr-4 group-hover:bg-gray-600 group-hover:text-white transition-all duration-300 shadow-md"><i class="fas fa-user-cog text-lg"></i></div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Pengaturan Profil</h4>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Perbarui informasi profil dan keamanan akun Anda.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
