<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->enum('status', ['draft', 'active', 'archived'])->default('draft')->after('price');
            $table->integer('duration_hours')->nullable()->after('status'); // Total hours
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['status', 'duration_hours']);
        });
    }
};