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
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"
                        class="flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100">
                       <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                        </svg>
                        Urutkan
                        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown" class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow" data-popper-placement="bottom">
                        <ul class="py-2 text-left text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'termurah']) }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-gray-500 hover:bg-gray-700 hover:text-white">Termurah</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'termahal']) }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-gray-500 hover:bg-gray-700 hover:text-white">Termahal</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-gray-500 hover:bg-gray-700 hover:text-white">Terbaru</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terlama']) }}" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-gray-500 hover:bg-gray-700 hover:text-white">Terlama</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="relative flex items-center">
                    <a href="{{ route('cart.index') }}" class="block">
                        <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                    </a>
                    <span id="cart-badge"
                        class="absolute top-0 right-0 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white">
                        {{ count(session('cart', [])) }}
                    </span>
                </div>
            </div>

            {{-- Produk Card --}}
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                {{-- Card --}}

            @forelse ($produk as $item)
                <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
                    <div class="h-56 w-full">
                        @if (!empty($item->gambar))
                            <img class="mx-auto h-full object-cover rounded-md" src={{ asset('storage/produk-images/' . $item->gambar) }}   
                            alt="{{ $item->nama_produk }}">
                        @else
                            <img class="mx-auto h-full object-cover rounded-md" src="https://placehold.co/400x400"
                            alt="Gambar Tidak Tersedia">
                        @endif
                    </div>
                    <div class="pt-4">
                        <p class="text-lg font-semibold text-gray-900">{{ $item->nama_produk }}</p>
                        <p class="text-md {{ $item->stok > 0 ? 'text-gray-900' : 'text-red-500' }}">{{ $item->stok > 0 ? "Stok : $item->stok" : 'Stok Habis'  }} </p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-md font-extrabold text-gray-900">Rp.
                                        {{number_format($item->harga, 2, ',', '.') }}</p>
                            <button type="button" onclick="addToCart('{{ $item->id }}','{{ $item->nama_produk }}','{{ $item->harga }}','{{ $item->stok }}','{{ $item->gambar }}')"
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
                @empty
                <h3 class="text-gray-500">Produk Tidak Tersedia</h3>
            @endforelse
    

            </div>
        </div>
    </section>
    
</x-app-layout>

<script>

    function addToCart(produk_id, nama_produk, harga, stok, gambar) {
        $.ajax({
            url: '{{ route('cart.add') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                produk_id: produk_id,
                nama_produk: nama_produk,
                harga: harga,
                gambar: gambar,
                stok: stok
            },
            success: function(response) {
                if (response && response.message) {
                    alert(response.message);
                    const cartBadge = document.getElementById('cart-badge');
                    if (cartBadge && response.total_items !== undefined) {
                        cartBadge.textContent = response.total_items;
                    }
                } else {
                    alert('Produk gagal ditambahkan ke keranjang!');
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 400) {
                    alert(xhr.responseJSON.message)
                } else {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang!');
                }
            }
        })
    }

</script>