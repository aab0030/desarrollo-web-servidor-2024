<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('util/conexion.php');
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
         <?php
            session_start();
            if(!isset($_SESSION["usuario"])) {
                echo "<a class='btn btn-primary' href='usuario/iniciar_sesion.php'>Iniciar sesión</a>";
            }else {
                echo "<h2>Bienvenid@ ".$_SESSION["usuario"]."</h2> ";
                echo "<a class='btn btn-danger' href='usuario/cerrar_sesion.php'>Cerrar sesión</a>&nbsp;";
                echo "<a class='btn btn-secondary' href='usuario/cambiar_credenciales.php'>Cambiar credenciales</a><br><br>";
                echo "<a class='btn btn-primary' href='productos/index.php'>Productos</a>&nbsp;";
                echo "<a class='btn btn-primary' href='categorias/index.php'>Categorias</a>";
            }
         ?>
        <h1>Listado de productos</h1>
        <?php
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                        echo "<td>" . $fila["imagen"] . "</td>";
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>