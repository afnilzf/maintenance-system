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
        Schema::create('repair_log_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repair_log_id')->constrained('repair_logs')->onDelete('cascade');
            $table->string('part');
            $table->text('issue')->nullable();
            $table->text('cause')->nullable();
            $table->text('solution')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_logs_line');
    }
};
