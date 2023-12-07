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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('client_id');
            $table->dateTime('reservation_datetime');
            // $table->integer('duration_minutes')->nullable(); // Duración de la reserva en minutos
            $table->text('notes')->nullable(); // Notas adicionales para la reserva
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Estado de la reserva

            $table->timestamps();

            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
