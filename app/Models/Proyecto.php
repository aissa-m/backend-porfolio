<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tecnologias',
        'imagen',
        'enlace',
        'fecha_inicio',
        'fecha_fin',
    ];
}
