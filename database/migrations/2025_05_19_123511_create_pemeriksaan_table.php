<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_perawatan_id')->constrained()->onDelete('cascade');
            $table->foreignId('komponen_id')->constrained()->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->enum('status', ['baik', 'perlu penggantian', 'rusak'])->default('baik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
