<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'nama_produk' => 'Serum Vitamin C Brightening',
                'harga' => 285000,
                'stok' => 50,
                'kategori_id' => 1, // Skincare
                'deskripsi' => 'Serum wajah dengan kandungan Vitamin C untuk mencerahkan kulit'
            ],
            [
                'nama_produk' => 'Moisturizer Hydrating Gel',
                'harga' => 195000,
                'stok' => 40,
                'kategori_id' => 1, // Skincare
                'deskripsi' => 'Pelembab wajah tekstur gel yang ringan dan cepat menyerap'
            ],
            [
                'nama_produk' => 'Lipstick Matte Rose Nude',
                'harga' => 150000,
                'stok' => 75,
                'kategori_id' => 2, // Makeup
                'deskripsi' => 'Lipstick matte dengan warna nude rose yang elegan'
            ],
            [
                'nama_produk' => 'Foundation Dewy Finish',
                'harga' => 320000,
                'stok' => 30,
                'kategori_id' => 2, // Makeup
                'deskripsi' => 'Foundation dengan hasil akhir glowing dan tahan lama'
            ],
            [
                'nama_produk' => 'Body Lotion Shea Butter',
                'harga' => 125000,
                'stok' => 60,
                'kategori_id' => 3, // Body Care
                'deskripsi' => 'Lotion tubuh dengan aroma vanilla dan shea butter'
            ],
            [
                'nama_produk' => 'Shampoo Argan Oil',
                'harga' => 145000,
                'stok' => 45,
                'kategori_id' => 4, // Hair Care
                'deskripsi' => 'Shampoo dengan kandungan argan oil untuk rambut berkilau'
            ],
            [
                'nama_produk' => 'Conditioner Keratin Repair',
                'harga' => 155000,
                'stok' => 40,
                'kategori_id' => 4, // Hair Care
                'deskripsi' => 'Conditioner untuk memperbaiki rambut rusak'
            ],
            [
                'nama_produk' => 'Eau de Parfum Floral Bliss',
                'harga' => 450000,
                'stok' => 25,
                'kategori_id' => 5, // Fragrance
                'deskripsi' => 'Parfum dengan aroma bunga segar dan elegan'
            ],
            [
                'nama_produk' => 'Makeup Brush Set 12 Pcs',
                'harga' => 275000,
                'stok' => 35,
                'kategori_id' => 6, // Tools & Brushes
                'deskripsi' => 'Set kuas makeup lengkap dengan pouch elegan'
            ],
            [
                'nama_produk' => 'Eyeshadow Palette Nude',
                'harga' => 380000,
                'stok' => 28,
                'kategori_id' => 2, // Makeup
                'deskripsi' => 'Palette eyeshadow dengan 12 warna nude yang versatile'
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}