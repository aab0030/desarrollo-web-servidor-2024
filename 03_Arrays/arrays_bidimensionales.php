<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $videojuegos = [
        ["FC24", "Deporte", 70],
        ["Dark souls", "Soulslike", 50],
        ["Hollow Knight", "Plataforma", 30]
    ]; 
    ?>
    <style>
        table{
            margin: 100px auto;
            border: 1px solid black;
            border-collapse: collapse;
            transform: rotate(45deg);
            animation: tablaGiradora 15s infinite linear;
        }
        @keyframes tablaGirador{
            0%{
                margin-left: 0%;
                transform: rotate(0deg);
            }
            25%{
                margin-left: 50%;
                transform: rotate(90deg);
            }
            50%{
                margin-left: 80%;
                transform: rotate(270deg);
            }
            75%{
                margin-left: 50%;
                transform: rotate(90deg);
            }
            100%{
                margin-left: 0%;
                transform: rotate(0deg);
            }
}
        td,th{
            padding: 1rem;
            border: 1px solid black;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>

       
    <?php 
    $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
    array_push($videojuegos, $nuevo_videojuego);
    $nuevo_videojuego = ["Albion Online", "MMO", 0];
    array_push($videojuegos, $nuevo_videojuego);
    $nuevo_videojuego = ["Valorant", "FPS", 0];
    array_push($videojuegos, $nuevo_videojuego);

        # Ej 1
        #$_precio = array_column($videojuegos, 2);
        #array_multisort($_precio, SORT_ASC, $videojuegos);

        # Ej 2
        #$_precio = array_column($videojuegos, 1);
        #array_multisort($_precio, SORT_DESC, $videojuegos);
        
        #$_titulo = array_column($videojuegos, 0);
        #array_multisort($_titulo, SORT_DESC, $videojuegos);
        #  SORT_ASC para orden ascendiente
        #  SORT_DESC para orden descendiente

        #Ej rapido 1: ordenar por el precio de barato a caro.
        #Ej rapido 2: Ordenar por la categoria en orden alfabeticamente inverso

        for ($i=0; $i < count($videojuegos); $i++) { 
            $videojuegos[$i][4] = "X";
        }
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
    ?>
        
        <tr>
            <td><?php echo $titulo ?></td>
            <td><?php echo $categoria ?></td>
            <td><?php echo $precio ?>€</td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
    
</body>
</html>