<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::where('user_id', auth()->id())
            ->latest()
            ->get();
            // Manipulasi data untuk tab arus
        $groupNomor = $suratKeluar->groupBy('nomor');
        $arusSurat = collect();
        foreach ($groupNomor as $nomor => $items) {
            $count = $items->count();
            $first = $items->first();
            $nomorDisplay = $count > 1 ? preg_replace('/^(\d+)/', '$1(' . $count . ')', $nomor) : $nomor;
            $perihal = $items->pluck('perihal')->unique()->implode(', ');
            $tujuan = $items->pluck('tujuan')->unique()->implode(', ');
            $keterangan = $items->pluck('keterangan')->unique()->implode(', ');
            $arusSurat->push((object) [
                'nomor' => $nomorDisplay,
                'tanggal_surat' => $first->tanggal_surat,
                'tanggal_keluar' => $first->tanggal_keluar,
                'perihal' => $perihal,
                'tujuan' => $tujuan,
                'keterangan' => $keterangan,
                'id' => $first->id,
            ]);
        }

        // Untuk tab daftar tetap pakai paginate
        $suratKeluarPaginate = SuratKeluar::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('surat-keluar.index', [
            'suratKeluar' => $suratKeluarPaginate,
            'arusSurat' => $arusSurat,
        ]);
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor' => 'required|string|max:255',
            'progja' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:500',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // simpan ke storage/app/public/surat_keluar
            $data['file_path'] = $request->file('file')->store('surat_keluar', 'public');
        }

        // pastikan menyertakan user_id agar tidak melanggar NOT NULL constraint
        $data['user_id'] = auth()->id();

        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar dibuat.');
    }

    public function show(SuratKeluar $surat)
    {
        // izinkan pemilik; bila punya flag admin di user, izinkan juga
        if ($surat->user_id !== auth()->id() && ! (auth()->user()->is_admin ?? false)) {
            abort(403, 'Anda tidak berhak melihat surat ini.');
        }

        // view mengharapkan $suratKeluar
        return view('surat-keluar.show', ['suratKeluar' => $surat]);
    }

    public function edit(SuratKeluar $surat)
    {
        return view('surat-keluar.edit', compact('surat'));
    }

    public function update(Request $request, SuratKeluar $surat)
    {
        $data = $request->validate([
            'nomor' => 'required|string|max:255',
            'progja' => 'nullable|string|max:255',
            'tanggal_surat' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'perihal' => 'nullable|string|max:500',
            'tujuan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }
            $data['file_path'] = $request->file('file')->store('surat_keluar', 'public');
        }

        $surat->update($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar diperbarui.');
    }

    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
