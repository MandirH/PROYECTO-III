@extends("layout")
@section("contenido")
    <div class="contenedor_adm">
        <div class="contenido-admin-pub">
            <table class='tabla'>
                <tr class='tabla_prin'>
                    <th class='tabla_cuadro'>Nro</th>
                    <th class='tabla_cuadro'>Autor</th>
                    <th class='tabla_cuadro'>Pais</th>
                    <th class='tabla_cuadro'>Region</th>
                    <th class='tabla_cuadro'>Dirección</th>
                    <th class='tabla_cuadro'>Tipo</th>
                    <th class='tabla_cuadro'>Contenido</th>
                    <th class='tabla_cuadro'>&nbsp;</th>
                </tr>
                <?php $contador = 0?>
                @foreach($resultadoPub as $publicacion)
                    <?php $contador++ ?>
                    <tr>
                        <td class='tabla_celda'>{{$contador}}</td>
                        @foreach($resultado as $usuario)
                            @if($usuario['id_user']==$publicacion['usuarios_id_user'])
                                <td class='tabla_celda'>{{$usuario['nom_user']}}</td>
                            @endif
                        @endforeach
                        <td class='tabla_celda'>{{$publicacion['pais_pub']}}</td>
                        <td class='tabla_celda'>{{$publicacion['region_pub']}}</td>
                        <td class='tabla_celda'>{{$publicacion['direc_pub']}}</td>
                        <td class='tabla_celda'>{{$publicacion['tipo_pub']}}</td>
                        <td class='tabla_celda_text'>{{$publicacion['texto_pub']}}</td>
                        <td class='tabla_celda-adm'>
                            @if($publicacion['estado_pub']=='Activo')
                                <form method='post' action='/admin-publicaciones-desactivar'>
                                    @csrf
                                    <input type='hidden' name='id_pub' value='{{$publicacion['id_pub']}}'>
                                    <input type='submit' name='submit' class="boton-adm-a" value='Activo'>
                                </form>
                            @else
                                <form method='post' action='/admin-publicaciones-activar'>
                                    @csrf
                                    <input type='hidden' name='id_pub' value='{{$publicacion['id_pub']}}'>
                                    <input type='submit' name='submit' class="boton-adm-i" value='Inactivo'>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
