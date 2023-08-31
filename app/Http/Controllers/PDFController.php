<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function obtenerVistaFecha(){
        return view('formularioFechas');
    }

    public function generarReporteFecha(Request $request){
        $fecha_inicio = $request->post('fecha_inicio');
        $fecha_final = $request->post('fecha_final');
        //echo $fecha_inicio;
        /**
         * SELECT * FROM productos WHERE fecha BETWEEN '2023-08-01' AND '2023-08-32';
         */
        $productos = Productos::select('*')->whereBetween('fecha', [$fecha_inicio, $fecha_final])->get();

        //print_r($productos);
        $pdf = PDF::loadView('reporte', compact('productos'));
        return $pdf->stream('reporte.pdf');
    }
}
