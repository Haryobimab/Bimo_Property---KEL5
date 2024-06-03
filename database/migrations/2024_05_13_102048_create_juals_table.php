<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualsTable extends Migration
{
    public function up()
    {
        Schema::create('juals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->integer('harga');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->integer('garasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('juals');
    }
}
