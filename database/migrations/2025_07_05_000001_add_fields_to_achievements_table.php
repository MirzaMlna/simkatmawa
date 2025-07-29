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
            $table->text('keterangan')->nullable()->after('status');
            $table->enum('perwakilan_uniska', ['Ya', 'Tidak'])->nullable()->after('keterangan');
            $table->string('nama_ormawa')->nullable()->after('perwakilan_uniska');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn(['keterangan', 'perwakilan_uniska', 'nama_ormawa']);
        });
    }
};
