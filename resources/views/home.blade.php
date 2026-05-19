<x-landing-layout>
    <div>
    <!-- Hero Section with Batik Pattern -->
    <div class="bg-royal-emerald bg-batik text-white pt-24 pb-32 px-4 relative overflow-hidden border-b-8 border-royal-gold shadow-2xl">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight text-royal-gold drop-shadow-2xl">
                Library Digital Lembaga Adat Kota Jambi
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-12 font-bold drop-shadow-lg">
                Preservasi dan Aksesibilitas Warisan Budaya Kerajaan Melayu Jambi
            </p>

            <!-- Search Bar -->
            <div class="max-w-3xl mx-auto">
                <form action="{{ route('home') }}" method="GET" class="relative">
                    <div class="flex shadow-2xl rounded-full bg-white p-1">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari dokumen, artikel, atau arsip adat..." 
                               class="w-full px-6 py-3 rounded-l-full text-gray-800 placeholder-gray-400 focus:outline-none border-none ring-0">
                        <button type="submit" class="bg-royal-gold hover:bg-yellow-500 text-green-900 px-8 py-3 rounded-full font-black transition flex items-center shadow-lg border-2 border-royal-gold-dark">
                            <i class="fas fa-search mr-2"></i> Cari Arsip
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Decorative background elements - Royal Malay style -->
        <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
            <div class="absolute -left-20 -top-20 w-96 h-96 rounded-full bg-yellow-400 blur-[120px] opacity-30"></div>
            <div class="absolute right-0 bottom-0 w-[500px] h-[500px] rounded-full bg-green-400 blur-[150px] opacity-20"></div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Stat 1 -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex items-center border-2 border-yellow-400 transform hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 rounded-2xl bg-yellow-500 flex items-center justify-center text-white mr-5 shadow-lg">
                    <i class="fas fa-file-alt text-3xl"></i>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-900 leading-none mb-1">{{ $totalDocuments }}</div>
                    <div class="text-sm text-gray-500 font-bold uppercase tracking-wider">Total Dokumen</div>
                </div>
            </div>
            
            <!-- Stat 2 -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex items-center border-2 border-yellow-400 transform hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 rounded-2xl bg-yellow-500 flex items-center justify-center text-white mr-5 shadow-lg">
                    <i class="fas fa-layer-group text-3xl"></i>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-900 leading-none mb-1">{{ $totalCategories }}</div>
                    <div class="text-sm text-gray-500 font-bold uppercase tracking-wider">Kategori</div>
                </div>
            </div>
            
            <!-- Stat 3 -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex items-center border-2 border-yellow-400 transform hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 rounded-2xl bg-yellow-500 flex items-center justify-center text-white mr-5 shadow-lg">
                    <i class="fas fa-eye text-3xl"></i>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-900 leading-none mb-1">{{ number_format($totalViews) }}</div>
                    <div class="text-sm text-gray-500 font-bold uppercase tracking-wider">Views</div>
                </div>
            </div>
            
            <!-- Stat 4 -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex items-center border-2 border-yellow-400 transform hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 rounded-2xl bg-yellow-500 flex items-center justify-center text-white mr-5 shadow-lg">
                    <i class="fas fa-download text-3xl"></i>
                </div>
                <div>
                    <div class="text-4xl font-black text-green-900 leading-none mb-1">{{ number_format($totalDownloads) }}</div>
                    <div class="text-sm text-gray-500 font-bold uppercase tracking-wider">Downloads</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Documents Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="mb-10">
            <h2 class="text-3xl font-black text-gray-900 border-b-4 border-royal-gold inline-block pb-3">
                Koleksi Adat Terbaru
            </h2>
        </div>

        <div class="flex flex-col space-y-6">
            @forelse($journals as $journal)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border-l-8 border-royal-gold overflow-hidden group flex flex-col md:flex-row h-full md:h-52">
                    <!-- List Side with Batik Pattern -->
                    <div class="w-full md:w-52 bg-royal-emerald bg-batik flex flex-col justify-center items-center relative overflow-hidden p-6 shrink-0">
                        <div class="absolute top-2 left-2 bg-royal-gold text-green-900 text-[10px] px-2 py-0.5 rounded-full font-black uppercase tracking-wider">
                            Arsip
                        </div>
                        <i class="fas fa-file-pdf text-6xl text-white drop-shadow-lg group-hover:scale-110 transition duration-500"></i>
                        <div class="mt-3 text-white/60 text-xs font-bold uppercase tracking-[0.2em]">
                            Dokumen Adat
                        </div>
                        <!-- Shine effect -->
                        <div class="absolute top-0 -left-[100%] w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-[25deg] group-hover:animate-shine"></div>
                    </div>
                    
                    <!-- List Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold px-3 py-1 bg-green-50 text-green-700 rounded-full border border-green-100 uppercase tracking-wide">
                                    {{ $journal->category->name }}
                                </span>
                                <div class="flex items-center text-xs text-gray-400 font-medium">
                                    <i class="fas fa-calendar-alt mr-1.5"></i>
                                    {{ $journal->published_at ? $journal->published_at->format('d M Y') : $journal->created_at->format('d M Y') }}
                                </div>
                            </div>
                            
                            <h3 class="font-black text-xl text-gray-900 mb-2 hover:text-royal-emerald transition-colors">
                                <a href="{{ route('journal.show', $journal->slug) }}">
                                    {{ $journal->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">
                                {{ $journal->abstract }}
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap items-center justify-between mt-4 gap-3">
                            <div class="flex items-center">
                                <div class="w-7 h-7 rounded-full bg-royal-emerald flex items-center justify-center text-royal-gold text-[10px] font-black mr-2 shadow-sm">
                                    {{ substr($journal->uploader->name, 0, 1) }}
                                </div>
                                <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">{{ $journal->uploader->name }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                @if($journal->visibility === 'public' && $journal->document_url)
                                    <a href="{{ route('journal.download', $journal) }}" class="inline-flex items-center px-4 py-2 bg-green-100 hover:bg-green-200 text-green-800 text-[10px] font-black rounded-lg transition-all border border-green-200">
                                        <i class="fas fa-download mr-2"></i> UNDUH
                                    </a>
                                @endif
                                <a href="{{ route('journal.show', $journal->slug) }}" class="inline-flex items-center px-4 py-2 bg-royal-emerald hover:bg-green-900 text-white text-[10px] font-black rounded-lg transition-all shadow-md group-hover:translate-x-1">
                                    DETAIL <i class="fas fa-chevron-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-white rounded-3xl shadow-inner border-2 border-dashed border-gray-200">
                    <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-box-open text-5xl text-gray-200"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2">Belum Ada Koleksi</h3>
                    <p class="text-gray-500 max-w-xs mx-auto">Library digital belum memiliki koleksi dokumen adat untuk kategori ini.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($journals->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $journals->links() }}
            </div>
        @endif
    </div>

    <!-- Footer -->
    <!-- Footer with Batik Pattern -->
    <footer class="bg-royal-emerald bg-batik text-white pt-20 pb-12 border-t-8 border-royal-gold relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12 h-12 bg-white rounded-full p-1 shadow-lg">
                        <div>
                            <div class="text-2xl font-black text-royal-gold uppercase tracking-tighter leading-none">Library Digital</div>
                            <div class="text-[10px] font-bold text-white/70 uppercase tracking-[0.2em] mt-1">Lembaga Adat Kota Jambi</div>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Platform digital untuk melestarikan dan mempublikasikan karya-karya adat dan budaya Melayu Jambi agar dapat diakses oleh masyarakat luas.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-bold text-lg mb-6 text-yellow-400">Tautan Cepat</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">Koleksi Digital</a></li>
                        <li><a href="#" class="hover:text-white transition">Panduan Unggah</a></li>
                        <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-bold text-lg mb-6 text-yellow-400">Kontak</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-gray-500"></i>
                            <span>Jl. Telanaipura, Kota Jambi, Jambi</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-gray-500"></i>
                            <span>info@lamjambi.org</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-gray-500"></i>
                            <span>(0741) 123456</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Lembaga Adat Melayu Jambi. All rights reserved.
            </div>
        </div>
    </footer>
    
    <style>
        @keyframes shine {
            100% {
                left: 125%;
            }
        }
        .animate-shine {
            animation: shine 1s;
        }
    </style>

    </div> <!-- Closes outer container -->
</x-landing-layout>