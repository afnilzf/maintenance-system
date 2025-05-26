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
        Schema::table('preventive_schedules', function (Blueprint $table) {
            $table->timestamp('approved_by_head_at')->nullable()->after('approved_by_head');
            $table->timestamp('approved_by_department_at')->nullable()->after('approved_by_department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preventive_schedules', function (Blueprint $table) {
            //
        });
    }
};
