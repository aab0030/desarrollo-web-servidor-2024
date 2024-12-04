<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes Genshin</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $misPersonajes = [
        ["Ayato", "Hydro"],
        ["Arlechinno", "Pyro"],
        ["Shogun Raiden", "Electro"]
    ];

    //Creamos el personaje en un array
    $piti = ["Furina", "Hydro"];

    //Suerte! Nos ha tocado, ahora lo metemos en misPersonajes
    array_push($misPersonajes, $piti);

    //Volvemos a probar suerte
    $piti = ["Chichi", "Cryo"];

    //Ohhh! Mala suerte, cada vez mas cerca de chichi c6
    array_push($misPersonajes, $piti);

    //Imaginemos que eso ultimo no ha pasado
    unset($misPersonajes[4]);

    //Veamos sus puntos de fuerza
    for ($i=0; $i < count($misPersonajes); $i++) { 
        $misPersonajes[$i][2] = intval(rand(500,2000));
    }

    //Ahora sus puntos de vida
    for ($i=0; $i < count($misPersonajes); $i++) { 
        $misPersonajes[$i][3] = intval(rand(10000,30000));
    }

    //Comprobaremos que tipo de personaje es 
    for ($i=0; $i < count($misPersonajes); $i++) {
        $tipo = "Soporte";
        if ($misPersonajes[$i][3] >= 20000) {
            $tipo = "Tanque";
        }else if ($misPersonajes[$i][2] >= 1500) {
            $tipo = "Ataque";
        }
        $misPersonajes[$i][4] = $tipo;
    }

    //Ordenamos por atauqe, vida, elemento y nombre de foma alfabetica en ese orden
    $_ataque = array_column($misPersonajes, 2);
    $_vida = array_column($misPersonajes, 3);
    $_elemento = array_column($misPersonajes, 1);
    $_nombre = array_column($misPersonajes, 0);

    array_multisort($_ataque,SORT_ASC,$_vida,SORT_ASC,$_elemento,SORT_ASC,$_nombre,SORT_ASC, $misPersonajes);
    ?>
    <style>
        table{
            margin: 0 auto;
        }
        table,td,th{
            text-align: center;
            padding: 10px;
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
        caption{
            font-weight: bold;
            border: 1px solid black;
        }
    </style>
    <table>
        <caption>Personajes</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Elemento</th>
                <th>Ataque</th>
                <th>Salud</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($misPersonajes as $personaje) {
                list($nombre,$elemento,$ataque,$vida,$tipo) = $personaje;
            ?>
            <tr>
                <td><?php echo $nombre ?></td>
                <td><?php echo $elemento ?></td>
                <td><?php echo $ataque ?></td>
                <td><?php echo $vida ?></td>
                <td><?php echo $tipo ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>