<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'SIREJU') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-gray-50">
        @include('layouts.navigation')

        <main class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-4xl mx-auto mb-16">
                    <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent mb-6 leading-tight">Akses Library Digital Lembaga Adat Tanpa Batas</h1>
                    <p class="text-lg md:text-xl text-gray-600 font-medium leading-relaxed">Platform terintegrasi untuk publikasi, pencarian, dan pengelolaan dokumen adat dengan keamanan tingkat tinggi dan teknologi terkini.</p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('home') }}" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold hover:shadow-xl hover:-translate-y-1 transition-all duration-200 inline-flex items-center gap-2 justify-center"> 
                            <i class="fas fa-search"></i> Mulai Pencarian
                        </a>
                        <a href="#features" class="w-full sm:w-auto px-8 py-4 border-2 border-blue-600 text-green-600 rounded-xl font-bold hover:bg-green-50 transition-all duration-200 inline-flex items-center gap-2 justify-center"> 
                            <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Features -->
                <div id="features" class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-10 text-center rounded-3xl shadow-xl border-t-4 border-royal-gold hover:shadow-2xl transition-all duration-300">
                        <div class="w-20 h-20 bg-royal-emerald rounded-2xl flex items-center justify-center text-royal-gold mb-8 mx-auto shadow-xl">
                            <i class="fas fa-search text-3xl"></i>
                        </div>
                        <h3 class="font-black text-2xl text-gray-900 mb-4">Pencarian Cerdas</h3>
                        <p class="text-gray-600 leading-relaxed">Filter kategori, kata kunci, dan arsip untuk menemukan dokumen adat yang paling relevan dengan kebutuhan Anda.</p>
                    </div>

                    <div class="bg-white p-10 text-center rounded-3xl shadow-xl border-t-4 border-royal-gold hover:shadow-2xl transition-all duration-300">
                        <div class="w-20 h-20 bg-royal-emerald rounded-2xl flex items-center justify-center text-royal-gold mb-8 mx-auto shadow-xl">
                            <i class="fas fa-shield-alt text-3xl"></i>
                        </div>
                        <h3 class="font-black text-2xl text-gray-900 mb-4">Keamanan Terjamin</h3>
                        <p class="text-gray-600 leading-relaxed">Enkripsi dan kontrol akses untuk melindungi konten dokumen adat dengan standar keamanan tinggi.</p>
                    </div>

                    <div class="bg-white p-10 text-center rounded-3xl shadow-xl border-t-4 border-royal-gold hover:shadow-2xl transition-all duration-300">
                        <div class="w-20 h-20 bg-royal-emerald rounded-2xl flex items-center justify-center text-royal-gold mb-8 mx-auto shadow-xl">
                            <i class="fas fa-bolt text-3xl"></i>
                        </div>
                        <h3 class="font-black text-2xl text-gray-900 mb-4">Akses Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">Infrastruktur yang dioptimalkan untuk akses cepat dan pengalaman pengguna yang lancar tanpa gangguan.</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="mt-20">
                    <h2 class="text-3xl font-bold text-gray-900 mb-12">Statistik Platform</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="bg-white p-8 text-center rounded-3xl shadow-lg border-2 border-royal-emerald hover:scale-105 transition-all">
                            <div class="text-5xl font-black text-royal-emerald">100+</div>
                            <div class="text-sm text-gray-500 font-bold uppercase tracking-widest mt-2">Dokumen</div>
                        </div>
                        <div class="bg-white p-8 text-center rounded-3xl shadow-lg border-2 border-royal-emerald hover:scale-105 transition-all">
                            <div class="text-5xl font-black text-royal-emerald">50+</div>
                            <div class="text-sm text-gray-500 font-bold uppercase tracking-widest mt-2">Penulis</div>
                        </div>
                        <div class="bg-white p-8 text-center rounded-3xl shadow-lg border-2 border-royal-emerald hover:scale-105 transition-all">
                            <div class="text-5xl font-black text-royal-emerald">1k+</div>
                            <div class="text-sm text-gray-500 font-bold uppercase tracking-widest mt-2">Unduhan</div>
                        </div>
                        <div class="bg-white p-8 text-center rounded-3xl shadow-lg border-2 border-royal-emerald hover:scale-105 transition-all">
                            <div class="text-5xl font-black text-royal-emerald">24/7</div>
                            <div class="text-sm text-gray-500 font-bold uppercase tracking-widest mt-2">Akses</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="border-t border-gray-200 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center text-sm text-gray-600 font-medium">
                &copy; {{ date('Y') }} Library Digital Lembaga Adat Kota Jambi. All rights reserved.
            </div>
        </footer>
    </body>
</html>
