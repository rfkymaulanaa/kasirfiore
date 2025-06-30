<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stok = Produk::paginate(5);
        return view('stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Produk $stok)
    {
        return view('stok.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $stok)
    {
        $request->validate([
            'tambah_stok' => 'required|integer|min:1',
        ]);

        $stok->update([
            'stok' => $stok->stok + $request->tambah_stok
        ]);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $stok = Produk::where('nama_produk', 'like', '%' . $search . '%')->paginate(5);
        return view('stok.index', compact('stok'));
    }
}
