<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        \App\Models\Kategori::create(['nama_kategori' => 'Elektronik']);
        \App\Models\Supplier::create([
        'nama_supplier' => 'PT Maju Jaya',
        'alamat' => 'Jakarta',
        'no_telp' => '0812345'
    
        ]);
    }
}
