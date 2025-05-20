<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'nama' => 'iPhone 11 Purple',
                'tipe_id' => 1, // Hilang
                'kategori_id' => 4, // Smartphone
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subMinutes(20),
                'lokasi' => 'Nakoa Cafe Suhat',
                'kontak' => '082111223344',
                'deskripsi' => 'iPhone 11 warna ungu dengan casing bening. Terakhir terlihat di meja pojok dekat jendela.',
                'foto' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2024/1/5/aecdaea5-bf4d-4213-bea1-516253e8753f.jpg',
                'status_id' => 2, // Belum Ditemukan
            ],
            [
                'nama' => 'Dompet Eiger Coklat',
                'tipe_id' => 2, // Temuan
                'kategori_id' => 1, // Dompet
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subHour(),
                'lokasi' => 'Kantin CL UB',
                'kontak' => '082222334455',
                'deskripsi' => 'Dompet Eiger berwarna coklat tua berisi KTP dan KTM atas nama Rudi.',
                'foto' => 'https://filebroker-cdn.lazada.co.id/kf/S322c7f8d27ba42b7bace2cbfdb156ff7G.jpg',
                'status_id' => 1, // Belum Dikembalikan
            ],
            [
                'nama' => 'Headset Fantech',
                'tipe_id' => 1, // Hilang
                'kategori_id' => 5, // Elektronik
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subHour(),
                'lokasi' => 'Game Corner FILKOM',
                'kontak' => '081234567890',
                'deskripsi' => 'Headset gaming merk Fantech warna hitam dengan kabel agak rusak.',
                'foto' => 'https://media.karousell.com/media/photos/products/2023/1/12/fantech_chief_ii_hg20_rgb_gami_1673484758_26d7fc27_progressive.jpg',
                'status_id' => 2, // Belum Ditemukan
            ],
            [
                'nama' => 'Mouse Logitech G Pro',
                'tipe_id' => 2, // Temuan
                'kategori_id' => 5, // Elektronik
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subHours(2),
                'lokasi' => 'Lab G1.3 FILKOM',
                'kontak' => '083344556677',
                'deskripsi' => 'Mouse putih Logitech G Pro Wireless tertinggal di lab saat praktikum.',
                'foto' => 'https://down-id.img.susercontent.com/file/id-11134207-7rasi-m57cdwnkwxsm40',
                'status_id' => 1, // Belum Dikembalikan
            ],
            [
                'nama' => 'Tumbler Corkcicle',
                'tipe_id' => 1, // Hilang
                'kategori_id' => 6, // Botol Minum
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subHours(2),
                'lokasi' => 'AADK Tlogomas',
                'kontak' => '088899001122',
                'deskripsi' => 'Tumbler pink muda merk Corkcicle tertinggal di atas meja.',
                'foto' => 'https://img.lazcdn.com/g/p/0161eb2936426a336a59eee0357364d9.jpg_360x360q80.jpg_.webp',
                'status_id' => 2, // Belum Ditemukan
            ],
            [
                'nama' => 'Jam Tangan Tissot',
                'tipe_id' => 2, // Temuan
                'kategori_id' => 3, // Aksesoris
                'pelapor_id' => 1,
                'waktu' => Carbon::now()->subHours(3),
                'lokasi' => 'Masjid Sabilillah',
                'kontak' => '089912345678',
                'deskripsi' => 'Jam tangan Tissot hitam dengan tali kulit. Terakhir digunakan saat salat Maghrib.',
                'foto' => 'https://down-id.img.susercontent.com/file/id-11134207-7r98o-lzzw1xldpd6w8d',
                'status_id' => 1, // Belum Dikembalikan
            ],
        ]);
    }
}
