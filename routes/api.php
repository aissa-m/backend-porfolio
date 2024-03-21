<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Rutas públicas (no protegidas)
Route::get('/proyectos', [ProyectoController::class, 'index']);
Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
Route::get('/experiencias', [ExperienciaController::class, 'index']);
Route::get('/experiencias/{id}', [ExperienciaController::class, 'show']);
Route::get('/educaciones', [EducacionController::class, 'index']);
Route::get('/educaciones/{id}', [EducacionController::class, 'show']);
Route::get('/habilidades', [HabilidadController::class, 'index']);
Route::get('/habilidades/{id}', [HabilidadController::class, 'show']);
Route::get('/servicios', [ServicioController::class, 'index']);
Route::get('/servicios/{id}', [ServicioController::class, 'show']);

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {

});
Route::post('/proyectos', [ProyectoController::class, 'store']);
Route::patch('/proyectos/{id}', [ProyectoController::class, 'update']);
Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy']);

Route::post('/experiencias', [ExperienciaController::class, 'store']);
Route::patch('/experiencias/{id}', [ExperienciaController::class, 'update']);
Route::delete('/experiencias/{id}', [ExperienciaController::class, 'destroy']);

Route::post('/educaciones', [EducacionController::class, 'store']);
Route::patch('/educaciones/{id}', [EducacionController::class, 'update']);
Route::delete('/educaciones/{id}', [EducacionController::class, 'destroy']);

Route::post('/habilidades', [HabilidadController::class, 'store']);
Route::patch('/habilidades/{id}', [HabilidadController::class, 'update']);
Route::delete('/habilidades/{id}', [HabilidadController::class, 'destroy']);

Route::post('/servicios', [ServicioController::class, 'store']);
Route::patch('/servicios/{id}', [ServicioController::class, 'update']);
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy']);

Route::post('/contact', [ContactController::class, 'send']);
