<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAcciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idobjetivo')->unsigned();
            $table->text('acc_descripcion');
            $table->date('acc_desde');
            $table->date('acc_hasta');
            $table->decimal('acc_avance',18,2)->default(0.00);      //porcentaje de la accion (Ej. 20%)
            $table->decimal('acc_programado',18,2)->default(0,00);  //porcentaje programado (Ej. 20% -> 100% programado 90%)
            $table->decimal('acc_ejecutado',18,2)->default(0,00);   //porcentaje ejecutado (Ej. de los 90% programado se llego al 80%)
            $table->boolean('acc_estado')->default(true);
            $table->text('acc_observacion');
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
        Schema::drop('acciones');
    }
}
