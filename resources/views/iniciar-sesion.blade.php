<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="boton_b">
    <a href="/">Volver</a>
</div>
<img class="portada_b" src="/img/portada-02.png" alt="">
<div class="principal">
    <div class="contenedor_b">
        <div class="contenido">
            <form action="" method="post">
                <h2>Iniciar Sesión</h2>
                <label>
                    <span>Dirección de correo electronico</span>
                    <input type="email" name="email_s">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('email_s')}}</span>
                    </label>
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password_s">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('password_s')}}</span>
                    </label>
                </label>
                <label class="aviso">
                    <span class="error_span"><?php if(!empty($message_2)){echo $message_2;} ?></span>
                </label>
                <button class="submit" type="submit" name="entrar_login">Iniciar</button>
            </form>
            <p class="forgot-pass">¿Has olvidado tu contraseña?</p>
            <div class="social-media">
                <ul>
                    <li><img src="/img/facebook.png"></li>
                    <li><img src="/img/twitter.png"></li>
                    <li><img src="/img/linkedin.png"></li>
                    <li><img src="/img/instagram.png"></li>
                </ul>
            </div>
        </div>
        <div class="contenido">
            <form action="/registrarse" method="post">
                @csrf
                <h2>Resistrarse</h2>
                <label>
                    <span>Nombre</span>
                    <input type="text" name="nombre">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('nombre')}}</span>
                    </label>
                </label>
                <label>
                    <span>Apellido</span>
                    <input type="text" name="apellido">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('apellido')}}</span>
                    </label>
                </label>
                <label>
                    <span>Sexo</span>
                    <select type="text" class="select" name="sexo">
                        <option>Masculino</option>
                        <option>Femenino</option>
                    </select>
                </label>
                <label>
                    <span>DNI</span>
                    <input type="number" name="DNI">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('DNI')}}</span>
                    </label>
                </label>
                <label>
                    <span>Teléfono</span>
                    <input type="number" name="telefono">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('telefono')}}</span>
                    </label>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('email')}}</span>
                    </label>
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('password')}}</span>
                    </label>
                </label>
                <label>
                    <span>Confirme la contraseña</span>
                    <input type="password" name="confirm_password">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('confirm_password')}}</span>
                        @if(!empty($mensaje))
                            @if($mensaje=='Registrado con éxito')
                                <span  class="error_span" style="color: #84a501">{{$mensaje}}</span>
                            @else
                                <span class="error_span">{{$mensaje}}</span>
                            @endif
                        @endif
                    </label>
                </label>
                <button type="submit" class="submit" name="confirmar">Registrarse ahora</button>
            </form>
        </div>
    </div>
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
