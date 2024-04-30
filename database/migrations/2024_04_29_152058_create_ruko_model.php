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

        Schema::create('beliruko', function (Blueprint $table) {
            $table->id();
            $table->string('Nama Ruko');
            $table->string('img')->default('/IMG/inspirasi1.jpeg');
            $table->string('informasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beliruko');
    }
};
