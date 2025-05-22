<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        $barangTemuan = Barang::with('tipe')
            ->whereHas('tipe', function ($query) {
                $query->where('nama', 'Temuan');
            })
            ->orderByDesc('waktu')
            ->take(6)
            ->get();

        $barangHilang = Barang::with('tipe')
            ->whereHas('tipe', function ($query) {
                $query->where('nama', 'Hilang');
            })
            ->orderByDesc('waktu')
            ->take(6)
            ->get();

        return view('index', compact('kategoris', 'barangTemuan', 'barangHilang'));
    }
}
