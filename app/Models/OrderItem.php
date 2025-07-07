<?php
// app/Models/OrderItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'id_order',
        'id_produk',
        'quantity',
        'harga'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
