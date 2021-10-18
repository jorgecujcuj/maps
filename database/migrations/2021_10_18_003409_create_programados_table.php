<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idsolicitud');
            $table->string('operador',50);
            $table->string('estado',20);
            $table->unsignedBigInteger('idfinca');
            $table->unsignedBigInteger('idunidad');
            $table->timestamp('salida');
            $table->timestamps();
            $table->foreign('idsolicitud')->references('id')->on('solicitudes');
            $table->foreign('idfinca')->references('id')->on('fincas');
            $table->foreign('idunidad')->references('id')->on('unidades');
            $table->unique(['idsolicitud']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programados');
    }
}
