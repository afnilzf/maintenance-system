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
        Schema::create('machine_checklist_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_checklist_id')->constrained('machine_checklists')->onDelete('cascade');
            $table->foreignId('component_id')->constrained('components')->onDelete('cascade');
            $table->enum('condition', ['B', 'PB', 'R']);
            $table->enum('treatment', ['P', 'Lo', 'Lg', 'Pb'])->nullable();
            $table->text('repair_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_checklist_lines');
    }
};
