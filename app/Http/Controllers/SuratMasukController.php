<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
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

    public function show(SuratMasuk $surat)
    {
        // hanya pemilik yang boleh melihat — ganti sesuai kebutuhan
        if ($surat->user_id !== auth()->id()) {
            abort(403);
        }

        // blade mengharapkan $suratMasuk, jadi kirim dengan nama itu
        return view('surat-masuk.show', ['suratMasuk' => $surat]);
    }

    public function edit(SuratMasuk $surat)
    {
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, SuratMasuk $surat)
    {
        $data = $request->validate([
            'nomor' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'pengirim' => 'nullable|string|max:255',
            'perihal' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            // hapus file lama jika ada
            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }
            $data['file_path'] = $request->file('file')->store('surat_masuk', 'public');
        }

        $surat->update($data);

        return redirect()->route('surat-masuk.edit', $surat)->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
