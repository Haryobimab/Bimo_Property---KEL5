<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualImagesTable extends Migration
{
    public function up()
    {
        Schema::create('jual_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jual_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('jual_id')->references('id')->on('juals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jual_images');
    }
}
