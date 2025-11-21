<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Arsip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $suratMasukCount = SuratMasuk::where('user_id', $user->id)->count();
        $suratKeluarCount = SuratKeluar::where('user_id', $user->id)->count();
        $arsipCount = $suratMasukCount + $suratKeluarCount;

        // Ambil 10 surat masuk dan keluar terbaru berdasarkan timestamp
        $suratMasukTerbaru = SuratMasuk::where('user_id', $user->id)->latest()->take(10)->get();
        $suratKeluarTerbaru = SuratKeluar::where('user_id', $user->id)->latest()->take(10)->get();

        // Gabungkan dan urutkan lagi berdasarkan waktu
        $arsipList = $suratMasukTerbaru->concat($suratKeluarTerbaru)->sortByDesc('created_at')->take(10);

        return view('dashboard', compact(
            'suratMasukCount',
            'suratKeluarCount',
            'arsipCount',
            'arsipList'
        ));
    }
}
