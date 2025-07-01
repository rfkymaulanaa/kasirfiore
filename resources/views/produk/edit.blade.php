<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800  leading-tight">
            {{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}
        </h2>
    </x-slot>

    <section class=" p-3 sm:p-5 min-h-screen flex items-center justify-center">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-lg sm:rounded-lg overflow-hidden border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="p-6">
                        <form method="POST"
                            action="{{ isset($produk) ? route('produk.update', $produk) : route('produk.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($produk))
                                @method('PUT')
                            @endif
                            <div class="grid gap-6 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="nama_produk"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-box mr-2"></i>Nama
                                        Produk</label>
                                    <input type="text" name="nama_produk" value="{{ $produk->nama_produk ?? '' }}"
                                        id="nama_produk"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan nama produk">
                                    @error('nama_produk')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="harga"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-tags mr-2"></i>Harga
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-pink-600 font-medium">Rp</span>
                                        <input type="number" name="harga"
                                            value="{{ old('harga', $produk->harga ?? '') }}" id="harga" step="any"
                                            class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 pl-12 transition-all duration-200 hover:border-pink-300
                                            @error('harga')  @enderror"
                                            placeholder="Masukkan harga produk">
                                    </div>
                                            @error('harga')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="stok"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                    <i class="fas fa-warehouse mr-2"></i>Stok</label>
                                    <input type="text" name="stok" value="{{ $produk->stok ?? '' }}"
                                        id="stok"
                                        class="bg-pink-100 border border-pink-200 text-pink-700 text-sm rounded-lg cursor-not-allowed block w-full p-3"
                                        placeholder="Masukkan Stok" readonly>
                                        <p class="mt-1 text-xs text-pink-600">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Stok dikelola lewat halaman Stok.
                                </p>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-pink-800"
                                        for="gambar">
                                        <i class="fas fa-image mr-2"></i>
                                        Upload Gambar
                                    </label>
                                    <div class="flex flex-col lg:flex-row gap-6">
                                        <div class="flex-shrink-0">
                                            <div class="relative group">
                                                <label for="gambar" class="cursor-pointer">
                                                    @if (isset($produk) && $produk->gambar)
                                                        <img id="preview-image"
                                                            src="{{ asset('storage/produk-images/' . $produk->gambar) }}"
                                                            class="w-48 h-48 object-cover rounded-lg border-2 border-pink-200 transition-all duration-200 group-hover:border-pink-400 group-hover:shadow-lg"
                                                            alt="Gambar Produk">
                                                    @else
                                                        <div id="preview-container" class="w-48 h-48 border-2 border-dashed border-pink-300 rounded-lg flex items-center justify-center bg-pink-50 transition-all duration-200 group-hover:border-pink-400 group-hover:bg-pink-100">
                                                            <div class="text-center">
                                                            <i class="fas fa-cloud-upload-alt text-3xl text-pink-400 mb-2"></i>
                                                            <p class="text-sm text-pink-600">Klik untuk upload</p>
                                                        </div>
                                                        </div>
                                                        <img id="preview-image" src="https://via.placeholder.com/150"
                                                                class="w-48 h-48 object-cover rounded-lg border-2 border-pink-200 hidden" 
                                                                alt="Preview Gambar">
                                                    @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="flex-1">
                                        <div class="bg-pink-50 border border-pink-200 rounded-lg p-4">
                                            <h4 class="font-medium text-pink-800 mb-2">
                                                <i class="fas fa-info-circle mr-2"></i>Panduan Upload Gambar
                                            </h4>
                                            <ul class="text-sm text-pink-700 space-y-1">
                                                <li>• Format yang didukung: JPG, PNG, GIF, SVG</li>
                                                <li>• Klik pada area gambar untuk mengubah</li>
                                            </ul>
                                            </div>
                                        </div>
                                        <input type="file" id="gambar" name="gambar" accept="image/*"
                                            class="hidden">
                                    </div>
                                    @error('gambar')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-pink-100">
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg hover:from-pink-600 hover:to-pink-700 focus:ring-4 focus:ring-pink-200 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <i class="fas fa-save mr-2"></i>{{ isset($produk) ? 'Simpan Perubahan' : 'Simpan Produk' }}
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadInput = document.getElementById("gambar");
        const previewImage = document.getElementById("preview-image");

        uploadInput.addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
