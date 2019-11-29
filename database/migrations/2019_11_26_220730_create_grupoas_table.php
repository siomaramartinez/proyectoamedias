<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Total')->nullable($value = true);
            $table->integer('PG')->nullable($value = true);
            $table->integer('PP')->nullable($value = true);
            $table->integer('PE')->nullable($value = true);
            $table->integer('PJ')->nullable($value = true);
            $table->integer('GO')->nullable($value = true);
            $table->timestamp('Juegos')->nullable($value = true);
            $table->unsignedBigInteger('equipo_id');


            $table->foreign('equipo_id')->references('id')->on('equipos')
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
        Schema::dropIfExists('grupoas');
    }
}
