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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del servicio, como "Desarrollo de sitios web"
            $table->text('descripcion'); // Una descripción detallada de lo que implica el servicio
            $table->decimal('precio', 8, 2)->nullable(); // Precio del servicio, ajusta la precisión y escala según tus necesidades
            $table->string('duracion')->nullable(); // Duración estimada del servicio, por ejemplo "2 semanas"
            $table->timestamps(); // Campos created_at y updated_at automáticamente generados por Laravel
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
