<?php

namespace App\Http\Controllers;
use App\Models\Educacion;
use Illuminate\Http\Request;

class EducacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educacion = Educacion::all();
        return response()->json($educacion);
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
        $validateData = $request->validate([
            'institucion' => 'required|string|max:255',
            'grado' => 'required|string|max:255',
            'campo_de_estudio' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string'
        ]);
        $educacion = Educacion::create($validateData);
        return response()->json($educacion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educacion = Educacion::find($id);
        if($educacion){
            return response()->json($educacion);
        }else{
            return response()->json(['error'=>'Educacion no encontrada']);
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
        $validateData = $request->validate([
            'institucion' => 'required|string|max:255',
            'grado' => 'required|string|max:255',
            'campo_de_estudio' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string'
        ]);

        $educacion = Educacion::find($id);
        if(!$educacion){
            return response()->json(['error' => 'Educación no encontrada']);
        }

        $educacion->update($validateData);
        return response()->json($educacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educacion = Educacion::find($id);
        if(!$educacion){
            return response()->json(['error' => 'Educacion no encontrada']);
        }

        $educacion->delete();
        return response()->json(['message' => 'Educaion eliminada con éxito!']);
    }
}
