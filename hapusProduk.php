<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function hapusProduk($id_sepatu)
    {
        $produk = Produk::find($id_sepatu);
        if (!$produk) {
            return redirect('/')->with('error', 'Produk tidak ditemukan.');
        }
        if ($produk->gambar_sepatu) {
            Storage::disk('public')->delete('images/produk/' . $produk->gambar_sepatu);
        }
        $produk->delete();
        return redirect('/');
    }

}
