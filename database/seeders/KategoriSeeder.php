<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Dompet', 'Kunci', 'Aksesoris', 'Smartphone', 'Elektronik', 'Botol Minum', 'Alat Tulis', 'Pakaian', 'Dokumen', 'Lainnya'
        ];

        foreach ($kategori as $item) {
            \App\Models\Kategori::create(['nama' => $item]);
        }
    }
}
