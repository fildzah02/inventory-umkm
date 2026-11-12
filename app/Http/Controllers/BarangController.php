<?php

namespace App\Http\Controllers;

use App\Data\BarangData;

class BarangController extends Controller
{
    // Menampilkan seluruh barang
    public function index()
    {
        $barang = BarangData::semua();

        foreach ($barang as &$item) {
            $item['stok_akhir'] = $item['stok_awal']
                + $item['barang_masuk']
                - $item['barang_keluar'];
        }

        unset($item);

        return view('barang.index', compact('barang'));
    }

    // Menampilkan barang berdasarkan kategori
    public function kategori($nama)
{
    $barang = collect(BarangData::semua())
        ->filter(function ($item) use ($nama) {
            return strtolower($item['kategori']) === strtolower($nama);
        })
        ->values()
        ->all();

    foreach ($barang as &$item) {
        $item['stok_akhir'] = $item['stok_awal']
            + $item['barang_masuk']
            - $item['barang_keluar'];
    }

    unset($item);

    return view('barang.kategori', compact('barang', 'nama'));
}

    // Menampilkan detail barang berdasarkan ID
   public function detail($id)
{
    $barang = collect(BarangData::semua())
        ->firstWhere('id', $id);

    if (!$barang) {
        abort(404);
    }

    $barang['stok_akhir'] = $barang['stok_awal']
        + $barang['barang_masuk']
        - $barang['barang_keluar'];

    return view('barang.detail', compact('barang'));
}
    
    // Menampilkan barang yang stoknya menipis atau habis
    
public function stokRendah()
{
    $barang = collect(BarangData::semua())
        ->map(function ($item) {
            $item['stok_akhir'] = $item['stok_awal']
                + $item['barang_masuk']
                - $item['barang_keluar'];

            return $item;
        })
        ->filter(function ($item) {
            return $item['stok_akhir'] <= $item['stok_minimum'];
        })
        ->values()
        ->all();

    $judul = 'Daftar Barang dengan Stok Rendah';

    return view('barang.index', compact('barang', 'judul'));
}
}
