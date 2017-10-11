<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('param_depto');
            $table->string('param_entidad');
            $table->string('param_sigla');
            $table->string('param_unidad');
            $table->string('param_provincia');
            $table->string('param_municipio');
            $table->boolean('param_estado')->default(true);
            $table->integer('id_uregistra')->unsigned();
            $table->integer('id_uactualiza')->unsigned();
            $table->timestamps();

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
        Schema::drop('entidades');
    }
}
