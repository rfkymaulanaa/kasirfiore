<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Tambah Stok') }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full p-6">
                        <form method="POST" action="{{ route('stok.update', $stok) }}">
                            @csrf
                            @method('PUT')

                            <div class="gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="nama_produk"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                        Nama Produk
                                    </label>
                                    <input type="text" name="nama_produk" value="{{ $stok->nama_produk }}"
                                        id="nama_produk"
                                        class="bg-pink-100 border border-pink-300 text-pink-900 text-sm rounded-lg block w-full p-2.5"
                                        readonly>
                                </div>

                                <div class="w-full">
                                    <label for="stok_saat_ini"
                                        class="block mb-2 text-sm font-medium text-pink-800 mt-2">
                                        Stok Saat Ini
                                    </label>
                                    <input type="text" name="stok_saat_ini" value="{{ $stok->stok }}" id="stok_saat_ini"
                                        class="bg-pink-100 border border-pink-300 text-pink-900 text-sm rounded-lg block w-full p-2.5"
                                        readonly>
                                </div>

                                <div class="w-full">
                                    <label for="tambah_stok"
                                        class="block mb-2 text-sm font-medium text-pink-800 mt-2">
                                        Tambah Stok
                                    </label>
                                    <input type="number" name="tambah_stok" id="tambah_stok"
                                        class=" text-pink-500   text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 "
                                        placeholder="Masukkan jumlah stok yang ingin ditambahkan" required min="1">
                                    @error('tambah_stok')
                                        <p class="mt-2 text-red-500 dark:text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-pink-100">
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg hover:from-pink-600 hover:to-pink-700 focus:ring-4 focus:ring-pink-200 transition-all duration-200 shadow-md hover:shadow-lg">
                                {{ __('Tambah Stok') }}
                            </button>

                        <a href="{{ route('stok.index') }}" 
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-pink-600 bg-pink-100 border border-pink-200 rounded-lg hover:bg-pink-200 focus:ring-4 focus:ring-pink-200 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
