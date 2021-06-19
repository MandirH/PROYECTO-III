@extends("layout")
@section("contenido")
    <div class="contenedor_adm">
        <div class="contenido-admin-pub">
            <table class='tabla'>
                <tr class='tabla_prin'>
                    <th class='tabla_cuadro'>Nro</th>
                    <th class='tabla_cuadro'>Autor</th>
                    <th class='tabla_cuadro'>Fecha</th>
                    <th class='tabla_cuadro'>Hora</th>
                    <th class='tabla_cuadro'>Contenido</th>
                    <th class='tabla_cuadro'>&nbsp;</th>
                </tr>
                <?php $contador = 0?>
                @foreach($resultadoCom as $comentario)
                    <?php $contador++ ?>
                    <tr>
                        <td class='tabla_celda'>{{$contador}}</td>
                        @foreach($resultado as $usuario)
                            @if($usuario['id_user']==$comentario['user_id_com'])
                                <td class='tabla_celda'>{{$usuario['nom_user']}}</td>
                            @endif
                        @endforeach
                        <td class='tabla_celda'>{{$comentario['fecha_com']}}</td>
                        <td class='tabla_celda'>{{$comentario['hora_com']}}</td>
                        <td class='tabla_celda_text'>{{$comentario['texto_com']}}</td>
                        <td class='tabla_celda-adm'>
                            @if($comentario['estado_com']=='Activo')
                                <form method='post' action='/admin-comentarios-desactivar'>
                                    @csrf
                                    <input type='hidden' name='id_com' value='{{$comentario['id_com']}}'>
                                    <input type='submit' name='submit' class="boton-adm-a" value='Activo'>
                                </form>
                            @else
                                <form method='post' action='/admin-comentarios-activar'>
                                    @csrf
                                    <input type='hidden' name='id_com' value='{{$comentario['id_com']}}'>
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
