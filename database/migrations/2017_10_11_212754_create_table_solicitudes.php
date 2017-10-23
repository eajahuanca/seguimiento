<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSolicitudes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sol_codigo')->unique();
            $table->string('sol_hrsigec');
            $table->string('sol_tipo');
            $table->string('sol_nombre');
            $table->text('sol_objetivo');
            $table->text('sol_justicacion');
            $table->integer('identidad')->unsigned();
            $table->string('sol_sigla');
            $table->integer('iddepto')->unsigned();
            $table->integer('idprovincia')->unsigned();
            $table->string('sol_municipio');
            $table->integer('idresponsable')->unsigned();
            $table->decimal('sol_montofona',18,2);
            $table->decimal('sol_montosol',18,2);
            $table->decimal('sol_montootro',18,2);
            $table->integer('sol_tiempo')->default(0);
            $table->integer('idreglamento')->unsigned();
            $table->string('sol_respaldo');
            $table->string('sol_ftecnica');
            $table->enum('sol_estado', ['DEVUELTO','TRANSCRIPCION','APROBADO']);
            $table->text('sol_componente');
            $table->integer('iduregistra')->unsigned();
            $table->integer('iduactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idresponsable')->references('id')->on('users');
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
        Schema::drop('solicitudes');
    }
}
