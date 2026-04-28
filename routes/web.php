<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

// Menampilkan daftar stok barang di halaman utama
Route::get('/', [BarangController::class, 'index'])->name('barang.index');

// Proses menyimpan transaksi barang masuk
Route::post('/barang-masuk/simpan', [BarangMasukController::class, 'store'])->name('barang-masuk.store');

// Proses menyimpan transaksi barang keluar
Route::post('/barang-keluar/simpan', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');

Route::get('/daftar-barang', [BarangController::class, 'index']);

Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/simpan', [BarangController::class, 'store'])->name('barang.store');

// Route untuk hapus data
Route::delete('/barang/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/barang-masuk', [BarangController::class, 'barangMasuk'])->name('barang.masuk');

Route::get('/barang-keluar', [BarangController::class, 'barangKeluar'])->name('barang.keluar');