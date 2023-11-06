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
        Schema::create('bebidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('tipoBebida');
            $table->decimal('precio', 8, 2);
            $table->string('urlBebida')->nullable();
            $table->integer('stock')->default(0); // Si también manejas stock para bebidas
            // $table->string('categoria');
            $table->boolean('disponible')->default(true);

            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
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
        Schema::dropIfExists('bebidas');
    }
};
