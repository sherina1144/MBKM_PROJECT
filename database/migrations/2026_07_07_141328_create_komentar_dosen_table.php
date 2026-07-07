<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komentar_dosen', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('progress_id');

            $table->unsignedBigInteger('dosen_id');

            $table->text('komentar');

            $table->timestamps();

            $table->foreign('progress_id')
                ->references('id')
                ->on('progress_mbkm')
                ->onDelete('cascade');

            $table->foreign('dosen_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_dosen');
    }
};
