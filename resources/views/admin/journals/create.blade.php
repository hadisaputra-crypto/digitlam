<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-lam-green leading-tight">
            {{ __('Upload Dokumen Adat Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-red-50 via-white to-yellow-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-red-50">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-8 text-white relative overflow-hidden">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                        <i class="fas fa-file-upload text-9xl"></i>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-2">Upload Data Dokumen Adat</h3>
                        <p class="text-green-100 max-w-xl">
                            Tambahkan dokumen adat baru ke dalam sistem kito. Pastikan data yang dimasukin akurat dan file PDF-nyo valid.
                        </p>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.journals.store') }}" class="space-y-8">
                        @csrf

                        <!-- Section 1: Informasi Utama -->
                        <div>
                            <h4 class="text-lg font-bold text-lam-green mb-4 flex items-center border-b pb-2 border-green-100">
                                <span class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center text-lam-green mr-3 text-sm">1</span>
                                Informasi Utama
                            </h4>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Title -->
                                <div class="group">
                                    <x-input-label for="title" :value="__('Judul Dokumen')" class="text-gray-700 font-semibold mb-1" />
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-heading text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                        </div>
                                        <x-text-input id="title" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl transition-all" type="text" name="title" :value="old('title')" required autofocus placeholder="Masukkan judul lengkap dokumen adat" />
                                    </div>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <!-- Authors -->
                                    <div class="group">
                                        <x-input-label for="authors" :value="__('Penulis')" class="text-gray-700 font-semibold mb-1" />
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-users text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                            </div>
                                            <x-text-input id="authors" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl transition-all" type="text" name="authors" :value="old('authors')" required placeholder="Nama penulis 1; Penulis 2" />
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1 ml-1">*Pisahkan dengan titik koma (;)</p>
                                        <x-input-error :messages="$errors->get('authors')" class="mt-2" />
                                    </div>

                                    <!-- Category -->
                                    <div class="group">
                                        <x-input-label for="category_id" :value="__('Kategori')" class="text-gray-700 font-semibold mb-1" />
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-tag text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                            </div>
                                            <select id="category_id" name="category_id" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl shadow-sm transition-all cursor-pointer" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                    </div>

                                    <!-- Visibility -->
                                    <div class="group">
                                        <x-input-label for="visibility" :value="__('Visibilitas')" class="text-gray-700 font-semibold mb-1" />
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-eye text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                            </div>
                                            <select id="visibility" name="visibility" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl shadow-sm transition-all cursor-pointer">
                                                <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Publik</option>
                                                <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Privat</option>
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('visibility')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Detail Konten -->
                        <div>
                            <h4 class="text-lg font-bold text-lam-green mb-4 flex items-center border-b pb-2 border-green-100">
                                <span class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center text-lam-green mr-3 text-sm">2</span>
                                Detail Konten
                            </h4>

                            <div class="grid grid-cols-1 gap-6">
                                <!-- Abstract -->
                                <div class="group">
                                    <x-input-label for="abstract" :value="__('Abstrak')" class="text-gray-700 font-semibold mb-1" />
                                    <div class="relative">
                                        <textarea id="abstract" name="abstract" rows="6" class="block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl shadow-sm transition-all p-4" required placeholder="Tuliskan ringkasan atau abstrak dokumen adat di siko...">{{ old('abstract') }}</textarea>
                                        <div class="absolute bottom-3 right-3 text-gray-400 pointer-events-none">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('abstract')" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Keywords -->
                                    <div class="group">
                                        <x-input-label for="keywords" :value="__('Kata Kunci')" class="text-gray-700 font-semibold mb-1" />
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-key text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                            </div>
                                            <x-text-input id="keywords" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl transition-all" type="text" name="keywords" :value="old('keywords')" required placeholder="Contoh: Sejarah, Budaya, Melayu" />
                                        </div>
                                        <x-input-error :messages="$errors->get('keywords')" class="mt-2" />
                                    </div>

                                    <!-- Publication Date -->
                                    <div class="group">
                                        <x-input-label for="publication_date" :value="__('Tanggal Publikasi')" class="text-gray-700 font-semibold mb-1" />
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-calendar-alt text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                            </div>
                                            <x-text-input id="publication_date" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl transition-all cursor-pointer" type="date" name="publication_date" :value="old('publication_date', date('Y-m-d'))" required />
                                        </div>
                                        <x-input-error :messages="$errors->get('publication_date')" class="mt-2" />
                                    </div>
                                </div>
                                
                                <!-- Status (Admin Only) -->
                                <div class="group">
                                    <x-input-label for="status" :value="__('Status Dokumen')" class="text-gray-700 font-semibold mb-1" />
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tasks text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                        </div>
                                        <select id="status" name="status" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl shadow-sm transition-all cursor-pointer">
                                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                            <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Section 3: Link Dokumen Cloud -->
                        <div>
                            <h4 class="text-lg font-bold text-lam-green mb-4 flex items-center border-b pb-2 border-green-100">
                                <span class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center text-lam-green mr-3 text-sm">3</span>
                                Link Dokumen (Google Drive / S3)
                            </h4>

                            <div class="group">
                                <x-input-label for="document_url" :value="__('URL Dokumen')" class="text-gray-700 font-semibold mb-2" />
                                
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-link text-gray-400 group-focus-within:text-lam-green transition-colors"></i>
                                    </div>
                                    <x-text-input id="document_url" class="pl-10 block mt-1 w-full border-gray-200 focus:border-lam-green focus:ring-lam-green rounded-xl transition-all" type="url" name="document_url" :value="old('document_url')" placeholder="https://drive.google.com/file/d/..." />
                                </div>
                                <p class="text-xs text-gray-500 mt-2">
                                    * Masukkan link akses publik ke file PDF dokumen adat (Google Drive, S3, Dropbox, dll). Kosongkan jika belum ado.
                                </p>
                                <x-input-error :messages="$errors->get('document_url')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-8">
                            <a href="{{ route('admin.journals.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:text-lam-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lam-green transition-all">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>
                            
                            <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent shadow-lg text-sm font-bold rounded-xl text-white bg-gradient-to-r from-lam-green to-green-700 hover:from-green-700 hover:to-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lam-green transform hover:-translate-y-0.5 transition-all duration-200">
                                <i class="fas fa-save mr-2"></i> Simpan Dokumen
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
