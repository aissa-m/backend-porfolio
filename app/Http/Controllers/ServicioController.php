<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::all();
        return response()->json($servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'nullable|numeric',
            'duracion' => 'nullable|string|max:255',
        ]);

        $servicio = Servicio::create($validatedData);

        return response()->json($servicio, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);

        if ($servicio) {
            return response()->json($servicio);
        } else {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
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
        $validatedData = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'precio' => 'nullable|numeric',
            'duracion' => 'nullable|string|max:255',
        ]);

        $servicio = Servicio::find($id);

        if ($servicio) {
            $servicio->update($validatedData);
            return response()->json($servicio);
        } else {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);

        if ($servicio) {
            $servicio->delete();
            return response()->json(['message' => 'Servicio eliminado correctamente']);
        } else {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
    }
}
