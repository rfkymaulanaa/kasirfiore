<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id ';
    protected $fillable = [
        'tanggal_penjualan',
        'total_harga',
        'nominal_bayar',
        'kembalian',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DetailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
