<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreE')->unique();
            $table->string('Nombre');
            $table->string('ApellidoP');
            $table->string('ApellidoM');
            $table->char('Pago',1);
            $table->string('Logo');
            $table->integer('Grupo_id')->unsigned();


            $table->foreign('Grupo_id')->references('id')->on('grupos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
