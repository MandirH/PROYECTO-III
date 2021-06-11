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
                    <div class="div_img">
                        <img src="/img/nacion_icon.png" class="icon_perfil">
                        <p class="p_perfil">País: {{$usuario["pais_user"]}}</p>
                    </div>
                    <div class="div_img">
                        <img src="/img/mundo_icon.png" class="icon_perfil">
                        <p class="p_perfil">Nacionalidad: {{$usuario["nacionalidad_user"]}}</p>
                    </div>
                </div>
                <div class="caja">
                    <div class="div_img">
                        <img src="/img/sex_icon.png" class="icon_perfil">
                        <p class="p_perfil">Sexo: {{$usuario["sex_user"]}}</p>
                    </div>
                    <?php $cont = 0 ?>
                    @foreach($resultadoPub as $publicacion)
                        <?php $cont++ ?>
                    @endforeach
                    <div class="div_img">
                        <img src="/img/publicacion_icon.png" class="icon_perfil">
                        <p class="p_perfil">Publicaciones: {{$cont}} </p>
                    </div>
                </div>
            </div>
            <div class="contenido">
                <form action="/perfil" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="expand">
                        <div class="sub_expand" onclick="openTab('b1');">
                            <h2 class="h2_expand">Crear Publicación</h2>
                        </div>
                    </div>
                    <div id="b1" class="containerTab" style="display:none;">
                        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                        <label>
                            <input type="hidden" name="fecha" value="<?php date_default_timezone_set('America/Lima');  echo date('d-m-Y');?>">
                        </label>
                        <label>
                            <input type="hidden" name="hora" value="<?php  echo date('H:i');?>">
                        </label>
                        <label>
                            <span>PAÍS</span>
                            <input type="text" name="pais">
                            <label class="aviso">
                                <span class="error_span">{{$errors->first('pais')}}</span>
                            </label>
                        </label>
                        <label>
                            <span>REGIÓN</span>
                            <input type="text" name="region">
                            <label class="aviso">
                                <span class="error_span">{{$errors->first('region')}}</span>
                            </label>
                        </label>
                        <label>
                            <span>DIRECCIÓN</span>
                            <input type="text" name="direccion">
                            <label class="aviso">
                                <span class="error_span">{{$errors->first('direccion')}}</span>
                            </label>
                        </label>
                        <label>
                            <span>TIPO</span>
                            <input type="text" name="tipo">
                            <label class="aviso">
                                <span class="error_span">{{$errors->first('tipo')}}</span>
                            </label>
                        </label>
                        <label>
                            <span>TEXTO</span>
                            <input type="text" name="texto">
                            <label class="aviso">
                                <span class="error_span">{{$errors->first('texto')}}</span>
                                @if(!empty($mensaje))
                                    <span  class="error_span" style="color: #84a501">{{$mensaje}}</span>
                                @endif
                            </label>
                            <input type="hidden" name="usuarios_id_user" value="{{$usuario["id_user"]}}">
                        </label>
                        <label>
                            <span>IMAGEN (opcional)</span>
                            <div class="input-file input-file--reverse">
                                <label for="" class="input-file__field"></label>
                                <input type="file" id="file" class="input-file__input" name="img">
                                <label for="file" class="input-file__btn">Seleccionar archivo</label>
                                <label class="aviso">
                                    <span class="error_span">{{$errors->first('img')}}</span>
                                    @if(!empty($mensaje))
                                    <span class="error_span">{{$mensaje}}</span>
                                    @endif
                                </label>
                            </div>
                        </label>
                        <button type="submit" class="submit" name="confirmar_pub">Crear</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="contenedor_pub_user">
            <?php $resultadoPub = collect($resultadoPub)->sortBy('count')->reverse()->toArray(); ?>
            @foreach($resultadoPub as $publicacion)
                <div class='contenido'>
                    @foreach($resultado as $usuario)
                        @if($usuario["id_user"]==$publicacion["usuarios_id_user"])
                            <h2 class="sub_pub_user"><a href="/perfil">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</a></h2>
                        @endif
                    @endforeach
                    <div class="caja_grande">
                        <div class='caja_pub'>
                            <h2 class='sub'>{{$publicacion["tipo_pub"]}}</h2><hr>
                            <div class='fech'><h3>{{$publicacion["fecha_pub"]}} {{$publicacion["hora_pub"]}}</h3></div>
                            <p class='pub_p'>Pais: {{$publicacion["pais_pub"]}} Region: {{$publicacion["region_pub"]}}</p>
                            <p class='pub_p'>Lugar: {{$publicacion["direc_pub"]}}</p>
                            <p>{{$publicacion["texto_pub"]}}</p>
                        </div>
                        @if($publicacion["img_pub"]!=0)
                            <div class='caja_pub_img'>
                                <img class="img_pub" src="{{asset("storage/".$publicacion["img_pub"])}}">
                            </div>
                        @endif
                    </div>
                    <div class='caja_grande_flotante'>
                        <div class='caja_pub'>
                            <h3>COMENTARIOS</h3><hr class="hr_pub">
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
                                                    @foreach($usuarios as $use)
                                                        @if($use["id_user"]==$Com["user_id_com"])
                                                            @foreach($id_usuario as $user)
                                                                <h4 class="com_user"><a href="<?php if($user['id_user']==$use['id_user']){echo '/perfil';}else{echo '/usuario/'.$use['id_user'];}?>">{{$use['nom_user']}} {{$use['ape_user']}}</a></h4>
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
                                <button type="submit" class="boton_com" name="confirmar_pub">Comentar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
