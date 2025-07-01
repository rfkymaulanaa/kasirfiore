<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800  leading-tight">
            {{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full">
                        <form method="POST"
                            action="{{ isset($produk) ? route('produk.update', $produk) : route('produk.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($produk))
                                @method('PUT')
                            @endif
                            <div class="gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="nama_produk"
                                        class="block mb-2 text-sm font-medium text-pink-800 ">Nama
                                        Produk</label>
                                    <input type="text" name="nama_produk" value="{{ $produk->nama_produk ?? '' }}"
                                        id="nama_produk"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan nama produk">
                                    @error('nama_produk')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="harga"
                                        class="block mb-2 text-sm font-medium text-pink-800  mt-4">Harga</label>
                                    <input type="number" name="harga" value="{{ $produk->harga ?? '' }}"
                                        id="harga"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan harga produk">
                                    @error('harga')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="stok"
                                        class="block mb-2 text-sm font-medium text-pink-800  mt-4">Stok</label>
                                    <input type="text" name="stok" value="{{ $produk->stok ?? '' }}"
                                        id="stok"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan Stok">
                                    @error('stok')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <div class="relative">
                                    <label class="block mb-2 text-sm font-medium text-pink-800 mt-4"
                                        for="gambar">Upload gambar</label>
                                    <input
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        aria-describedby="gambar" id="gambar" name="gambar" type="file">
                                    <p class="text-xs text-gray-600 space-y-1" id="gambar">SVG,
                                        PNG, JPG or GIF (MAX. 800x400px).</p>
                                    @error('gambar')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-pink-100">
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg hover:from-pink-600 hover:to-pink-700 focus:ring-4 focus:ring-pink-200 transition-all duration-200 shadow-md hover:shadow-lg">
                                    {{ isset($produk) ? 'Simpan Perubahan' : 'Simpan Produk' }}
                                </button>

                                <a href="{{ route('produk.index') }}" 
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
