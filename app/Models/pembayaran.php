<?php
// app/Models/Pembayaran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'id_pembayaran',
        'id_order',
        'payment_method',
        'payment_status',
        'payment_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
