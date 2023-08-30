<?php

use App\Http\Controllers\ProveedoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/proveedores_activos',[ProveedoresController::class, 'index']);

Route::post('/registrar_proveedor', [ProveedoresController::class, 'store']);

Route::put('/actualizar_proveedor/{id}', [ProveedoresController::class, 'update']);

Route::put('/desactivar_proveedor/{id}', [ProveedoresController::class, 'desactivar']);

Route::get('/proveedorById/{id}', [ProveedoresController::class, 'obtenerById']);