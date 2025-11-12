<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:500',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('surat-keluar', 'public');
        }

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show(SuratKeluar $suratKeluar)
    {
        $this->authorize('view', $suratKeluar);
        return view('surat-keluar.show', compact('suratKeluar'));
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        $this->authorize('update', $suratKeluar);
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $this->authorize('update', $suratKeluar);

        $validated = $request->validate([
            'nomor' => 'required|string|max:255' . $suratKeluar->id,
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:500',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($suratKeluar->file_path) {
                Storage::disk('public')->delete($suratKeluar->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('surat-keluar', 'public');
        }

        $suratKeluar->update($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
