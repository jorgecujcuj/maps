<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idprogramado');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('abastecida');
            $table->string('descripcion');
            $table->timestamps();
            $table->foreign('idprogramado')->references('id')->on('programados');
            $table->unique(['idprogramado']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmaciones');
    }
}
