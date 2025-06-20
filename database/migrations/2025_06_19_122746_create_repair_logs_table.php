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
        Schema::create('repair_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_checklist_id')->constrained('machine_checklists')->onDelete('cascade');
            $table->string('part');
            $table->text('issue')->nullable();
            $table->text('cause')->nullable();
            $table->text('solution')->nullable();
            $table->date('repair_date_start')->nullable();
            $table->date('repair_date_finish')->nullable();
            $table->foreignId('repaired_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_logs');
    }
};
