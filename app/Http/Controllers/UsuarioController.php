<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;
use App\Models\Comentario;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;

use \Illuminate\Support\Facades\Validator;
use Auth;

class UsuarioController extends Controller
{
    public function registrar(Request $data)
    {
        $data->validate(
            [
                'nombre'=>'required | min:3 | max:100 | alpha',
                'apellido'=>'required | min:3 | max:100 | alpha',
                'sexo'=>'required',
                'pais'=>'required | min:3 | max:100 | alpha',
                'nacionalidad'=>'required | min:3 | max:100 | alpha',
                'email'=>'required | min:6 | max:100',
                'password_user'=>'required | min:8 | max:100',
                'confirm_password'=>'required | min:8 | max:100',
            ]
        );
        if($data["password_user"]==$data["confirm_password"]){
            $usuario = new Usuario();
            $usuario->nom_user = $data["nombre"];
            $usuario->ape_user = $data["apellido"];
            $usuario->sex_user = $data["sexo"];
            $usuario->pais_user = $data["pais"];
            $usuario->nacionalidad_user = $data["nacionalidad"];
            $usuario->email_user = $data["email"];
            $usuario->password = bcrypt($data["password_user"]);
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
        $id = session('id');
        $resultado = Usuario::get();
        $resultadoPub = Publicacion::get();
        $id_usuario=Usuario::where("id_user", $id)->get();
        return view("usuarios", ["resultado"=>$resultado, "id_usuario"=>$id_usuario], ["resultadoPub"=>$resultadoPub]);
    }
    public function mostrarperfil(string $id){
        $id_user = session('id');
        $usuarios = Usuario::get();
        $resultadoCom = Comentario::get();
        $resultado = Usuario::where("id_user", $id)->get();
        $resultadoPub = Publicacion::where("usuarios_id_user", $id)->get();
        $id_usuario=Usuario::where("id_user", $id_user)->get();
        return view("perfil-externo", ["resultado"=>$resultado, "id_usuario"=>$id_usuario], ["resultadoPub"=>$resultadoPub, "resultadoCom" => $resultadoCom,  "usuarios"=>$usuarios]);
    }
    public function sesion(){
        $credenciales = $this->Validate(request(),
            [
                'email_user' => 'required | min:6 | max:100',
                'password' => 'required | min:8 | max:100',
            ]);
        if(Auth::attempt($credenciales))
        {
            $id = Usuario::select("id_user")->where("email_user",$credenciales['email_user'])->get();
            foreach ($id as $use){
                session(['id' => $use['id_user']]);
                return redirect()->route('muro');
            }
        }
        else
        {
            return back()
                ->withErrors(['email_user'=>trans('auth.failed')])
                ->withInput(request(['email_user']));
        }
    }
    public function traersesion(){
        $id = session('id');
        $resultadoCom = Comentario::get();
        $resultado = Usuario::where("id_user",$id)->get();
        $usuarios = Usuario::get();
        $resultadoPub = Publicacion::where("usuarios_id_user",$id)->get();
        $id_usuario=Usuario::where("id_user", $id)->get();
        return view("usuario-sesion", ["resultado"=>$resultado, "id_usuario"=>$id_usuario], ["resultadoPub"=>$resultadoPub, "resultadoCom" => $resultadoCom, "usuarios"=>$usuarios]);
    }
}
