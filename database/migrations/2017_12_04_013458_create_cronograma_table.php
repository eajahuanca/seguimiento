<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->string('idcodigo');
            $table->decimal('cro_desembolso',20,2)->default(0.00);
            $table->date('cro_fecha_desembolso')->default('0000-00-00');
            $table->string('cro_mes');
            $table->string('cro_mes_correspondiente')->nullable();
            $table->decimal('cro_programado',20,2);
            $table->decimal('cro_ejecutado',20,2)->default(0.00);
            $table->decimal('cro_total_ejecutado',20,2)->default(0.00);
            $table->decimal('cro_total_ejecutado_por',20,2)->default(0.00);
            $table->decimal('cro_saldo',20,2)->default(0.00);
            $table->decimal('cro_saldo_por',20,2)->default(0.00);
            $table->decimal('cro_saldo_anterior',20,2)->default(0.00);
            $table->decimal('cro_saldo_anterior_por',20,2)->default(0.00);
            $table->boolean('cro_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
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
        Schema::drop('cronogramas');
    }
}
