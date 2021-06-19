@extends("layout")
@section("contenido")
    <div class="contenedor_adm">
        <div class="contenido-admin">
            <table class='tabla'>
                <tr class='tabla_prin'>
                    <th class='tabla_cuadro'>Nro</th>
                    <th class='tabla_cuadro'>Nombre</th>
                    <th class='tabla_cuadro'>Apellido</th>
                    <th class='tabla_cuadro'>Sexo</th>
                    <th class='tabla_cuadro'>Pais</th>
                    <th class='tabla_cuadro'>Nacionalidad</th>
                    <th class='tabla_cuadro'>&nbsp;</th>
                </tr>
            <?php $contador = 0?>
            @foreach($resultado as $usuario)
                    <?php $contador++ ?>
                    <tr>
                        <td class='tabla_celda'>{{$contador}}</td>
                        <td class='tabla_celda'>{{$usuario['nom_user']}}</td>
                        <td class='tabla_celda'>{{$usuario['ape_user']}}</td>
                        <td class='tabla_celda'>{{$usuario['sex_user']}}</td>
                        <td class='tabla_celda'>{{$usuario['pais_user']}}</td>
                        <td class='tabla_celda'>{{$usuario['nacionalidad_user']}}</td>
                        <td class='tabla_celda-adm'>
                            @if($usuario['estado_user']=='Activo')
                                <form method='post' action='/admin-usuarios-desactivar'>
                                    @csrf
                                    <input type='hidden' name='id_user' value='{{$usuario['id_user']}}'>
                                    <input type='submit' name='submit' class="boton-adm-a" value='Activo'>
                                </form>
                            @else
                                <form method='post' action='/admin-usuarios-activar'>
                                    @csrf
                                    <input type='hidden' name='id_user' value='{{$usuario['id_user']}}'>
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
