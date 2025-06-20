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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('code')->unique();
            $table->string('inventory_number')->nullable();
            $table->year('year_acquired')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('condition', ['good', 'medium', 'repaired', 'damaged'])->default('good');
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->string('power')->nullable();
            $table->string('supplier')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('repair_complexity')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
