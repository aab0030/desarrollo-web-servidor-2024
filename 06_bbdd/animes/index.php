<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require("../conexiones.php");
    ?> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);
        ?>
        <table class=" col-8 table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($fila = $resultado -> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $fila["titulo"] ?></td>
                            <td><?php echo $fila["nombre_estudio"] ?></td>
                            <td><?php echo $fila["anno_estreno"] ?></td>
                            <td><?php echo $fila["num_temporadas"] ?></td>
                            <?php
                            if ($fila["unidades_vendidas"] === NULL) {
                                echo "No hay datos";
                            }else echo $fila["unidades vendidas"];
                            ?>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>