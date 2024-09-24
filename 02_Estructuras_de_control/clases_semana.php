<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dia = date("l");
    echo "<p>Hoy es $dia</p>";

    /*
    Hacer un switch que muestre por pantalla si hoy hay clases de web servidor
    */

    switch($dia){
        case "Tuesday":
        case "Wednesday":
        case "Friday":
            echo "<p>Hoy tenemos desarrollo web entorno servidor</p>";
            break;
        default:
            echo "<p>Hoy no tenemos desarrollo web entorno servidor</p>";
            break;
    }
    ?>
</body>
</html>