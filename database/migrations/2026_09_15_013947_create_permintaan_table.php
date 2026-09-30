<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pemeriksaan_id')
                ->constrained('pemeriksaan')
                ->onDelete('cascade');

            $table->foreignId('ketua_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('anggota_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->text('pesan');

            $table->string('status')->default('belum');

            $table->timestamp('dibaca_pada')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permintaan');
    }
};