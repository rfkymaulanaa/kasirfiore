<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="POST">
                        @csrf
                        <div>
                                <div class="mb-4">
                                    <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                                    <x-text-input id="nama_produk" class="block mt-1 w-full" type="text" name="nama_produk" :value="old('nama_produk')" required autofocus />
                                </div>

                                <div class="mb-4">
                                    <x-input-label for="harga" :value="__('Harga')" />
                                    <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')" required autofocus />
                                </div>

                                <div class="mb-4">
                                    <x-input-label for="stok" :value="__('Stok')" />
                                    <x-text-input id="stok" class="block mt-1 w-full" type="text" name="stok" :value="old('stok')" required autofocus />
                                </div>

                                <div class="relative mb-4">
                                    <x-input-label for="gambar" :value="__('Gambar')" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center  pointer-events-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-5 h-5 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                    </div>
                                    
                                    <x-text-input id="gambar" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm file:bg-gray-100 file:border-0 file:py-1 file:px-3 file:mr-4 file:rounded file:text-gray-700" type="file" name="gambar" :value="old('gambar')" required autofocus /> 
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-4">
                                        {{ __('Simpan') }}
                                    </x-primary-button>
                                </div>

                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>