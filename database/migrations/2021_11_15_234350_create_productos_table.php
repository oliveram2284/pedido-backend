<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->string('nombre');
            $table->string('imagen')->nullable(true);
            $table->tinyText('resumen')->nullable(true);
            $table->mediumText('descripcion')->nullable(true);
            $table->integer('cantidad')->default(0);
            $table->decimal('precio_unitario',15,4)->default(0);
            $table->tinyInteger('estado')->default(0);
            $table->timestamps();

            // Relacion con tabla empresa
            $table->foreign('empresa_id')->references('id')->on('empresas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
