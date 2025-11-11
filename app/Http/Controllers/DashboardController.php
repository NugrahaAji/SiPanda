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
        $arsipCount = Arsip::where('user_id', $user->id)->count();

        $arsipList = Arsip::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard', compact(
            'suratMasukCount',
            'suratKeluarCount',
            'arsipCount',
            'arsipList'
        ));
    }
}
