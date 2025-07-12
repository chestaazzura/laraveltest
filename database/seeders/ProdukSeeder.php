<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Data produk lama (tidak diubah)
            [
                'kode_produk' => 'PRD001',
                'id_kategori' => 1,
                'nama_produk' => 'Kemeja pendek bayi',
                'deskripsi' => 'Kemeja bayi lengan pendek berbahan katun lembut',
                'image_url' => 'uploads/produk/kemeja1.png',
                'harga' => 200000.00,
                'stock' => 50,
            ],
            [
                'kode_produk' => 'PRD002',
                'id_kategori' => 2,
                'nama_produk' => 'Kaos bayi set',
                'deskripsi' => 'Set kaos bayi dengan motif lucu',
                'image_url' => 'uploads/produk/kaosset.png',
                'harga' => 200000.00,
                'stock' => 60,
            ],
            [
                'kode_produk' => 'PRD003',
                'id_kategori' => 3,
                'nama_produk' => 'set polo + sepatu',
                'deskripsi' => 'Set polo bayi dengan sepatu yang matching',
                'image_url' => 'uploads/produk/image18.png',
                'harga' => 900000.00,
                'stock' => 30,
            ],
            [
                'kode_produk' => 'PRD004',
                'id_kategori' => 4,
                'nama_produk' => 'Tshirt bayi',
                'deskripsi' => 'Tshirt lucu dan nyaman untuk bayi',
                'image_url' => 'uploads/produk/setkaos.png',
                'harga' => 90000.00,
                'stock' => 40,
            ],
            [
                'kode_produk' => 'PRD005',
                'id_kategori' => 5,
                'nama_produk' => 'Kemeja panda + celana',
                'deskripsi' => 'Kemeja panda untuk bayi dengan celana matching',
                'image_url' => 'uploads/produk/kemejaputih.png',
                'harga' => 500000.00,
                'stock' => 25,
            ],
            [
                'kode_produk' => 'PRD006',
                'id_kategori' => 6,
                'nama_produk' => 'jaket polos',
                'deskripsi' => 'Jaket bayi polos untuk udara dingin',
                'image_url' => 'uploads/produk/jaket.png',
                'harga' => 200000.00,
                'stock' => 30,
            ],
            [
                'kode_produk' => 'PRD007',
                'id_kategori' => 1,
                'nama_produk' => 'Jaket motif crown',
                'deskripsi' => 'Jaket bayi dengan motif crown yang lucu',
                'image_url' => 'uploads/produk/image.png',
                'harga' => 250000.00,
                'stock' => 35,
            ],
            [
                'kode_produk' => 'PRD008',
                'id_kategori' => 2,
                'nama_produk' => 'Set vest + jaket + celana',
                'deskripsi' => 'Set pakaian bayi dengan vest, jaket, dan celana yang matching',
                'image_url' => 'uploads/produk/image2.png',
                'harga' => 700000.00,
                'stock' => 20,
            ],
            [
                'kode_produk' => 'PRD009',
                'id_kategori' => 3,
                'nama_produk' => 'Kemeja motif army',
                'deskripsi' => 'Kemeja bayi dengan motif army yang keren',
                'image_url' => 'uploads/produk/image3.png',
                'harga' => 300000.00,
                'stock' => 40,
            ],
            [
                'kode_produk' => 'PRD010',
                'id_kategori' => 4,
                'nama_produk' => 'Set kaos + celana motif',
                'deskripsi' => 'Set kaos dan celana bayi dengan motif lucu',
                'image_url' => 'uploads/produk/image4.png',
                'harga' => 450000.00,
                'stock' => 30,
            ],


        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}
