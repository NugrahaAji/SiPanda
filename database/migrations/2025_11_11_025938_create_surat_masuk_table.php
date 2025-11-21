<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('pengirim');
            $table->date('tanggal_masuk');
            $table->string('perihal');
            $table->string('tujuan');
            $table->string('keterangan');
            $table->string('file_path')->nullable();
            $table->string('tipe_surat')->default('masuk');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
