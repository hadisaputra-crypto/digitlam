<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-lam-green to-green-700 rounded-t-2xl p-8 text-white relative overflow-hidden shadow-lg">
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                    <i class="fas fa-users text-9xl"></i>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h3 class="text-3xl font-bold mb-2 flex items-center gap-3">
                            <i class="fas fa-users-cog"></i> Daftar Pengguna
                        </h3>
                        <p class="text-green-100 max-w-xl text-lg">
                            Kelola akun pengguna, peran, dan status keaktifan member platform.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-lam-green font-bold rounded-xl shadow-lg hover:bg-yellow-50 hover:scale-105 transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i> Tambah User Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden border-x border-b border-gray-100">
                <div class="p-6">
                    <!-- Search Bar -->
                    <div class="mb-6 flex justify-between items-center">
                        <form method="GET" action="{{ route('admin.users.index') }}" class="w-full max-w-md">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-lam-green focus:border-lam-green sm:text-sm transition duration-150 ease-in-out shadow-sm" placeholder="Cari nama atau email user..." autocomplete="off">
                                @if(request('search'))
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <a href="{{ route('admin.users.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-gray-100">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">User</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kontak</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($users as $user)
                                    <tr class="hover:bg-green-50/30 transition-colors duration-200 group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-lam-green to-red-600 flex items-center justify-center text-white font-bold shadow-sm">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-bold text-gray-900 group-hover:text-lam-green transition-colors">{{ $user->name }}</div>
                                                    <div class="text-xs text-gray-500">Joined {{ $user->created_at->format('M Y') }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-700 flex items-center">
                                                <i class="far fa-envelope text-gray-400 mr-2"></i> {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($user->role === 'admin')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-shield-alt mr-1"></i> Admin
                                                </span>
                                            @elseif($user->role === 'dosen_mahasiswa')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800">
                                                    <i class="fas fa-user-graduate mr-1"></i> Dosen/Mhs
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    <i class="fas fa-user mr-1"></i> Guest
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('admin.users.edit', $user) }}" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 hover:text-blue-800 transition-colors shadow-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 hover:text-green-800 transition-colors shadow-sm" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <i class="fas fa-users-slash text-5xl mb-4"></i>
                                                <p class="text-lg font-medium">Belum ada pengguna terdaftar.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
