<x-guest-layout>
    <div class="card-surface rounded-2xl overflow-hidden">
        <div class="p-6 sm:p-10 text-gray-900">
            <div class="text-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-24 h-24 object-contain mx-auto mb-4 drop-shadow-md">
                <h2 class="text-3xl font-bold text-lam-green mb-2">Daftar Akun Baru</h2>
                <p class="text-gray-600 font-medium">Buat akun baru untuk mengakses Serambi Baco LAM Kota Jambi</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-800 mb-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user text-lam-green"></i>
                            <span>Nama Lengkap</span>
                        </div>
                    </label>
                    <div class="relative">
                        <input id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name"
                               placeholder="Masukkan nama lengkap kito..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-user text-lam-green"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-800 mb-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-lam-green"></i>
                            <span>Email Address</span>
                        </div>
                    </label>
                    <div class="relative">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="username"
                               placeholder="Masukkan email kito..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-lam-green"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-lock text-lam-green"></i>
                            <span>Password</span>
                        </div>
                    </label>
                    <div class="relative">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password"
                               placeholder="Masukkan password kito..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-lam-green"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-800 mb-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-lock text-lam-green"></i>
                            <span>Konfirmasi Password</span>
                        </div>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               placeholder="Konfirmasi password kito..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-lam-green"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex justify-center pt-8">
                    <button type="submit" class="w-full px-6 py-3 bg-lam-green text-white rounded-xl font-bold hover:shadow-lg hover:bg-green-800 transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        <span>DAFTAR</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600 font-semibold">
                    Sudah ado akun? 
                    <a href="{{ route('login') }}" class="text-lam-green font-bold hover:underline transition-all">
                        Masuk Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
