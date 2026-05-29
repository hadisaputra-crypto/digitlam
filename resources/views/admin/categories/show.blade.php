<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-6 text-white flex justify-between items-center">
                    <h3 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-tag mr-3"></i> {{ $category->name }}
                    </h3>
                    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest transition ease-in-out duration-150">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>

                <div class="p-8">
                    <div class="mb-8 bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h4 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">Informasi Kategori</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Nama</p>
                                <p class="text-lg text-gray-900">{{ $category->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Slug</p>
                                <p class="text-lg text-gray-900">{{ $category->slug }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Deskripsi</p>
                                <p class="text-gray-900">{{ $category->description ?? 'Tidak ada deskripsi' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Dibuat Pada</p>
                                <p class="text-gray-900">{{ $category->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Terakhir Diperbarui</p>
                                <p class="text-gray-900">{{ $category->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4 flex items-center justify-between">
                        <span>Dokumen dalam Kategori ko ({{ $category->journals->count() }})</span>
                    </h4>

                    @if($category->journals->count() > 0)
                        <div class="overflow-x-auto rounded-xl border border-gray-100">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($category->journals as $journal)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ Str::limit($journal->title, 50) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $journal->year ?? '-' }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($journal->status === 'published')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                                @elseif($journal->status === 'draft')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Rejected</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <a href="{{ route('admin.journals.show', $journal) }}" class="text-green-600 hover:text-blue-900 mr-2"><i class="fas fa-eye"></i> Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-xl p-8 text-center border border-dashed border-gray-300">
                            <i class="fas fa-folder-open text-gray-400 text-4xl mb-3"></i>
                            <p class="text-gray-500 text-lg">Belum ado dokumen adat dalam kategori ko.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
