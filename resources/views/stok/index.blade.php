    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-2xl font-bold text-pink-800">
                {{ __('Stok Produk') }}
            </h2>
        </x-slot>

        <x-confirm-delete />

        <section class=" p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                @if (session('success'))
                    <div id="alert-3"
                        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50"
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
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 0"
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
                            <form action="{{ route('produk.search') }}" method="GET" class="flex items-center ">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-rose-500"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="search"
                                        class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:border-pink-500 focus:ring-pink-200 block w-full pl-10 p-2 "
                                        placeholder="Search" value="{{ request('search') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="overflow-x-auto bg-gradient-to-r from-pink-50 to-rose-50 shadow-lg rounded-2xl p-6 border border-pink-100">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs font-semibold text-pink-800 uppercase bg-gradient-to-r from-pink-100 to-rose-100 rounded-xl">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama Produk</th>
                                    <th scope="col" class="px-4 py-3">Stok</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stok as $item)
                                    <tr class="border-b">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-pink-900 whitespace-nowrap">
                                            {{ $item->nama_produk }}
                                        </th>
                                        <td class="px-4 py-3 text-pink-900 font-semibold">{{ $item->stok }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <a href="{{ route('stok.edit', $item) }}"><svg
                                                    class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-r from-pink-100 to-rose-200 hover:from-pink-200 hover:to-rose-300 text-pink-600 hover:text-pink-800 rounded-xl transition duration-200 group"  aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-3 text-center font-semibold text-pink-800">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="p-4">
                        {{ $stok->links() }}
                    </div>
                </div>
            </div>
        </section>
    </x-app-layout>