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
        Schema::create('calendar_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_code')->constrained()->onDelete('cascade');
            $table->string('tittle')->nullable();
            $table->date('scheduled_date_start');
            $table->date('scheduled_date_end');
            $table->tinyInteger('period_week')->nullable();
            $table->tinyInteger('month')->nullable();
            $table->year('year')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_schedules');
    }
};
