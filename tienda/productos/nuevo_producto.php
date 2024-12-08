<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
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
            $sql = "SELECT * FROM productos ORDER BY id_producto";
            $resultado = $_conexion -> query($sql);
            $productos = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($productos, $fila["id_producto"]);
            }

            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre = depurar($_POST["nombre"]);
                $tmp_precio = depurar($_POST["precio"]);

                if (isset($_POST["categoria"])) {
                    $tmp_categoria = depurar($_POST["categoria"]);
                    if (!in_array($tmp_categoria, $categorias)) {
                        $err_categoria = "Esa categoría no es válida.";
                    }else
                        $categoria = $tmp_categoria;
                }else{
                    $err_categoria = "La categoría es obligatoria.";
                }
                
                $tmp_stock = depurar($_POST["stock"]);
                $tmp_descripcion = depurar($_POST["descripcion"]);

                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                if ($nombre_imagen == "") {
                    $err_imagen = "La imagen no puede estar vacia";
                }else{
                    if (strlen($nombre_imagen) > 48) {
                        $err_imagen = "El nombre de la imagen es demasiado grande";
                    }else{
                        move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");
                    }
                }

                //VALIDACIÓN CAMPOS
                if ($tmp_nombre == "") {
                    $err_nombre = "El nombre de la categoría no puede estar vacio";
                }else {
                    if (in_array($tmp_nombre,$productos)) {
                        $err_nombre = "El nombre del producto ya existe.";
                    }else{
                        if (strlen($tmp_nombre) < 2) {
                            $err_nombre = "El nombre de la categoría no puede tener menos de 2 carácteres.";
                        }elseif (strlen($tmp_nombre) > 50) {
                            $err_nombre = "El nombre de la categoría no puede tener más de 30 carácteres.";
                        }else {
                            $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{2,50}$/";
                            if (!preg_match($patron,$tmp_nombre)) {
                                $err_nombre = "El nombre de la categoría solo puede tener letras y espacios en blanco.";
                            }else $nombre = $tmp_nombre;
                        }
                    }
                }

                if ($tmp_precio == "") {
                    $err_precio = "El precio no puede estar vacio";
                }else{
                    if (!filter_var($tmp_precio,FILTER_VALIDATE_FLOAT) and $tmp_precio != 0) {
                        $err_precio = "El precio tiene que ser un número";
                    }else{
                        if ($tmp_precio < 0 or $tmp_precio >= 10000) {
                            $err_precio = "El precio no puede ser menor de 0 ni mayor de 9999,99";
                        }else{
                            $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                            if (!preg_match($patron, $tmp_precio)) {
                                $err_precio = "El precio tiene que tener entre 0 y 6 digitos incluyendo 2 decimales.";
                            }else
                                $precio = $tmp_precio;
                        }
                    }
                }
                if($tmp_stock == ""){
                    $stock = 0;
                }else{
                    if(!filter_var($tmp_stock,FILTER_VALIDATE_INT)){
                        $err_stock = "El stock tiene que ser un número entero";
                    }else{
                        if($tmp_stock < 0 and $tmp_stock > 1000){
                            $err_stock = "El stock no puede ser menor que 0 ni mayor que 999";
                        }else
                            $stock = $tmp_stock;
                    }
                }
                if ($tmp_descripcion == "") {
                    $err_descripcion = "La descripción no puede estar vacia";
                }else{
                    if (strlen($tmp_descripcion) > 255) {
                        $err_descripcion = "La descripción no puede tener más de 255";
                    }else
                        $descripcion = $tmp_descripcion;
                }


                if (isset($nombre) and isset($precio) and isset($categoria) and isset($stock) and isset($nombre_imagen) and isset($descripcion)) {
                    $sql = "INSERT INTO productos 
                        (nombre, precio, categoria, stock, imagen, descripcion)
                        VALUES
                        ('$nombre', $precio, '$categoria', $stock, '../imagenes/$nombre_imagen', '$descripcion')";

                    $_conexion -> query($sql);
                }        
            }
        ?>
        <h1>Crear producto</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php if (isset($err_nombre)) echo "<h2 class='error'>$err_nombre</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
                <?php if (isset($err_precio)) echo "<h2 class='error'>$err_precio</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>--- Elige una categoria ---</option>
                    <?php foreach($categorias as $_categoria) { ?>
                        <option value="<?php echo $_categoria ?>">
                            <?php echo $_categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (isset($err_categoria)) echo "<h2 class='error'>$err_categoria</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
                <?php if (isset($err_stock)) echo "<h2 class='error'>$err_stock</h2>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
                <?php if (isset($err_imagen)) echo "<h2 class='error'>$err_imagen</h2>"?>
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