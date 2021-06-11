<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\Usuario;

class ComentarioController extends Controller
{
    public function registrarCom(Request $data)
    {
        $data->validate(
            [
                'com' => 'required | min:3 | max:1000',
            ]
        );

        $id = session('id');
        $comentario = new Comentario();
        $comentario->fecha_com = $data["fecha"];
        $comentario->hora_com = $data["hora"];
        $comentario->texto_com = $data["com"];
        $comentario->pub_id_com = $data["id"];
        $comentario->user_id_com = $data["id_usuario"];
        $comentario->save();
        $resultadoCom = Comentario::get();
        $resultadoPub = Publicacion::get();
        $resultado = Usuario::get();
        $id_usuario = Usuario::where("id_user", $id)->get();
        return view("publicacion-sesion", ["resultadoPub" => $resultadoPub, "resultadoCom" => $resultadoCom], ["resultado" => $resultado, "id_usuario" => $id_usuario]);
    }

}
