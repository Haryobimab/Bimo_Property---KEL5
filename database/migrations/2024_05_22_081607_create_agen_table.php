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
        Schema::create('agen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_agen');
            $table->text('deskripsi_agen');
            $table->string('foto_agen');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->float('rating');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agen');
    }
};
