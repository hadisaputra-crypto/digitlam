<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Activity Logs</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section with Gradient -->
            <div class="bg-gradient-to-r from-lam-green to-green-700 rounded-t-2xl p-8 text-white relative overflow-hidden shadow-lg">
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                    <i class="fas fa-history text-9xl"></i>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h3 class="text-3xl font-bold mb-2 flex items-center gap-3">
                            <i class="fas fa-clipboard-list"></i> Log Aktivitas
                        </h3>
                        <p class="text-green-100 max-w-xl text-lg">
                            Pantau riwayat aktivitas pengguna dan sistem untuk keamanan dan audit.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden border-x border-b border-gray-100">
                <div class="p-6">
                    <!-- Search Bar -->
                    <div class="mb-6 flex justify-between items-center">
                        <form method="GET" action="{{ route('admin.logs') }}" class="w-full max-w-md">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-lam-green focus:border-lam-green sm:text-sm transition duration-150 ease-in-out shadow-sm" placeholder="Cari aktivitas atau user..." autocomplete="off">
                                @if(request('search'))
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <a href="{{ route('admin.logs') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b-2 border-gray-100">
                                    <th class="p-4 text-sm font-bold text-gray-600 uppercase tracking-wider">
                                        <i class="far fa-clock mr-2 text-lam-green"></i>Waktu
                                    </th>
                                    <th class="p-4 text-sm font-bold text-gray-600 uppercase tracking-wider">
                                        <i class="far fa-user mr-2 text-lam-green"></i>User
                                    </th>
                                    <th class="p-4 text-sm font-bold text-gray-600 uppercase tracking-wider">
                                        <i class="fas fa-bolt mr-2 text-lam-green"></i>Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($logs as $log)
                                    <tr class="hover:bg-green-50/30 transition-colors duration-200 group">
                                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap font-medium">
                                            {{ $log->created_at->format('d M Y H:i') }}
                                            <div class="text-xs text-gray-400 mt-1">{{ $log->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="p-4 text-sm text-gray-800 font-semibold">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-lam-green font-bold text-xs">
                                                    {{ substr($log->user->name ?? 'S', 0, 1) }}
                                                </div>
                                                {{ $log->user->name ?? 'System' }}
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-gray-600">
                                            <div class="flex items-center justify-between gap-4">
                                                <span class="flex-1">{{ Str::limit($log->action, 100) }}</span>
                                                <!-- Detail button can be implemented later if needed -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-12 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                                    <i class="fas fa-history text-4xl text-gray-300"></i>
                                                </div>
                                                <h3 class="text-lg font-bold text-gray-600 mb-1">Belum ada aktivitas</h3>
                                                <p class="text-sm">Log aktivitas akan muncul di sini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
