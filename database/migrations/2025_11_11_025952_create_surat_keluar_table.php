<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('progja');
            $table->date('tanggal_surat');
            $table->date('tanggal_keluar');
            $table->string('perihal');
            $table->string('tujuan');
            $table->string('keterangan');
            $table->string('file_path')->nullable();
            $table->string('tipe_surat')->default('keluar');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
