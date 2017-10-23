<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReglamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_nombre')->unique();
            $table->text('reg_descripcion');
            $table->string('reg_archivo');
            $table->boolean('reg_estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reglamentos');
    }
}
