<x-landing-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Koleksi Kategori</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Jelajahi berbagai koleksi dokumen dan jurnal berdasarkan kategori yang tersedia di Perpustakaan Digital Lembaga Adat Melayu Jambi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}" class="group block">
                        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 overflow-hidden h-full flex flex-col">
                            <div class="p-6 flex items-start space-x-4">
                                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-lam-green group-hover:bg-lam-green group-hover:text-white transition duration-300">
                                    <i class="fas fa-folder-open text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-lam-green transition">{{ $category->name }}</h3>
                                    <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ $category->description ?? 'Tidak ada deskripsi untuk kategori ini.' }}</p>
                                    <div class="flex items-center text-sm font-medium text-gray-400">
                                        <i class="fas fa-file-alt mr-2"></i>
                                        <span>{{ $category->journals_count }} Dokumen</span>
                                    </div>
                                </div>
                                <div class="text-gray-300 group-hover:text-lam-green transition self-center">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($categories->isEmpty())
                <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mx-auto mb-4">
                        <i class="fas fa-folder-open text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Belum ada kategori</h3>
                    <p class="text-gray-500 mt-2">Kategori dokumen belum ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</x-landing-layout>