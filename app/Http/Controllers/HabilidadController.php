<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Habilidad;

class HabilidadController extends Controller
{
    public function index()
    {
        $habilidades = Habilidad::all();
        return response()->json($habilidades);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255'
        ]);

        $habilidad = Habilidad::create($validatedData);
        return response()->json($habilidad, 201);
    }

    public function show($id)
    {
        $habilidad = Habilidad::find($id);
        if ($habilidad) {
            return response()->json($habilidad);
        } else {
            return response()->json(['error' => 'Habilidad no encontrada'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $habilidad = Habilidad::find($id);

        if ($habilidad) {
            $validatedData = $request->validate([
                'nombre' => 'string|max:255',
                'nivel' => 'string|max:255',
                'categoria' => 'nullable|string|max:255'
            ]);

            $habilidad->update($validatedData);
            return response()->json($habilidad);
        } else {
            return response()->json(['error' => 'Habilidad no encontrada'], 404);
        }
    }

    public function destroy($id)
    {
        $habilidad = Habilidad::find($id);
        if ($habilidad) {
            $habilidad->delete();
            return response()->json(['message' => 'Habilidad eliminada correctamente']);
        } else {
            return response()->json(['error' => 'Habilidad no encontrada'], 404);
        }
    }
}
