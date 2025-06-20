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
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->integer('period_week');
            $table->tinyInteger('period_month');
            $table->year('period_year');
            $table->integer('realization_week')->nullable();
            $table->tinyInteger('realization_month')->nullable();
            $table->year('realization_year')->nullable();
            $table->tinyInteger('interval_month')->nullable();
            $table->string('cycle_type')->nullable();
            $table->string('damage_type')->nullable();
            $table->text('description')->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('approved_by_department')->default(false);
            $table->timestamp('approved_by_department_at')->nullable();
            $table->foreignId('approved_by_user')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};
