<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalStok = Produk::sum('stok');
        $produkTerbaru = Produk::with('kategori')->latest()->take(5)->get();

        return view('dashboard', compact('totalProduk', 'totalKategori', 'totalStok', 'produkTerbaru'));
    }
}
