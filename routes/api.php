<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\ServicioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('experiencias', ExperienciaController::class);
Route::apiResource('educaciones', EducacionController::class);
Route::apiResource('habilidades', HabilidadController::class);
Route::apiResource('servicios', ServicioController::class);


Route::get('/proyectos', [ProyectoController::class, 'index']);
Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
Route::post('/proyectos/crear', [ProyectoController::class, 'store']);
Route::patch('/proyectos/modificar/{id}', [ProyectoController::class, 'update']);
Route::delete('/proyectos/eliminar/{id}', [ProyectoController::class, 'destroy']);
// Route::get('/proyectos/buscarPorTecnologia', [ProyectoController::class, 'searchByTechnology']);

// Rutas para servicios
Route::get('/servicios', [ServicioController::class, 'index']);
Route::get('/servicios/{id}', [ServicioController::class, 'show']);
Route::post('/servicios/crear', [ServicioController::class, 'store']);
Route::patch('/servicios/modificar/{id}', [ServicioController::class, 'update']);
Route::delete('/servicios/eliminar/{id}', [ServicioController::class, 'destroy']);


// Rutas para educación
Route::get('/educaciones', [EducacionController::class, 'index']);
Route::get('/educaciones/{id}', [EducacionController::class, 'show']);
Route::post('/educaciones/crear', [EducacionController::class, 'store']);
Route::patch('/educaciones/modificar/{id}', [EducacionController::class, 'update']);
Route::delete('/educaciones/eliminar/{id}', [EducacionController::class, 'destroy']);

