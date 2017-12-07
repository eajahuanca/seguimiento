<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('pre_anio',20,2);
            $table->decimal('pre_proyecto',20,2)->default(0.00);
            $table->decimal('pre_desembolso',20,2)->default(0.00);
            $table->decimal('pre_acumulado',20,2)->default(0.00); //de desembolsos
            $table->integer('pre_gestion');
            $table->string('pre_archivo');
            $table->text('pre_obs')->nullable();
            $table->string('pre_archivo_modificado')->nullable();
            $table->boolean('pre_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();
           
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
        Schema::drop('presupuestos');
    }
}
