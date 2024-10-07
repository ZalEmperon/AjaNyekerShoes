<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function tambahProduk(Request $request)
    {
        $request->validate([
            'nama_sepatu' => 'required|string|max:255',
            'harga_sepatu' => 'required|numeric',
            'varian_sepatu' => 'required|string|max:255',
            'kategori_sepatu' => 'required|string|max:255',
            'merek_sepatu' => 'required|string|max:255',
            'ukuran_sepatu' => 'required|string|max:50',
            'deskripsi_sepatu' => 'nullable|string',
            'gambar_sepatu' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar_sepatu')) {
            $fileName = time() . '_' . $request->file('gambar_sepatu')->getClientOriginalName();
            $request->file('gambar_sepatu')->storeAs('images/products', $fileName, 'public');
        } else {
            $fileName = null;
        }

        $produk = Produk::create([
            'nama_sepatu' => $request->input('nama_sepatu'),
            'harga_sepatu' => $request->input('harga_sepatu'),
            'varian_sepatu' => $request->input('varian_sepatu'),
            'kategori_sepatu' => $request->input('kategori_sepatu'),
            'merek_sepatu' => $request->input('merek_sepatu'),
            'ukuran_sepatu' => $request->input('ukuran_sepatu'),
            'deskripsi_sepatu' => $request->input('deskripsi_sepatu'),
            'gambar_sepatu' => $fileName,
        ]);

        return redirect('/');
    }
}
