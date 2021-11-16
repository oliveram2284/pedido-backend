<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion',200)->nullable(true);
            $table->string('telefono',20)->nullable(true);
            $table->string('celular',15)->nullable(true);
            $table->string('imagen')->nullable(true);
            $table->unsignedBigInteger('rubro_id');
            $table->tinyInteger('estado')->default(0);
            $table->timestamps();
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
