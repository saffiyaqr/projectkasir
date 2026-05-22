<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    // Relasi: Kategori hasMany Produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}