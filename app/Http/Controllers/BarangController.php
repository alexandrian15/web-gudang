<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan untuk transaction
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier; 


class BarangController extends Controller
{
    public function storeBarangMasuk(Request $request)
    {
        // Validasi input, tambahkan exists untuk id_barang
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'id_supplier' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
        ]);

        // Gunakan transaction untuk memastikan konsistensi
        DB::transaction(function () use ($request) {
            // 1. Simpan data ke tabel barang_masuk
            BarangMasuk::create([
                'tanggal' => $request->tanggal,
                'id_barang' => $request->id_barang,
                'id_supplier' => $request->id_supplier,
                'jumlah' => $request->jumlah,
            ]);

            // 2. Update stok di tabel barang
            $barang = Barang::find($request->id_barang);
            $barang->stok += $request->jumlah; // Gunakan += untuk lebih jelas
            $barang->save();
        });

        return redirect()->back()->with('success', 'Barang masuk berhasil dicatat dan stok bertambah.');
    }

    public function index()
    {
        // Mengambil semua data dari tabel barangs, gunakan import yang sudah ada
        $data_barang = Barang::all();

        // Mengirim data ke view 'barang.index' (asumsikan struktur view benar)
        return view('barang.index', compact('data_barang'));
    }

    public function create()
{
    return view('barang.create'); // Kita akan buat file ini setelah ini
}

    public function store(Request $request)
{
    // Validasi input
     $request->validate([
            'Nama_Barang' => 'required',
            'Stok' => 'required|numeric',
    ]);

    // Simpan ke database
        \App\Models\Barang::create([
            'Nama_Barang' => $request->Nama_Barang,
            'Stok' => $request->Stok,
            'is_active' => 1 // Sesuai kolom di database kamu
        ]);

    return redirect('/barang')->with('success', 'Barang berhasil ditambah!');
}
public function destroy($id) {
    $barang = \App\Models\Barang::findOrFail($id);
    $barang->delete();

    return redirect('/')->with('success', 'Barang berhasil dihapus!');
}

public function barangMasuk()
{
    // Mengambil data riwayat dari tabel Barang_masuk
    $riwayat = \DB::table('Barang_masuk')
                ->join('Barang', 'Barang_masuk.Id_Barang', '=', 'Barang.Id_Barang')
                ->select('Barang_masuk.*', 'Barang.Nama_Barang')
                ->get();

    return view('barang.masuk', compact('riwayat'));
}

public function barangKeluar()
{
    // Mengambil data riwayat dari tabel Barang_Keluar
    $riwayatKeluar = \DB::table('Barang_Keluar')
                ->join('Barang', 'Barang_Keluar.Id_Barang', '=', 'Barang.Id_Barang')
                ->select('Barang_Keluar.*', 'Barang.Nama_Barang')
                ->orderBy('Tanggal', 'desc')
                ->get();

    return view('barang.keluar', compact('riwayatKeluar'));
}

public function supplier()
{
    // Mengambil semua data dari tabel Supplier
    $data_supplier = \DB::table('Suplier')->get();

    return view('barang.supplier', compact('data_supplier'));
}
}