<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::paginate(5);
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg|',
        ]);

        if ($request->hasFile('gambar')) {
            $filePath = $request->file('gambar')->store('produk-images', 'public');
            $validateData['gambar'] = basename($filePath);
        }

        $produk = Produk::create($validateData);


        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

        public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|',
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $validateData['gambar'] = $request->file('gambar')->store('produk-images', 'public');
        } else {
            $validateData['gambar'] = $produk->gambar;
        }

        $produk->update($validateData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }



    public function destroy(Produk $produk)
    {
        // if ($produk->gambar) {
        //     Storage::disk('public')->delete($produk->gambar);
        // }
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $produk = Produk::where('nama_produk', 'like', '%' . $search . '%')->paginate(5);
        return view('produk.index', compact('produk', 'search'));
    }
}
