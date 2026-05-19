<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card-surface rounded-2xl">
        <div class="p-6 sm:p-10 text-gray-900">
            <div class="text-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-24 h-24 object-contain mx-auto mb-4 drop-shadow-md">
                <h2 class="text-3xl font-bold text-lam-green mb-1">Masuk ke Digital Library LAM</h2>
                <p class="text-gray-500 text-sm font-medium">Lembaga Adat Melayu Jambi</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-800 mb-2">Email</label>
                    <div class="relative">
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="Masukkan email Anda..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-lam-green">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-2">Password</label>
                    <div class="relative">
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Masukkan password Anda..."
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-lam-green">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center space-x-2 text-sm text-gray-700">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-lam-green border-gray-300 rounded focus:ring-lam-green">
                        <span class="font-medium">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-lam-green hover:text-green-800 transition-colors">Forgot password?</a>
                    @endif
                </div>

                <div class="flex justify-center pt-6">
                    <button type="submit" class="w-full px-6 py-3 bg-lam-green text-white rounded-xl font-bold hover:shadow-lg hover:bg-green-800 transition-all duration-200">LOG IN</button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600 font-semibold">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-lam-green font-bold hover:underline transition-all">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
