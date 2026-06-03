<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE achievements MODIFY status ENUM('Draft', 'Tunda', 'Diterima', 'Ditolak') NOT NULL DEFAULT 'Draft'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("UPDATE achievements SET status = 'Tunda' WHERE status IN ('Draft', 'Ditolak')");
        DB::statement("ALTER TABLE achievements MODIFY status ENUM('Tunda', 'Diterima') NOT NULL DEFAULT 'Tunda'");
    }
};
