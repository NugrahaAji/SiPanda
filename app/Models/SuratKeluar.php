<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'nomor',
        'progja',
        'tanggal_surat',
        'tanggal_keluar',
        'perihal',
        'tujuan',
        'keterangan',
        'file_path',
        'user_id',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_keluar' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
