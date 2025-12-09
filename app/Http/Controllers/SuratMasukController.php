<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuks = SuratMasuk::latest()->paginate(10);
        return view('surat-masuk.index', compact('suratMasuks'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // PENTING: Simpan ke disk 'public'
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('surat-masuk', 'public');
        }

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan');
    }

    public function show($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat-masuk.show', compact('suratMasuk'));
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $suratMasuk = SuratMasuk::findOrFail($id);

        // PENTING: Simpan ke disk 'public' dan hapus file lama
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($suratMasuk->file && Storage::disk('public')->exists($suratMasuk->file)) {
                Storage::disk('public')->delete($suratMasuk->file);
            }

            $validated['file'] = $request->file('file')->store('surat-masuk', 'public');
        }

        $suratMasuk->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Hapus file jika ada
        if ($suratMasuk->file && Storage::disk('public')->exists($suratMasuk->file)) {
            Storage::disk('public')->delete($suratMasuk->file);
        }

        $suratMasuk->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus');
    }

    // Method untuk download file
    public function download($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        if (!$suratMasuk->file || !Storage::disk('public')->exists($suratMasuk->file)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($suratMasuk->file);
    }

    // Method untuk view file di browser (untuk PDF)
    public function viewFile($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        if (!$suratMasuk->file || !Storage::disk('public')->exists($suratMasuk->file)) {
            abort(404, 'File tidak ditemukan');
        }

        $filePath = Storage::disk('public')->path($suratMasuk->file);
        $mimeType = Storage::disk('public')->mimeType($suratMasuk->file);

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
        ]);
    }
}
