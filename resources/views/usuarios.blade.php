@extends("layout")
@section("contenido")
    <div class="contenedor_user">
        @foreach($resultado as $usuario)
            <div class="contenido">
                <h2 class="sub"><a href="/usuario/{{$usuario["id_user"]}}">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</a></h2><hr>
                <div class="caja_user">
                    <p class="p_perfil">Sexo: {{$usuario["sex_user"]}}</p>
                    <p class="p_perfil">DNI: {{$usuario["DNI_user"]}}</p>
                </div>
                <div class="caja_user">
                    <p class="p_perfil">Telefono: {{$usuario["telf_user"]}}</p>
                    <p class="p_perfil">email: {{$usuario["email_user"]}} </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
