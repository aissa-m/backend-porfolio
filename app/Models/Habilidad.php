<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;
    protected $table = 'habilidades'; // Asegúrate de que esto coincida con el nombre real de tu tabla.

    protected $fillable = [
        'nombre',
        'categoria',
        'nivel',
    ];
}
