<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800  leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <section class=" p-5">
        <div class="mx-auto max-w-screen-lg px-6 lg:px-12">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <div>
                        <div class="mb-4">
                            <label for="nama_produk"
                                class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-box mr-2"></i>Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{ $produk->nama_produk ?? '' }}"
                                class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300 "
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-box mr-2"></i>Harga</label>
                            <input type="text" name="harga" value="{{ number_format($produk->harga, 2) ?? '' }}"
                                class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300 "
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="stok"
                                class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-box mr-2"></i>Stok</label>
                            <input type="text" name="stok" value="{{ $produk->stok ?? '' }}"
                                class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300 "
                                readonly>

                            <a href="{{ route('produk.index') }}" 
                                class="mb-2 mt-4 inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-pink-600 bg-pink-100 border border-pink-200 rounded-lg hover:bg-pink-200 focus:ring-4 focus:ring-pink-200 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="space-y-4">
                <div class="relative group">
                    @if ($produk->gambar)
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl p-4">
                            <img src="{{ asset('storage/produk-images/' . $produk->gambar) }}" 
                                 alt="{{ $produk->nama_produk }}"
                                 class="w-full h-80 object-cover rounded-lg shadow-md border-2 border-pink-200 transition-transform duration-300 group-hover:scale-105">
                        </div>
                        
                    @else
                        <!-- No Image Placeholder -->
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl p-4">
                            <div class="w-full h-80 bg-pink-200 rounded-lg flex items-center justify-center border-2 border-dashed border-pink-300">
                                <div class="text-center">
                                    <i class="fas fa-image text-6xl text-pink-400 mb-4"></i>
                                    <p class="text-pink-600 font-medium">Tidak ada gambar</p>
                                    <p class="text-pink-500 text-sm">Gambar belum ditambahkan untuk produk ini</p>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
