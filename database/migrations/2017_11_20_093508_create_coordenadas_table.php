<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idobjetivo')->unsigned();
            $table->string('coor_x_origin');
            $table->string('coor_y_origin');
            $table->decimal('coor_x_map',18,10);
            $table->decimal('coor_y_map',18,10);
            $table->boolean('coor_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idobjetivo')->references('id')->on('oespecificos');
            $table->foreign('iduregistra')->references('id')->on('users');
            $table->foreign('iduactualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coordenadas');
    }
}
