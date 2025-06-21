<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_division_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('user_id');

            $table->integer('progress_percent')->nullable();        // untuk design & pengadaan
            $table->integer('jumlah_selesai')->nullable();          // untuk penjahit & pengemasan
            $table->string('file_url')->nullable();                 // gambar desain / bukti kain
            $table->enum('status', ['pending', 'done', 'acc_admin'])->nullable(); // status admin
            $table->text('note')->nullable();                       // catatan dari/to admin
            $table->timestamps();

            // Foreign keys
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('division_id')->references('division_id')->on('divisions');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->unique(['task_id', 'division_id']); // 1 divisi hanya 1 progress per task
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_division_progress');
    }
};
