<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-pink-800">
            {{ __('Pilih Produk') }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

           {{-- Mengurutkan --}}
            <div class="mb-6 flex items-end justify-between bg-white backdrop-blur-sm rounded-xl p-4 shadow-lg">
                <div class="flex items-center space-x-4">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"
                        class="flex items-center justify-center rounded-xl border-2 border-pink-300 bg-gradient-to-r from-pink-400 to-rose-400 px-4 py-3 text-sm font-semibold text-white hover:from-pink-500 hover:to-rose-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                        </svg>
                        Urutkan Produk
                        <svg class="-ms-0.5 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdown" class="z-50 hidden w-48 divide-y divide-pink-100 rounded-xl bg-white shadow-2xl border border-pink-200" data-popper-placement="bottom">
                        <ul class="py-2 text-left text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'termurah']) }}" class="group inline-flex w-full items-center rounded-lg px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-pink-400 hover:to-rose-400 hover:text-white transition-all duration-200">Termurah</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'termahal']) }}" class="group inline-flex w-full items-center rounded-lg px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-pink-400 hover:to-rose-400 hover:text-white transition-all duration-200">Termahal</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}" class="group inline-flex w-full items-center rounded-lg px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-pink-400 hover:to-rose-400 hover:text-white transition-all duration-200">Terbaru</a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terlama']) }}" class="group inline-flex w-full items-center rounded-lg px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-pink-400 hover:to-rose-400 hover:text-white transition-all duration-200">Terlama</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="relative flex items-center">
                    <a href="{{ route('cart.index') }}" class="block group">
                        <div class="relative bg-gradient-to-r from-pink-400 to-rose-400 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                        </div>
                    </a>
                    <span id="cart-badge"
                        class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-r from-rose-500 to-pink-600 text-xs font-bold text-white shadow-lg animate-pulse border-2 border-white">
                        {{ count(session('cart', [])) }}
                    </span>
                </div>
            </div>

            {{-- Produk Card --}}
            <div class="mb-4 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

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
                    <div class="pt-4 space-y-3">
                        <h3 class="text-lg font-bold text-gray-800 line-clamp-2">
                            {{ $item->nama_produk }}
                        </h3>
                        <div class="flex items-center">
                            @if($item->stok > 0)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-green-400 to-emerald-400 text-white">
                                    📦 Stok: {{ $item->stok }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-red-400 to-rose-400 text-white">
                                    ❌ Stok Habis
                                </span>
                            @endif
                        </div>
                            <div class="flex items-center justify-between pt-2">
                                <div class="flex flex-col">
                                    <p class="text-xl text-gray-800">Harga</p>
                                    <p class="text-xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                                <button type="button" 
                                        onclick="addToCart('{{ $item->id }}','{{ $item->nama_produk }}','{{ $item->harga }}','{{ $item->stok }}','{{ $item->gambar }}')"
                                        class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-pink-500 to-rose-500 px-4 py-3 text-sm font-semibold text-white hover:from-pink-600 hover:to-rose-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 group-hover:animate-bounce">
                                    <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
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