<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function registrar(Request $data)
    {
        $data->validate(
            [
                'nombre'=>'required | min:3 | max:40 | alpha',
                'apellido'=>'required | min:3 | max:40 | alpha',
                'sexo'=>'required',
                'DNI'=>'required | size:8',
                'telefono'=>'required | size:9',
                'email'=>'required | min:6 | max:40',
                'password'=>'required | min:8 | max:40',
                'confirm_password'=>'required | min:8 | max:40',
            ]
        );
        if($data["password"]==$data["confirm_password"]){
            $usuario = new Usuario();
            $usuario->nom_user = $data["nombre"];
            $usuario->ape_user = $data["apellido"];
            $usuario->sex_user = $data["sexo"];
            $usuario->DNI_user = $data["DNI"];
            $usuario->telf_user = $data["telefono"];
            $usuario->email_user = $data["email"];
            $usuario->contra_user = $data["password"];
            $usuario->cargo_user = "Usuario";
            $usuario->estado_user = "Activo";
            $usuario->save();
            $mensaje = "Registrado con éxito";
            return view("iniciar-sesion", ["mensaje"=>$mensaje]);
        }else{
            $mensaje = "Las contraseñas no coinciden";
            return view("iniciar-sesion", ["mensaje"=>$mensaje]);
        }

    }
    public function mostrar(){
        $resultado = Usuario::get();
        return view("usuarios", ["resultado"=>$resultado]);
    }
    public function mostrarperfil(string $id){
        $resultado = Usuario::where("id_user", $id)->get();
        return view("perfil-externo", ["resultado"=>$resultado]);
    }
    public function sesion(){
        $resultado = Usuario::where("id_user",1)->get();
        return view("usuario-sesion", ["resultado"=>$resultado]);
    }
}
