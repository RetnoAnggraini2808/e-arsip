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
        Schema::create('datamemo', function (Blueprint $table) {
            $table->id();
            $table->string('kode_memo');
            $table->string('tanggal_memo');
            $table->string('perihal');
            $table->string('nama_file');
            $table->unsignedBigInteger('jenis_memo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datamemo');
    }
};
