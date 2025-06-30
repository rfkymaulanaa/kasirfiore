<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable =
    [ 'nama_produk', 'harga', 'stok', 'gambar'];

    public function DetailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
