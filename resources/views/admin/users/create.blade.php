<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-6 text-white">
                    <h3 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-user-plus mr-3"></i> Tambah User Baru
                    </h3>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Lengkap')" class="font-bold text-gray-700" />
                                <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Alamat Email')" class="font-bold text-gray-700" />
                                <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" type="email" name="email" :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="password" :value="__('Password')" class="font-bold text-gray-700" />
                                <x-text-input id="password" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="font-bold text-gray-700" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" type="password" name="password_confirmation" required />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="role" :value="__('Peran (Role)')" class="font-bold text-gray-700" />
                                <select id="role" name="role" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50">
                                    <option value="dosen_mahasiswa" {{ old('role') == 'dosen_mahasiswa' ? 'selected' : '' }}>Dosen / Mahasiswa</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>

                            <div class="flex items-center pt-8">
                                <label for="is_active" class="inline-flex items-center cursor-pointer">
                                    <input id="is_active" type="checkbox" class="rounded border-gray-300 text-lam-green shadow-sm focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('Akun Aktif') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t pt-6">
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-lam-green focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-lam-green border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-lam-green focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                <i class="fas fa-save mr-2"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
