<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_perawatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesin_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('jenis_perawatan', ['preventif', 'korektif']);
            $table->text('deskripsi')->nullable();
            $table->boolean('disetujui')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_perawatans');
    }
};
