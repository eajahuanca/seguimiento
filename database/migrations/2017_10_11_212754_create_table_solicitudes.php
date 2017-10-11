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
            $table->string('proy_codigo')->unique();
            $table->string('proy_hrsigec');
            $table->string('proy_tipo');
            $table->string('proy_nombre');
            $table->text('proy_objetivo');
            $table->text('proy_justicacion');
            $table->integer('id_entidad')->unsigned();
            $table->string('proy_entidad');
            $table->string('proy_sigla');
            $table->string('proy_unidad');
            $table->string('proy_depto');
            $table->string('proy_provincia');
            $table->string('proy_municipio');
            $table->integer('id_responsable')->unsigned();
            $table->decimal('proy_montofona',18,2);
            $table->decimal('proy_montosol',18,2);
            $table->integer('proy_tiempo')->default(0);
            $table->string('proy_respaldo');
            $table->string('proy_estado');
            $table->integer('id_uregistra')->unsigned();
            $table->integer('id_uactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('id_entidad')->references('id')->on('entidades');
            $table->foreign('id_responsable')->references('id')->on('users');
            $table->foreign('id_uregistra')->references('id')->on('users');
            $table->foreign('id_uactualiza')->references('id')->on('users');
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
