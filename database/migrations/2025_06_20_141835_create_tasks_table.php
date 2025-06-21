<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id'); // Primary key
            $table->string('nama_task');
            $table->string('warna');
            $table->integer('jumlah');
            $table->date('waktu_pengerjaan');
            $table->string('ukuran')->nullable();
            $table->integer('progress')->default(0);
            $table->unsignedBigInteger('owner_id'); // FK ke customers
            $table->timestamps();

            // Foreign Key
            $table->foreign('owner_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

