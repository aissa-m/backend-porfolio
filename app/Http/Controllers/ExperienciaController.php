<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function index()
    {
        $experiencias = Experiencia::all();
        return response()->json($experiencias);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empresa' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
        ]);

        $experiencia = Experiencia::create($validatedData);
        return response()->json($experiencia, 201);
    }

    public function show($id)
    {
        $experiencia = Experiencia::find($id);
        if ($experiencia) {
            return response()->json($experiencia);
        } else {
            return response()->json(['error' => 'Experiencia no encontrada'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'empresa' => 'string|max:255',
            'titulo' => 'string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'nullable|date',
        ]);

        $experiencia = Experiencia::find($id);
        if ($experiencia) {
            $experiencia->update($validatedData);
            return response()->json($experiencia);
        } else {
            return response()->json(['error' => 'Experiencia no encontrada'], 404);
        }
    }

    public function destroy($id)
    {
        $experiencia = Experiencia::find($id);
        if ($experiencia) {
            $experiencia->delete();
            return response()->json(['message' => 'Experiencia eliminada correctamente']);
        } else {
            return response()->json(['error' => 'Experiencia no encontrada'], 404);
        }
    }
}
