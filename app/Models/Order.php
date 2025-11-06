<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Tabel 'orders' sudah sesuai standar, jadi $table tidak wajib, tapi tidak apa-apa
    protected $table = 'orders';

    // Izinkan semua kolom diisi
    protected $guarded = [];

    /**
     * Relasi ke OrderItem
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
