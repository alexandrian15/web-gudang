<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
public function store(Request $request)
{
    $barang = Barang::find($request->id_barang);

    // Cek apakah stok cukup
    if ($barang->stok < $request->jumlah) {
        return redirect()->back()->with('error', 'Stok tidak cukup untuk pengeluaran ini!');
    }

    // 1. Simpan data ke tabel barang_keluar
    \App\Models\BarangKeluar::create($request->all());

    // 2. LOGIC UPDATE STOK: Kurangi stok
    $barang->stok = $barang->stok - $request->jumlah;
    $barang->save();

    return redirect()->back()->with('success', 'Barang keluar berhasil dicatat.');
}
}
