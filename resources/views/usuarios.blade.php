@extends("layout")
@section("contenido")
    <div class="contenedor_user">
        @foreach($resultado as $usuario)
            <div class="contenido">
                @foreach($id_usuario as $user)
                <h2 class="sub"><a href="<?php if($user['id_user']==$usuario['id_user']){echo '/perfil';}else{echo '/usuario/'.$usuario['id_user'];}?>">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</a></h2><hr>
                @endforeach
                <div class="caja_user">
                    <div class="div_img">
                        <img src="/img/nacion_icon.png" class="icon_perfil">
                        <p class="p_perfil">País: {{$usuario["pais_user"]}}</p>
                    </div>
                    <div class="div_img">
                        <img src="/img/nacion_icon.png" class="icon_perfil">
                        <p class="p_perfil">Nacionalidad: {{$usuario["nacionalidad_user"]}}</p>
                    </div>
                </div>
                <div class="caja_user">
                    <div class="div_img">
                        <img src="/img/sex_icon.png" class="icon_perfil">
                        <p class="p_perfil">Sexo: {{$usuario["sex_user"]}}</p>
                    </div>
                    <?php $cont = 0 ?>
                    @foreach($resultadoPub as $publicacion)
                        @if($publicacion['usuarios_id_user']==$usuario['id_user'])
                            <?php $cont++ ?>
                        @endif

                    @endforeach
                    <div class="div_img">
                        <img src="/img/publicacion_icon.png" class="icon_perfil">
                        <p class="p_perfil">Publicaciones: {{$cont}} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
