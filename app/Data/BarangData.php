<?php

namespace App\Data;

class BarangData
{
    public static function semua(): array
    {
        return [
            [
                'id' => 1, 'kode' => 'BRG001',
                'nama' => 'Beras Premium', 'kategori' => 'Makanan',
                'stok_awal' => 50, 'barang_masuk' => 20,
                'barang_keluar' => 55, 'stok_minimum' => 10,
                'stok_target' => 50, 'harga' => 14000,
            ],
            [
                'id' => 2, 'kode' => 'BRG002',
                'nama' => 'Gula Pasir', 'kategori' => 'Makanan',
                'stok_awal' => 40, 'barang_masuk' => 10,
                'barang_keluar' => 42, 'stok_minimum' => 10,
                'stok_target' => 40, 'harga' => 17000,
            ],
            [
                'id' => 3, 'kode' => 'BRG003',
                'nama' => 'Minyak Goreng', 'kategori' => 'Makanan',
                'stok_awal' => 30, 'barang_masuk' => 15,
                'barang_keluar' => 40, 'stok_minimum' => 10,
                'stok_target' => 35, 'harga' => 18000,
            ],
            [
                'id' => 4, 'kode' => 'BRG004',
                'nama' => 'Tepung Terigu', 'kategori' => 'Makanan',
                'stok_awal' => 35, 'barang_masuk' => 10,
                'barang_keluar' => 30, 'stok_minimum' => 8,
                'stok_target' => 30, 'harga' => 12000,
            ],
            [
                'id' => 5, 'kode' => 'BRG005',
                'nama' => 'Mie Instan', 'kategori' => 'Makanan',
                'stok_awal' => 100, 'barang_masuk' => 50,
                'barang_keluar' => 130, 'stok_minimum' => 25,
                'stok_target' => 100, 'harga' => 3500,
            ],
            [
                'id' => 6, 'kode' => 'BRG006',
                'nama' => 'Air Mineral', 'kategori' => 'Minuman',
                'stok_awal' => 80, 'barang_masuk' => 30,
                'barang_keluar' => 100, 'stok_minimum' => 20,
                'stok_target' => 80, 'harga' => 4000,
            ],
            [
                'id' => 7, 'kode' => 'BRG007',
                'nama' => 'Teh Celup', 'kategori' => 'Minuman',
                'stok_awal' => 25, 'barang_masuk' => 10,
                'barang_keluar' => 20, 'stok_minimum' => 8,
                'stok_target' => 30, 'harga' => 8000,
            ],
            [
                'id' => 8, 'kode' => 'BRG008',
                'nama' => 'Kopi Bubuk', 'kategori' => 'Minuman',
                'stok_awal' => 20, 'barang_masuk' => 5,
                'barang_keluar' => 25, 'stok_minimum' => 10,
                'stok_target' => 25, 'harga' => 15000,
            ],
            [
                'id' => 9, 'kode' => 'BRG009',
                'nama' => 'Susu UHT', 'kategori' => 'Minuman',
                'stok_awal' => 30, 'barang_masuk' => 20,
                'barang_keluar' => 40, 'stok_minimum' => 12,
                'stok_target' => 40, 'harga' => 7000,
            ],
            [
                'id' => 10, 'kode' => 'BRG010',
                'nama' => 'Sirup', 'kategori' => 'Minuman',
                'stok_awal' => 15, 'barang_masuk' => 5,
                'barang_keluar' => 8, 'stok_minimum' => 5,
                'stok_target' => 20, 'harga' => 18000,
            ],
            [
                'id' => 11, 'kode' => 'BRG011',
                'nama' => 'Sabun Mandi', 'kategori' => 'Perlengkapan',
                'stok_awal' => 25, 'barang_masuk' => 10,
                'barang_keluar' => 30, 'stok_minimum' => 10,
                'stok_target' => 30, 'harga' => 5000,
            ],
            [
                'id' => 12, 'kode' => 'BRG012',
                'nama' => 'Sampo', 'kategori' => 'Perlengkapan',
                'stok_awal' => 20, 'barang_masuk' => 5,
                'barang_keluar' => 15, 'stok_minimum' => 8,
                'stok_target' => 25, 'harga' => 12000,
            ],
            [
                'id' => 13, 'kode' => 'BRG013',
                'nama' => 'Deterjen', 'kategori' => 'Perlengkapan',
                'stok_awal' => 30, 'barang_masuk' => 10,
                'barang_keluar' => 25, 'stok_minimum' => 10,
                'stok_target' => 35, 'harga' => 15000,
            ],
            [
                'id' => 14, 'kode' => 'BRG014',
                'nama' => 'Pasta Gigi', 'kategori' => 'Perlengkapan',
                'stok_awal' => 18, 'barang_masuk' => 5,
                'barang_keluar' => 20, 'stok_minimum' => 8,
                'stok_target' => 25, 'harga' => 10000,
            ],
            [
                'id' => 15, 'kode' => 'BRG015',
                'nama' => 'Tisu', 'kategori' => 'Perlengkapan',
                'stok_awal' => 40, 'barang_masuk' => 10,
                'barang_keluar' => 35, 'stok_minimum' => 12,
                'stok_target' => 40, 'harga' => 9000,
            ],
        ];
    }
}
