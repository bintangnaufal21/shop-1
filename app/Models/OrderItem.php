<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    // Tabel 'order_items' sudah sesuai standar
    protected $table = 'order_items';

    // Izinkan semua kolom diisi
    protected $guarded = [];

    /**
     * Relasi ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke Produk
     */
    public function produk()
    {
        // Pastikan Model Produk Anda bernama 'Produk'
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
