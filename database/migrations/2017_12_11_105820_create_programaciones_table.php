<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->integer('idactividad')->unsigned();
            $table->text('pro_descripcion');
            $table->string('pro_unidad');
            $table->string('pro_cantidad');
            $table->string('pro_mes');
            $table->string('pro_poblacion');
            $table->string('pro_tematica');
            $table->string('pro_personas');
            $table->string('pro_material');
            $table->text('pro_obs');
            $table->boolean('pro_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
            $table->foreign('idactividad')->references('id')->on('actividades');
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
        Schema::drop('programaciones');
    }
}
