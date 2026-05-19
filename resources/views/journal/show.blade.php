<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $journal->title }}
            </h2>
            <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto text-center">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12" x-data="{ showPreview: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left Column: Main Content -->
                <div class="md:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-royal-emerald">
                        <div class="p-6 sm:p-8 text-gray-900">
                    <!-- Journal Header -->
                    <div class="mb-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="inline-block bg-green-100 text-blue-800 text-sm px-3 py-1 rounded-full mb-2">
                                    {{ $journal->category->name }}
                                </span>
                                <span class="text-sm text-gray-500 ml-2">{{ $journal->year }}</span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Dipublikasikan</p>
                                <p class="text-sm font-medium">{{ $journal->published_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        
                        <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $journal->title }}</h1>
                        
                        <div class="text-sm text-gray-600 mb-4">
                            <p><strong>Penulis:</strong> {{ $journal->authors }}</p>
                            <p><strong>Keywords:</strong> {{ $journal->keywords }}</p>
                        </div>
                    </div>

                    <!-- Abstract Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Abstrak</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 leading-relaxed">{{ $journal->abstract }}</p>
                        </div>
                    </div>

                    <!-- Journal Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-2">Informasi Jurnal</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li><strong>Kategori:</strong> {{ $journal->category->name }}</li>
                                <li><strong>Tahun:</strong> {{ $journal->year }}</li>
                                <li><strong>Status:</strong> 
                                    <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                                        {{ ucfirst($journal->status) }}
                                    </span>
                                </li>
                                <li><strong>Diunggah oleh:</strong> {{ $journal->uploader->name }}</li>
                                <li><strong>Tanggal unggah:</strong> {{ $journal->created_at->format('d M Y H:i') }}</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-2">Tautan Dokumen</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li><strong>Penyimpanan:</strong> Eksternal / Cloud</li>
                                <li><strong>URL Asli:</strong> 
                                    @if($journal->document_url)
                                        <a href="{{ $journal->document_url }}" target="_blank" class="text-green-600 hover:underline">Buka Tautan</a>
                                    @else
                                        <span class="text-gray-400">Belum tersedia</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Preview Section (Modal Triggered Below) -->

                    <!-- Download Section -->
                    <div class="border-t-4 border-royal-gold pt-8 mt-12 bg-gray-50 p-8 rounded-3xl shadow-inner text-center">
                        @if($journal->visibility === 'public')
                            <h4 class="text-xl font-black text-green-900 mb-6 uppercase tracking-wider">Akses Dokumen Adat</h4>
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                                <button @click="showPreview = true" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-royal-gold hover:bg-yellow-500 text-green-900 font-black rounded-xl transition-all shadow-lg border-2 border-royal-gold-dark">
                                    <i class="fas fa-eye mr-2"></i> BACA DOKUMEN
                                </button>
                                <a href="{{ route('journal.download', $journal) }}" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-royal-emerald hover:bg-green-900 text-white font-black rounded-xl transition-all shadow-lg border-2 border-royal-gold">
                                    <i class="fas fa-download mr-2"></i> UNDUH PDF
                                </a>
                            </div>
                            <p class="text-sm text-gray-500 mt-6 font-medium italic">
                                * Dokumen ini bersifat publik sebagai bagian dari preservasi warisan budaya Lembaga Adat Kota Jambi.
                            </p>
                        @else
                            @auth
                                @if(in_array(auth()->user()->role, ['admin', 'dosen_mahasiswa']))
                                    <h4 class="text-xl font-black text-green-900 mb-6 uppercase tracking-wider">Akses Terbatas</h4>
                                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                                        <a href="{{ route('journal.download', $journal) }}" 
                                           class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-royal-emerald hover:bg-green-900 text-white font-black rounded-xl transition-all shadow-lg">
                                            <i class="fas fa-download mr-2"></i> UNDUH DOKUMEN
                                        </a>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-6 font-medium">
                                        Anda memiliki izin untuk mengakses dokumen terbatas ini.
                                    </p>
                                @else
                                    <div class="text-center bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-8">
                                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 text-yellow-600">
                                            <i class="fas fa-lock text-2xl"></i>
                                        </div>
                                        <p class="text-yellow-900 font-bold mb-4">
                                            Akses Terbatas: Anda perlu login sebagai Pengurus Adat atau Anggota untuk mengunduh dokumen ini.
                                        </p>
                                        <a href="{{ route('profile.edit') }}" class="px-6 py-2 bg-royal-emerald text-white font-black rounded-lg text-xs uppercase tracking-widest hover:bg-green-800 transition">Hubungi Admin</a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-8">
                                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 text-yellow-600">
                                        <i class="fas fa-lock text-2xl"></i>
                                    </div>
                                    <p class="text-yellow-900 font-bold mb-4">
                                        Dokumen ini dilindungi. Silakan login untuk mendapatkan akses unduhan.
                                    </p>
                                    <a href="{{ route('login') }}" class="px-8 py-3 bg-royal-emerald text-white font-black rounded-xl hover:bg-green-900 transition-all shadow-lg inline-flex items-center">
                                        <i class="fas fa-sign-in-alt mr-2"></i> LOGIN SEKARANG
                                    </a>
                                </div>
                            @endauth
                        @endif
                    </div>
                        </div> <!-- Closes .p-6 -->
                    </div> <!-- Closes .bg-white -->
                </div> <!-- Closes .md:col-span-2 -->

                <!-- Right Column: Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-royal-gold sticky top-6">
                        <div class="p-6">
                            <h3 class="text-lg font-black text-green-900 mb-6 uppercase tracking-wider border-b-2 border-gray-100 pb-3 flex items-center">
                                <i class="fas fa-bookmark text-royal-gold mr-3"></i> Dokumen Terkait
                            </h3>
                            
                            @if($relatedJournals->count() > 0)
                                <div class="space-y-6">
                                    @foreach($relatedJournals as $related)
                                        <div class="group">
                                            <a href="{{ route('journal.show', $related->slug) }}" class="block">
                                                <h4 class="font-bold text-gray-900 group-hover:text-green-700 transition leading-snug line-clamp-2 mb-2">
                                                    {{ $related->title }}
                                                </h4>
                                            </a>
                                            <div class="flex items-center text-xs text-gray-500 font-medium">
                                                <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                                                {{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-folder-open text-gray-300 text-xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-500">Belum ada dokumen terkait.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Preview Modal -->
    <div x-show="showPreview" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
         x-cloak>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl h-[90vh] flex flex-col overflow-hidden border-4 border-royal-gold" @click.away="showPreview = false">
                <!-- Modal Header -->
                <div class="bg-royal-emerald bg-batik p-4 flex justify-between items-center border-b-4 border-royal-gold">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-royal-gold rounded-full flex items-center justify-center mr-3 shadow-lg">
                            <i class="fas fa-file-pdf text-green-900"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-sm uppercase tracking-wider line-clamp-1">{{ $journal->title }}</h3>
                            <p class="text-white/60 text-[10px] font-bold uppercase tracking-[0.2em]">Pratinjau Dokumen Adat</p>
                        </div>
                    </div>
                    <button @click="showPreview = false" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Modal Body (Iframe) -->
                <div class="flex-1 bg-gray-100">
                    @php
                        $previewUrl = $journal->document_url;
                        if (str_contains($previewUrl, 'drive.google.com/file/d/')) {
                            $previewUrl = preg_replace('/\/view.*$/', '/preview', $previewUrl);
                        }
                    @endphp
                    <iframe src="{{ $previewUrl }}" class="w-full h-full border-none" allow="autoplay"></iframe>
                </div>
                
                <!-- Modal Footer -->
                <div class="p-4 bg-gray-50 flex justify-end gap-3 border-t border-gray-200">
                    <button @click="showPreview = false" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-black text-xs rounded-xl transition">
                        TUTUP
                    </button>
                    <a href="{{ $journal->document_url }}" target="_blank" class="px-6 py-2 bg-royal-gold text-green-900 font-black text-xs rounded-xl hover:shadow-lg transition">
                        BUKA DI TAB BARU
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- Closes .py-12 x-data container -->
</x-app-layout>
