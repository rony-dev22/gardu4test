<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_pemeriksaan');

            $table->string('nomor_surat_tugas')->nullable();

            $table->date('tanggal_mulai')->nullable();

            $table->date('tanggal_selesai')->nullable();

            $table->foreignId('ketua_tim_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->text('keterangan')->nullable();

            $table->string('status')->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};