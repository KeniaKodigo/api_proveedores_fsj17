<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * id_estado = 1 (activo)
     * id_estado = 2 (inactivo)
     */
    public function index(){
        //proveedores activos
        /**
         * select * from proveedores where id_estado = 1
         * all() => select * from table
         */
        $proveedores = Proveedores::where('id_estado','=',1)->select('*')->get();

        /**
         * status 200, 400, 404, 500
         */
        $json = array(
            "status" => 200,
            "detalle" => $proveedores
        );
        /**
         * json_encode: convertir un arreglo a json
         * json_decode: un json lo convierte en arreglo
         * 
         * API => OBTENER INFORMACION 
         * API REST => CRUD COMPLETO DE LA INFORMACION (get, post, put, delete, patch)
         */
        return json_encode($json, true);
    }

    #guardando un proveedor
    public function store(Request $request){
        //post('')

        $datos = array(
            "nombre" => $request->input('nombre'),
            "direccion" => $request->input('direccion'),
            "telefono" => $request->input('telefono'),
            "correo" => $request->input('correo')
        );

        //validando datos
        //empty => verifica si los campos estan vacios
        if(!empty($datos)){

            //insert into table ()...
            $proveedor = new Proveedores();
            $proveedor->nombre = $datos['nombre'];
            $proveedor->direccion = $datos['direccion'];
            $proveedor->telefono = $datos['telefono'];
            $proveedor->correo = $datos['correo'];
            $proveedor->id_estado = 1;
            $proveedor->save();

            $json = array(
                "status" => 200,
                "detalle" => "Proveedor se ha registrado exitosamente"
            );

        }else{
            $json = array(
                "status" => 400,
                "detalle" => "Por favor llena todos los campos"
            );
        }

        return json_encode($json, true); //php puro
    }

    public function obtenerById($id){
        //select * from proveedores where id = 5
        $proveedor = Proveedores::find($id); //{}

        if(empty($proveedor)){
            return response()->json(["status" => 400, "detalle" => "No se encontro"]);
        }else{
            return response()->json($proveedor); //laravel
        }
        
    }

    #actualizar proveedor
    public function update(Request $request, $id){
        $datos = array(
            "nombre" => $request->input('nombre'),
            "direccion" => $request->input('direccion'),
            "telefono" => $request->input('telefono'),
            "correo" => $request->input('correo')
        );

        if(!empty($datos)){
            //select * from proveedor where id = ? => find()
            $proveedor = Proveedores::find($id);
            $proveedor->nombre = $datos['nombre'];
            $proveedor->direccion = $datos['direccion'];
            $proveedor->telefono = $datos['telefono'];
            $proveedor->correo = $datos['correo'];
            $proveedor->update();

            $json = array(
                "status" => 200,
                "detalle" => "Se ha actualizado correctamente"
            );
        }else{
            $json = array(
                "status" => 400,
                "detalle" => "Por favor llena todos los campos"
            );
        }

        return json_encode($json, true);
    }

    #Pendiente, crear el metodo donde el proveedor cambia de estado (inactivo)
    public function desactivar($id){
        /**
         * actualizemos el estado del proveedor con id 5
         * UPDATE proveedores SET id_estado = 2 WHERE id = ?
         */
        $proveedor = Proveedores::find($id); //select * from proveedores where id = ?
        $proveedor->id_estado = 2;
        $proveedor->update();

        $json = array(
            "status" => 200,
            "detalle" => "El proveedor esta inactivo"
        );

        return json_encode($json, true);
    }
}
