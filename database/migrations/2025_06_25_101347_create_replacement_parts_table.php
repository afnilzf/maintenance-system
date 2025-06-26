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
        Schema::create('sparepart_replacements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained('machines')->onDelete('cascade');
            $table->date('replacement_date');
            $table->foreignId('spare_part_id')->constrained('spareparts')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('unit')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('replaced_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sparepart_replacements');
    }
};
