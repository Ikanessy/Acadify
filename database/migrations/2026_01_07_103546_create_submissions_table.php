<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Student
            $table->text('content')->nullable(); // Text submission
            $table->string('file_path')->nullable(); // Uploaded file
            $table->integer('score')->nullable(); // Graded score
            $table->text('feedback')->nullable(); // Teacher feedback
            $table->enum('status', ['pending', 'graded', 'returned'])->default('pending');
            $table->timestamp('submitted_at')->useCurrent();
            $table->timestamp('graded_at')->nullable();
            $table->foreignId('graded_by')->nullable()->constrained('users'); // Teacher who graded
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};