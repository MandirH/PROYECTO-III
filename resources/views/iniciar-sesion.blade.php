<?php
if(isset($_POST['entrar_login'])){
    session_start();

    //MODIFICAR
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bd_aplicacion';

    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    //MODIFICAR

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = $conn->prepare('SELECT id_user, email_user, contra_user, cargo_user, estado_user FROM usuarios WHERE email_user = :email_user');
        $sql->bindParam(':email_user', $_POST['email']);

        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        $message_2 = '';

        if ($results > 0 && password_verify($_POST['password'], $results['contra_user'])) {
            if($results['estado_user']=='Activo'){
                $_SESSION['user_id'] = $results['id_user'];
                header("Location: principal.php");
            }
            else{
                $message_2 = 'esta cuenta esta inactiva';
            }
        } else {
            $message_2 = 'esta cuenta no existe';
        }
    }
    else{
        $message_2 = 'Complete todos los Campos';
    }
}
//REGISTRARSE
if(isset($_POST['confirmar'])){

    $message = '';
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['DNI']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        if($_POST['password']==$_POST['confirm_password']){
            $cargo = "Usuario";
            $estado = "Activo";
            $sql = "INSERT INTO usuarios (nom_user, ape_user, sex_user, DNI_user, telf_user, email_user, contra_user, cargo_user, estado_user) VALUES (:nom_user, :ape_user, :sex_user, :DNI_user, :telf_user, :email_user, :contra_user, :cargo_user, :estado_user)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_user', $_POST['nombre']);
            $stmt->bindParam(':ape_user', $_POST['apellido']);
            $stmt->bindParam(':sex_user', $_POST['sexo']);
            $stmt->bindParam(':DNI_user', $_POST['DNI']);
            $stmt->bindParam(':telf_user', $_POST['telefono']);
            $stmt->bindParam(':email_user', $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':contra_user', $password);
            $stmt->bindParam(':cargo_user', $cargo);
            $stmt->bindParam(':estado_user', $estado);

            if ($stmt->execute()) {
                $message = 'se ha registrado con exito';
                $si = 1;
            } else {
                $message = 'lo sentimos, hay un problema';
            }
        }
        else{
            $message = 'Las contraseñas no coinciden';
        }
    }
    else{
        $message = 'Complete todos los Campos';
    }
}
?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="boton_b">
    <a href="bienvenido.blade.php">Volver</a>
</div>
<img class="portada_b" src="../img/portada-02.png" alt="">
<div class="principal">
    <div class="contenedor_b">
        <div class="contenido">
            <form action="iniciar-sesion.blade.php" method="post">
                <h2>Iniciar Sesión</h2>
                <label>
                    <span>Dirección de correo electronico</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password">
                </label>
                <label class="aviso">
                    <span><?php if(!empty($message_2)){echo $message_2;} ?></span>
                </label>
                <button class="submit" type="submit" name="entrar_login">Iniciar</button>
            </form>
            <p class="forgot-pass">¿Has olvidado tu contraseña?</p>
            <div class="social-media">
                <ul>
                    <li><img src="../img/facebook.png"></li>
                    <li><img src="../img/twitter.png"></li>
                    <li><img src="../img/linkedin.png"></li>
                    <li><img src="../img/instagram.png"></li>
                </ul>
            </div>
        </div>
        <div class="contenido">
            <form action="iniciar-sesion.blade.php" method="post">
                <h2>Resistrarse</h2>
                <label>
                    <span>Nombre</span>
                    <input type="text" name="nombre">
                </label>
                <label>
                    <span>Apellido</span>
                    <input type="text" name="apellido">
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
                </label>
                <label>
                    <span>Teléfono</span>
                    <input type="number" name="telefono">
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" name="password">
                </label>
                <label>
                    <span>Confirme la contraseña</span>
                    <input type="password" name="confirm_password">
                </label>
                <label class="aviso">
                    <span><?php if(!empty($message)){echo $message;} ?></span>
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
