<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 20)->nullable()->unique();
            $table->string('name', 100);
            $table->string('study_program', 50);
            $table->string('phone', 20);
            $table->string('password', 255);
            $table->enum('role', ['Mahasiswa', 'Admin Fakultas', 'Admin Kemahasiswaan']);
            $table->boolean('is_approved')->default(true);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
