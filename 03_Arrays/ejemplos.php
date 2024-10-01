<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php 
    $array = array(
        1 => "Manzana",
        2 => "Naranja",
        3 => "Cereza"
    );
    
    $frutas= [
        1 => "Manzana",
        2 => "Naranja",
        3 => "Cereza"
    ];

    /*
        CREAR UN ARRAY CON UNA LISTADE PERSONAS DONDE LA CLAVE SEA EL DNI Y EL VALOR EL NOMBRE
        MIN 3 PERSONAS
        MOSTRAR EL ARRAY Y A ALGUNA PERSONA

        AÑADIR ELEMENTOS CON Y SIN CLAVE 

        BORRAR ALGUN  ELEMENTO

        REORDENAR LAS CLAVES
    */

    $personas = [
        "06171047D" => "Estela",
        "07817362F" => "Luis",
        "54417782N" => "Enya",
        "14460986N" => "Emilio"
    ];

    print_r($personas);
    echo "<br>";
    $personas["59965961Q"] = "Isma";
    print_r($personas);
    echo "<br>";
    unset($personas["59965961Q"]);
    print_r($personas);
    echo "<br>";
    $personas = array_values($personas);
    print_r($personas);
    echo "<br>";
    ?>
</body>
</html>