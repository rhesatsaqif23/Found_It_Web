<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tipe;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.barangs.index', compact(
                'barangs',
                'kategoris',
                'barangTemuan',
                'barangHilang'
            ));
        }

        return view('user.barang.index', compact(
            'barangs',
            'kategoris',
            'barangTemuan',
            'barangHilang'
        ));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $tipes = Tipe::all();
        $kategoris = Kategori::all();
        $statuses = Status::all();

        return view('admin.barangs.create', compact('tipes', 'kategoris', 'statuses'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string',
            'tipe_id' => 'required|exists:tipes,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'waktu' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status_id' => 'required|exists:statuses,id',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('barangs', 'public');
        }

        Barang::create([
            'nama' => $request->nama,
            'tipe_id' => $request->tipe_id,
            'kategori_id' => $request->kategori_id,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'status_id' => $request->status_id,
            'pelapor_id' => Auth::id(),
        ]);

        return redirect()->route('barangs.index')->with('success', 'Laporan berhasil dikirim.');
    }


    public function createHilang()
    {
        $tipe = Tipe::where('nama', 'Hilang')->first();
        $kategoris = Kategori::all();
        $statuses = Status::all();
        $status = Status::where('nama', 'Belum Ditemukan')->first();

        return view('user.barang.lapor-hilang', compact('tipe', 'kategoris', 'statuses', 'status'));
    }

    public function createTemuan()
    {
        $tipe = Tipe::where('nama', 'Temuan')->first();
        $kategoris = Kategori::all();
        $statuses = Status::all();
        $status = Status::where('nama', 'Belum Dikembalikan')->first();

        return view('user.barang.lapor-temuan', compact('tipe', 'kategoris', 'statuses', 'status'));
    }


    public function show(Barang $barang)
    {
        $carbon = Carbon::parse($barang->waktu);
        $tanggal = $carbon->locale('id')->translatedFormat('l, d/m/Y');
        $jam = $carbon->format('H:i');

        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.barangs.show', compact('barang', 'tanggal', 'jam'));
        }

        return view('user.barang.detail-barang', compact('barang', 'tanggal', 'jam'));
    }

    public function edit(Barang $barang)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $tipes = Tipe::all();
        $kategoris = Kategori::all();
        $statuses = Status::all();

        return view('admin.barangs.edit', compact('barang', 'tipes', 'kategoris', 'statuses'));
    }

    public function update(Request $request, Barang $barang)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

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
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil dihapus');
    }

    public function cari(Request $request)
    {
        $query = $request->input('q');
        $tipeFilter = $request->input('tipe', 'Temuan'); // default 'Temuan'

        $barangs = Barang::with(['kategori', 'tipe', 'status'])
            ->where(function ($qBuilder) use ($query) {
                $qBuilder->where('nama', 'like', '%' . $query . '%')
                    ->orWhereHas('kategori', function ($kategoriQuery) use ($query) {
                        $kategoriQuery->where('nama', 'like', '%' . $query . '%');
                    });
            });

        if ($tipeFilter) {
            $barangs->whereHas('tipe', fn($q) => $q->where('nama', $tipeFilter));
        }

        $barangs = $barangs->latest()->get();
        $kategoris = Kategori::all();

        return view('user.barang.hasil-cari', compact('barangs', 'kategoris', 'query', 'tipeFilter'));
    }
}
