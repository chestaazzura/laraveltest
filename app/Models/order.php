<?php
// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id_order',
        'id_pelanggan',
        'total_price',
        'status',
        'alamat_pengiriman',
        'no_resi',
        'tanggal_pesanan',
        'tanggal_dikirim',
        'metode_pembayaran'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_order');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
