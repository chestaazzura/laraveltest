<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id_kategori' => 1,
                'nama_kategori' => 'boy clothes',
                'deskripsi' => 'Pakaian anak laki-laki',
                'image_url' => 'img/kategori/boy.png',
            ],
            [
                'id_kategori' => 2,
                'nama_kategori' => 'girls clothes',
                'deskripsi' => 'Pakaian anak perempuan',
                'image_url' => 'img/kategori/girl.png',
            ],
            [
                'id_kategori' => 3,
                'nama_kategori' => 'pyjamas',
                'deskripsi' => 'Piyama bayi dan anak',
                'image_url' => 'img/kategori/piyama.png',
            ],
            [
                'id_kategori' => 4,
                'nama_kategori' => 'perlengkapan',
                'deskripsi' => 'Perlengkapan bayi sehari-hari',
                'image_url' => 'img/kategori/perlengkapan.png',
            ],
            [
                'id_kategori' => 5,
                'nama_kategori' => 'baby bath set',
                'deskripsi' => 'Set perlengkapan mandi bayi',
                'image_url' => 'img/kategori/bath.png',
            ],
            [
                'id_kategori' => 6,
                'nama_kategori' => 'baby toy',
                'deskripsi' => 'Mainan edukatif bayi',
                'image_url' => 'img/kategori/mainan.png',
            ],
        ];

        foreach ($data as $kategori) {
            Kategori::create($kategori);
        }
    }
}
