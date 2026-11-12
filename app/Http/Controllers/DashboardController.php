<?php

namespace App\Http\Controllers;

use App\Data\BarangData;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = BarangData::semua();

        $totalBarang = count($barang);
        $totalStok = 0;
        $stokAman = 0;
        $stokMenipis = 0;
        $stokHabis = 0;
        $totalNilaiPersediaan = 0;

        foreach ($barang as &$item) {
            $stokAkhir = $item['stok_awal']
                + $item['barang_masuk']
                - $item['barang_keluar'];

            $item['stok_akhir'] = $stokAkhir;

            $totalStok += $stokAkhir;
            $totalNilaiPersediaan += $stokAkhir * $item['harga'];

            if ($stokAkhir == 0) {
                $stokHabis++;
            } elseif ($stokAkhir <= $item['stok_minimum']) {
                $stokMenipis++;
            } else {
                $stokAman++;
            }
        }

        unset($item);

        $ringkasan = [
            [
                'judul' => 'Total Barang',
                'nilai' => $totalBarang,
                'warna' => 'primary',
                'ikon' => '📦'
            ],
            [
                'judul' => 'Total Stok',
                'nilai' => $totalStok,
                'warna' => 'info',
                'ikon' => '📊'
            ],
            [
                'judul' => 'Stok Aman',
                'nilai' => $stokAman,
                'warna' => 'success',
                'ikon' => '✅'
            ],
            [
                'judul' => 'Stok Menipis',
                'nilai' => $stokMenipis,
                'warna' => 'warning',
                'ikon' => '⚠️'
            ],
            [
                'judul' => 'Stok Habis',
                'nilai' => $stokHabis,
                'warna' => 'danger',
                'ikon' => '❌'
            ],
        ];

        return view('dashboard', compact(
            'barang',
            'totalBarang',
            'totalStok',
            'stokAman',
            'stokMenipis',
            'stokHabis',
            'totalNilaiPersediaan',
            'ringkasan'
        ));
    }
}

