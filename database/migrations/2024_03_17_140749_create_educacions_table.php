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
        Schema::create('educacions', function (Blueprint $table) {
            $table->id();
            $table->string('institucion');
            $table->string('grado');
            $table->string('campo_de_estudio')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable(); // Puedes hacerlo nullable si aún estás cursando
            $table->text('descripcion')->nullable(); // Para añadir cualquier detalle adicional
            $table->timestamps(); // Crea los campos created_at y updated_at automáticamente
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educacions');
    }
};
