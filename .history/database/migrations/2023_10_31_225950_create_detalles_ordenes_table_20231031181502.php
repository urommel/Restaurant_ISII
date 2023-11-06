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
        Schema::create('detalles_ordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('plato_id')->nullable();
            $table->unsignedBigInteger('bebida_id')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('ordenes_id')->references('id')->on('ordenes');
            $table->foreign('plato_id')->references('id')->on('platos');
            $table->foreign('bebida_id')->references('id')->on('bebidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_ordenes');
    }
};
