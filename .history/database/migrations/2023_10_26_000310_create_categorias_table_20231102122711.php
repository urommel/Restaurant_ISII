<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->id();
    $table->string('nombre');
    $table->enum('tipo', ['bebida', 'plato', 'materia prima']);
    $table->text('descripcion')->nullable(); // Agrega esta línea para la columna 'descripcion'
    $table->timestamps();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
