<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Serambi Baco') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Header -->
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-8 text-white relative overflow-hidden">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                        <i class="fas fa-book text-9xl"></i>
                    </div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div class="max-w-3xl">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-sm">
                                    {{ $journal->category->name ?? 'Tanpa Kategori' }}
                                </span>
                                @if($journal->status === 'published')
                                    <span class="px-3 py-1 bg-green-500 rounded-full text-xs font-bold uppercase tracking-wider">Published</span>
                                @elseif($journal->status === 'draft')
                                    <span class="px-3 py-1 bg-yellow-500 rounded-full text-xs font-bold uppercase tracking-wider">Draft</span>
                                @else
                                    <span class="px-3 py-1 bg-red-900 rounded-full text-xs font-bold uppercase tracking-wider">Rejected</span>
                                @endif
                                
                                @if($journal->visibility === 'public')
                                    <span class="px-3 py-1 bg-green-500 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-globe mr-1"></i> Public</span>
                                @else
                                    <span class="px-3 py-1 bg-gray-500 rounded-full text-xs font-bold uppercase tracking-wider"><i class="fas fa-lock mr-1"></i> Private</span>
                                @endif
                            </div>
                            <h3 class="text-3xl font-bold mb-2 leading-tight">{{ $journal->title }}</h3>
                            <p class="text-green-100 text-lg flex items-center">
                                <i class="fas fa-users mr-2"></i> {{ str_replace(';', ', ', $journal->authors) }}
                            </p>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('admin.journals.index') }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/30 rounded-xl text-sm font-semibold transition-all text-center">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                            <a href="{{ route('admin.journals.edit', $journal) }}" class="px-4 py-2 bg-white text-lam-green hover:bg-gray-100 rounded-xl text-sm font-bold transition-all text-center shadow-lg">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 border-t border-gray-100">
                    <!-- Main Content (Left Column) -->
                    <div class="lg:col-span-2 p-8 border-r border-gray-100">
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-gray-900 border-b-2 border-green-100 pb-2 mb-4 inline-block">Abstrak</h4>
                            <div class="prose max-w-none text-gray-700 text-justify leading-relaxed">
                                <p>{{ $journal->abstract }}</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-gray-900 border-b-2 border-green-100 pb-2 mb-4 inline-block">Kato Kunci</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($journal->keywords_array as $keyword)
                                    <span class="px-4 py-1.5 bg-green-50 text-lam-green rounded-full text-sm font-medium border border-green-100">
                                        {{ trim($keyword) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        
                        @if($journal->document_url)
                            <div class="mt-8">
                                <h4 class="text-xl font-bold text-gray-900 border-b-2 border-green-100 pb-2 mb-4 inline-block">Pratinjau Dokumen</h4>
                                <div class="bg-gray-100 rounded-2xl overflow-hidden border border-gray-200 shadow-inner">
                                    @php
                                        $previewUrl = $journal->document_url;
                                        // Auto-convert Google Drive view links to preview links for iframe
                                        if (str_contains($previewUrl, 'drive.google.com/file/d/')) {
                                            $previewUrl = preg_replace('/\/view.*$/', '/preview', $previewUrl);
                                        }
                                    @endphp
                                    <iframe src="{{ $previewUrl }}" width="100%" height="600px" class="w-full border-0" allow="autoplay"></iframe>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <a href="{{ $journal->document_url }}" target="_blank" class="px-6 py-2 bg-lam-green text-white font-bold rounded-xl hover:bg-green-800 transition-colors shadow-md">
                                        <i class="fas fa-external-link-alt mr-2"></i> Buka Dokumen Asli
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="mt-8 p-6 bg-yellow-50 rounded-2xl border border-yellow-200 flex items-start space-x-4">
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-2xl mt-1"></i>
                                <div>
                                    <h5 class="font-bold text-yellow-800">Belum Ado URL Dokumen</h5>
                                    <p class="text-sm text-yellow-600 mt-1">Dokumen ko belum ado link ke cloud.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar (Right Column) -->
                    <div class="p-8 bg-gray-50/50">
                        <h4 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-6">Informasi Metadata</h4>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 mt-0.5 shadow-sm">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Tahun Terbit</p>
                                    <p class="text-gray-900 font-medium">{{ $journal->year ?? '-' }}</p>
                                    @if($journal->published_at)
                                        <p class="text-xs text-gray-500 mt-1">({{ \Carbon\Carbon::parse($journal->published_at)->format('d M Y') }})</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 mt-0.5 shadow-sm">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Diunggah Oleh</p>
                                    <p class="text-gray-900 font-medium">{{ $journal->uploader->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $journal->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 mt-0.5 shadow-sm">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Terakhir Diubah</p>
                                    <p class="text-gray-900 font-medium">{{ $journal->updated_at->diffForHumans() }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $journal->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 mt-0.5 shadow-sm">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Slug URL</p>
                                    <p class="text-gray-900 font-medium text-sm truncate">{{ $journal->slug }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10 pt-6 border-t border-gray-200">
                            <form action="{{ route('admin.journals.destroy', $journal) }}" method="POST" onsubmit="return confirm('Kito yakin nak hapus dokumen ko beserto file PDF-nyo? Tindakan ko idak biso dibatalkan.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-red-200 text-green-600 bg-green-50 hover:bg-green-100 rounded-xl transition-colors font-semibold">
                                    <i class="fas fa-trash-alt mr-2"></i> Hapus Dokumen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
