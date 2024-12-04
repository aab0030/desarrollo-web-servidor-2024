<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
        require('../util/funciones.php');

        /* session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        } */
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

            $categoria = $_GET["categoria"];
            $sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";
            $resultado = $_conexion -> query($sql);
            $categorias = $resultado -> fetch_assoc();

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $descripcion = depurar($_POST["descripcion"]);

                //VALIDACIÓN CAMPOS
                if (strlen($descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255";
                }
                
                if (!isset($err_descripcion)) {
                    $sql = "UPDATE categorias SET
                                descripcion = '$descripcion'
                            WHERE categoria = '$categoria'
                            ";

                    $_conexion -> query($sql);
                }
               
            }
        ?>
        <h1>Modificar categoria</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre categoría</label>
                <input class="form-control" name="nombre_categoria" type="text" 
                    value="<?php echo $categorias["categoria"] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text"
                    placeholder="<?php  
                        if($_SERVER["REQUEST_METHOD"] == "POST") echo $descripcion;
                        else echo $categorias["descripcion"] ;
                    ?>
                    ">
                <?php if (isset($err_descripcion)) echo "<h2 class='error'>$err_descripcion</h2>"?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="categoria" value="<?php echo $categorias["categoria"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>