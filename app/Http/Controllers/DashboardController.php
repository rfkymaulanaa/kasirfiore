<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanPenjualanExport;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startDateRaw = $request->input('start_date');
        $endDateRaw = $request->input('end_date');

        $startDate = $startDateRaw ? Carbon::createFromFormat('m/d/Y', $startDateRaw)->format('Y-m-d') : null;
        $endDate = $endDateRaw ? Carbon::createFromFormat('m/d/Y', $endDateRaw)->format('Y-m-d') : null;

        $query = Penjualan::select(DB::raw('DATE(tanggal_penjualan) as tanggal'), DB::raw('SUM(total_harga) as total'));

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_penjualan', [$startDate, $endDate]);
        }

        $dataPenjualan = $query->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        $totalPenjualan = Penjualan::when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('tanggal_penjualan', [$startDate, $endDate]);
        })->sum('total_harga');

        $totalPelanggan = Pelanggan::count();

        $riwayatTransaksi = Penjualan::with(['pelanggan', 'detailPenjualan.produk'])
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('tanggal_penjualan', [$startDate, $endDate]);
            })
            ->orderBy('tanggal_penjualan', 'desc')
            ->paginate(perPage: 5);

        return view('dashboard', [
            'labels' => $dataPenjualan->pluck('tanggal')->toArray(),
            'values' => $dataPenjualan->pluck('total')->toArray(),
            'totalPenjualan' => $totalPenjualan,
            'totalPelanggan' => $totalPelanggan,
            'startDate' => $startDateRaw,
            'endDate' => $endDateRaw,
            'riwayatTransaksi' => $riwayatTransaksi,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function exportExcel(Request $request)
    {
        $startDateRaw = $request->input('start_date');
        $endDateRaw = $request->input('end_date');

        $startDate = $startDateRaw ? Carbon::createFromFormat('m/d/Y', $startDateRaw)->format('Y-m-d') : null;
        $endDate = $endDateRaw ? Carbon::createFromFormat('m/d/Y', $endDateRaw)->format('Y-m-d') : null;

        return Excel::download(new LaporanPenjualanExport($startDate, $endDate), 'laporan_penjualan.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function exportPDF(Request $request)
    {
        $startDateRaw = $request->input('start_date');
        $endDateRaw = $request->input('end_date');

        $startDate = $startDateRaw ? Carbon::createFromFormat('m/d/Y', $startDateRaw)->format('Y-m-d') : null;
        $endDate = $endDateRaw ? Carbon::createFromFormat('m/d/Y', $endDateRaw)->format('Y-m-d') : null;

        $data = Penjualan::with(['pelanggan', 'detailPenjualan.produk'])
            ->when($startDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_penjualan', [$startDate, $endDate]);
            })
            ->orderBy('tanggal_penjualan', 'desc')
            ->get();

        $pdf = Pdf::loadView('exports.laporan_pdf', compact('data', 'startDate', 'endDate'));
        return $pdf->download('laporan_penjualan.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
