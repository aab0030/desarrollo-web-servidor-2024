<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar credenciales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
        require('../util/funciones.php');

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: iniciar_sesion.php");
            exit;
        }else{
            $usuario = $_SESSION["usuario"];
        } 
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $contrasena_actual = depurar($_POST["actual"]);
                $contrasena_nueva = depurar($_POST["nueva"]);
        
                $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $resultado = $_conexion -> query($sql);
        

                $info_usuario = $resultado -> fetch_assoc();
                $acceso_concedido = password_verify($contrasena_actual,$info_usuario["contrasena"]);
                if(!$acceso_concedido) {
                    $err_actual = "Contraseña equivocada";
                } else {
                    if($contrasena_nueva == ""){
                        $err_nueva= "La contraseña no puede estar vacia";
                    }else{
                        if (strlen($contrasena_nueva) < 8 or strlen($contrasena_nueva) > 15) {
                            $err_nueva = "La contraseña no puede ser menor de 8 caracteres ni mayor de 15";
                        }else{
                            $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                            if (!preg_match($patron, $contrasena_nueva)){
                                $err_nueva = "La contraseña tiene que tener una letra en mayúscula una en minúscula, un número y puede tener caracteres especiales";
                            }else{
                                $contrasena_cifrada = password_hash($contrasena_nueva, PASSWORD_DEFAULT);

                                $sql = "UPDATE usuarios SET
                                contrasena = '$contrasena_cifrada'
                                WHERE usuario = '$usuario'
                                ";

                                $_conexion -> query($sql);
                            }
                        }
                    }
                }
                
            }
        ?>
        <h1>Modificar credenciales</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Contraseña actual</label>
                <input class="form-control" name="actual" type="password">
                <?php if (isset($err_actual)) echo "<h2 class='error'>$err_actual</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input class="form-control" name="nueva" type="password">
                <?php if (isset($err_nueva)) echo "<h2 class='error'>$err_nueva</h2>"?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Cambiar">
                <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>