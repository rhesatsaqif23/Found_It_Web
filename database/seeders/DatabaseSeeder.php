<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Adit Denis',
            'username' => 'aditdenis',
            'email' => 'aditdenis@gmail.com',
            'no_telepon' => '08123456789',
            'password' => 'aditdenis123',
            'role' => 'user',
        ]);

        $this->call([
            KategoriSeeder::class,
            TipeSeeder::class,
            StatusSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
