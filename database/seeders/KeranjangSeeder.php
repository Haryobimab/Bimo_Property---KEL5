<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keranjang;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keranjang = [
            // Furniture
            [
                'nama_produk' => 'Meja Makan',
                'foto_produk' => 'https://unsplash.com/photos/a-desk-with-a-computer-on-it-9MhxuDn7ymM',
                'tipe_produk' => 'Furniture',
                'deskripsi' => 'Meja Makan Kayu Solid',
                'harga' => 1500000,
                'total_harga' => 1500000
            ],
            [
                'nama_produk' => 'Sofa Ruang Tamu',
                'foto_produk' => 'https://unsplash.com/photos/green-fabric-sofa-fZuleEfeA1Q',
                'tipe_produk' => 'Furniture',
                'deskripsi' => 'Sofa dengan Bahan Kain Berkualitas Tinggi',
                'harga' => 3000000,
                'total_harga' => 3000000
            ],
            [
                'nama_produk' => 'Lemari Pakaian',
                'foto_produk' => 'https://unsplash.com/photos/brown-wooden-2-door-cabinet-3fFBoEHee28',
                'tipe_produk' => 'Furniture',
                'deskripsi' => 'Lemari Pakaian dengan Desain Minimalis',
                'harga' => 2500000,
                'total_harga' => 2500000
            ],
            [
                'nama_produk' => 'Rak Buku',
                'foto_produk' => 'https://unsplash.com/photos/books-on-brown-wooden-shelf-YbLitAY8bPA',
                'tipe_produk' => 'Furniture',
                'deskripsi' => 'Rak Buku Kayu Berkualitas',
                'harga' => 800000,
                'total_harga' => 800000
            ],
            [
                'nama_produk' => 'Kursi Lipat',
                'foto_produk' => 'https://unsplash.com/photos/white-and-gray-metal-armless-chair-80VTQEkRh1c',
                'tipe_produk' => 'Furniture',
                'deskripsi' => 'Kursi Lipat Praktis untuk Outdoor',
                'harga' => 500000,
                'total_harga' => 500000
            ],
            // Tambahkan item furniture lainnya sesuai kebutuhan
            // ...

            // Bahan Bangunan
            [
                'nama_produk' => 'Cat Tembok',
                'tipe_produk' => 'Bahan Bangunan',
                'foto_produk' => 'https://unsplash.com/photos/a-close-up-of-a-paint-can-with-a-toothbrush-in-it-CtHBjG9CwDs',
                'deskripsi' => 'Cat Tembok Tahan Lama',
                'harga' => 500000,
                'total_harga' => 500000
            ],
            [
                'nama_produk' => 'Paku Besi',
                'foto_produk' => 'https://unsplash.com/photos/a-bag-filled-with-lots-of-screws-and-nails-LxI4v4dPo0k',
                'tipe_produk' => 'Bahan Bangunan',
                'deskripsi' => 'Paku Besi Anti Karat',
                'harga' => 100000,
                'total_harga' => 100000
            ],
            [
                'nama_produk' => 'Semua Jenis Teralis',
                'foto_produk' => 'https://unsplash.com/photos/a-bag-filled-with-lots-of-screws-and-nails-LxI4v4dPo0k',
                'tipe_produk' => 'Bahan Bangunan',
                'deskripsi' => 'Teralis Baja, Aluminium, dan Besi',
                'harga' => 2000000,
                'total_harga' => 2000000
            ],
            [
                'nama_produk' => 'Batu Bata Merah',
                'foto_produk' => 'https://unsplash.com/photos/a-bag-filled-with-lots-of-screws-and-nails-LxI4v4dPo0k',
                'tipe_produk' => 'Bahan Bangunan',
                'deskripsi' => 'Batu Bata Merah untuk Konstruksi',
                'harga' => 150000,
                'total_harga' => 150000
            ],
            [
                'nama_produk' => 'Genteng Beton',
                'foto_produk' => 'https://unsplash.com/photos/brown-concrete-brick-t4DuoDHjxrQ',
                'tipe_produk' => 'Bahan Bangunan',
                'deskripsi' => 'Genteng Beton Ringan',
                'harga' => 700000,
                'total_harga' => 700000
            ],
        ];

        foreach ($keranjang as $item) {
            Keranjang::create($item);
        }
    }
}