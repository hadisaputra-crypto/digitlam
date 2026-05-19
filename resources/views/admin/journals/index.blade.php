<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Library Digital') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-lam-green to-green-700 rounded-t-2xl p-8 text-white relative overflow-hidden shadow-lg">
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                    <i class="fas fa-book text-9xl"></i>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h3 class="text-3xl font-bold mb-2 flex items-center gap-3">
                            <i class="fas fa-book-open"></i> Daftar Koleksi Adat
                        </h3>
                        <p class="text-green-100 max-w-xl text-lg">
                            Kelola semua publikasi jurnal yang tersedia di repositori.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('admin.journals.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-lam-green font-bold rounded-xl shadow-lg hover:bg-yellow-50 hover:scale-105 transition-all duration-300">
                            <i class="fas fa-plus-circle mr-2"></i> Buat Jurnal Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden border-x border-b border-gray-100">
                <div class="p-6">
                    <!-- Search Bar -->
                    <div class="mb-6 flex justify-between items-center">
                        <form method="GET" action="{{ route('admin.journals.index') }}" class="w-full max-w-md">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-lam-green focus:border-lam-green sm:text-sm transition duration-150 ease-in-out shadow-sm" placeholder="Cari judul, abstrak, atau penulis..." autocomplete="off">
                                @if(request('search'))
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <a href="{{ route('admin.journals.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
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
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Dokumen</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Uploader</th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($journals as $journal)
                                    <tr class="hover:bg-green-50/30 transition-colors duration-200 group">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-semibold text-gray-900 group-hover:text-lam-green transition-colors">{{ Str::limit($journal->title, 60) }}</div>
                                            <div class="text-xs text-gray-500 mt-1"><i class="far fa-calendar-alt mr-1"></i> {{ $journal->created_at->format('d M Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800">
                                                {{ $journal->category->name ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs font-bold mr-2">
                                                    {{ substr($journal->uploader->name ?? '?', 0, 1) }}
                                                </div>
                                                <div class="text-sm text-gray-700">{{ $journal->uploader->name ?? '-' }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @if($journal->status === 'published')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 shadow-sm">
                                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5 animate-pulse"></span> Published
                                                </span>
                                            @elseif($journal->status === 'draft')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm">
                                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Draft
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-red-200 shadow-sm">
                                                    {{ ucfirst($journal->status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('admin.journals.edit', $journal) }}" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 hover:text-blue-800 transition-colors shadow-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.journals.destroy', $journal) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurnal ini?');">
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
                                                <i class="far fa-folder-open text-5xl mb-4"></i>
                                                <p class="text-lg font-medium">Belum ada jurnal yang tersedia.</p>
                                                <a href="{{ route('admin.journals.create') }}" class="mt-2 text-lam-green hover:underline font-medium">Buat jurnal pertama</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $journals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
