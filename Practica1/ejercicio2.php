<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barrios malaga</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $barrios = [
        ["Centro",2543],
        ["Huelin", 1109],
        ["Malaga Este", 890],
        ["Palma/Palmilla",49]
    ];
    ?>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Pisos turísticos</th>
        </thead>
        <tbody>
            <?php 
            foreach ($barrios as $barrio) {
            ?>
            <tr>
                <td><?php echo $barrio[0] ?></td>
                <td><?php echo $barrio[1] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <form action="" method="post">
        <input type="text" name = "nombre">
        <input type="submit" value="VerViviendas">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $i = 0;
        for (;$i < count($barrios) && $nombre != $barrios[$i][0]; $i++);
        if ($i == count($barrios)) {
            echo "Tu barrio no esta.";
        }elseif ($barrios[$i][1] == 0){
            echo $barrios[$i][0]." ".$barrios[$i][1]." No hay viviendas turisticas.";
        }elseif ($barrios[$i][1] >= 1 && $barrios[$i][1] <= 50){
            echo $barrios[$i][0]." ".$barrios[$i][1]." Hay pocas viviendas turisticas.";
        }elseif ($barrios[$i][1] >= 51 && $barrios[$i][1] <= 1000){
            echo $barrios[$i][0]." ".$barrios[$i][1]." Hay bastantes viviendas turisticas.";
        }elseif ($barrios[$i][1] >= 1000){
            echo $barrios[$i][0]." ".$barrios[$i][1]." Hay demasiadas viviendas turisticas.";
        }
    }
    ?>
</body>
</html>