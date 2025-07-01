<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-pink-800">
            {{ __('Pendataan Produk') }}
        </h2>
    </x-slot>

    <x-confirm-delete />

    <section class=" p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            @if (session('success'))
                <div id="alert-3"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 "
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{session('success')}}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="bg-white shadow-xl rounded-3xl p-8 border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('produk.search') }}" method="GET" class="flex items-center">
                            <label for="simple-search" class="sr-only">Cari Produk</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-rose-500 "
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="search" name="search"
                                    class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:border-pink-500 focus:ring-pink-200 block w-full pl-10 p-2 "
                                    placeholder="Cari Produk" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('produk.create') }}"
                            class="w-50 bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 border-0 focus:ring-2 focus:ring-pink-300 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <div class="overflow-x-auto bg-gradient-to-r from-pink-50 to-rose-50 shadow-lg rounded-2xl p-6 border border-pink-100">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs font-semibold text-pink-800 uppercase bg-gradient-to-r from-pink-100 to-rose-100 rounded-xl">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Produk</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Stok</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produk as $item)
                                <tr class="border-b ">
                                    <th scope="row"
                                        class="font-semibold text-pink-900 whitespace-nowrap ">
                                        {{ $item->nama_produk }}
                                    </th>
                                    <td class="px-4 py-3 font-semibold text-pink-900">Rp.{{ number_format($item->harga, 2) }}</td>
                                    <td class="px-4 py-3 font-semibold text-pink-900">{{ $item->stok }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <a href="{{ route('produk.edit', $item) }}"
                                            class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-r from-pink-100 to-rose-200 hover:from-pink-200 hover:to-rose-300 text-pink-600 hover:text-pink-800 rounded-xl transition duration-200 group">
                                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" 
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                                        fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                        </a>
                                        <a href="{{ route('produk.show', $item) }}"
                                            class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-r from-pink-100 to-rose-200 hover:from-pink-200 hover:to-rose-300 text-pink-600 hover:text-pink-800 rounded-xl transition duration-200 group">
                                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" 
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                                    fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            onclick="openDeleteModal({{ json_encode($item->id) }}, 'produk')"
                                            class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-r from-pink-100 to-rose-200 hover:from-pink-200 hover:to-rose-300 text-pink-600 hover:text-pink-800 rounded-xl transition duration-200 group">
                                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" 
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                                    fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $produk->links() }}
                </div>
            </div>
            </div>
        </div>
    </section>
</x-app-layout>