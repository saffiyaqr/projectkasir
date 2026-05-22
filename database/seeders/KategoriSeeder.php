<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Skincare',
            'Makeup',
            'Body Care',
            'Hair Care',
            'Fragrance',
            'Tools & Brushes'
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create(['nama_kategori' => $kategori]);
        }
    }
}
