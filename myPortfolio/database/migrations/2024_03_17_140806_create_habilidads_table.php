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
        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre de la habilidad, como "Programación en PHP"
            $table->string('categoria')->nullable(); // Categoría de la habilidad, como "Desarrollo Web" o "Backend"
            $table->enum('nivel', ['Principiante', 'Intermedio', 'Avanzado']); // Nivel de competencia
            $table->timestamps(); // Campos created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habilidads');
    }
};
