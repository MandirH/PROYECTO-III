@extends("layout")
@section("contenido")
    <div class="contenedor_pub">
        @if(!empty($mensaje))
            <div class='contenido_hidden'>
                <label class="aviso_pub">
                    <span  class="error_span" style="color: #84a501; font-size: 20px;">{{$mensaje}}</span>
                </label>
            </div>
        @endif
        @if(!empty($errors->first('com')))
           <div class='contenido_hidden'>
               <span class="spanCom">{{$errors->first('com')}}</span>
           </div>
        @endif
            <?php $resultadoPub = collect($resultadoPub)->sortBy('id_pub')->reverse()->toArray(); ?>
        @foreach($resultadoPub as $publicacion)
            <div class='contenido'>
                @foreach($resultado as $usuario)
                    @if($usuario["id_user"]==$publicacion["usuarios_id_user"])
                        @foreach($id_usuario as $user)
                            <h2 class="sub_pub_user"><a href="<?php if($user['id_user']==$usuario['id_user']){echo '/perfil';}else{echo '/usuario/'.$usuario['id_user'];}?>">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</a></h2>
                        @endforeach
                    @endif
                @endforeach
                <div class='caja_pub'>
                    <h2 class='sub'>{{$publicacion["tipo_pub"]}}</h2><hr>
                    <div class='fech'><h3>{{$publicacion["fecha_pub"]}} {{$publicacion["hora_pub"]}}</h3></div>
                    <p class='pub_p'>Pais: {{$publicacion["pais_pub"]}} Region: {{$publicacion["region_pub"]}}</p>
                    <p class='pub_p'>Lugar: {{$publicacion["direc_pub"]}}</p>
                    <p>{{$publicacion["texto_pub"]}}</p>
                </div>
                @if($publicacion["img_pub"]!=0)
                    <div class='caja_pub'>
                        <img class="img_pub" src="{{asset("storage/".$publicacion["img_pub"])}}">
                    </div>
                @endif
                    <div class='caja_grande_flotante_pub'>
                        <h3>COMENTARIOS</h3><hr>
                        <form action="/publicaciones" method="post" enctype="multipart/form-data">
                            @csrf
                            <label>
                                <input type="hidden" name="fecha" value="<?php date_default_timezone_set('America/Lima');  echo date('d-m-Y');?>">
                            </label>
                            <label>
                                <input type="hidden" name="hora" value="<?php  echo date('H:i');?>">
                            </label>
                            <label class="coment">
                                <div class="caja_com">
                                    <?php $cont_com = 0 ?>
                                    @foreach($resultadoCom as $Com)
                                        @if($Com['pub_id_com']==$publicacion['id_pub'])
                                            <?php $cont_com=1 ?>
                                            <div class="com">
                                                @foreach($resultado as $usuario)
                                                    @if($usuario["id_user"]==$Com["user_id_com"])
                                                        @foreach($id_usuario as $user)
                                                            <h4 class="com_user"><a href="<?php if($user['id_user']==$usuario['id_user']){echo '/perfil';}else{echo '/usuario/'.$usuario['id_user'];}?>">{{$usuario['nom_user']}} {{$usuario['ape_user']}}</a></h4>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <div class="content_com_fecha">
                                                    <h4 class="time">{{$Com['hora_com']}} {{$Com['fecha_com']}}</h4>
                                                </div>
                                                <div class="content_com">
                                                    {{$Com['texto_com']}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if($cont_com==0)
                                        <div class="com">
                                            <h4 class="com_user">Aún no hay comentarios.</h4>
                                        </div>
                                    @endif
                                </div>
                                <input type="text" name="com">
                                <input type="hidden" name="id" value="{{$publicacion["id_pub"]}}">
                                @foreach($id_usuario as $user)
                                    <input type="hidden" name="id_usuario" value="{{$user["id_user"]}}">
                                @endforeach
                            </label>
                            <button type="submit" class="submit_com" name="confirmar_pub">Comentar</button>
                        </form>
                    </div>
            </div>
        @endforeach
    </div>
@endsection


