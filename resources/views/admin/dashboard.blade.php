<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-lam-green leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-red-50 via-white to-yellow-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="card-surface p-6 sm:p-8 mb-8 rounded-2xl border-2 border-green-100 bg-gradient-to-r from-red-50 to-yellow-50">
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <div class="w-16 h-16 bg-lam-green rounded-lg flex items-center justify-center text-white shadow-lg">
                        <i class="fas fa-user-shield text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-lam-green">Selamo Datang, Administrator {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600 mt-1">Kelola sistem Serambi Baco LAM Kota Jambi, pengguna, dan konten dari panel siko.</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('admin.journals.index') }}" class="block bg-white overflow-hidden shadow-lg sm:rounded-lg transition-shadow duration-300 md:hover:shadow-xl md:hover:scale-105 h-full">
                    <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="flex-shrink-0 mb-4 sm:mb-0">
                            <div class="w-12 h-12 bg-lam-green rounded-xl flex items-center justify-center mx-auto sm:mx-0">
                                <i class="fas fa-file-alt text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="sm:ml-5 w-full">
                            <dt class="text-sm font-medium text-gray-700">Kelola Serambi Baco</dt>
                            <dd class="text-xs text-gray-500">Tengok, edit, hapus dokumen</dd>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.users.index') }}" class="block bg-white overflow-hidden shadow-lg sm:rounded-lg transition-shadow duration-300 md:hover:shadow-xl md:hover:scale-105 h-full">
                    <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="flex-shrink-0 mb-4 sm:mb-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mx-auto sm:mx-0">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="sm:ml-5 w-full">
                            <dt class="text-sm font-medium text-gray-700">Kelola Pengguno</dt>
                            <dd class="text-xs text-gray-500">Tengok, edit, hapus pengguno</dd>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="block bg-white overflow-hidden shadow-lg sm:rounded-lg transition-shadow duration-300 md:hover:shadow-xl md:hover:scale-105 h-full">
                    <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="flex-shrink-0 mb-4 sm:mb-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto sm:mx-0">
                                <i class="fas fa-tags text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="sm:ml-5 w-full">
                            <dt class="text-sm font-medium text-gray-700">Kelola Kategori</dt>
                            <dd class="text-xs text-gray-500">Tengok, edit, hapus kategori</dd>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.logs') }}" class="block bg-white overflow-hidden shadow-lg sm:rounded-lg transition-shadow duration-300 md:hover:shadow-xl md:hover:scale-105 h-full">
                    <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="flex-shrink-0 mb-4 sm:mb-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mx-auto sm:mx-0">
                                <i class="fas fa-clipboard-list text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="sm:ml-5 w-full">
                            <dt class="text-sm font-medium text-gray-700">Log Aktivitas</dt>
                            <dd class="text-xs text-gray-500">Tengok aktivitas sistem</dd>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-lam-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Segalo Koleksi Digital</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $stats['total_journals'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Dokumen Lah Terbit</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $stats['published_journals'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Draft Dokumen</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $stats['draft_journals'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Segalo Pengguno</dt>
                                    <dd class="text-lg font-medium text-gray-900">{{ $stats['total_users'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Journals per Category Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Dokumen per Kategori</h3>
                        <div style="height: 250px; position: relative;">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Journals per Year Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Dokumen per Tahun</h3>
                        <div style="height: 250px; position: relative;">
                            <canvas id="yearChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity and Journals -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Aktivitas Paling Baru</h3>
                        <div class="space-y-4">
                            @forelse($recentActivities as $activity)
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-lam-green rounded-full mt-2"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-gray-900">
                                            <span class="font-medium">{{ $activity->user->name ?? 'System' }}</span>
                                            {{ $activity->action }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">Belum ado aktivitas terbaru</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Recent Journals -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Dokumen Paling Baru</h3>
                        <div class="space-y-4">
                            @forelse($recentJournals as $journal)
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $journal->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $journal->uploader->name }} • {{ $journal->created_at->diffForHumans() }}</p>
                                        <span class="inline-block mt-1 bg-{{ $journal->status === 'published' ? 'green' : ($journal->status === 'draft' ? 'yellow' : 'red') }}-100 text-{{ $journal->status === 'published' ? 'green' : ($journal->status === 'draft' ? 'yellow' : 'red') }}-800 text-xs px-2 py-1 rounded">
                                            {{ ucfirst($journal->status) }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">Belum ado dokumen terbaru</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($journalsPerCategory->pluck('name')) !!},
                datasets: [{
                    data: {!! json_encode($journalsPerCategory->pluck('journals_count')) !!},
                    backgroundColor: [
                        '#a81818',
                        '#facc15',
                        '#8b5cf6',
                        '#10B981',
                        '#6B7280'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            boxWidth: 15,
                            boxHeight: 15
                        }
                    }
                }
            }
        });

        // Year Chart
        const yearCtx = document.getElementById('yearChart').getContext('2d');
        new Chart(yearCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($journalsPerYear->pluck('year')) !!},
                datasets: [{
                    label: 'Jumlah Dokumen',
                    data: {!! json_encode($journalsPerYear->pluck('count')) !!},
                    backgroundColor: [
                        '#a81818',
                        '#facc15',
                        '#8b5cf6',
                        '#10B981',
                        '#6B7280'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>

