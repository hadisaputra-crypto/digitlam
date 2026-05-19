<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-6 text-white flex justify-between items-center">
                    <h3 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-user-circle mr-3"></i> Profil User
                    </h3>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest transition ease-in-out duration-150">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center px-4 py-2 bg-white text-lam-green hover:bg-gray-100 border border-transparent rounded-lg font-semibold text-sm uppercase tracking-widest shadow-md transition ease-in-out duration-150">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-start space-x-6 mb-8">
                        <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center text-lam-green text-4xl shadow-inner border-4 border-white flex-shrink-0">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->name }}</h4>
                            <p class="text-gray-500 mb-3"><i class="fas fa-envelope mr-2"></i>{{ $user->email }}</p>
                            
                            <div class="flex items-center space-x-3">
                                @if($user->role === 'admin')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-shield-alt mr-1"></i> Admin</span>
                                @elseif($user->role === 'dosen_mahasiswa')
                                    <span class="px-3 py-1 bg-green-100 text-blue-800 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-user-graduate mr-1"></i> Dosen/Mahasiswa</span>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-user mr-1"></i> Guest</span>
                                @endif

                                @if($user->is_active)
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-check-circle mr-1"></i> Aktif</span>
                                @else
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-times-circle mr-1"></i> Nonaktif</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">ID User</p>
                            <p class="text-lg text-gray-900 font-mono">{{ $user->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Email Terverifikasi</p>
                            <p class="text-lg text-gray-900">
                                @if($user->email_verified_at)
                                    <span class="text-green-600"><i class="fas fa-check mr-1"></i> {{ $user->email_verified_at->format('d M Y') }}</span>
                                @else
                                    <span class="text-gray-400">Belum diverifikasi</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Bergabung Sejak</p>
                            <p class="text-lg text-gray-900">{{ $user->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Terakhir Diperbarui</p>
                            <p class="text-lg text-gray-900">{{ $user->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.');">
                            @csrf @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-200 text-green-600 bg-green-50 hover:bg-green-100 rounded-lg transition-colors font-semibold shadow-sm" {{ $user->id === auth()->id() ? 'disabled title="Anda_tidak_dapat_menghapus_akun_sendiri"' : '' }}>
                                <i class="fas fa-trash-alt mr-2"></i> Hapus Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
