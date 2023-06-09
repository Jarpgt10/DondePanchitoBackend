<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        // phpinfo();
        $arr = array();
        $usuario = $request->query('usuario');
        $contrasena = $request->query('contrasena');

        $datos = DB::select("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?", [$usuario, $contrasena]);

        if (count($datos) === 0) {
            return [ "existe" => "0"];
            
        }else{
            return [ "existe" => "1"];
        }

    }


    public function getOrdenes()
    {
        $datos = DB::select("SELECT a.*,b.estado FROM ordenes a
        INNER JOIN cat_estado_orden b ON b.id = a.id_estado_orden");
        return response()->json($datos);
    }


    public function getComidas()
    {
        $datos = DB::select("SELECT * FROM comidas");
        return response()->json($datos);
    }



    
    public function insertOrdenes(Request $request)
    {
        $comida = $request->input('comida');
        $no_orden = $request->input('no_orden');
        $precio = $request->input('precio');
        $nombre_cliente = $request->input('nombre_cliente');
        $id_estado_orden= 1;
        
        // Insertar en la tabla "ordenes"
        DB::table('ordenes')->insert([
            'platillo' => $comida,
            'precio' => $precio,
            'nombre_cliente' => $nombre_cliente,
            'id_estado_orden' => $id_estado_orden
        ]);
        
        return response()->json([
            'success' => true
        ]);
    }

}
