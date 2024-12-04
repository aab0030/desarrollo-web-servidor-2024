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
            $sql = "SELECT * FROM productos ORDER BY id_producto";
            $resultado = $_conexion -> query($sql);
            $productos = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["producto"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = depurar($_POST["nombre"]);
                $precio = depurar($_POST["precio"]);

                //VALIDACIÓN CAMPOS
                
                if ($s) {
                    $sql = "INSERT INTO categorias 
                        (categoria, descripcion)
                        VALUES
                        ('$nombre_categoria', '$descripcion')";

                    $_conexion -> query($sql); 
                }        
            }
        ?>
        <h1>Crear producto</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="categoria" type="text">
                <?php if (isset($a)) echo "<h2 class='error'>$a</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($a)) echo "<h2 class='error'>$a</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($a)) echo "<h2 class='error'>$a</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($a)) echo "<h2 class='error'>$a</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($a)) echo "<h2 class='error'>$a</h2>"?>
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