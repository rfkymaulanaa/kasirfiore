<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'id',
        'nama_pelanggan',
        'alamat',
        'nomor_telepon',
        'tanggal_lahir',
        'jenis_pelanggan',
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
