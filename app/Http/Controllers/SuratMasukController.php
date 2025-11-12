<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255|',
            'pengirim' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:500',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('surat-masuk', 'public');
        }

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        $this->authorize('view', $suratMasuk);
        return view('surat-masuk.show', compact('suratMasuk'));
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        $this->authorize('update', $suratMasuk);
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $this->authorize('update', $suratMasuk);

        $validated = $request->validate([
            'nomor' => 'required|string|max:255|,nomor,' . $suratMasuk->id,
            'pengirim' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($suratMasuk->file_path) {
                Storage::disk('public')->delete($suratMasuk->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('surat-masuk', 'public');
        }

        $suratMasuk->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
