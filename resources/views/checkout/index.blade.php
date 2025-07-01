<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <section class="py-8">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid lg:grid-cols-2 gap-8">
                    <div class="space-y-6 animate-fade-in">
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-pink-800 mb-2">Daftar Barang</h2>
                            <div class="w-20 h-1 bg-gradient-to-r from-pink-400 to-pink-600 mx-auto rounded-full"></div>
                        </div>
                        <div class="space-y-4 rounded-lg border bg-white p-5 ">
                            @foreach ($cart as $item )
                            <div class="flex items-center justify-between p-4 border-b border-pink-100 last:border-b-0">
                                <div class="relative">
                                <div class="flex items-center space-x-4">
                                    @if (!empty($item['gambar']))
                                        <img class="h-20 w-24 rounded-xl border-2 border-pink-200 object-cover shadow-md"
                                        src="{{ asset('storage/produk-images/' . $item['gambar']) }}" alt="{{ $item['nama_produk'] }}">
                                    @else
                                        <img class="h-24 w-28 rounded-md border object-cover"
                                            src="https://placehold.com/600x400" alt="Gambar Tidak Tersedia">
                                    @endif
                                    <div class="flex flex-col flex-grow">
                                        <span class="font-semibold text-gray-800"> {{ $item['nama_produk'] }} </span>
                                        <span class="text-gray-500"> {{ $item['quantity'] }} x {{ number_format ($item['harga'], 2, ',', '.') }}</span>
                                        <div class="mt-2 flex items-center">
                                        <span class="text-sm text-gray-600 mr-2">Subtotal :
                                            {{ number_format($item['harga'] * $item['quantity'], 2, ',', '.')  }}
                                        </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="produk[{{ $loop->index }}][produk_id]" value="{{ $item['produk_id'] }}">
                            <input type="hidden" name="produk[{{ $loop->index }}][quantity]" value="{{ $item['quantity'] }}">
                            <input type="hidden" name="produk[{{ $loop->index }}][harga]" value="{{ $item['harga'] }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-6 ">
                        <h2 class="text-2xl font-bold text-center text-pink-800">Identitas Pelanggan</h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-pink-400 to-pink-600 mx-auto rounded-full"></div>
                        
                        <!-- Single Box for All Form Elements -->
                        <div class="space-y-6 bg-white p-6 rounded-lg shadow-md">
                            <div>
                                <label for="" class="block text-sm font-semibold text-pink-800 mb-3">
                                    Jenis Pelanggan
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <label class="flex items-center p-3 border-2 border-pink-200 rounded-xl cursor-pointer hover:border-pink-400 hover:bg-pink-50 transition-all">
                                        <input type="radio" name="jenis_pelanggan" class="radio-pink mr-3" value="bukan_member" class="radio-pink mr-3" checked onclick="togglePelangganForm()">
                                        <span class="font-medium text-gray-700">Bukan Member</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-pink-200 rounded-xl cursor-pointer hover:border-pink-400 hover:bg-pink-50 transition-all">
                                        <input type="radio" name="jenis_pelanggan" class="radio-pink mr-3" value="member_baru" onclick="togglePelangganForm()">
                                        <span class="font-medium text-gray-700">Member Baru</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-pink-200 rounded-xl cursor-pointer hover:border-pink-400 hover:bg-pink-50 transition-all">
                                        <input type="radio" name="jenis_pelanggan" class="radio-pink mr-3" value="member" onclick="togglePelangganForm()">
                                        <span class="font-medium text-gray-700">Member</span>
                                    </label>
                                </div>
                            </div>

                            <div id="cari_member">
                                <label for="nama_member" class="block text-sm font-semibold text-pink-800 mb-2">Cari member </label>
                                <div class="relative">
                                <input type="text" id="nama_member" name="nama_member" 
                                class="w-full rounded-xl border-2 border-pink-200 px-4 py-3 text-sm shadow-sm input-focus transition-all" 
                                placeholder="Masukkan nama pelanggan" oninput="cekMember()">
                                <ul id="daftar_member" class="border-2 border-pink-200 rounded-xl mt-2 bg-white shadow-lg hidden max-h-40 overflow-y-auto"></ul>
                                <p id="status_member" class="text-sm mt-2 text-pink-600 font-medium"></p>
                                </div>
                            </div>

                            <div id="form_pelanggan" class="hidden space-y-4">
                                <div>
                                    <label for="nama_pelanggan" class="block text-sm font-semibold text-pink-800 mb-2">Nama Pelanggan </label>
                                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="w-full rounded-xl border-2 border-pink-200 px-4 py-3 text-sm shadow-sm input-focus transition-all"  placeholder="Masukkan nama anda">
                                </div>
                                <div>
                                    <label for="alamat" class="block text-sm font-semibold text-pink-800 mb-2">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="w-full rounded-xl border-2 border-pink-200 px-4 py-3 text-sm shadow-sm input-focus transition-all"></textarea>
                                </div>
                                <div>
                                    <label for="nomor_telepon" class="block text-sm font-semibold text-pink-800 mb-2">Nomor Telepon </label>
                                    <input type="number" name="nomor_telepon" id="nomor_telepon" class="w-full rounded-xl border-2 border-pink-200 px-4 py-3 text-sm shadow-sm input-focus transition-all"  placeholder="08xxxxxxxxxx" >
                                </div>
                            </div>
                            
                            <div id="nominal_bayar_wrapper">
                                <label for="nominal_bayar" class="block text-sm font-semibold text-pink-800 mb-2">Nominal Bayar</label>
                                <input type="number" name="nominal_bayar" id="nominal_bayar" class="w-full rounded-xl border-2 border-pink-200 px-4 py-3 text-sm shadow-sm input-focus transition-all"  placeholder="Masukkan jumlah uang yang dibayarkan">
                                @error('nominal_bayar')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="flex justify-between mt-4">
                                <p class="text-xl font-semibold">Total Harga</p>
                                <p class="text-xl font-semibold texy-gray-900">
                                    Rp. {{ number_format(collect($cart)->sum(fn($item) => $item['harga'] * $item['quantity']), 2, ',', '.') }}
                                </p>
                            </div>
                            
                            <div class="flex justify-between">
                                <p class="text-md font-semibold">Kembalian</p>
                                <p class="text-md font-semibold">
                                    <span id="kembalian">0</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- pesan eror --}}
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Button moved outside grid and properly positioned -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="group relative px-8 py-4 bg-gradient-to-r from-pink-500 via-pink-600 to-pink-700 text-white font-bold text-lg rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-pink-300">
                        Bayar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const elements = {
            nominalBayarInput: document.getElementById('nominal_bayar'),
            kembalianText: document.getElementById('kembalian'),
            jenisPelangganRadios: document.querySelectorAll('input[name="jenis_pelanggan"]'),
            namaPelangganInput: document.getElementById('nama_pelanggan'),
            alamatInput: document.getElementById('alamat'),
            nomorTeleponInput: document.getElementById('nomor_telepon'),
            statusMember: document.getElementById('status_member'),
            namaMemberInput: document.getElementById('nama_member'),
            daftarMember: document.getElementById('daftar_member'),
            formPelanggan: document.getElementById('form_pelanggan'),
            cariMember: document.getElementById('cari_member'),
            nominalBayarWrapper: document.getElementById('nominal_bayar_wrapper')
        };

        const formatCurrency = (amount) => {
            return 'Rp.' + new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(amount);
        };

        const hitungKembalian = () => {
            const totalHarga = parseFloat("{{ collect($cart)->sum(fn($item) => $item['harga'] * $item['quantity']) }}");
            let nominalBayar = elements.nominalBayarInput.value.trim();

            if (!/^\d+(\.\d+)?$/.test(nominalBayar)) {
                elements.kembalianText.textContent = formatCurrency(0);
                return;
            }

            nominalBayar = parseFloat(nominalBayar);
            const kembalian = Math.max(nominalBayar - totalHarga, 0);

            elements.kembalianText.textContent = formatCurrency(kembalian);
        };

        const togglePelangganForm = () => {
            const jenisPelanggan = document.querySelector('input[name="jenis_pelanggan"]:checked').value;

            elements.cariMember.classList.toggle('hidden', jenisPelanggan !== 'member');
            elements.formPelanggan.classList.toggle('hidden', jenisPelanggan !== 'member_baru');
            elements.nominalBayarWrapper.classList.toggle('hidden', false);

            if (jenisPelanggan === 'member_baru') {
                resetForm();
                setFormReadOnly(false);
            }
        };

        const toggleFormVisibility = (show) => {
            elements.formPelanggan.classList.toggle('hidden', !show);
        };

        const setFormReadOnly = (isReadOnly) => {
            [elements.namaPelangganInput, elements.alamatInput, elements.nomorTeleponInput].forEach(input => {
                input.toggleAttribute('readonly', isReadOnly);
            });
        };

        const resetForm = () => {
            elements.namaPelangganInput.value = "";
            elements.alamatInput.value = "";
            elements.nomorTeleponInput.value = "";
        };

        const cekMember = () => {
            const namaPelanggan = elements.namaMemberInput.value.trim();

            if (namaPelanggan.length < 3) {
                elements.daftarMember.classList.add('hidden');
                elements.daftarMember.innerHTML = "";
                toggleFormVisibility(false);
                return;
            }

            fetch(`/cek-member?nama_pelanggan=${encodeURIComponent(namaPelanggan)}`)
                .then(response => response.json())
                .then(data => {
                    elements.daftarMember.innerHTML = "";

                    if (data.length > 0) {
                        elements.daftarMember.classList.remove('hidden');
                        data.forEach(member => {
                            const listItem = document.createElement('li');
                            listItem.textContent = member.nama;
                            listItem.classList.add('cursor-pointer', 'p-2', 'hover:bg-gray-200', 'border-b');

                            listItem.addEventListener('click', () => {
                                elements.namaMemberInput.value = member.nama;
                                elements.daftarMember.classList.add('hidden');
                                elements.statusMember.textContent = "Member ditemukan: " + member.nama;

                                elements.namaPelangganInput.value = member.nama;
                                elements.alamatInput.value = member.alamat;
                                elements.nomorTeleponInput.value = member.nomor_telepon;

                                toggleFormVisibility(true);
                                setFormReadOnly(true);
                            });

                            elements.daftarMember.appendChild(listItem);
                        });
                    } else {
                        elements.daftarMember.classList.add('hidden');
                        elements.statusMember.textContent = "Member tidak ditemukan.";
                        toggleFormVisibility(false);
                    }
                })
                .catch(() => {
                    elements.daftarMember.classList.add('hidden');
                    elements.statusMember.textContent = "Terjadi kesalahan saat mencari member.";
                    toggleFormVisibility(false);
                });
        };

        elements.namaMemberInput.addEventListener('input', cekMember);
        elements.nominalBayarInput.addEventListener('input', hitungKembalian);
        elements.jenisPelangganRadios.forEach(radio => radio.addEventListener('change', togglePelangganForm));

        togglePelangganForm();
    });
</script>