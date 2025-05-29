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

        $barangTemuan = Barang::with('tipe', 'status')
            ->whereHas('tipe', fn($q) => $q->where('nama', 'Temuan'))
            ->whereHas('status', fn($q) => $q->where('nama', 'Belum Dikembalikan'))
            ->orderByDesc('waktu')
            ->take(6)
            ->get();

        $barangHilang = Barang::with('tipe', 'status')
            ->whereHas('tipe', fn($q) => $q->where('nama', 'Hilang'))
            ->whereHas('status', fn($q) => $q->where('nama', 'Belum Ditemukan'))
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
        $barang->load(['pelapor', 'tipe', 'kategori', 'status']);

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
        $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'waktu' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tipe_id' => 'required|exists:tipes,id',
            'status_id' => 'required|exists:statuses,id',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('barangs', 'public');
            $barang->foto = $fotoPath;
        }

        $barang->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'tipe_id' => $request->tipe_id,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $user = Auth::user();

        if (!$user || ($user->role !== 'admin' && (int) $user->id !== (int) $barang->pelapor_id)) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus laporan ini.');
        }

        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $query = $request->input('q');
        $tipeFilter = $request->input('tipe', 'Temuan');
        $kategoriFilter = $request->input('kategori', []); // ← array dari checkbox

        $barangs = Barang::with(['kategori', 'tipe', 'status'])
            ->where(function ($qBuilder) use ($query) {
                $qBuilder->where('nama', 'like', '%' . $query . '%')
                    ->orWhereHas('kategori', function ($kategoriQuery) use ($query) {
                        $kategoriQuery->where('nama', 'like', '%' . $query . '%');
                    });
            });

        // Filter berdasarkan tipe
        if ($tipeFilter) {
            $barangs->whereHas('tipe', fn($q) => $q->where('nama', $tipeFilter));

            if ($tipeFilter === 'Temuan') {
                $barangs->whereHas('status', fn($q) => $q->where('nama', 'Belum Dikembalikan'));
            } elseif ($tipeFilter === 'Hilang') {
                $barangs->whereHas('status', fn($q) => $q->where('nama', 'Belum Ditemukan'));
            }
        }

        // Filter berdasarkan kategori (jika ada yang dipilih)
        if (!empty($kategoriFilter)) {
            $barangs->whereIn('kategori_id', $kategoriFilter);
        }

        $barangs = $barangs->orderBy('waktu', 'desc')->get();

        $kategoris = Kategori::all();

        return view('user.barang.hasil-cari', [
            'barangs' => $barangs,
            'kategoris' => $kategoris,
            'query' => $query,
            'tipeFilter' => $tipeFilter,
        ]);
    }


    public function riwayatLaporan(Request $request)
    {
        $user = Auth::user();

        $statusFilter = $request->input('status', []);

        $barangs = Barang::with('status') // pastikan relasi status dimuat
            ->where('pelapor_id', $user->id)
            ->when(!empty($statusFilter), function ($query) use ($statusFilter) {
                $query->where(function ($subQuery) use ($statusFilter) {
                    foreach ($statusFilter as $status) {
                        if ($status === 'Selesai') {
                            $subQuery->orWhereHas('status', function ($q) {
                                $q->whereIn('nama', ['Sudah Dikembalikan', 'Sudah Ditemukan']);
                            });
                        } else {
                            $subQuery->orWhereHas('status', function ($q) use ($status) {
                                $q->where('nama', $status);
                            });
                        }
                    }
                });
            })
            ->orderBy('waktu', 'desc')
            ->get();

        return view('user.barang.riwayat-laporan', [
            'barangs' => $barangs
        ]);
    }

    public function editLaporan(Barang $barang)
    {
        $tipes = Tipe::all();
        $kategoris = Kategori::all();
        $statuses = Status::all();

        return view('user.barang.edit-laporan', compact('barang', 'tipes', 'kategoris', 'statuses'));
    }

    public function selesaikan(Barang $barang)
    {
        $statusNama = strtolower($barang->status->nama);
        $statusBaru = null;

        if (str_contains($statusNama, 'belum ditemukan')) {
            $statusBaru = Status::where('nama', 'Sudah Ditemukan')->first();
        } elseif (str_contains($statusNama, 'belum dikembalikan')) {
            $statusBaru = Status::where('nama', 'Sudah Dikembalikan')->first();
        } else {
            return back()->with('error', 'Laporan sudah selesai.');
        }

        if ($statusBaru) {
            $barang->status_id = $statusBaru->id;
            $barang->save();
            return redirect()->route('barangs.index')->with('success', 'Status laporan berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui status.');
    }
}
