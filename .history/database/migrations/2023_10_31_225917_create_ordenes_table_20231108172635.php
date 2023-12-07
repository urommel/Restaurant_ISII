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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('mesero');
            $table->integer('numero_mesa');
            $table->unsignedBigInteger('clients_id')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('ordenes');
    }
};
