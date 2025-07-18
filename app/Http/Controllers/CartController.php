<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $produk = Produk::find($request->produk_id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        if ($produk->stok < 1) {
            return response()->json(['message' => 'Stok produk habis'], 400);
        }

        $found = false;
        foreach ($cart as $item) {
            if ($item['produk_id'] == $request->produk_id) {
                if ($item['quantity'] + 1 > $produk->stok) {
                    return response()->json(['message' => 'Jumlah melebih stok yang tersedia'], 400);
                }
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'produk_id' => $request->produk_id,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'gambar' => $request->gambar,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        $totalItems = array_sum(array_column($cart, 'quantity'));

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang', 'total_items' => $totalItems]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $newQuantity = 1;
        $newTotal = 0;

        foreach ($cart as &$item) {
            if ($item['produk_id'] == $request->produk_id) {
                $produk = Produk::find($request->produk_id);

                if (!$produk) {
                    return response()->json(['success' => false,'message' => 'Produk tidak ditemukan'], 404);
                }

                if ($request->action == 'increment') {
                    if ($item['quantity'] + 1 > $produk->stok) {
                        return response()->json(['success' => false,'message' => 'Jumlah melebih stok yang tersedia!'], 400);
                    }
                    $item['quantity'] += 1;
                } elseif ($request->action == 'decrement' && $item['quantity'] > 1) {
                    $item['quantity'] -= 1;
                }
                $newQuantity = $item['quantity'];
                $newTotal = number_format($item['harga']  * $item['quantity'], 2, ',', '.');
                break;
            }
        }

        session()->put('cart', $cart);

        $totalHarga = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['quantity'];
        });

        return response()->json([
            'success' => true,
            'new_quantity' => $newQuantity,
            'new_total' => $newTotal,
            'total_harga' => number_format($totalHarga, 2, ',', '.')
        ]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart = array_filter($cart, function ($item) use ($request) {
            return $item['produk_id'] != $request->produk_id;
        });

        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }
}
