@extends("layout")
@section("contenido")
    <div class="contenedor_pub">
        <?php $resultadoPub = collect($resultadoPub)->sortBy('count')->reverse()->toArray(); ?>
        @foreach($resultadoPub as $publicacion)
            <div class='contenido'>
                <div class='caja_pub'>
                    <h2 class='sub'>{{$publicacion["tipo_pub"]}}</h2><hr>
                    <div class='fech'><h3>{{$publicacion["fecha_pub"]}} {{$publicacion["hora_pub"]}}</h3></div>
                    <p class='pub_p'>Pais: {{$publicacion["pais_pub"]}} Region: {{$publicacion["region_pub"]}}</p>
                    <p class='pub_p'>Lugar: {{$publicacion["direc_pub"]}}</p>
                    <p>{{$publicacion["texto_pub"]}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection


