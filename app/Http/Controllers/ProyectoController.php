<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all(); // Recuperar todos los proyectos
        return response()->json($proyectos); // Devolver los proyectos en formato JSON
    }

    public function searchByTechnology(Request $request)
    {
        $tecnologia = $request->input('tecnologia'); // Recibe la tecnología a buscar
        $proyectos = Proyecto::where('tecnologias', 'like', '%' . $tecnologia . '%')->get();
        return response()->json($proyectos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del request
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tecnologias' => 'required|string', // Ajusta esta validación si estás usando un formato diferente
            'imagen' => 'nullable|string|max:255',
            'enlace' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        // Creación del proyecto
        $proyecto = Proyecto::create($validatedData);

        // Retornar la respuesta: el proyecto creado y un código de estado HTTP 201
        return response()->json($proyecto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        if ($proyecto) {
            return response()->json($proyecto);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos del request
        $validatedData = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'tecnologias' => 'string', // Ajusta esta validación si estás usando un formato diferente
            'imagen' => 'nullable|string|max:255',
            'enlace' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si el proyecto no existe, retornar un error
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        // Actualizar el proyecto con los datos validados
        $proyecto->update($validatedData);

        // Retornar el proyecto actualizado
        return response()->json($proyecto);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si el proyecto no existe, retornar un error
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        // Eliminar el proyecto
        $proyecto->delete();

        // Retornar una respuesta para indicar que la eliminación fue exitosa
        return response()->json(['message' => 'Proyecto eliminado correctamente']);
    }

}
