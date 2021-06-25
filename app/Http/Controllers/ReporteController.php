<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\Usuario;
use App\Models\Reporte;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function registrarRe(Request $data)
    {
        $data->validate(
            [
                'texto' => 'required | min:3 | max:1000',
            ]
        );

        $id = session('id');
        $reporte = new Reporte();
        $reporte->usuario_re = $data["usuario"];
        $reporte->autor_re = $data["autor"];
        $reporte->publicacion_re = $data["publicacion"];
        $reporte->comentario_re = "";
        $reporte->texto_re = $data["texto"];
        $reporte->estado_re = "Activo";
        $reporte->id_usuario_re = $data["id_user_re"];
        $reporte->save();
        $mensaje = "Reporte enviado con éxito";
        $resultadoCom = Comentario::get();
        $resultadoPub = Publicacion::get();
        $resultado = Usuario::get();
        $id_usuario = Usuario::where("id_user", $id)->get();
        return view("publicacion-sesion", ["resultadoPub" => $resultadoPub, "resultadoCom" => $resultadoCom, "mensaje" => $mensaje], ["resultado" => $resultado, "id_usuario" => $id_usuario]);
    }
    public function desactivar(Request $tabla){
        $reporte = Reporte::find($tabla->id_re);
        $reporte->estado_re = 'Inactivo';
        $reporte->save();
        return redirect("/perfil");
    }
    public function activar(Request $tabla){
        $reporte = Reporte::find($tabla->id_re);
        $reporte->estado_re = 'Activo';
        $reporte->save();
        return redirect("/perfil");
    }
}
