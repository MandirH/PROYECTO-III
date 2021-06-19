<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
<div class="header">
    <label for="show-menu" class="show-menu"><div class="icon-menu"></div></label>
    <input type="checkbox" id="show-menu">
    @foreach($resultado as $usuario)
        @foreach($id_usuario as $id)
            @if($id['id_user']==$usuario['id_user'])
                @if($usuario['cargo_user']=='Usuario')
                    <ul class="menu">
                        <li><a href="/usuario">Usuarios</a></li>
                        <li><a href="/publicaciones">Publicaciones</a></li>
                        <li><a href="/perfil">Perfil</a></li>
                    </ul>
                @else
                    <ul class="menu_ad">
                        <li><a href="/admin-usuarios">Usuarios</a></li>
                        <li><a href="/admin-publicaciones">Publicaciones</a></li>
                        <li><a href="/admin-comentarios">Comentarios</a></li>
                        <li><a href="/perfil">Perfil</a></li>
                    </ul>
                @endif
            @else
                @if(!empty($usuarios))
                    @foreach($usuarios as $user)
                        @if($id['id_user']==$user['id_user'])
                            @if($user['cargo_user']=='Usuario')
                                <ul class="menu">
                                    <li><a href="/usuario">Usuarios</a></li>
                                    <li><a href="/publicaciones">Publicaciones</a></li>
                                    <li><a href="/perfil">Perfil</a></li>
                                </ul>
                            @else
                                <ul class="menu_ad">
                                    <li><a href="/admin-usuarios">Usuarios</a></li>
                                    <li><a href="/admin-publicaciones">Publicaciones</a></li>
                                    <li><a href="/admin-comentarios">Comentarios</a></li>
                                    <li><a href="/perfil">Perfil</a></li>
                                </ul>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    @endforeach
</div>
<div class="principal">
    <section>
        @yield("contenido")
    </section>
</div>
<footer>
    <div class="container-footer">
        <div class="footer">
            <div class="copyright">
                © 2021 Todos los Derechos Reservados | <a href="">MHuasco</a>
            </div>
            <div class="information">
                <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
            </div>
        </div>
    </div>
</footer>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/archivo.js"></script>
</body>
</html>
