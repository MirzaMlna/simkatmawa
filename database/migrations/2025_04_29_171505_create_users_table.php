<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 10)->nullable()->unique();
            $table->string('nidn', 20)->nullable()->unique();
            $table->string('name', 100);
            $table->string('password', 255);
            $table->enum('role', ['Mahasiswa', 'Admin Fakultas', 'Admin Kemahasiswaan']);
            $table->boolean('is_approved');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nim')->references('nim')->on('students')->onDelete('cascade');
            $table->foreign('nidn')->references('nidn')->on('admins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
