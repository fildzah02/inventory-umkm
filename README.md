## Inventory UMKM

### Sistem Informasi Pengelolaan Persediaan Barang UMKM

## 1. Identitas Pengembang

- Nama: Fildzah Lalita Tesya Octaviana
- NIM: C2183207048
- Kelas: PTI5
- Mata Kuliah: Pemrograman Internet

## 2. Deskripsi Project

Sistem Informasi Inventory UMKM merupakan aplikasi berbasis web yang dibuat menggunakan framework Laravel untuk membantu pengelolaan persediaan barang pada usaha mikro, kecil, dan menengah (UMKM).

Aplikasi ini membantu pengguna mengetahui jumlah stok barang, memantau kondisi persediaan, melakukan analisis stok, serta memberikan rekomendasi pengadaan barang berdasarkan target persediaan.

Project ini menggunakan penyimpanan data berbasis array PHP dan template Blade tanpa menggunakan database untuk pengolahan data barang.

## 3. Tujuan Project

- Mempermudah pengelolaan data persediaan barang.
- Mengetahui jumlah stok akhir setiap barang.
- Mengidentifikasi barang dengan stok aman, menipis, dan habis.
- Membantu menentukan prioritas pengadaan barang.
- Menghitung estimasi biaya pengadaan barang.

## 4. Teknologi yang Digunakan

- PHP 8.4
- Laravel 13
- Composer
- HTML
- CSS
- Bootstrap 5
- Blade Template
- Visual Studio Code

## 5. Fitur Aplikasi

1. **Dashboard** — menampilkan ringkasan total barang, total stok, stok aman, stok menipis, stok habis, dan nilai persediaan.
2. **Data Barang** — menampilkan daftar barang beserta kode, kategori, stok awal, barang masuk, barang keluar, dan stok akhir.
3. **Kategori Barang** — menampilkan barang berdasarkan kategori makanan, minuman, dan perlengkapan.
4. **Detail Barang** — menampilkan informasi lengkap suatu barang.
5. **Stok Rendah** — menampilkan barang yang stoknya berada pada atau di bawah batas minimum.
6. **Analisis Stok** — menghitung kondisi persediaan dan kebutuhan pengadaan.
7. **Rekomendasi Pengadaan** — mengurutkan barang berdasarkan tingkat prioritas dan menghitung estimasi biaya pengadaan.

## 6. Rumus Perhitungan

**Stok Akhir**

Stok Akhir = Stok Awal + Barang Masuk - Barang Keluar

**Kebutuhan Pengadaan**

Kebutuhan = Stok Target - Stok Akhir

Jika hasil perhitungan kebutuhan kurang dari nol, maka kebutuhan pengadaan dianggap 0.

**Estimasi Biaya**

Estimasi Biaya = Kebutuhan Pengadaan × Harga Satuan

## 7. Kategori Status Stok

- **Aman:** stok akhir lebih besar dari stok minimum.
- **Menipis:** stok akhir lebih kecil atau sama dengan stok minimum.
- **Habis:** stok akhir bernilai 0.

## 8. Struktur Folder Penting

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
├── composer.json
└── README.md
```

## 9. Cara Menjalankan Aplikasi

1. Pastikan PHP dan Composer sudah terinstal.
2. Clone repository:

```bash
git clone https://github.com/fildzah02/inventaris-umkm.git
```

3. Masuk ke folder project:

```bash
cd inventaris-umkm
```

4. Install dependency:

```bash
composer install
```

5. Salin file konfigurasi:

```bash
copy .env.example .env
```

6. Buat application key:

```bash
php artisan key:generate
```

7. Jalankan aplikasi:

```bash
php artisan serve
```

8. Buka browser:

```text
http://127.0.0.1:8000
```
