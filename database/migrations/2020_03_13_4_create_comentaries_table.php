<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentaries', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->text('comentario');
        $table->string('estrellas',1);
        $table->tinyInteger('aprobado');

        $table->bigInteger('id_users')->unsigned();
        $table->foreign('id_users')->references('id')->on('users');

        $table->bigInteger('id_restaurants')->unsigned();
        $table->foreign('id_restaurants')->references('id')->on('restaurants');

        $table->SoftDeletes();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentaries');
    }
}
