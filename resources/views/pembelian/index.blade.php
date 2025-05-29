<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Pilih Produk') }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

           {{-- Mengurutkan --}}
            <div class="mb-4 flex items-end justify-between">
                <div class="flex items-center space-x-4">
                    <button type="button"
                        class="flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100">
                        Urutkan
                    </button>
                </div>
                <div class="relative flex items-center">
                    <a href="#" class="block">
                        <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                    </a>
                    <span
                        class="absolute top-0 right-0 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white">
                        0
                    </span>
                </div>
            </div>

            {{-- Produk Card --}}
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                {{-- Card --}}
                <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
                    <div class="h-56 w-full">
                        <img class="mx-auto h-full object-cover rounded-md" src="https://placehold.co/400x400"
                            alt="Produk Contoh">
                    </div>
                    <div class="pt-4">
                        <p class="text-lg font-semibold text-gray-900">Nama Produk A</p>
                        <p class="text-md text-gray-900">Stok: 10</p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-md font-extrabold text-gray-900">Rp 10.000,00</p>
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-3 py-1 text-sm font-medium text-white hover:bg-blue-700">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- pagination --}}
            <div class="flex justify-center w-full mt-6">
                <nav class="flex space-x-1 text-gray-700">
                    <a href="#"
                        class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 font-semibold text-sm">1</a>
                    <a href="#"
                        class="px-3 py-1 rounded bg-white border hover:bg-gray-100 text-sm">2</a>
                    <a href="#"
                        class="px-3 py-1 rounded bg-white border hover:bg-gray-100 text-sm">3</a>
                </nav>
            </div>

        </div>
    </section>
    
</x-app-layout>