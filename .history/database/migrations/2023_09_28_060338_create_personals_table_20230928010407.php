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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('apellido');
            // $table->string('direccion')->nullable();
            $table->string('phone');
            $table->string('dni')->unique();
            // $table->string('cargo');
            $table->decimal('salario', 10, 2); // Ejemplo de un campo de salario
            $table->date('fecha_inicio');
            $table->unsignedBigInteger('user_id');//id del usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relacion con la tabla users
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
        Schema::dropIfExists('personals');
    }
};
