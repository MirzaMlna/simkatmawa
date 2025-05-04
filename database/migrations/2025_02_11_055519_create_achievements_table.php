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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'student_id')->constrained('users')->onDelete('cascade');
            $table->string('nim', 50);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('study_program', 255)->nullable();
            $table->enum('achievement_type', ['Akademik', 'Non Akademik'])->nullable();
            $table->enum('program_by', ['Dikti', 'Non Dikti'])->nullable();
            $table->string('achievement_level', 100)->nullable();
            $table->string('participation_type', 100)->nullable();
            $table->string('execution_model', 100)->nullable();
            $table->string('event_name', 255)->nullable();
            $table->integer('participant_count')->nullable();
            $table->string('university_count')->nullable();
            $table->string('achievement_title', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('news_link', 255)->nullable();
            $table->string('certificate_file', 255)->nullable();
            $table->string('award_photo_file', 255)->nullable();
            $table->string('student_assignment_letter', 255)->nullable();
            $table->string('nidn', 50)->nullable();
            $table->string('supervisor_assignment_letter', 255)->nullable();
            $table->enum('status', ['tunda', 'diterima', 'ditolak'])->default('Tunda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
