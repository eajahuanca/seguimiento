<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoricoSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_entidad')->unsigned();
            $table->string('sol_codigo');
            $table->string('sol_hrsigec');
            $table->string('sol_nombre');
            $table->text('sol_objetivo');
            $table->text('sol_justificacion');
            $table->integer('sol_responsable')->unsigned();
            $table->decimal('sol_montofona',18,2);
            $table->decimal('sol_montosol',18,2);
            $table->decimal('sol_tiempo',18,2);
            $table->decimal('id_uregistra',18,2);
            $table->timestamps();

            $table->foreign('id_entidad')->references('id')->on('entidades');
            $table->foreign('sol_responsable')->references('id')->on('users');
            $table->foreign('id_uregistra')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historicos');
    }
}
