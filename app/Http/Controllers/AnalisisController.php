<?php

namespace App\Http\Controllers;

use App\Data\BarangData;

class AnalisisController extends Controller
{
    // Mengolah seluruh data persediaan
    private function prosesAnalisis()
    {
        $semuaBarang = BarangData::semua();

        $hasil = [];
        $dataTidakValid = [];

        foreach ($semuaBarang as $item) {

            // Validasi data numerik
            $kolom = [
                'stok_awal',
                'barang_masuk',
                'barang_keluar',
                'stok_minimum',
                'stok_target',
                'harga'
            ];

            $valid = true;
            $alasan = [];

            foreach ($kolom as $kolomData) {
                if (!isset($item[$kolomData]) ||
                    !is_numeric($item[$kolomData])) {
                    $valid = false;
                    $alasan[] = "Nilai $kolomData tidak valid.";
                    continue;
                }

                if ($item[$kolomData] < 0) {
                    $valid = false;
                    $alasan[] = "$kolomData tidak boleh negatif.";
                }
            }

            // Memastikan barang keluar tidak melebihi stok tersedia
            $stokTersedia = $item['stok_awal']
                + $item['barang_masuk'];

            if ($item['barang_keluar'] > $stokTersedia) {
                $valid = false;
                $alasan[] = "Barang keluar melebihi stok tersedia.";
            }

            // Memastikan target stok tidak lebih kecil dari minimum
            if ($item['stok_target'] < $item['stok_minimum']) {
                $valid = false;
                $alasan[] = "Stok target lebih kecil dari stok minimum.";
            }

            // Data tidak valid tidak diikutsertakan dalam analisis
            if (!$valid) {
                $item['alasan_invalid'] = $alasan;
                $dataTidakValid[] = $item;
                continue;
            }

            // Menghitung stok akhir
            $stokAkhir = $item['stok_awal']
                + $item['barang_masuk']
                - $item['barang_keluar'];

            // Menentukan status persediaan
            if ($stokAkhir == 0) {
                $status = 'Habis';
                $prioritas = 1;
            } elseif ($stokAkhir <= $item['stok_minimum']) {
                $status = 'Menipis';
                $prioritas = 2;
            } else {
                $status = 'Aman';
                $prioritas = 3;
            }

            // Menghitung kebutuhan pengadaan
            $kebutuhan = max(
                0,
                $item['stok_target'] - $stokAkhir
            );

            // Menghitung estimasi biaya pengadaan
            $estimasiBiaya = $kebutuhan * $item['harga'];

            $item['stok_akhir'] = $stokAkhir;
            $item['status'] = $status;
            $item['kebutuhan'] = $kebutuhan;
            $item['prioritas'] = $prioritas;
            $item['estimasi_biaya'] = $estimasiBiaya;

            $hasil[] = $item;
        }

        return [
            'hasil' => $hasil,
            'dataTidakValid' => $dataTidakValid
        ];
    }

    // Halaman analisis persediaan
    public function index()
    {
        $data = $this->prosesAnalisis();

        $barang = $data['hasil'];
        $dataTidakValid = $data['dataTidakValid'];

        $totalBarang = count($barang);
        $totalStok = 0;
        $stokAman = 0;
        $stokMenipis = 0;
        $stokHabis = 0;
        $totalKebutuhan = 0;

        foreach ($barang as $item) {
            $totalStok += $item['stok_akhir'];
            $totalKebutuhan += $item['kebutuhan'];

            if ($item['status'] == 'Aman') {
                $stokAman++;
            } elseif ($item['status'] == 'Menipis') {
                $stokMenipis++;
            } else {
                $stokHabis++;
            }
        }

        return view('analisis.index', compact(
            'barang',
            'dataTidakValid',
            'totalBarang',
            'totalStok',
            'stokAman',
            'stokMenipis',
            'stokHabis',
            'totalKebutuhan'
        ));
    }

    // Halaman rekomendasi pengadaan
   
    public function rekomendasi()
    {
        $hasil = $this->prosesAnalisis();

        // Mengambil hasil analisis barang
        $barang = collect($hasil['hasil'])
            ->filter(function ($item) {
                return $item['kebutuhan'] > 0;
            })
            ->sort(function ($a, $b) {

                // Mengurutkan berdasarkan prioritas
                if ($a['prioritas'] !== $b['prioritas']) {
                    return $a['prioritas'] <=> $b['prioritas'];
                }

                // Jika prioritas sama, kebutuhan terbesar didahulukan
                return $b['kebutuhan'] <=> $a['kebutuhan'];
            })
            ->values();

        // Menghitung total estimasi biaya
        $totalEstimasiBiaya = $barang->sum('estimasi_biaya');

        return view('analisis.rekomendasi', [
            'barang' => $barang,
            'totalEstimasiBiaya' => $totalEstimasiBiaya,
        ]);
    }

}
