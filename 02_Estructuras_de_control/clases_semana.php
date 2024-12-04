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

    /*
    Crear un switch que almacene el dia en español y luego reescribir el switch de la asigbnatura con los dias en español
    */
    switch ($dia) {
        case 'Monday':
            $dia = "Lunes";
            break;
        case "Tuesday":
            $dia = "Martes";
            break;
        case "Wednesday":
            $dia = "Miercoles";
            break;
        case 'Thursday':
            $dia = "Jueves";
            break;
        case 'Friday':
            $dia = "Viernes";
            break;
        case 'Saturday':
            $dia = "Sabado";
            break;
        case 'Sunday':
            $dia = "Domingo";
            break;
    }

    switch($dia){
        case "Martes":
        case "Miercoles":
        case "Viernes":
            echo "<p>Hoy tenemos desarrollo web entorno servidor</p>";
            break;
        default:
            echo "<p>Hoy no tenemos desarrollo web entorno servidor</p>";
            break;
    }

    // Estructura MATCH

    $resultado = match ($dia) {
         "Martes", "Miercoles", "Viernes" => "<p>Hoy tenemos desarrollo web entorno servidor</p>",
         default => "<p>Hoy no tenemos desarrollo web entorno servidor</p>"
    };
    echo $resultado;

    $n = rand(1,3);
    $n = match ($n) {
         1, 2, 3 => "<p>El numero aleatorio es $n</p>"
    };
    echo $n;

    $n = rand(1,10);

    $n = match ($n % 2) {
         0 => "<p>El numero $n es par</p>",
         1 => "<p>El numero $n es impar</p>",
    };
    echo $n;
    $numero = rand(-10,20);
    $resultado = match (true) {
         $numero >= -10 && $numero < 0 => "El numero $numero esta en el rango [-10,0)",
         $numero >= 0 && $numero <= 10 => "El numero $numero esta en el rango [0,10]",
         $numero > 10 && $numero <= 20 => "El numero $numero esta en el rango (10,20]",
    }
    ?>
</body>
</html>