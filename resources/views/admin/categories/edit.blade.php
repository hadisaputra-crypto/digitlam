<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-lam-green to-green-700 p-6 text-white">
                    <h3 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-edit mr-3"></i> Edit Kategori
                    </h3>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <x-input-label for="name" :value="__('Nama Kategori')" class="font-bold text-gray-700" />
                            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="description" :value="__('Deskripsi (Opsional)')" class="font-bold text-gray-700" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-lam-green focus:ring focus:ring-lam-green focus:ring-opacity-50">{{ old('description', $category->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t pt-6">
                            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-lam-green focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-lam-green border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-lam-green focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                <i class="fas fa-save mr-2"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
