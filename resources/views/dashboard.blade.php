<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-pink-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-3xl p-8 border border-pink-100">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-6 mb-6">
                    <form method="GET" action="{{ route('dashboard') }}"
                        class="flex flex-col sm:flex-row flex-wrap gap-4 items-center w-full">
                        <div id="date-range-picker" date-rangepicker
                            class="flex flex-col sm:flex-row items-center w-full sm:w-auto">
                            <div class="relative w-full sm:w-auto">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-pink-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start_date" type="text"
                                    value="{{ request('start_date') }}"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-xl focus:ring-pink-500 focus:border-pink-500 block w-full sm:w-auto ps-10 p-3 transition duration-200"
                                    placeholder="Pilih tanggal mulai">
                            </div>
                            <span class="mx-2 sm:mx-4 text-pink-500 font-medium">sampai</span>
                            <div class="relative w-full sm:w-auto">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-pink-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end_date" type="text"
                                    value="{{ request('end_date') }}"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-xl focus:ring-pink-500 focus:border-pink-500 block w-full sm:w-auto ps-10 p-3 transition duration-200"
                                    placeholder="Pilih tanggal akhir">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-xl text-sm px-6 py-3 w-full sm:w-auto transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                Filter
                            </span>
                        </button>
                    </form>
                    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">

                        <a href="{{ route('export.excel', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                            class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold px-6 py-3 rounded-xl transition duration-200 shadow-lg hover:shadow-xl text-center w-full sm:w-auto transform hover:-translate-y-0.5">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Export Excel
                            </span>
                        </a>
                        
                            <a href="{{ route('export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                                class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-semibold px-6 py-3 rounded-xl transition duration-200 shadow-lg hover:shadow-xl text-center w-full sm:w-auto transform hover:-translate-y-0.5">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Export PDF
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="p-8 bg-gradient-to-br from-pink-100 to-rose-100 shadow-lg rounded-2xl text-center border border-pink-200 hover:shadow-xl transition duration-300">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                        <h3 class="text-xl font-semibold text-pink-800 mb-2">Total Penjualan</h3>
                        <p class="text-4xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                            Rp.{{ number_format($totalPenjualan, 2) }}
                        </p>
                    </div>
                    <div class="p-8 bg-gradient-to-br from-rose-100 to-pink-100 shadow-lg rounded-2xl text-center border border-rose-200 hover:shadow-xl transition duration-300">
                        <div class="flex items-center justify-center mb-4">
                            <div class="p-3 bg-gradient-to-r from-rose-500 to-pink-500 rounded-full">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-rose-800 mb-2">Total Member</h3>
                        <p class="text-4xl font-bold bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent">
                            {{ $totalPelanggan }}
                        </p>
                    </div>
                </div>
                <div class="mt-8 p-8 bg-gradient-to-r from-pink-50 to-rose-50 shadow-lg rounded-2xl border border-pink-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-pink-800">Grafik Penjualan</h3>
                    </div>
                <div class="bg-white rounded-xl p-4 shadow-inner">
                    <canvas id="chartPenjualan" class="w-full h-64"></canvas>
                </div>
            </div>
        </div>
        <div class="mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-3xl p-8 border border-pink-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-pink-800">Riwayat Transaksi</h2>
            </div>

                <div class="overflow-x-auto bg-gradient-to-r from-pink-50 to-rose-50 shadow-lg rounded-2xl p-6 border border-pink-100">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead class="text-xs font-semibold text-pink-800 uppercase bg-gradient-to-r from-pink-100 to-rose-100 rounded-xl">
                            <tr>
                                <th scope="col" class="px-6 py-4 rounded-l-xl">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Nama Pelanggan
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8l2-2m-2 2l-2-2m2 2V13m8-4V6a2 2 0 00-2-2H6a2 2 0 00-2 2v3m16 0v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8m16 0H4"></path>
                                        </svg>
                                        Tanggal Transaksi
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Total Harga
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 rounded-r-xl">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                        </svg>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-100">
                            @forelse ($riwayatTransaksi as $transaksi)
                                <tr
                                    class="bg-white hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 transition duration-200 border-b border-pink-100">
                                    <th scope="row"
                                        class="px-6 py-4 font-semibold text-pink-900 whitespace-nowrap">
                                        {{ $transaksi->pelanggan->nama_pelanggan ?? 'Tidak diketahui' }}
                                    </th>
                                    <td class="px-6 py-4 font-semibold text-pink-900 whitespace-nowrap">
                                        {{ $transaksi->tanggal_penjualan }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-pink-900 whitespace-nowrap">
                                        Rp.{{ number_format($transaksi->total_harga, 2) }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-pink-900 whitespace-nowrap">
                                        <a href="{{ route('checkout.success', ['id' => $transaksi->id]) }}"
                                            class="inline-flex items-center gap-2 font-medium text-pink-600 hover:text-pink-800 bg-pink-100 hover:bg-pink-200 px-4 py-2 rounded-xl transition duration-200"
                                            >Detail Transaksi</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-lg font-semibold text-pink-800 mb-1">Tidak ada transaksi</h3>
                                            <p class="text-sm text-pink-600">Tidak ada transaksi dalam periode ini.</p>
                                        </div>
                                    </div>
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
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(236, 72, 153, 0.8)');
        gradient.addColorStop(1, 'rgba(236, 72, 153, 0.1)');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Penjualan',
                    data: @json($values),
                    borderColor: '#ec4899',
                    backgroundColor: gradient,
                    fill: true,
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: '#ec4899',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                  plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#be185d',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                },
                scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#fce7f3'
                            },
                            ticks: {
                                color: '#be185d'
                            }
                        },
                        x: {
                            grid: {
                                color: '#fce7f3'
                            },
                            ticks: {
                                color: '#be185d'
                            }
                        }
                    }
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

    tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pink': {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            200: '#fbcfe8',
                            300: '#f9a8d4',
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                            800: '#9d174d',
                            900: '#831843',
                        },
                        'rose': {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            200: '#fecdd3',
                            300: '#fda4af',
                            400: '#fb7185',
                            500: '#f43f5e',
                            600: '#e11d48',
                            700: '#be123c',
                            800: '#9f1239',
                            900: '#881337',
                        }
                    }
                }
            }
        }
</script>
