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
        Schema::create('janji_temus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->date('tanggal');
            $table->time('jam');
            $table->text('pesan');
            $table->string('property')->nullable();
            $table->enum('status', [
                'pending', 
                'approved', 
                'rejected', 
                'canceled', 
                'completed', 
                'rescheduled'
            ])->default('pending');
            $table->foreignId('agen_id')->constrained('agen');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_temus');
    }
};
