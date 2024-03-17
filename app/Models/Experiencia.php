<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $fillable = ['empresa', 'titulo', 'ubicacion', 'descripcion', 'fecha_inicio', 'fecha_fin'];
}
