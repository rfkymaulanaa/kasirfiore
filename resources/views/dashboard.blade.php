<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-6 mb-6">
                    <form method="GET" action="{{ route('dashboard') }}"
                        class="flex flex-col sm:flex-row flex-wrap gap-4 items-center w-full">
                        <div id="date-range-picker" date-rangepicker
                            class="flex flex-col sm:flex-row items-center w-full sm:w-auto">
                            <div class="relative w-full sm:w-auto">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start_date" type="text"
                                    value="{{ request('start_date') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full sm:w-auto ps-10 p-2.5"
                                    placeholder="Pilih tanggal">
                            </div>
                            <span class="mx-2 sm:mx-4 text-gray-500">sampai</span>
                            <div class="relative w-full sm:w-auto">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end_date" type="text"
                                    value="{{ request('end_date') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full sm:w-auto ps-10 p-2.5 "
                                    placeholder="Pilih tanggal">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 w-full sm:w-auto">
                            Filter
                        </button>
                    </form>
                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">

                        <a href="{{ route('export.excel', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                            class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-2 rounded-lg transition shadow-md text-center w-full sm:w-auto">
                            Export Excel
                        </a>
                        
                            <a href="{{ route('export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-5 py-2 rounded-lg transition shadow-md text-center w-full sm:w-auto">
                            Export PDF
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="p-6 bg-gray-50 shadow-md rounded-lg text-center">
                        <h3 class="text-lg font-semibold text-gray-700 ">Total Penjualan</h3>
                        <p class="text-3xl font-bold text-blue-600 ">
                            Rp.{{ number_format($totalPenjualan, 2) }}
                        </p>
                    </div>
                    <div class="p-6 bg-gray-50 shadow-md rounded-lg text-center">
                        <h3 class="text-lg font-semibold text-gray-700">Total Member</h3>
                        <p class="text-3xl font-bold text-yellow-600 ">
                            {{ $totalPelanggan }}
                        </p>
                    </div>
                </div>
                <div class="mt-6 p-6 bg-white shadow-md rounded-lg">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>
        </div>
        <div class="mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h2 class="text-2xl font-semibold text-gray-800  mb-4">Riwayat Transaksi</h2>
                <div class="overflow-x-auto bg-white  shadow-lg rounded-lg p-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Pelanggan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Transaksi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($riwayatTransaksi as $transaksi)
                                <tr
                                    class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $transaksi->pelanggan->nama_pelanggan ?? 'Tidak diketahui' }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $transaksi->tanggal_penjualan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp.{{ number_format($transaksi->total_harga, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('checkout.success', ['id' => $transaksi->id]) }}"
                                            class="font-medium text-blue-600 hover:underline">Detail
                                            Transaksi</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-sm text-gray-500 ">
                                        Tidak ada transaksi dalam periode ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let ctx = document.getElementById('chartPenjualan').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Penjualan',
                    data: @json($values),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
        
        @if (session('login_success'))
            Swal.fire({
                title: 'Login Berhasil!',
                text: '{{ session('login_success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
