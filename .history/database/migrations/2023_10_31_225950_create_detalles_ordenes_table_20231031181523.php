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
            $table->unsignedBigInteger('ordenes_id');
            $table->unsignedBigInteger('platos_id')->nullable();
            $table->unsignedBigInteger('bebida_sid')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('ordenes_id')->references('id')->on('ordenes');
            $table->foreign('platos_id')->references('id')->on('platos');
            $table->foreign('bebidas_id')->references('id')->on('bebidas');
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
