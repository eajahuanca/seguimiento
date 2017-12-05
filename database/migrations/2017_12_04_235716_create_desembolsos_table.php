<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desembolsos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->string('idcodigo');
            $table->integer('idcronograma')->unsigned();
            $table->integer('idusolicita')->unsigned();
            $table->date('des_fecha_solicitud');
            $table->decimal('des_monto_solicitado',20,2);
            $table->string('des_archivo_solicitud')->nullable();
            $table->string('des_archivo_nombre_sol')->nullable();
            $table->integer('iduaprueba')->unsigned();
            $table->date('des_fecha_aprobacion')->default('0000-00-00');
            $table->decimal('des_monto_aprobado',20,2)->default('0.00');
            $table->string('des_archivo_aprobado')->nullable();
            $table->string('des_archivo_nombre_apro')->nullable();
            $table->boolean('des_estado')->default(true);
            $table->timestamps();

            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
            $table->foreign('idcronograma')->references('id')->on('cronogramas');
            $table->foreign('idusolicita')->references('id')->on('users');
            $table->foreign('iduaprueba')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('desembolsos');
    }
}
