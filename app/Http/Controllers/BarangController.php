<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tipe;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['tipe', 'kategori', 'status'])->latest()->get();
        $kategoris = Kategori::all();

        $barangTemuan = Barang::with('tipe')
            ->whereHas('tipe', fn($q) => $q->where('nama', 'Temuan'))
            ->orderByDesc('waktu')
            ->take(6)
            ->get();

        $barangHilang = Barang::with('tipe')
            ->whereHas('tipe', fn($q) => $q->where('nama', 'Hilang'))
            ->orderByDesc('waktu')
            ->take(6)
            ->get();

        return view('admin.barangs.index', compact(
            'barangs',
            'kategoris',
            'barangTemuan',
            'barangHilang'
        ));
    }

    public function create()
    {
        $tipes = Tipe::all();
        $kategoris = Kategori::all();
        $statuses = Status::all();

        return view('admin.barangs.create', compact('tipes', 'kategoris', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tipe_id' => 'required|exists:tipes,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'waktu' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
        ]);

        Barang::create([
            'nama' => $request->nama,
            'tipe_id' => $request->tipe_id,
            'kategori_id' => $request->kategori_id,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'status_id' => $request->status_id,
            'pelapor_id' => Auth::id(),
        ]);

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('admin.barangs.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $tipes = Tipe::all();
        $kategoris = Kategori::all();
        $statuses = Status::all();
        return view('admin.barangs.edit', compact('barang', 'tipes', 'kategoris', 'statuses'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required|string',
            'tipe_id' => 'required|exists:tipes,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'waktu' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'pelapor' => 'nullable|string',
            'kontak' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil dihapus');
    }
}
