<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('image');
            $table->string('description');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
