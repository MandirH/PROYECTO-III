<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
use App\Models\Usuario;
use App\Models\Publicacion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/


/*MOSTRAR INICIO FORMA VISTA
Route::view('/Principal', 'bienvenido');
  MOSTRAR FORMA DINAMICA
Route::get('/', function () {
    return view('bienvenido');
});

Route::get('/administrador', function (){
    $resultados = DB::select("select * from usuarios");
    dd($resultados);
});
*/

Route::get('/', function () {
    return view('bienvenido');
});
Route::get('/iniciar-registrarse', function () {
    return view('iniciar-sesion');
});
/*
Route::get('/iniciar-registrarse', function () {
    return view('layout');
});
*/
Route::view('/registrarse', 'iniciar-sesion');
Route::post('/registrarse', [UsuarioController::class, "registrar"]);

Route::view('/perfil', 'usuario-sesion');
Route::post('/perfil-iniciado', [PublicacionController::class, "sesion"]);

Route::get('/usuario', [UsuarioController::class, "mostrar"]);
Route::get('/publicaciones', [PublicacionController::class, "mostrarPublicacion"]);
Route::get('/usuario/{id}', [UsuarioController::class, "mostrarperfil"], ["id"=>"id"]);
