<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ReporteController;
use App\Models\Usuario;
use App\Models\Publicacion;
use App\Models\Comentario;
use App\Models\Reporte;

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

Route::view('/registrarse', 'iniciar-sesion');
Route::post('/registrarse', [UsuarioController::class, "registrar"]);

Route::view('/perfil', 'usuario-sesion');
Route::post('/perfil', [PublicacionController::class, "registrarPublicacion"]);
Route::get('/perfil', [UsuarioController::class, "traersesion"])->name('muro');
Route::post('/verificar', [UsuarioController::class, "sesion"])->name('perfil');

Route::get('/usuario', [UsuarioController::class, "mostrar"]);
Route::get('/usuario/{id}', [UsuarioController::class, "mostrarperfil"], ["id"=>"id"]);

Route::view('/publicaciones', 'publicacion-sesion');
Route::get('/publicaciones', [PublicacionController::class, "mostrarPublicacion"]);
Route::post('/publicaciones', [ComentarioController::class, "registrarCom"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*ADMINISTRADOR*/

/*ADM USER*/
Route::view('/admin-usuarios', 'adm-usuarios');
Route::get('/admin-usuarios', [UsuarioController::class, "admiuser"]);
Route::post('/admin-usuarios-activar', [UsuarioController::class, "activar"]);
Route::post('/admin-usuarios-desactivar', [UsuarioController::class, "desactivar"]);

/*ADM PUBLICACION*/
Route::view('/admin-publicaciones', 'adm-publicaciones');
Route::get('/admin-publicaciones', [PublicacionController::class, "admipublicacion"]);
Route::post('/admin-publicaciones-activar', [PublicacionController::class, "activar"]);
Route::post('/admin-publicaciones-desactivar', [PublicacionController::class, "desactivar"]);

/*ADM COMENTARIO*/
Route::view('/admin-comentarios', 'adm-comentarios');
Route::get('/admin-comentarios', [ComentarioController::class, "admicomentario"]);
Route::post('/admin-comentarios-activar', [ComentarioController::class, "activar"]);
Route::post('/admin-comentarios-desactivar', [ComentarioController::class, "desactivar"]);

/*REPORTE*/
Route::post('/reportar', [ReporteController::class, "registrarRe"]);
Route::post('/admin-reporte-activar', [ReporteController::class, "activar"]);
Route::post('/admin-reporte-desactivar', [ReporteController::class, "desactivar"]);
