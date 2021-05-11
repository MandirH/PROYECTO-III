<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="header">
    <label for="show-menu" class="show-menu"><div class="icon-menu"></div></label>
    <input type="checkbox" id="show-menu">
    <ul class="menu">
        <li><a href="/usuario">Inicio</a></li>
        <li><a href="/publicaciones">Publicaciones</a></li>
        <li><a href="/perfil">Perfil</a></li>
    </ul>
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
</body>
</html>
