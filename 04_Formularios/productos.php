<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $productos = [
            ["Nintendo Switch", 300],
            ["PS5", 450],
            ["PS5 pro Switch", 850],
            ["XBOX Series S", 300],
            ["XBOX Series X", 400]
        ];
        /**
         *  Añadir al array una tercera columna que será el stock, y se generará
         * con un rand entrE 0 y 5;
         * 
         * Mostra en una tabla los productos
         * 
         * Crear un formulario donde se introduzca el numbre de un producto, y:
         * 
         *  - Si hay stock, decimos que está disponible y su precio
         *  - Si no hay, decimos que está agotado
         */

        for ($i=0; $i < count($productos); $i++) { 
            $productos[$i][2] = rand(0,5);
        }
    ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto){
                list($nombre, $precio, $stock) = $producto;
                ?>
                <tr>
                    <th><?php echo "$nombre" ?></th>
                    <th><?php echo "$precio" ?></th>
                    <th><?php echo "$stock" ?></th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>