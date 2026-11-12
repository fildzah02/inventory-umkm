# INVENTORY UMKM

### Sistem Informasi Pengelolaan Persediaan Barang UMKM

## 1. Identitas Pengembang

- Nama: Fildzah Lalita Tesya Octaviana
- NIM: C2183207048
- Kelas: PTI5
- Mata Kuliah: Pemrograman Internet

## 2. Deskripsi Project

Inventory UMKM merupakan aplikasi berbasis web yang dibuat untuk membantu pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) dalam mengelola persediaan barang.

Aplikasi ini menyediakan informasi stok barang, barang masuk, barang keluar, status persediaan, analisis stok, serta rekomendasi pengadaan barang.

## 3. Tujuan Aplikasi

- Mempermudah pemantauan persediaan barang.
- Mengetahui jumlah stok akhir setiap barang.
- Mengidentifikasi barang dengan stok rendah atau habis.
- Membantu menentukan kebutuhan pengadaan barang.
- Menghitung estimasi biaya pembelian barang.

## 4. Fitur Aplikasi

1. Dashboard ringkasan persediaan.
2. Daftar seluruh data barang.
3. Pengelompokan barang berdasarkan kategori.
4. Detail informasi barang.
5. Pemantauan stok rendah.
6. Analisis persediaan barang.
7. Rekomendasi pengadaan berdasarkan prioritas.

## 5. Teknologi yang Digunakan

- PHP 8.4.1 atau lebih baru
- Laravel 13
- HTML
- CSS
- Bootstrap 5
- Blade Template Engine
- Visual Studio Code

## 6. Struktur Project

```text
inventory-umkm/
├── app/
│   ├── Data/
│   │   └── BarangData.php
│   └── Http/
│       └── Controllers/
│           ├── DashboardController.php
│           ├── BarangController.php
│           └── AnalisisController.php
├── resources/
│   └── views/
│       ├── layouts/
│       ├── barang/
│       ├── analisis/
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── public/
├── storage/
├── .env.example
├── composer.json
└── README.md
```

## 7. Cara Menjalankan Aplikasi

Persyaratan:

- PHP minimal 8.4.1
- Composer
- Visual Studio Code

Langkah menjalankan:

1. Clone repository project.
2. Buka folder project di VS Code.
3. Jalankan perintah:

```bash
composer install
```

4. Salin file konfigurasi:

```powershell
Copy-Item .env.example .env
```

5. Buat application key:

```bash
php artisan key:generate
```

6. Jalankan aplikasi:

```bash
php artisan serve
```

7. Buka browser:

```text
http://127.0.0.1:8000
```

## 8. Metode Perhitungan

**Stok Akhir**

Stok Akhir = Stok Awal + Barang Masuk - Barang Keluar

**Kebutuhan Pengadaan**

Kebutuhan = Maksimum (0, Stok Target - Stok Akhir)

**Estimasi Biaya**

Estimasi Biaya = Kebutuhan Pengadaan × Harga Satuan

Status persediaan:

- Aman: stok akhir lebih besar dari stok minimum.
- Menipis: stok akhir lebih kecil atau sama dengan stok minimum.
- Habis: stok akhir sama dengan nol.

## 9. Hasil Pengujian

| Keterangan          |       Hasil |
| ------------------- | ----------: |
| Total Barang        |          15 |
| Total Stok          |    158 unit |
| Stok Aman           |    7 barang |
| Stok Menipis        |    7 barang |
| Stok Habis          |    1 barang |
| Kebutuhan Pengadaan |    447 unit |
| Estimasi Biaya      | Rp4.213.000 |
