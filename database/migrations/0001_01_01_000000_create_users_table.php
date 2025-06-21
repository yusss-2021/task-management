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
        // Tabel roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('name');
        });

        // Tabel divisions
        Schema::create('divisions', function (Blueprint $table) {
            $table->id('division_id');
            $table->string('name');
        });

        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Primary key diganti user_id
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('division_id')->nullable();

            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('division_id')->references('division_id')->on('divisions');
        });

        // Password reset
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Session
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('divisions');
    }
};
