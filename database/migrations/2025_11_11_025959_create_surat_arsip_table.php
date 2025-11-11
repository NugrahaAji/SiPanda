<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nama');
            $table->enum('jenis', ['Undangan', 'Pemberitahuan', 'Permohonan', 'Lainnya']);
            $table->text('perihal');
            $table->date('tanggal');
            $table->string('file_path')->nullable();
            $table->enum('tipe_surat', ['masuk', 'keluar']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
