<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->string('title'); // e.g., "Authentication & Authorization"
            $table->text('content')->nullable(); // Text content/description
            $table->enum('type', ['video', 'text', 'quiz', 'assignment'])->default('video');
            $table->string('video_url')->nullable(); // YouTube, Vimeo, or uploaded video
            $table->integer('duration_minutes')->nullable(); // Length ng video
            $table->integer('order')->default(0); // Para sa sorting
            $table->boolean('is_preview')->default(false); // Free preview?
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};