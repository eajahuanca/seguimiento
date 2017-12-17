<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjecutorProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejecutorprogramaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->integer('idactividad')->unsigned();
            $table->string('form_formulario');
            $table->string('form_mes');
            $table->string('form_mescorresponde');
            $table->integer('form_gestion');
            $table->text('form_descripcion')->nullable();
            $table->string('form_cantidad')->default('0');
            $table->string('form_unidad')->nullable();
            $table->string('form_poblacion')->default('-');
            $table->text('form_tematica')->nullable();
            $table->decimal('form_personas')->default('0.00');
            $table->string('form_apoyo')->default('-');
            $table->string('form_especie')->default('-');
            $table->integer('form_plantin')->default('0');
            $table->decimal('form_proporcion',18,2)->default('0.00');
            $table->decimal('form_area',18,2)->default('0.00');
            $table->string('form_sistema')->default('-');
            $table->integer('form_familia')->default('0');
            $table->decimal('form_programado',18,2)->default('0.00');
            $table->decimal('form_programado2',18,2)->default('0.00');
            $table->decimal('form_avance',18,2)->default('0.00');
            $table->decimal('form_avance2',18,2)->default('0.00');
            $table->decimal('form_acumulado',18,2)->default('0.00');
            $table->decimal('form_acumulado2',18,2)->default('0.00');
            $table->decimal('form_pavance',18,2)->default('0.00');
            $table->decimal('form_pavance2',18,2)->default('0.00');
            $table->decimal('form_saldo',18,2)->default('0.00');
            $table->decimal('form_saldo2',18,2)->default('0.00');
            $table->decimal('form_psaldo',18,2)->default('0.00');
            $table->decimal('form_psaldo2',18,2)->default('0.00');
            $table->decimal('form_saldoanterior',18,2)->default('0.00');
            $table->decimal('form_saldoanterior2',18,2)->default('0.00');
            $table->decimal('form_psaldoanterior',18,2)->default('0.00');
            $table->decimal('form_psaldoanterior2',18,2)->default('0.00');
            $table->text('form_obs')->nullable();
            $table->text('form_obsgeneral')->nullable();
            $table->boolean('form_estado')->default(true);
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
        Schema::drop('ejecutorprogramaciones');
    }
}
