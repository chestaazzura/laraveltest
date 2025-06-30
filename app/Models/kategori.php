<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel eksplisit (opsional jika sudah plural sesuai konvensi)
    protected $table = 'kategoris';

    // Field yang boleh diisi massal
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
        'deskripsi',
        'image_url',
    ];
}