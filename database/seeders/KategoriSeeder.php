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
                'nama_kategori' => 'boy clothes',
                'deskripsi' => 'Pakaian anak laki-laki',
                'image_url' => 'uploads/kategori/boy.png',
                'group' => 'pakaian',
            ],
            [
                'nama_kategori' => 'girls clothes',
                'deskripsi' => 'Pakaian anak perempuan',
                'image_url' => 'uploads/kategori/girl.png',
                'group' => 'pakaian',
            ],
            [
                'nama_kategori' => 'pyjamas',
                'deskripsi' => 'Piyama bayi dan anak',
                'image_url' => 'uploads/kategori/piyama.png',
                'group' => 'pakaian',
            ],
            [
                'nama_kategori' => 'perlengkapan',
                'deskripsi' => 'Perlengkapan bayi sehari-hari',
                'image_url' => 'uploads/kategori/perlengkapan.png',
                'group' => 'alat makan',
            ],
            [
                'nama_kategori' => 'baby bath set',
                'deskripsi' => 'Set perlengkapan mandi bayi',
                'image_url' => 'uploads/kategori/bath.png',
                'group' => 'alat mandi',
            ],
            [
                'nama_kategori' => 'baby toy',
                'deskripsi' => 'Mainan edukatif bayi',
                'image_url' => 'uploads/kategori/mainan.png',
                'group' => 'mainan',
            ],
        ];

        foreach ($data as $kategori) {
            Kategori::create($kategori);
        }
    }
}
