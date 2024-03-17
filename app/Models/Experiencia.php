<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    // Lista todos los campos que desees que sean asignables masivamente
    protected $fillable = ['empresa', 'titulo', 'ubicacion', 'descripcion', 'fecha_inicio', 'fecha_fin'];

    // Utiliza esta línea si estás utilizando eliminaciones suaves (soft deletes)
    // use Illuminate\Database\Eloquent\SoftDeletes;

    // Si tu tabla tiene un nombre diferente, asegúrate de especificarlo
    // protected $table = 'tu_nombre_de_tabla_personalizado';
}
