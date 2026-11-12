<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AnalisisController;

// 1. Halaman utama
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// 2. Daftar seluruh barang
Route::get('/barang', [BarangController::class, 'index'])
    ->name('barang.index');

// 3. Barang berdasarkan kategori
Route::get('/barang/kategori/{nama}', [BarangController::class, 'kategori'])
    ->name('barang.kategori');

// 4. Detail barang berdasarkan ID
Route::get('/barang/detail/{id}', [BarangController::class, 'detail'])
    ->name('barang.detail');

// 5. Daftar barang dengan stok rendah
Route::get('/barang/stok-rendah', [BarangController::class, 'stokRendah'])
    ->name('barang.stok-rendah');

// 6. Halaman analisis stok
Route::get('/analisis', [AnalisisController::class, 'index'])
    ->name('analisis.index');

// 7. Rekomendasi pengadaan
Route::get('/rekomendasi', [AnalisisController::class, 'rekomendasi'])
    ->name('analisis.rekomendasi');
