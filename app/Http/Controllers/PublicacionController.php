<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Usuario;
use App\Models\Comentario;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComentarioController;

class PublicacionController extends Controller
{
    public function registrarPublicacion(Request $data)
    {
        $data->validate(
            [
                'pais'=>'required | min:3 | max:100 | alpha',
                'region'=>'required | min:3 | max:100 | alpha',
                'direccion'=>'required | min:3 | max:100',
                'texto'=>'required | min:3 | max:1000',
                'tipo'=>'required | min:3 | max:45',
                'img' =>'mimes:jpeg,bmp,png,jpg | max:2048',
            ]
        );
        $id = session('id');

        if($data["img"]==""){
            $publicacion = new Publicacion();
            $publicacion->fecha_pub = $data["fecha"];
            $publicacion->hora_pub = $data["hora"];
            $publicacion->pais_pub = $data["pais"];
            $publicacion->region_pub = $data["region"];
            $publicacion->direc_pub = $data["direccion"];
            $publicacion->texto_pub = $data["texto"];
            $publicacion->tipo_pub = $data["tipo"];
            $publicacion->img_pub = $data["img"];
            $publicacion->estado_pub = "Activo";
            $publicacion->usuarios_id_user = $data["usuarios_id_user"];
            $publicacion->save();
            $mensaje = "Publicado con éxito";
            $resultadoPub = Publicacion::get();
            $resultadoCom = Comentario::get();
            $resultado = Usuario::get();
            $id_usuario=Usuario::where("id_user", $id)->get();
            return view("publicacion-sesion", ["resultadoPub"=>$resultadoPub, "mensaje"=>$mensaje, "resultadoCom" => $resultadoCom], ["resultado"=>$resultado, "id_usuario"=>$id_usuario]);
        }else{
            $file = $data["img"];
            $nombre =  time()."_".$file->getClientOriginalName();
            if(strlen($nombre)<=60){
                \Storage::disk('public')->put($nombre,  \File::get($file));

                $publicacion = new Publicacion();
                $publicacion->fecha_pub = $data["fecha"];
                $publicacion->hora_pub = $data["hora"];
                $publicacion->pais_pub = $data["pais"];
                $publicacion->region_pub = $data["region"];
                $publicacion->direc_pub = $data["direccion"];
                $publicacion->texto_pub = $data["texto"];
                $publicacion->tipo_pub = $data["tipo"];
                $publicacion->img_pub = $nombre;
                $publicacion->estado_pub = "Activo";
                $publicacion->usuarios_id_user = $data["usuarios_id_user"];
                $publicacion->save();
                $mensaje = "Publicado con éxito";
                $resultadoPub = Publicacion::get();
                $resultadoCom = Comentario::get();
                $resultado = Usuario::get();
                $id_usuario=Usuario::where("id_user", $id)->get();
                return view("publicacion-sesion", ["resultadoPub"=>$resultadoPub, "mensaje"=>$mensaje, "resultadoCom" => $resultadoCom], ["resultado"=>$resultado, "id_usuario"=>$id_usuario]);
            }else{
                $mensaje = "El numero de caracteres debe ser menor a 49";
                return redirect()->route('perfil', $mensaje);
            }
        }
    }
    public function mostrarPublicacion(){
        $id = session('id');
        $resultadoPub = Publicacion::get();
        $resultado = Usuario::get();
        $resultadoCom = Comentario::get();
        $id_usuario=Usuario::where("id_user", $id)->get();
        return view("publicacion-sesion", ["resultadoPub"=>$resultadoPub, "resultadoCom"=>$resultadoCom], ["resultado"=>$resultado, "id_usuario"=>$id_usuario]);
    }
}
