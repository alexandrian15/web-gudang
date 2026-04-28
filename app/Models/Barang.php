<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // 1. Beritahu nama tabelnya (sesuaikan dengan yang ada di VS Code Database)
    protected $table = 'Barang'; 

    // 2. Beritahu primary key-nya (karena kamu tidak pakai 'id' standar)
    protected $primaryKey = 'Id_Barang';

    // 3. Matikan timestamps jika di tabelmu tidak ada kolom created_at/updated_at
    public $timestamps = false; 

    protected $fillable = ['Nama_Barang', 'Stok', 'is_active'];

    
}
