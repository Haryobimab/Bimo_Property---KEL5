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
            $table->string('nama_properti');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('juals');
    }
}
