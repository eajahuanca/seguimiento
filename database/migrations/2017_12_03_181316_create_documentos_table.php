<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsolicitud')->unsigned();
            $table->string('idcodigo');
            $table->enum('doc_tipo',['ITCP-MAE',
                                    'ITCP-FONABOSQUE',
                                    'EDTP-EJECUTOR',
                                    'EDTP-MAE',
                                    'SISIN-WEB',
                                    'VIPFE',
                                    'SIGEP',
                                    'LICENCIA-AMBIENTAL',
                                    'ABT',
                                    'APERTURA-LIBRETA',
                                    'COORDINADOR-PROYECTOR',
                                    'INFORMES-TECNICOS-FONABOSQUE',
                                    'REGLAMENTO-OPERATIVO',
                                    'VERIFICACION-CONDICIONES-PREVIAS',
                                    'SOLICITUD-TRANSFERENCIA-BDP',
                                    'INFORME-CPYEP'
                                ]);
            $table->string('doc_archivo');
            $table->string('doc_nombre');
            $table->string('doc_codigo')->default('SIN CODIGO');
            $table->boolean('doc_estado')->default(true);
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
        Schema::drop('documentos');
    }
}
