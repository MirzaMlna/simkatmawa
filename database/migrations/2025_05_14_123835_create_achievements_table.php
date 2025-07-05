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
            $table->string('identity_number', 50);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('study_program', 255)->nullable();
            $table->enum('achievement_type', ['Akademik', 'Non Akademik'])->nullable();
            $table->enum('program_by', ['Dikti', 'Non Dikti'])->nullable();
            $table->enum('achievement_level', ['Kabupaten / Kota', 'Provinsi', 'Nasional', 'Internasional'])->nullable();
            $table->enum('participation_type', ['Individu', 'Kelompok'])->nullable();
            $table->enum('execution_model', ['Daring', 'Luring'])->nullable();
            $table->string('event_name', 255)->nullable();
            $table->integer('participant_count')->nullable();
            $table->string('university_count')->nullable();
            $table->string('nation_count')->nullable()->default(1);
            $table->string('achievement_title', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('news_link', 255)->nullable();
            $table->string('certificate_file', 255)->nullable();
            $table->string('award_photo_file', 255)->nullable();
            $table->string('student_assignment_letter', 255)->nullable();
            $table->string('supervisor_number', 50)->nullable();
            $table->string('supervisor_nuptk', 50)->nullable();
            $table->string('supervisor_assignment_letter', 255)->nullable();
            $table->enum('status', ['Tunda', 'Diterima'])->default('Tunda');
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
