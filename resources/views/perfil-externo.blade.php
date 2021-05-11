@extends("layout")
@section("contenido")


        @foreach($resultado as $usuario)
            <div class="div_perfil">
                <img class="img_perfil" src="<?php if($usuario['sex_user']=='Masculino'){echo '/img/perfil_varon.png';}else{echo '/img/perfil_mujer.png';} ?>" alt="">
            </div>
            <div class="contenedor_prin">
                <div class="contenido">
                    <h2 class="sub">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</h2><hr>
                    <div class="caja">
                        <p class="p_perfil">Sexo:{{$usuario["sex_user"]}}</p>
                        <p class="p_perfil">DNI: {{$usuario["DNI_user"]}}</p>
                    </div>
                    <div class="caja">
                        <p class="p_perfil">Telefono: {{$usuario["telf_user"]}}</p>
                        <p class="p_perfil">email: {{$usuario["email_user"]}} </p>
                    </div>
                </div>
            </div>
        @endforeach

@endsection

