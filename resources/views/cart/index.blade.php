<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Keranjang') }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @forelse (session('cart', []) as $item)
                            <div
                                class="group rounded-2xl border-2 border-pink-200 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:border-pink-300">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <div class="shrink-0">
                                         @if (!empty($item['gambar']))
                                            <img class="h-24 w-24 object-cover rounded-xl border-2 border-pink-200 shadow-md group-hover:scale-105 transition-transform duration-300"
                                                src="{{ asset('storage/produk-images/' . $item['gambar']) }}" 
                                                alt="{{ $item['nama_produk'] }}">
                                        @else
                                            <img class="h-24 w-24 object-cover rounded-xl border-2 border-pink-200 shadow-md group-hover:scale-105 transition-transform duration-300" 
                                                src="https://placehold.co/200x200/F8BBD9/FFFFFF?text=No+Image"
                                                alt="Gambar Tidak Tersedia">
                                        @endif
                                    </div>
                                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center bg-pink-50 rounded-xl p-2 border border-pink-200">
                                            <button type="button"
                                                class="decrement-button inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border-2 border-pink-300 bg-gradient-to-r from-pink-400 to-rose-400 text-white hover:from-pink-500 hover:to-rose-500 focus:outline-none focus:ring-2 focus:ring-pink-300 transition-all duration-200 transform hover:scale-105"
                                                data-produk-id="{{ $item['produk_id'] }}">
                                                <svg class="h-3 w-3  "
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="quantity-{{ $item['produk_id'] }}"
                                                    class="w-12 shrink-0 border-0 bg-transparent text-center text-lg font-bold text-gray-800 focus:outline-none focus:ring-0"
                                                    value="{{ $item['quantity'] }}" readonly />
                                            <button type="button"
                                                    class="increment-button inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border-2 border-pink-300 bg-gradient-to-r from-pink-400 to-rose-400 text-white hover:from-pink-500 hover:to-rose-500 focus:outline-none focus:ring-2 focus:ring-pink-300 transition-all duration-200 transform hover:scale-105 {{ $item['quantity'] >= $item['stok'] ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                    data-produk-id="{{ $item['produk_id'] }}" 
                                                    {{ $item['quantity'] >= $item['stok'] ? 'disabled' : '' }}>
                                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                        </div>
                                        <div class="text-end md:order-4 md:w-36 ml-4">
                                                <p class="text-sm text-gray-800 mb-1">Subtotal</p>
                                                <p class="text-xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                                                    Rp <span id="harga-{{ $item['produk_id'] }}"> {{ number_format($item['harga'] * $item['quantity'], 2, ',' , '.') }}</span>
                                                </p>
                                        </div>
                                    </div>
                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-pink-600 transition-colors duration-200">
                                                {{ $item['nama_produk'] }}
                                            </h3>

                                        <div class="flex items-center space-x-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-pink-400 to-rose-400 text-white">
                                                    💰 Rp {{ number_format($item['harga'], 0, ',' , '.') }} /item
                                                </span>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-blue-400 to-indigo-400 text-white">
                                                    📦 Stok: {{ $item['stok'] }}
                                                </span>
                                        </div>
                                        <div id="product-{{ $item['produk_id'] }}" class="flex items-center gap-4">
                                                <button type="button"
                                                    class="remove-button inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-red-400 to-rose-400 hover:from-red-500 hover:to-rose-500 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg"
                                                    data-produk-id="{{ $item['produk_id'] }}">
                                                    <svg class="me-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                    Hapus Item
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center w-full max-w-2xl mx-auto p-12 bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border-2 border-pink-200 text-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-pink-400 to-rose-400 rounded-full flex items-center justify-center shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Keranjang Anda Masih Kosong</h3>
                                    <a href="{{ route('pembelian.index') }}"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-rose-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                        Lanjutkan Berbelanja
                                    </a>
                            </div>
                        @endforelse
                    </div>
                </div>
                @if (session()->has('cart') && count(session('cart')) > 0)
                    @php
                        $total = collect(session('cart', []))->sum(function ($item) {
                            return $item['harga'] * $item['quantity'];
                        });
                    @endphp
                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full lg:max-w-sm">
                        <div class="sticky top-6 space-y-4 rounded-2xl border-2 border-pink-200 bg-white/80 backdrop-blur-sm p-6 shadow-lg">
                                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm  sm:p-6">
                                        <p class="text-xl font-semibold text-gray-900 ">Ringkasan Pesanan</p>
                                        <div class="space-y-4">
                                            <dl
                                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                                                <dt class="text-base font-bold text-gray-900 ">Total</dt>
                                                <dd class="text-base font-bold text-gray-900 ">
                                                    Rp.<span id="total-harga">{{ number_format($total, 2, ',', '.') }}</span>
                                                </dd>
                                            </dl>
                                        </div>
                                        <a href="{{ url('/checkout') }}"
                                        class="flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pink-500 to-rose-500 px-6 py-4 text-base font-semibold text-white hover:from-pink-600 hover:to-rose-600 focus:outline-none focus:ring-4 focus:ring-pink-300 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        <svg class="mr-2 h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Lanjutkan ke Pembayaran
                                        </a>
                                        <div class="flex items-center justify-center gap-2">
                                            <span class="text-sm font-normal text-gray-800"> atau </span>
                                            <a href="{{ route('pembelian.index') }}"
                                                  class="inline-flex w-full items-center justify-center gap-2 rounded-xl border-2 border-pink-300 bg-white/50 px-6 py-3 text-base font-semibold text-pink-600 hover:bg-pink-50 hover:border-pink-400 transition-all duration-200">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                                Lanjutkan Belanja
                                            </a>
                                        </div>
                                    </div>
                    
                @endif


            </div>
            
        </div>

    </section>
</x-app-layout>

<script>
    $(document).ready(function () {
        $(".increment-button, .decrement-button").click(function (e) {
            e.preventDefault();
            let button = $(this);
            let produkId = button.data("produk-id");
            let action = button.hasClass("increment-button") ? "increment" : "decrement";
            let quantityInput = $("#quantity-" + produkId);
            let hargaElement = $("#harga-" + produkId);
            let totalHargaElement = $("#total-harga");

            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    produk_id: produkId,
                    action: action
                },
                success: function (response) {
                    if (response.success) {
                        quantityInput.val(response.new_quantity);
                        hargaElement.text(response.new_total);
                        totalHargaElement.text(response.total_harga);
                    } else {
                        alert("Gagal memperbarui jumlah produk!");
                    }
                },
                error: function () {
                    alert("Stok produk tidak mencukupi!");
                }
            });
        });

        $(".remove-button").click(function (e) {
            e.preventDefault(); 
            let produkId = $(this).data("produk-id");
            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    produk_id: produkId
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                        alert("Produk berhasil dihapus dari keranjang!");
                    } else {
                        alert("Gagal menghapus produk!");
                    }
                }
            });
        });
    });
</script>