<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'image_url',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
