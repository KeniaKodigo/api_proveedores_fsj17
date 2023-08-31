<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario_fechas', [PDFController::class, 'obtenerVistaFecha']);
Route::post('/reporte_fechas', [PDFController::class, 'generarReporteFecha'])->name('reporte');