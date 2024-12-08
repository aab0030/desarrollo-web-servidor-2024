<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
        require('../util/funciones.php');
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = depurar($_POST["usuario"]);
        $tmp_contrasena = depurar($_POST["contrasena"]);

        if ($tmp_usuario == ""){
            $err_usuario = "El usuario no puede estar vacio";
        }else{
            if (strlen($tmp_usuario) < 3 or strlen($tmp_usuario) > 15) {
                $err_usuario = "El usuario no puede ser menor de 3 caracteres ni mayor de 15";
            }else{
                $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,15}$/";
                if (!preg_match($patron, $tmp_usuario)){
                    $err_usuario = "El usuario solo puede tener letras y numeros";
                }else{
                    $usuario = $tmp_usuario;
                }
            }
        }
        if ($tmp_contrasena == ""){
            $err_contrasena = "La contraseña no puede estar vacio";
        }else{
            if (strlen($tmp_contrasena) < 8 or strlen($tmp_contrasena) > 15) {
                $err_contrasena = "La contraseña no puede ser menor de 8 caracteres ni mayor de 15";
            }else{
                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                if (!preg_match($patron, $tmp_contrasena)){
                    $err_contrasena = "La contraseña tiene que tener una letra en mayúscula una en minúscula, un número y puede tener caracteres especiales";
                }else{
                    $contrasena = $tmp_contrasena;
                }
            }
        }

        if (isset($usuario) and isset($contrasena)) {
            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
            $_conexion -> query($sql);  
        }
    }
    ?>
    <div class="container">
        <h1>Formulario de registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if (isset($err_usuario)) echo "<h2 class='error'>$err_usuario</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($err_contrasena)) echo "<h2 class='error'>$err_contrasena</h2>"?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
        <h3>Volver a index</h3>
        <a class="btn btn-secondary" href="../index.php">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>