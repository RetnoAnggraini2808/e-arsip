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
        Schema::create('datask', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sk');
            $table->string('tanggal_sk');
            $table->string('perihal');
            $table->string('nama_file');
            $table->string('jenis_sk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datask');
    }
};
