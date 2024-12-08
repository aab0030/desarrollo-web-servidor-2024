<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
        require('../util/funciones.php');

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
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
            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre_categoria = depurar($_POST["categoria"]);
                $descripcion = depurar($_POST["descripcion"]);

                //VALIDACIÓN CAMPOS
                if ($tmp_nombre_categoria == "") {
                    $err_nombre_categoria = "El nombre de la categoría no puede estar vacio";
                }else {
                    if (in_array($tmp_nombre_categoria,$categorias)) {
                        $err_nombre_categoria = "El nombre de la categoría ya existe.";
                    }else{
                        if (strlen($tmp_nombre_categoria) < 2) {
                            $err_nombre_categoria = "El nombre de la categoría no puede tener menos de 2 carácteres.";
                        }elseif (strlen($tmp_nombre_categoria) > 30) {
                            $err_nombre_categoria = "El nombre de la categoría no puede tener más de 30 carácteres.";
                        }else {
                            $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,30}$/";
                            if (!preg_match($patron,$tmp_nombre_categoria)) {
                                $err_nombre_categoria = "El nombre de la categoría solo puede tener letras y espacios en blanco.";
                            }else $nombre_categoria = $tmp_nombre_categoria;
                        }
                    }
                }
                if (strlen($descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255";
                }
                if (isset($nombre_categoria) and !isset($err_descripcion)) {
                    $sql = "INSERT INTO categorias 
                        (categoria, descripcion)
                        VALUES
                        ('$nombre_categoria', '$descripcion')";

                    $_conexion -> query($sql); 
                }        
            }
        ?>
        <h1>Crear categoria</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" name="categoria" type="text">
                <?php if (isset($err_nombre_categoria)) echo "<h2 class='error'>$err_nombre_categoria</h2>"?>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($err_descripcion)) echo "<h2 class='error'>$err_descripcion</h2>"?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>