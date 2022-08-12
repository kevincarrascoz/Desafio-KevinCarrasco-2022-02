<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Canciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('canciones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('album_id')->unsigned();
            $table->bigInteger('artista_id')->unsigned();
            $table->bigInteger('genero_id')->unsigned();
            $table->string('nombre');
            $table->string('duracion');
            $table->string('foto');
            $table->string('mp3');
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete("cascade");
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete("cascade");
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
