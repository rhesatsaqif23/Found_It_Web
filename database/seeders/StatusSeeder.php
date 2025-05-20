<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'Belum Dikembalikan', 'Belum Ditemukan', 'Sudah Dikembalikan', 'Sudah Ditemukan'
        ];

        foreach ($status as $item) {
            \App\Models\Status::create(['nama' => $item]);
        }
    }
}
