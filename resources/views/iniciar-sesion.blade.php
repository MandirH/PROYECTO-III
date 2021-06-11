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
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
<div class="boton_b">
    <a href="/">Volver</a>
</div>
<img class="portada_b" src="/img/portada-02.png" alt="">
<div class="principal">
    <div class="contenedor_b">
        @if(!empty($mensaje))
            @if($mensaje=='Registrado con éxito')
                <div class='contenido_hidden_sesion'>
                    <label class="aviso_pub">
                        <span  class="error_span" style="color: #84a501; font-size: 20px;">{{$mensaje}}</span>
                    </label>
                </div>
            @else
                <div class='contenido_hidden'>
                    <label class="aviso_pub">
                        <span  class="error_span" style="font-size: 20px;">{{$mensaje}}</span>
                    </label>
                </div>
            @endif
        @endif
        <div class="contenido">
            <form action="/verificar" method="post">
                @csrf
                <h2>Iniciar Sesión</h2>
                <label>
                    <span>Dirección de correo electronico</span>
                    <input type="email" name="email_user" value="{{ old('email_user') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('email_user')}}</span>
                    </label>
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password" value="{{ old('password') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('password')}}</span>
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
                    <input type="text" name="nombre" value="{{ old('nombre') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('nombre')}}</span>
                    </label>
                </label>
                <label>
                    <span>Apellido</span>
                    <input type="text" name="apellido" value="{{ old('apellido') }}">
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
                    <span>País</span>
                    <input type="text" name="pais" value="{{ old('pais') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('pais')}}</span>
                    </label>
                </label>
                <label>
                    <span>Nacionalidad</span>
                    <input type="text" name="nacionalidad" value="{{ old('nacionalidad') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('nacionalidad')}}</span>
                    </label>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('email')}}</span>
                    </label>
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password_user" value="{{ old('password_user') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('password')}}</span>
                    </label>
                </label>
                <label>
                    <span>Confirme la contraseña</span>
                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}">
                    <label class="aviso">
                        <span class="error_span">{{$errors->first('confirm_password')}}</span>
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
