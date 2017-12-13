<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjecutorCronogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejecutorcronogramas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->string('idcite');
            $table->string('eje_mes');
            $table->string('eje_corresponde');
            $table->text('eje_descripcion');
            $table->date('eje_desde')->default('0000-00-00');
            $table->date('eje_hasta')->default('0000-00-00');
            $table->decimal('eje_monto',18,2)->default('0.00');
            $table->integer('eje_empleo')->default('0');
            $table->text('eje_obs')->nullable();
            $table->enum('eje_ejecutado',['SI','NO'])->default('NO');
            $table->boolean('eje_estado')->default(true);
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('iduregistra')->references('id')->on('users');
            $table->foreign('iduactualiza')->references('id')->on('users');
            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ejecutorcronogramas');
    }
}
