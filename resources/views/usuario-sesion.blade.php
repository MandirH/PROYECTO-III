@extends("layout")
@section("contenido")
<div class="contenedor_prin">
    <div class="contenido">
        @foreach($resultado as $usuario)
            <h2 class="sub">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</h2><hr>
            <div class="caja">
                <p class="p_perfil">Sexo:{{$usuario["sex_user"]}}</p>
                <p class="p_perfil">DNI: {{$usuario["DNI_user"]}}</p>
            </div>
            <div class="caja">
                <p class="p_perfil">Telefono: {{$usuario["telf_user"]}}</p>
                <p class="p_perfil">email: {{$usuario["email_user"]}} </p>
            </div>
        @endforeach
    </div>
    <div class="contenido">
        <form action="/crear-pub" method="post">
            @csrf
            <label>
                <input type="hidden" name="fecha" value="<?php date_default_timezone_set('America/Lima');  echo date('d-m-Y');?>">
            </label>
            <label>
                <input type="hidden" name="hora" value="<?php  echo date('H:i');?>">
            </label>
            <label>
                <span>PAÍS</span>
                <input type="text" name="pais">
            </label>
            <label>
                <span>REGIÓN</span>
                <input type="text" name="region">
            </label>
            <label>
                <span>DIRECCIÓN</span>
                <input type="text" name="direccion">
            </label>
            <label>
                <span>TIPO</span>
                <input type="text" name="tipo">
            </label>
            <label>
                <span>TEXTO</span>
                <input type="text" name="texto">
                <input type="hidden" name="usuarios_id_user" value="{{$usuario["id_user"]}}">
            </label>
            <label>
                <span>IMAGEN</span>
            </label>
            <label class="aviso">
                <span>MENSAJE</span>
            </label>
            <button type="submit" class="submit" name="confirmar_pub">Crear</button>
        </form>
    </div>
</div>
@endsection
