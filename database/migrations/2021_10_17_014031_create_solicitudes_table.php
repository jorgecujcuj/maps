<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idfinca');
            $table->unsignedBigInteger('idpiloto');
            $table->timestamp('fechasolicitada');
            $table->string('telefono',10);
            $table->string('observacion',50);
            $table->timestamps();
            $table->foreign('idfinca')->references('id')->on('fincas');
            $table->foreign('idpiloto')->references('id')->on('pilotos');
            $table->unique(['telefono']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
