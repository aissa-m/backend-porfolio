<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'institucion',
        'grado',
        'campo_de_estudio',
        'fecha_inicio',
        'fecha_fin',
        'descripcion'
    ];
}
