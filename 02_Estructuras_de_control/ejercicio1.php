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

    $mes = match ($mes) {
        "January" => "enero",
        "February"=> "febrero",
        "March" => "marzo",
        "April"=> "abril",
        "May" => "mayo",
        "June"=> "junio",
        "July" => "julio",
        "August"=> "agosto",
        "September" => "septiembre",
        "October"=> "octubre",
        "November" => "noviembre",
        "Dicember"=> "dicembre",
    };

    $año = date("Y");

    echo "<p>$diaL $diaN de $mes de $año</p>";

    /*
        Muestra los 50 primeros numeros primos en una lista ordenada
    */

    $cont = 0;
    $cont2 = 2;
    $primo = true;
    $candidato = 2;
    $divisores = 0;
    echo "<ol>";
    while ($cont < 50){
        while ($cont2 < $candidato && $primo){
            if ($candidato % $cont2 == 0){
                $primo = false;
            }
            $cont2++;
        }
        $cont2 = 2;
        if ($primo){
            echo "<li>$candidato</li>";
            $cont++;
        }
        $primo = true;
        $divisores = 0;
        $candidato++;
    }
    echo "</ol>";

    /* Ejercicio de Fibonnaci de los 10 primeros primos */

    $fib = [
        0,
        1,
    ];
    
    $candidato = 0;
    $cont = 2;
    $cont2 = 2;
    $primo = true;
    $primos = 0;
    echo "<ol>";
    while ($primos < 10){
        $candidato = $fib[$cont - 2] + $fib[$cont - 1];
        array_push($fib,$candidato);
        
        while ($cont2 < $cont && $primo){
            if ($cont % $cont2 == 0){
                $primo = false;
            }
            $cont2++;
        }
        $cont2 = 2;
        if ($primo){
            echo "<li>$candidato</li>";
            $primos++;
        }
        $primo = true;
        $cont++;
    }
    ?>
</body>
</html>