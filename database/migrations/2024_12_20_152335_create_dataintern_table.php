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
        Schema::create('dataintern', function (Blueprint $table) {
            $table->id();
            $table->string('kode_suratintern');
            $table->string('tanggal_suratintern');
            $table->string('perihal');
            $table->string('nama_file');
            $table->unsignedBigInteger('jenis_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataintern');
    }
};
