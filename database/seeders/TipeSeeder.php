<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipe = [
            'Hilang', 'Temuan'
        ];

        foreach ($tipe as $item) {
            \App\Models\Tipe::create(['nama' => $item]);
        }
    }
}
