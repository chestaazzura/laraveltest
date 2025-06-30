<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $keyType = 'string'; 
    public $incrementing = false; 

    protected $fillable = [
        'id',
        'nama_kategori',
        'deskripsi',
        'image_url',
    ];

    protected static function booted()
    {
        static::creating(function ($kategori) {
            if (!$kategori->id_kategori) {
                $kategori->id_kategori = (string) Str::uuid();
            }
        });
    }
    

    // Create custom
    public static function createKategori(array $data)
    {
        return self::create([
            'id_kategori' => Str::uuid(), // Tambahkan baris ini!
            'nama_kategori' => $data['nama_kategori'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'image_url' => $data['image_url'] ?? null,
        ]);
    }
    

    // Update custom
    public function updateKategori(array $data)
    {
        $this->update([
            'nama_kategori' => $data['nama_kategori'],
            'deskripsi' => $data['deskripsi'] ?? $this->deskripsi,
            'image_url' => $data['image_url'] ?? $this->image_url,
        ]);
    }

    // Delete custom
    public function deleteKategori()
    {
        return $this->delete();
    }

  
}
