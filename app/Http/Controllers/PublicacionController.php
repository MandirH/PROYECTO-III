<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function registrarPublicacion(Request $data)
    {
        $publicacion = new Publicacion();
        $publicacion->fecha_pub = $data["fecha"];
        $publicacion->hora_pub = $data["hora"];
        $publicacion->pais_pub = $data["pais"];
        $publicacion->region_pub = $data["region"];
        $publicacion->direc_pub = $data["direccion"];
        $publicacion->texto_pub = $data["texto"];
        $publicacion->tipo_pub = $data["tipo"];
        $publicacion->estado_pub = "Activo";
        $publicacion->usuarios_id_user = $data["usuarios_id_user"];
        $publicacion->save();
        return "Registrado con éxito";
    }
    public function mostrarPublicacion(){
        $resultadoPub = Publicacion::where("usuarios_id_user",1)->get();
        return view("publicacion-sesion", ["resultadoPub"=>$resultadoPub]);
    }
}
