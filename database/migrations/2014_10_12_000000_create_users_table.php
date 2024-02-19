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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user')->primary();
            $table->string('id_department');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->string('address');
            $table->string('phone_number');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('role', ['admin', 'pegawai'])->default('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
