<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
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
                                class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                Produk</label>
                            <input type="text" name="nama_produk" value="{{ $produk->nama_produk ?? '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                            <input type="text" name="harga" value="{{ number_format($produk->harga, 2) ?? '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="stok"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Stok</label>
                            <input type="text" name="stok" value="{{ $produk->stok ?? '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  "
                                readonly>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/produk-images/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                class="rounded-lg shadow-md border border-gray-300 max-w-full md:max-w-xs">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
