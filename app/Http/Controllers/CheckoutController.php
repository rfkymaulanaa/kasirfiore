<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja masih kosong.');
        }

        return view('checkout.index', compact('cart'));
    }


    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'jenis_pelanggan' => 'required|in:bukan_member,member_baru,member',
        'nama_pelanggan' => [
            'nullable',
            'required_if:jenis_pelanggan,member_baru,member',
            'string',
            'max:255',
            function ($attribute, $value, $fail) use ($request) {
                if ($request->jenis_pelanggan === 'member' && !Pelanggan::where('nama_pelanggan', $value)->exists()) {
                    $fail('Nama pelanggan tidak ditemukan.');
                }
            }
        ],
        'alamat' => 'nullable|required_if:jenis_pelanggan,member_baru|string',
        'nomor_telepon' => 'nullable|required_if:jenis_pelanggan,member_baru|string|regex:/^08[0-9]{8,11}$/',
        'produk' => 'required|array',
        'produk.*.produk_id' => 'required|exists:produk,id',
        'produk.*.quantity' => 'required|integer|min:1',
        'produk.*.harga' => 'required|numeric|min:0',
        'nominal_bayar' => 'required|numeric|min:0'
    ]); 

    $totalHarga = collect($validated['produk'])->sum(fn($item) => $item['harga'] * $item['quantity']);
    $nominalBayar = $validated['nominal_bayar'];
    $kembalian = $nominalBayar - $totalHarga;

    if ($kembalian < 0) {
        return back()->withErrors(['nominal_bayar' => 'Jumlah yang dibayarkan kurang dari total harga!']);
    }
    
    $pelangganId = null;

    DB::beginTransaction();
    try {
        if ($validated['jenis_pelanggan'] === 'member_baru') {
            $pelanggan = Pelanggan::create([
                'nama_pelanggan' => $validated['nama_pelanggan'],
                'alamat' => $validated['alamat'],
                'nomor_telepon' => $validated['nomor_telepon'],
                'jenis_pelanggan' => 'member_baru',
            ]);
            $pelangganId = $pelanggan->id;
        } elseif ($validated['jenis_pelanggan'] === 'member') {
            $pelanggan = Pelanggan::where('nama_pelanggan', $validated['nama_pelanggan'])->first();
            if (!$pelanggan) {
                return back()->withErrors(['nama_pelanggan' => 'Nama pelanggan tidak ditemukan!']);
            }

            $pelanggan->update([
                'jenis_pelanggan' => 'member',
            ]);

            $pelangganId = $pelanggan->id;
        }

        $penjualan = Penjualan::create([
            'tanggal_penjualan' => Carbon::now(),
            'total_harga' => $totalHarga,
            'nominal_bayar' => $nominalBayar,
            'kembalian' => $kembalian,
            'user_id' => Auth::user()->id,
            'pelanggan_id' => $pelangganId,
        ]);


        // debugging 
        // if (!$penjualan || !$penjualan->id) {
        //     DB::rollBack();
        //     return back()->withErrors(['error' => 'Gagal menyimpan data penjualan!', 'penjualan' => $penjualan]);
        // }

        // dd($penjualan);

        foreach ($validated['produk'] as $produk) {
            $produkModel = Produk::find($produk['produk_id']);

            if ($produkModel->stok < $produk['quantity']) {
                DB::rollBack();
                return redirect()->route('cart.index')->with('error', 'Stok produk ' . $produkModel->nama_produk . ' tidak mencukupi!');
            }

            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $produk['produk_id'],
                'nama_produk' => $produkModel->nama_produk,
                'jumlah' => $produk['quantity'], 
                'subtotal' => $produk['quantity'] * $produk['harga'],
            ]);

            $produkModel->decrement('stok', $produk['quantity']);
        }

        DB::commit();

        session()->forget('cart');

        return redirect()->route('checkout.success', ['id' => $penjualan->id])
            ->with('success', 'Transaksi berhasil disimpan!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses transaksi! ' . $e->getMessage()]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kasir = Penjualan::with('petugas')->findOrFail($id);
        $penjualan = Penjualan::with(['pelanggan', 'DetailPenjualan.produk'])->findOrFail($id);
        return view('checkout.success', compact('penjualan', 'kasir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cekMember(Request $request)
    {
        try {
            $namaPelanggan = $request->query('nama_pelanggan');

            if (!$namaPelanggan) {
                return response()->json(['error' => 'Nama pelanggan diperlukan'], 400);
            }

            $members = Pelanggan::where('nama_pelanggan', 'LIKE', "%{$namaPelanggan}%")
                ->select('id', 'nama_pelanggan as nama', 'alamat', 'nomor_telepon')
                ->get();

            if ($members->isEmpty()) {
                return response()->json([], 200);
            }

            return response()->json($members);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan pada server'], 500);
        }
    }
}
