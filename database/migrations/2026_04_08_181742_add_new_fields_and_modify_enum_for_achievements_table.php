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
        Schema::table('achievements', function (Blueprint $table) {
            $table->string('kategori', 255)->nullable();
            $table->string('nama_cabang', 255)->nullable();
            $table->string('nama_penyelenggara', 255)->nullable();
            $table->date('certificate_date')->nullable();
            $table->string('invitation_document_file', 255)->nullable();
            $table->string('supervisor_name', 255)->nullable();
            
            $table->integer('university_count')->nullable()->change();
        });

        // Safe Enum Update: migrate existing 'Luring' to 'Luring/Hibrida' then restrict enum
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE achievements MODIFY execution_model ENUM('Daring', 'Luring', 'Luring/Hibrida') NULL");
        \Illuminate\Support\Facades\DB::statement("UPDATE achievements SET execution_model = 'Luring/Hibrida' WHERE execution_model = 'Luring'");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE achievements MODIFY execution_model ENUM('Daring', 'Luring/Hibrida') NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert Enum changes safely
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE achievements MODIFY execution_model ENUM('Daring', 'Luring', 'Luring/Hibrida') NULL");
        \Illuminate\Support\Facades\DB::statement("UPDATE achievements SET execution_model = 'Luring' WHERE execution_model = 'Luring/Hibrida'");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE achievements MODIFY execution_model ENUM('Daring', 'Luring') NULL");

        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn([
                'kategori',
                'nama_cabang',
                'nama_penyelenggara',
                'certificate_date',
                'invitation_document_file',
                'supervisor_name'
            ]);
            
            $table->string('university_count')->nullable()->change();
        });
    }
};
