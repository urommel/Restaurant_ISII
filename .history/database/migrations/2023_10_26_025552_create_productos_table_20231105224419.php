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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('tipo'); // 'plato' o 'bebida'
            $table->decimal('precio', 8, 2);
            $table->string('url')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('disponible')->default(true);

            $table->unsignedBigInteger('categorias_id')->nullable();
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('tipos_id');
            $table->foreign('tipos_id')->references('id')->on('tipos');
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
        Schema::dropIfExists('productos');
    }
};
