<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFincasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fincas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',12);
            $table->string('nombre',50);
            $table->string('administracion',60);
            $table->unsignedBigInteger('idruta')->nullable();
            $table->timestamps();
            $table->foreign('idruta')->references('id')->on('rutas');
            $table->unique(['codigo', 'nombre']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fincas');
    }
}
