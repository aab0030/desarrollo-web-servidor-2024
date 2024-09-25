<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*
        Ejercicio 1

        Calcula la suma de todos los numeros pares del 0 al 20
    */
    $suma = 0;
    $cont = 0;

    while ($cont <= 20){
        if ($cont % 2 == 0) $suma += $cont;
        $cont++;
    }
    echo "<p> Resultado de la suma: $suma";

    /*
        Ejercicio 2
        
        Muestra por pantalla la fecha actual con el siguiente formato:
        "Miercoles 25 de septiempre de 2024"
    */

    $diaL = date("l");

    switch ($diaL) {
        case 'Monday':
            $diaL = "Lunes";
            break;
        case "Tuesday":
            $diaL = "Martes";
            break;
        case "Wednesday":
            $diaL = "Miercoles";
            break;
        case 'Thursday':
            $diaL = "Jueves";
            break;
        case 'Friday':
            $diaL = "Viernes";
            break;
        case 'Saturday':
            $diaL = "Sabado";
            break;
        case 'Sunday':
            $diaL = "Domingo";
            break;
    }

    $diaN = date("j");

    $mes = date("F");

    match ($mes) {
        "January" => $mes = "enero",
        "February"=> $mes = "febrero",
        "March" => $mes = "marzo",
        "April"=> $mes = "abril",
        "May" => $mes = "mayo",
        "June"=> $mes = "junio",
        "July" => $mes = "julio",
        "August"=> $mes = "agosto",
        "September" => $mes = "septiembre",
        "October"=> $mes = "octubre",
        "November" => $mes = "noviembre",
        "Dicember"=> $mes = "dicembre",
    };

    $año = date("Y");

    echo "<p>$diaL $diaN de $mes de $año</p>";

    /*
        Muestra los 50 primeros numeros primos en una lista ordenada
    */

    $cont = 0;
    $cont2 = 1;
    $candidato = 2;
    $divisores = 0;
    echo "<ol>";
    while ($cont < 50){
        while ($cont2 <= $candidato){
            if ($candidato % $cont2 == 0){
                $divisores++;
            }
            $cont2++;
        }
        $cont2 = 1;
        if ($divisores == 2){
            echo "<li>$candidato</li>";
            $cont++;
        }
        $divisores = 0;
        $candidato++;
    }
    echo "</ol>";
    ?>
</body>
</html>