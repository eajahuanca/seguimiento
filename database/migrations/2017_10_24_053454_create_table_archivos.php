<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->string('idcodigo');
            $table->string('ar_estadorecibe');          //estado en el que se recibe
            $table->integer('idurecibe')->unsigned();   //usuario que envia a superiores las solicitudes
            $table->string('ar_estadoenvia');           //nuevo estado de la solicitud
            $table->integer('iduenvia')->unsigned();    //usuario que superior
            $table->string('ar_archivo');
            $table->text('ar_detalle');
            $table->boolean('ar_revisado')->default(false);
            $table->timestamps();

            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
            $table->foreign('idurecibe')->references('id')->on('users');
            $table->foreign('iduenvia')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archivos');
    }
}
